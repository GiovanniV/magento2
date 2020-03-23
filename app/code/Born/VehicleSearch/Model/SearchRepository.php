<?php
/**
 * Born_VehicleSearch
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\VehicleSearch
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */

namespace Born\VehicleSearch\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Born\VehicleSearch\Api\Data\VehicleSearchResultInterfaceFactory;
use Born\VehicleSearch\Api\SearchRepositoryInterface;
use Born\VehicleSearch\Model\ResourceModel\Vehicles\CollectionFactory as VehiclesCollectionFactory;
use Born\VehicleSearch\Model\ResourceModel\Vehicles\Collection;
use Born\VehicleSearch\Model\Vehicles as Vehicles;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Born\VehicleSearch\Model\VehiclesFactory;

class SearchRepository implements SearchRepositoryInterface
{
    /***
     * @var Vehicles
     *
     */
    private $vehicleModel;
    /**
     * @var VehiclesFactory
     */
    private $vehicleFactory;

    /**
     * @var vehiclesCollectionFactory
     */
    private $vehiclesCollectionFactory;

    /**
     * @var VehicleSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    /**@var Magento\Framework\Api\SearchCriteriaBuilder*/
    private $searchCriteriaBuilder;

    public function __construct(
        VehiclesFactory $vehicleFactory,
        VehiclesCollectionFactory $vehiclesCollectionFactory,
        VehicleSearchResultInterfaceFactory $searchResultFactory,
        Vehicles $vehicleModel,
        SearchCriteriaBuilder $searchCriteriaBuilder)
    {
        $this->vehicleFactory = $vehicleFactory;
        $this->vehiclesCollectionFactory = $vehiclesCollectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->vehicleModel = $vehicleModel;
        $this-> searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($id)
    {
        $vehicle = $this->vehicleFactory->create();
        $vehicle->getResource()->load($vehicle, $id);
        if (! $vehicle->getVehicleId()) {
            throw new NoSuchEntityException(__('Unable to find Vehicle with ID "%1"', $id));
        }
        return $vehicle;
    }


    /**
     * {@inheritdoc}
     */
    public function save($application_master)
    {
        $response = [];
        $result = array();

        if(isset($application_master)){
            if(is_array($application_master) && isset($application_master['row'][0])){
                $application_master = $application_master['row'];
            }
            foreach($application_master as $record){
                $id = '';
                $this->searchCriteriaBuilder->addFilter('ship_to_number',$record['ship_to_number'], 'eq');
                $this->searchCriteriaBuilder->addFilter('application_number',$record['application_number'], 'eq');
                $searchCriteria = $this->searchCriteriaBuilder->create();

                $collection = $this->getList($searchCriteria)->getItems();
                foreach($collection as $data){
                    $id = $data->getVehicleId();
                }
                $vehicleFactory = $this->vehicleFactory->create();
                if($id){
                    $vehicleFactory->load($id);
                }
                if($record['action'] == 'delete' && $id){
                    $result = $this->deleteEntriesInDb($vehicleFactory);
                }else{
                    $result = $this->saveEntriesInDb($vehicleFactory,$record);
                }
                $successInfo = ['item'=>$record['make'].'_'.$record['model'].'_'.$record['year'].'_'.$record['ship_to_number'].'_'.$record['application_number'],'status'=> $result['status'],'errorDescription'=>$result['errorDescription']];
                $response['item']['item'][] = $successInfo;
            }

        }else{
            return 'Request is empty !';
        }
        return [$response];
     }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->vehiclesCollectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }
    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Save vehicle entries in database
     * @param VehiclesFactory $vehicleFactory,Array $record
     * @return array
     */
    private function saveEntriesInDb($vehicleFactory,$record){
        $status = ''; $errorDescription = '';
        try{
            $vehicleFactory->setShipToNumber($record['ship_to_number']);
            $vehicleFactory->setApplicationNumber($record['application_number']);
            $vehicleFactory->setYear($record['year']);
            $vehicleFactory->setMake($record['make']);
            $vehicleFactory->setModel($record['model']);
            $vehicleFactory->setEngineSizeL($record['engine_size_l']);
            $vehicleFactory->setAppGroup($record['app_group']);
            $vehicleFactory->setYearUrl($record['year_url']);
            $vehicleFactory->save();
            $status = 'success';
        }catch (\Exception $e) {
            $status = 'error';
            $errorDescription = $e->getMessage();
        }
        return array('status' => $status, 'errorDescription' => $errorDescription);
    }

    /**
     * Save vehicle entries from database
     * @param VehiclesFactory $vehicleFactory
     * @return array
     */
    private function deleteEntriesInDb($vehicleFactory){
        $status = ''; $errorDescription = '';
        try{
            $vehicleFactory->delete();
            $status = 'success';
        }catch (\Exception $e){
            $status = 'error';
            $errorDescription = $e->getMessage();
        }
        return array('status' => $status, 'errorDescription' => $errorDescription);
    }
}

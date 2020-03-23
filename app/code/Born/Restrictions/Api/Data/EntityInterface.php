<?php


namespace Born\Restrictions\Api\Data;

interface EntityInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const ENTITY_ID = 'entity_id';
    const STREET = 'street';
    const POSTALCODE = 'postalcode';
    const CITY = 'city';
    const FIRSTNAME = 'firstname';
    const COUNTRY = 'country';
    const LASTNAME = 'lastname';
    const COMPANY = 'company';
    const REGION = 'region';
    const CREATED_AT = 'created_at';

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setEntityId($entityId);

    /**
     * Get firstname
     * @return string|null
     */
    public function getFirstname();

    /**
     * Set firstname
     * @param string $firstname
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setFirstname($firstname);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\Restrictions\Api\Data\EntityExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Born\Restrictions\Api\Data\EntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Born\Restrictions\Api\Data\EntityExtensionInterface $extensionAttributes
    );

    /**
     * Get lastname
     * @return string|null
     */
    public function getLastname();

    /**
     * Set lastname
     * @param string $lastname
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setLastname($lastname);

    /**
     * Get company
     * @return string|null
     */
    public function getCompany();

    /**
     * Set company
     * @param string $company
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setCompany($company);

    /**
     * Get street
     * @return string|null
     */
    public function getStreet();

    /**
     * Set street
     * @param string $street
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setStreet($street);

    /**
     * Get city
     * @return string|null
     */
    public function getCity();

    /**
     * Set city
     * @param string $city
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setCity($city);

    /**
     * Get region
     * @return string|null
     */
    public function getRegion();

    /**
     * Set region
     * @param string $region
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setRegion($region);

    /**
     * Get postalcode
     * @return string|null
     */
    public function getPostalcode();

    /**
     * Set postalcode
     * @param string $postalcode
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setPostalcode($postalcode);

    /**
     * Get country
     * @return string|null
     */
    public function getCountry();

    /**
     * Set country
     * @param string $country
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setCountry($country);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Born\Restrictions\Api\Data\SubscriptionsLogInterface
     */
    public function setCreatedAt($createdAt);
}

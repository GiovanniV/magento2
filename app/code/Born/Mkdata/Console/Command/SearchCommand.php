<?php

namespace Born\Mkdata\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class SearchCommand extends Command
{
    protected $appState;
    protected $search;
    protected $helper;

    public function __construct(
        \Magento\Framework\App\State $appState,
        \Born\Mkdata\Model\Search $search,
        \Born\Mkdata\Helper\Data $helper
    ) {
        $this->appState = $appState;
        $this->search = $search;
        $this->helper = $helper;
        parent::__construct();
    }


    protected function configure()
    {
        $this->setName('mkdata:search')
            ->setDescription('Searches MK Data for a name or company')
            ->addArgument('type', InputArgument::REQUIRED, 'Type, person, company, country')
            ->addArgument('value', InputArgument::REQUIRED, 'Value to search');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->setDecorated(true);
        $this->appState->setAreaCode(\Magento\Framework\App\Area::AREA_GLOBAL);

        $type = $input->getArgument('type');
        $value = $input->getArgument('value');

        if ($type == 'person') {
            $result = $this->search->searchPerson($value);
        } else if ($type == 'company') {
            $result = $this->search->searchCompany($value);
        } else if ($type == 'country') {
            $result = $this->search->searchAddress($value);
        } else {
            $result = __('Unknown search type');
        }

        if ($result['status'] == 'success' && $result['count'] == 0) {
            $output->writeln('Approved');
        } else {
            $output->writeln('Denied or Timeout');
        }
    }
}
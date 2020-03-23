<?php 

namespace Born\Hibbert\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InventoryUpdateCommand extends Command
{
	protected $appState;
	protected $inventory;
	protected $logger;
	protected $helper;
	
	public function __construct(
		\Magento\Framework\App\State $appState,
        \Born\Hibbert\Model\Inventory $inventory,
		\Born\Hibbert\Logger\Logger $logger,
		\Born\Hibbert\Helper\Data $helper
	) {
		$this->appState = $appState;
		$this->inventory = $inventory;
		$this->logger = $logger;
		$this->helper = $helper;
		parent::__construct();
	}
		
		
    protected function configure()
    {
        $this->setName('hibbert:inventory_update')
			->setDescription('Updates inventory levels');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
		$output->setDecorated(true);
        $this->appState->setAreaCode(\Magento\Framework\App\Area::AREA_GLOBAL);
		
		$response = $this->inventory->updateInventory();
		$output->writeln($response);
    }
}
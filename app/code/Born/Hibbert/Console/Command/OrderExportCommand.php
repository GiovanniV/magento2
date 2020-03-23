<?php 

namespace Born\Hibbert\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class OrderExportCommand extends Command
{
	protected $appState;
	protected $order;
	protected $logger;
	protected $helper;
	
	public function __construct(
		\Magento\Framework\App\State $appState,
        \Born\Hibbert\Model\Order $order,
		\Born\Hibbert\Logger\Logger $logger,
		\Born\Hibbert\Helper\Data $helper
	) {
		$this->appState = $appState;
		$this->order = $order;
		$this->logger = $logger;
		$this->helper = $helper;
		parent::__construct();
	}
		
		
    protected function configure()
    {
        $this->setName('hibbert:order_export')
			->setDescription('Exports new orders')
			->addOption('id', null, InputArgument::OPTIONAL, 'Order Increment ID');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
		$output->setDecorated(true);
        $this->appState->setAreaCode(\Magento\Framework\App\Area::AREA_GLOBAL);
		
		$orderId = $input->getOption('id');
				
		if ($orderId) {
			$response = $this->order->exportOrders($orderId);
		} else {
			$response = $this->order->exportOrders(false);
		}

        $output->writeln($response);
    }
}
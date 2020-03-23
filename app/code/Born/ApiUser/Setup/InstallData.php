<?php
/**
 * Born_ApiUser InstallData
 * @category  PHP
 * @package   Born\ApiUser
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 *
 */
namespace Born\ApiUser\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\User\Model\UserFactory;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * User model factory
     *
     * @var \Magento\User\Model\UserFactory
     */
    private $userFactory;
    /**
     * InstallData constructor.
     * @param UserFactory $userFactory
     */
    public function __construct(
        UserFactory $userFactory
    ) {
        $this->userFactory = $userFactory;
    }

    /*
     * @param  ModuleDataSetupInterface $setup
     * @param  ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $adminInfo = [
        'username'  => 'kMn65s2qM57R&$5',
        'firstname' => 'kMn65s2qM',
        'lastname'  => '57+R&$5',
        'email'     => 'test@test.com',
        'password'  =>'E8uB@m2TAE?6U&y@',
        'interface_locale' => 'en_US',
        'is_active' => 1
        ];

        /**
        * Create Admin User
        */
        $userModel = $this->userFactory->create();
        $userModel->setData($adminInfo);
        $userModel->setRoleId(2);
        $userModel->save();

        $setup->endSetup();
    }
}

<?php

declare(strict_types=1);

namespace Dhairya\TestGraph\Setup\Patch\Data;

use Dhairya\TestGraph\Api\Data\TestGraphInterface;
use Dhairya\TestGraph\Api\Data\TestGraphInterfaceFactory;
use Dhairya\TestGraph\Api\TestGraphRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InitializeTestGraph implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var TestGraphInterfaceFactory
     */
    private $testGraphInterfaceFactory;
    /**
     * @var TestGraphRepositoryInterface
     */
    private $testGraphRepository;
    /**
     * @var DataObjectHelper
     */
    private $dataObjectHelper;

    /**
     * EnableSegmentation constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        TestGraphInterfaceFactory $testGraphInterfaceFactory,
        TestGraphRepositoryInterface $testGraphRepository,
        DataObjectHelper $dataObjectHelper
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->testGraphInterfaceFactory = $testGraphInterfaceFactory;
        $this->testGraphRepository = $testGraphRepository;
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     * @throws Exception
     * @throws Exception
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $max = 50;

        for ($i = 1; $i <= $max; $i++) {

            $storeData = [
                TestGraphInterface::NAME => 'Brick and Mortar ' . $i,
                TestGraphInterface::DESC => 'Test Description' . $i
            ];
            /** @var testGraphInterface $store */
            $store = $this->testGraphInterfaceFactory->create();
            $this->dataObjectHelper->populateWithArray($store, $storeData, testGraphInterface::class);
            $this->testGraphRepository->save($store);
        }

        $this->moduleDataSetup->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}

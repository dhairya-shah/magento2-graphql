<?php


namespace Dhairya\TestGraph\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\PredefinedId;

class TestGraph extends AbstractDb
{
    /**
     * Provides possibility of saving entity with predefined/pre-generated id
     */
    use PredefinedId;

    /**#@+
     * Constants related to specific db layer
     */
    private const TABLE_NAME = 'test_graph';
    /**#@-*/

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, 'entity_id');
    }

}
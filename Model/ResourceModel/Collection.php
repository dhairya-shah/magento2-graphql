<?php
declare(strict_types=1);

namespace Dhairya\TestGraph\Model\ResourceModel;

use Dhairya\TestGraph\Model\ResourceModel\TestGraph as ResourceModel;
use Dhairya\TestGraph\Model\TestGraph as Model;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
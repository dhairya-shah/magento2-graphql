<?php

declare(strict_types=1);

namespace Dhairya\TestGraph\Model;

use Dhairya\TestGraph\Api\Data\TestGraphInterface;
use Dhairya\TestGraph\Model\ResourceModel\TestGraph as ResourceModel;
use Magento\Framework\Model\AbstractExtensibleModel;

class TestGraph extends AbstractExtensibleModel implements TestGraphInterface
{

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    public function setName(?string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    public function getDescription(): ?string
    {
        return $this->getData(self::DESC);
    }

    public function setDescription(?string $desc): void
    {
        $this->setData(self::DESC, $desc);
    }
}

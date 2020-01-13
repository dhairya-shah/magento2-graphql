<?php
declare(strict_types=1);

namespace Dhairya\TestGraph\Api;

use Dhairya\TestGraph\Api\Data\TestGraphInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */
interface TestGraphRepositoryInterface
{
    /**
     * Save the data.
     *
     * @param \Magento\InventoryApi\Api\Data\SourceInterface $source
     * @return void
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(TestGraphInterface $store): void;

    /**
     * Find Stores by given SearchCriteria
     * SearchCriteria is not required because load all stores is useful case
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface;
}
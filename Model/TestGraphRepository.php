<?php
declare(strict_types=1);

namespace Dhairya\TestGraph\Model;

use Dhairya\TestGraph\Api\Data\TestGraphInterface;
use Dhairya\TestGraph\Api\TestGraphRepositoryInterface;
use Dhairya\TestGraph\Model\ResourceModel\TestGraph as ResourceModel;
use Dhairya\TestGraph\Model\ResourceModel\Collection;
use Dhairya\TestGraph\Model\ResourceModel\CollectionFactory;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;

class TestGraphRepository implements TestGraphRepositoryInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultsInterfaceFactory;
    /**
     * @var ResourceModel
     */
    private $resourceModel;

    public function __construct(
        CollectionFactory $collectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SearchResultsInterfaceFactory $searchResultsInterfaceFactory,
        ResourceModel $resourceModel
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->searchResultsInterfaceFactory = $searchResultsInterfaceFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface
    {
        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();
        if (null === $searchCriteria) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }
        /** @var SearchResultsInterface $searchResult */
        $searchResult = $this->searchResultsInterfaceFactory->create();
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }

    /**
     * @inheritDoc
     */
    public function save(TestGraphInterface $graph): void
    {
        try {
            $this->resourceModel->save($graph);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Could not save Source'), $e);
        }
    }
}
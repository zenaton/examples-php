<?php

namespace Version;

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;
use Zenaton\Parallel\Parallel;

class ParallelWorkflow_v1 implements WorkflowInterface
{
    use Zenatonable;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        $prices = (new Parallel(
            new GetPriceFromProviderA($this->item, 1),
            new GetPriceFromProviderB($this->item, 1),
            new GetPriceFromProviderC($this->item, 1)
        ))->execute();

        switch (array_keys($prices, min($prices))[0]) {
            case 0:
                (new OrderFromProviderA($this->item, 1))->execute();
                break;
            case 1:
                (new OrderFromProviderB($this->item, 1))->execute();
                break;
            case 2:
                (new OrderFromProviderC($this->item, 1))->execute();
                break;
        }
    }

    public function getId()
    {
        return $this->item['name'];
    }
}

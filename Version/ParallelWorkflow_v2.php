<?php

namespace Version;

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;
use Zenaton\Parallel\Parallel;

class ParallelWorkflow_v2 implements WorkflowInterface
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
            new GetPriceFromProviderA($this->item, 2),
            new GetPriceFromProviderB($this->item, 2),
            new GetPriceFromProviderC($this->item, 2),
            new GetPriceFromProviderD($this->item, 2)
        ))->execute();

        switch (array_keys($prices, min($prices))[0]) {
            case 0:
                (new OrderFromProviderA($this->item, 2))->execute();
                break;
            case 1:
                (new OrderFromProviderB($this->item, 2))->execute();
                break;
            case 2:
                (new OrderFromProviderC($this->item, 2))->execute();
                break;
            case 3:
                (new OrderFromProviderD($this->item, 2))->execute();
                break;
        }
    }

    public function getId()
    {
        return $this->item['name'];
    }
}

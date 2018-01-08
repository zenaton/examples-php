<?php

namespace Version;

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Interfaces\VersionInterface;
use Zenaton\Traits\Zenatonable;

class ParallelWorkflow_v0 implements WorkflowInterface
{
    use Zenatonable;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        $prices = parallel(
            new GetPriceFromProviderA($this->item, 0),
            new GetPriceFromProviderB($this->item, 0)
        )->execute();

        switch (array_keys($prices, min($prices))[0])
        {
            case 0:
                (new OrderFromProviderA($this->item, 1))->execute();
                break;
            case 1:
                (new OrderFromProviderB($this->item, 1))->execute();
                break;
        }
    }

    public function getId()
    {
        return $this->item['name'];
    }
}

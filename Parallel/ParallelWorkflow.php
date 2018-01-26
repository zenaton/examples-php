<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;
use Zenaton\Parallel\Parallel;

class ParallelWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        [$priceA, $priceB] = (new Parallel(
            new GetPriceFromProviderA($this->item),
            new GetPriceFromProviderB($this->item)
        ))->execute();

        if ($priceA < $priceB) {
            (new OrderFromProviderA($this->item))->execute();
        } else {
            (new OrderFromProviderB($this->item))->execute();
        }
    }
}

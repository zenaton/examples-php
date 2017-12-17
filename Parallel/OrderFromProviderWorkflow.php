<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class OrderFromProviderWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        list($priceA, $priceB) = parallel(
            new GetPriceFromProviderA($this->item),
            new GetPriceFromProviderB($this->item)
        )->execute();

        if ($priceA < $priceB) {
            (new OrderFromProviderA($this->item))->execute();
        } else {
            (new OrderFromProviderB($this->item))->execute();
        }
    }
}
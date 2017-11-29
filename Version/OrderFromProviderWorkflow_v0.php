<?php

namespace Version;

use Zenaton\Common\Interfaces\WorkflowInterface;

class OrderFromProviderWorkflow_v0 implements WorkflowInterface
{
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        list($priceA, $priceB) = execute(
            new GetPriceFromProviderA($this->item, 0),
            new GetPriceFromProviderB($this->item, 0)
        );

        if ($priceA < $priceB) {
            execute(new OrderFromProviderA($this->item, 0));
        } else {
            execute(new OrderFromProviderB($this->item, 0));
        }
    }

    public function getId()
    {
        return $this->item['name'];
    }
}

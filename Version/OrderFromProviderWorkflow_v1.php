<?php

namespace Version;

use Zenaton\Common\Interfaces\WorkflowInterface;

class OrderFromProviderWorkflow_v1 implements WorkflowInterface
{
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        list($priceA, $priceB, $priceC) = execute(
            new GetPriceFromProviderA($this->item, 1),
            new GetPriceFromProviderB($this->item, 1),
            new GetPriceFromProviderC($this->item, 1)
        );

        switch (array_keys([$priceA, $priceB, $priceC], min($priceA, $priceB, $priceC))[0]) {
            case 0:
                execute(new OrderFromProviderA($this->item, 1));
                break;
            case 1:
                execute(new OrderFromProviderB($this->item, 1));
                break;
            case 2:
                execute(new OrderFromProviderC($this->item, 1));
                break;
        }
    }

    public function getId()
    {
        return $this->item['name'];
    }
}

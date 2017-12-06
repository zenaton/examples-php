<?php

namespace Version;

use Zenaton\Interfaces\WorkflowInterface;

class OrderFromProviderWorkflow_v2 implements WorkflowInterface
{
    protected $item;
    protected $priceA;
    protected $priceB;
    protected $priceC;
    protected $priceD;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        list($this->priceA, $this->priceB, $this->priceC, $this->priceD) = execute(
            new GetPriceFromProviderA($this->item, 2),
            new GetPriceFromProviderB($this->item, 2),
            new GetPriceFromProviderC($this->item, 2),
            new GetPriceFromProviderD($this->item, 2)
        );

        switch (array_keys(
            [$this->priceA, $this->priceB, $this->priceC, $this->priceD],
            min($this->priceA, $this->priceB, $this->priceC, $this->priceD)
        )[0]) {
            case 0:
                execute(new OrderFromProviderA($this->item, 2));
                break;
            case 1:
                execute(new OrderFromProviderB($this->item, 2));
                break;
            case 2:
                execute(new OrderFromProviderC($this->item, 2));
                break;
            case 3:
                execute(new OrderFromProviderD($this->item, 2));
                break;
        }
    }
}

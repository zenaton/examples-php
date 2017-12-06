<?php

namespace Version;

use Zenaton\Interfaces\WorkflowInterface;

class OrderFromProviderWorkflow_v1 implements WorkflowInterface
{
    protected $item;
    protected $priceA;
    protected $priceB;
    protected $priceC;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        list($this->priceA, $this->priceB, $this->priceC) = execute(
            new GetPriceFromProviderA($this->item, 1),
            new GetPriceFromProviderB($this->item, 1),
            new GetPriceFromProviderC($this->item, 1)
        );

        switch (array_keys(
            [$this->priceA, $this->priceB, $this->priceC],
            min($this->priceA, $this->priceB, $this->priceC)
        )[0]) {
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

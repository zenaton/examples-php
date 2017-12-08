<?php

namespace Version;

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class OrderFromProviderWorkflow_v1 implements WorkflowInterface
{
    use Zenatonable;

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
        list($this->priceA, $this->priceB, $this->priceC) = parallel(
            new GetPriceFromProviderA($this->item, 1),
            new GetPriceFromProviderB($this->item, 1),
            new GetPriceFromProviderC($this->item, 1)
        )->execute();

        switch (array_keys(
            [$this->priceA, $this->priceB, $this->priceC],
            min($this->priceA, $this->priceB, $this->priceC)
        )[0]) {
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

<?php

namespace Version;

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class OrderFromProviderWorkflow_v0 implements WorkflowInterface
{
    use Zenatonable;

    protected $item;
    protected $priceA;
    protected $priceB;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        list($this->priceA, $this->priceB) = parallel(
            new GetPriceFromProviderA($this->item, 0),
            new GetPriceFromProviderB($this->item, 0)
        )->execute();

        if ($this->priceA < $this->priceB) {
            (new OrderFromProviderA($this->item, 0))->execute();
        } else {
            (new OrderFromProviderB($this->item, 0))->execute();
        }
    }

    public function getId()
    {
        return $this->item['name'];
    }
}

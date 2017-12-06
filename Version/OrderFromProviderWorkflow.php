<?php

namespace Version;

use Zenaton\Workflows\Version;

class OrderFromProviderWorkflow extends Version
{
    protected $version = 2;

    public function current()
    {
        switch ($this->version) {
            case 2:
                return OrderFromProviderWorkflow_v2::class;
            case 1:
                return OrderFromProviderWorkflow_v1::class;
            default:
                return OrderFromProviderWorkflow_v0::class;
        }
    }

    public function initial()
    {
        return OrderFromProviderWorkflow_v0::class;
    }

    public function setVersion($version){
        $this->version = $version;
    }
}

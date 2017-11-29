<?php

namespace Version;

use Zenaton\Worker\Version;

class OrderFromProviderWorkflow extends Version
{
    public function current()
    {
        return OrderFromProviderWorkflow_v1::class;
    }

    public function initial()
    {
        return OrderFromProviderWorkflow_v0::class;
    }
}

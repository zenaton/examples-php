<?php

namespace Version;

use Zenaton\Worker\Version;

class OrderFromProviderWorkflow extends Version
{
    protected function current()
    {
        return OrderFromProviderWorkflow_v1::class;
    }

    protected function first()
    {
        return OrderFromProviderWorkflow_v0::class;
    }
}

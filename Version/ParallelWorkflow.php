<?php

namespace Version;

use Zenaton\Workflows\Version;

class ParallelWorkflow extends Version
{
    public function versions()
    {
        return [
            ParallelWorkflow_v0::class,
            ParallelWorkflow_v1::class,
            ParallelWorkflow_v2::class
        ];
    }
}

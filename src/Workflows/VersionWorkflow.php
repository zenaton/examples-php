<?php

use Zenaton\Workflows\Version;

class VersionWorkflow extends Version
{
    public function versions()
    {
        return [
            VersionWorkflow_v0::class,
            VersionWorkflow_v1::class,
            VersionWorkflow_v2::class
        ];
    }
}

<?php

use Tasky\Version;

class HistoryFlow extends Version
{
    protected function current()
    {
        return HistoryFlow_a::class;
    }
}

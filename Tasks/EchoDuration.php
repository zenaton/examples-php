<?php

use Tasky\Interfaces\TaskInterface;

class EchoDuration implements TaskInterface
{
    protected $n;
    protected $t;

    public function __construct($n, $t = null)
    {
        $this->n = $n;
        $this->t = $t;
    }

    public function handle()
    {
        echo get_class($this).'('.$this->n.') '. $this->t;
        $t = microtime(true);

        for ($i = 0; $i < $this->n; ++$i) {
            echo '.';
        }

        sleep(1);
        echo ' - duration: '.(microtime(true) - $t).PHP_EOL;

        return $t;
    }
}

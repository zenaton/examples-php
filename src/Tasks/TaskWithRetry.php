<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskWithRetry implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo 'TaskWithRetry starts'.PHP_EOL;

        sleep(3);

        throw new \Exception('Error in TaskWithRetry');
        echo 'TaskWithRetry ends'.PHP_EOL;

        return 0;
    }

    public function onErrorRetryDelay($exception)
    {
        // The retry index starts at 1 and increases by one for every retry.
        // This can be used to to increase the time between each attempt.
        $n = $this->getContext()->getRetryIndex();
        if ($n > 3) {
            return false;
        }

        return $n * 5;
    }
}

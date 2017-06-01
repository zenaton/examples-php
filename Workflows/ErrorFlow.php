<?php

use Tasky\Exceptions\TaskyException;
use Tasky\Interfaces\EventInterface;
use Tasky\Interfaces\WorkflowInterface;
use Tasky\Tasks\Wait;

class ErrorFlow implements WorkflowInterface
{
    public function handle()
    {
        // try / catch has no effect on an executeAsync
        try {
            executeAsync(new GetError());
        } catch (\LogicException $e) {
            // if ($e instanceof TaskyException) throw $e;
            execute(new EchoDuration(1));
        }

        // effective try / catch
        // wait synchro
        try {
            execute(
                new GetError(),
                (new Wait())->seconds(5)
            );
        } catch (\LogicException $e) {
            // if ($e instanceof TaskyException) throw $e;
            execute(new EchoDuration(2));
        }

        execute(new GetError());
    }

    public function onEvent(EventInterface $event)
    {
        // effective try / catch
        try {
            execute(new GetError());
        } catch (\LogicException $e) {
            // if ($e instanceof TaskyException) throw $e;
            execute(new EchoEvent($event));
        }
    }
}

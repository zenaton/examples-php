# Zenaton examples for PHP
This repository contains examples of workflows built with Zenaton. These examples illustrates how Zenaton orchestrates tasks that are executed on different workers.

## Example 1 : Sequential tasks execution
[This example](https://github.com/zenaton/examples-php/tree/master/Sequential) showcases
- a sequential execution of two tasks. The second task is executed only when the first one is processed.
- the result of the first task can be used by the second one.


## Example 2: Parallel tasks execution
[This example](https://github.com/zenaton/examples-php/tree/master/Parallel) showcases
- a parallel execution of 2 tasks
- a third task that is executed only after *both* first two tasks were processed

## Example 3: Asynchronous tasks execution
[this example](https://github.com/zenaton/examples-php/tree/master/Asynchronous) showcases
- an asynchronous execution of multiple tasks

When a task is dispatched asynchronously, the workflow continues its execution without waiting for the task completion. Consequently, a task asynchronous dispatching always returns a null value.

## Example 4: Event
[This example](https://github.com/zenaton/examples-php/tree/master/Event) showcases
- how to change a workflow's behaviour based on an external event

## Example 5: Wait
[This example](https://github.com/zenaton/examples-php/tree/master/Wait) showcases
- how the provided `Wait` task can be used to pause the workflow for a specified duration

## Example 6: Wait Event
[This example](https://github.com/zenaton/examples-php/tree/master/WaitEvent) showcases
- how the provided `Wait` task can also be used to pause the workflow up to receiving a specific external event

## Example7: Recursive Workflow
[This example](https://github.com/zenaton/examples-php/tree/master/Recursive) showcases
- how launching events or workflows directly from orchestrated tasks allows you to schedule recurring workflows

## Example8: Workflow Versions
[This example](https://github.com/zenaton/examples-php/tree/master/Version) showcases
- how to update your workflow implementation, even while previous versions are still running

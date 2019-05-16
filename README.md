# Zenaton examples for PHP

This repository contains examples of workflows built with Zenaton. These examples illustrates how Zenaton orchestrates tasks that are executed on different workers.

## Installation

Download this repo

```sh
git clone https://github.com/zenaton/examples-php.git; cd-examples-php
```

then populate your .env file with your application id and api token found [here](https://zenaton.com/app/api).

### Running on Docker

Simply run

```sh
docker-compose build; docker-compose up
```

You're all set!

### Running locally

Install dependencies

```sh
composer install
```

Then, you need to install a Zenaton worker

```sh
curl https://install.zenaton.com | sh
```

And start it, and make it listen to your configuration:

```sh
zenaton start; zenaton listen --env=.env --boot=src/bootstrap.php
```

Your all set!

*Your workflows will be processed by your worker, so you won't see anything except the stdout and stderr, respectively `zenaton.out` and `zenaton.err`. Look at these files :)*

## Example 1: Single task execution

[This example](https://github.com/zenaton/examples-php/tree/master/src/Tasks/TaskA.php) showcases

- A single execution of a task.

```sh
php bin/launch_single_task.php
```

## Example 2: Sequential tasks execution

[This example](https://github.com/zenaton/examples-php/tree/master/src/Workflows/SequentialWorkflow.php) showcases

- A sequential execution of three tasks. The second and third tasks are executed only when the previous one is processed.
- In a sequential task execution, you can get the output of a task. The result of a task can be used by the next one.

<p align="center">
    <img
        src="https://raw.githubusercontent.com/zenaton/resources/master/examples/images/png/flow_sequential.png"
        width="400px"
        alt="Sequential Workflow Diagram"
    />
</p>

```sh
php bin/launch_sequential.php
```

## Example 3: Parallel tasks execution

[This example](https://github.com/zenaton/examples-php/tree/master/src/Workflows/ParallelWorkflow.php) showcases

- a parallel execution of 2 tasks
- a third task that is executed only after *both* first two tasks were processed

<p align="center">
    <img
        src="https://raw.githubusercontent.com/zenaton/resources/master/examples/images/png/flow_parallel.png"
        width="400px"
        alt="Parallel Workflow Diagram"
    />
</p>

```sh
php bin/launch_parallel.php
```

## Example 4: Asynchronous tasks execution

[this example](https://github.com/zenaton/examples-php/tree/master/src/Workflows/AsynchronousWorkflow.php) showcases

- Asynchronous executions of Task A and Task B (fire and forget)
- Then sequential executions of Task C and Task D.

<p align="center">
    <img
        src="https://raw.githubusercontent.com/zenaton/resources/master/examples/images/png/flow_async.png"
        width="400px"
        alt="Asynchronous Workflow Diagram"
    />
</p>

```sh
php bin/launch_asynchronous.php
```

When a task is dispatched asynchronously, the workflow continues its execution without waiting for the task completion. Consequently, a task asynchronous dispatching always returns a null value.

## Example 5: Event

[This example](https://github.com/zenaton/examples-php/tree/master/src/Workflows/EventWorkflow.php) showcases

- how to change a workflow's behaviour based on an external event

<p align="center">
    <img
        src="https://raw.githubusercontent.com/zenaton/resources/master/examples/images/png/flow_react_event.png"
        width="400px"
        alt="Event Workflow Diagram"
    />
</p>

```sh
php bin/launch_event.php
```

## Example 6: Wait

[This example](https://github.com/zenaton/examples-php/tree/master/src/Workflows/WaitWorkflow.php) showcases

- how the provided `Wait` task can be used to pause the workflow for a specified duration

<p align="center">
    <img
        src="https://raw.githubusercontent.com/zenaton/resources/master/examples/images/png/flow_wait.png"
        width="400px"
        alt="Wait Workflow Diagram"
    />
</p>

```sh
php bin/launch_wait.php
```

## Example 7: Wait Event

[This example](https://github.com/zenaton/examples-php/tree/master/src/Workflows/WaitEventWorkflow.php) showcases

- how the provided `Wait` task can also be used to pause the workflow up to receiving a specific external event

<p align="center">
    <img
        src="https://raw.githubusercontent.com/zenaton/resources/master/examples/images/png/flow_wait_event.png"
        width="400px"
        alt="WaitEvent Workflow Diagram"
    />
</p>

```sh
php bin/launch_wait_event.php
```

## Example 8: Recursive Workflow

[This example](https://github.com/zenaton/examples-php/tree/master/src/Recursive) showcases
- how launching events or workflows directly from orchestrated tasks allows you to schedule recurring workflows

```sh
php bin/launch_recursive.php
```

## Example 9: Workflow Versions

[This example](https://github.com/zenaton/examples-php/tree/master/src/Workflows/VersionWorkflow.php) showcases

- how to update your workflow implementation, even while previous versions are still running

```sh
php bin/launch_version.php
```

## Example 10: Managing Errors

[This example](https://github.com/zenaton/examples-php/tree/master/src/Workflows/ErrorWorkflow.php) showcases

- how a failed task appear on Zenaton website
- how to retry a failed task using the retry button

<p align="center">
    <img
        src="https://raw.githubusercontent.com/zenaton/resources/master/examples/images/png/flow_error.png"
        width="400px"
        alt="Error Workflow Diagram"
    />
</p>

```sh
php bin/launch_error.php
```

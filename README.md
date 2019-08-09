<p align="center">
  <a href="https://zenaton.com" target="_blank">
    <img src="https://user-images.githubusercontent.com/36400935/58254828-e5176880-7d6b-11e9-9094-3f46d91faeee.png" target="_blank" />
  </a><br>
  Easy Asynchronous Jobs Manager for Developers <br>
  <a href="https://zenaton.com/documentation/php/getting-started/" target="_blank">
    <strong> Explore the docs » </strong>
  </a><br>
  <a href="https://zenaton.com" target="_blank"> Website </a>
    ·
  <a href="https://github.com/zenaton/zenaton-php" target="_blank"> PHP Library </a>
    ·
  <a href="https://app.zenaton.com/tutorial/php" target="_blank"> Tutorial in PHP </a> <br>
</p>

# Zenaton examples for PHP

[Zenaton](https://zenaton.com) helps developers to easily run, monitor and orchestrate background jobs on your workers without managing a queuing system.
In addition to this, a monitoring dashboard shows you in real-time tasks executions and helps you to handle errors.

This repository contains examples of workflows built with Zenaton. These examples illustrates how Zenaton orchestrates tasks that are executed on different workers.

## Installation

Clone this repository

```sh
git clone https://github.com/zenaton/examples-php.git; cd examples-php
```

Then Install dependencies

```sh
composer install
```

Then, populate your `.env` file with your application id and api token found [here](https://app.zenaton.com/api).

### Running on Docker

Simply run

```sh
docker-compose build; docker-compose up
```

You can check that your agent is running [here](https://app.zenaton.com/agents).

You're all set!

While going through the next sections, you will see you have to run examples using commands like the following:

```sh
php bin/launch_sequential.php
```

When using the docker setup, you can run PHP inside the container using the following command instead:

```sh
docker-compose exec app bin/launch_sequential.php
```

### Running locally

Install a Zenaton worker

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
    <br>
    <img
        src="https://raw.githubusercontent.com/zenaton/resources/master/examples/images/png/flow_sequential.png"
        width="324px"
        alt="Sequential Workflow Diagram"
    /> <img src="https://user-images.githubusercontent.com/36400935/58274921-30de0800-7d94-11e9-8e01-47d63f341147.gif" width="400px"/>
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
         width="324px"
        alt="Parallel Workflow Diagram"
    />
    <img src="https://user-images.githubusercontent.com/36400935/58277197-751fd700-7d99-11e9-8fff-d7c483c8abaf.gif" width="400px"/>
    
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
        width="324px"
        alt="Asynchronous Workflow Diagram"
    />
    <img src="https://user-images.githubusercontent.com/36400935/58277203-78b35e00-7d99-11e9-9ae8-cfa92757623f.gif" width="400px"/>
    
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
        width="324px"
        alt="Event Workflow Diagram"
    />
    <img src="https://user-images.githubusercontent.com/36400935/58276729-769ccf80-7d98-11e9-8ebc-d70ec82dd73b.gif" width="400px"/>
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
        width="324px"
        alt="Wait Workflow Diagram"
    />
    <img src="https://user-images.githubusercontent.com/36400935/58276731-78669300-7d98-11e9-97b7-fbe0a39ecba0.gif" width="400px"/>
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
        width="324px"
        alt="WaitEvent Workflow Diagram"
    />
    <img src="https://user-images.githubusercontent.com/36400935/58277648-7ac9ec80-7d9a-11e9-9b7b-58ca65809d00.gif" width="400px"/>
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
        width="324px"
        alt="Error Workflow Diagram"
    />
     <img src="https://user-images.githubusercontent.com/36400935/58315058-1007c800-7e11-11e9-8bbb-7b1fb8e5bdbb.gif" width="400px"/>
</p>

```sh
php bin/launch_error.php
```

# AitumPHP Custom Code Framework

A PHP framework for building custom Aitum actions in code.

## Prerequisites

- PHP 8.1 or later
- Swoole
- Composer
- An Aitum account with API access

## Installation

To install the AitumPHP Custom Code Framework, run the following command:

```bash
git clone git@github.com:bimsonz/AitumPHP-cc.git
```

## Environment Setup
To set up your environment, run the following from inside the cloned directory e.g `AitumPHP-cc`:
```
composer aitum-cc:setup
```
This command will prompt you for your API_KEY, which can be found in the Aitum settings menu.

## Example Action
While I do need to create proper documentation for this, for now you can check out the dummy action provided:
```
src/Actions/DummyAction.php
```
Copy this class, change the name and experiment!

## Start the server
For your custom code actions yo be registered and triggered you need to run the server from the project root:
```
php server.php
```
This will start the server. It needs to run the whole time you wish the actions to be available to Aitum.

<h1 align="center">
    <img src="https://github.com/k7brasil/TelegramBotCore/blob/main/logo.png?raw=true" />
    <br />
    Bot PHP - Telegram
    <br />
	<br />
</h1>

# Telegram Bot

> :construction: Work In Progress :construction:

An A-Z example of Telegram bot using the [PHP Telegram Bot][core-github] library.

This repository aims to demonstrate the usage of all the features offered by the PHP Telegram Bot library and as such contains all example commands.
Also, it gives an example setup for both the standard usage and using the [PHP Telegram Bot Manager][bot-manager-github] 

**:exclamation: Important!**
- Most of the commands found here are **not to be used exactly as they are**, they are mere demonstrations of features! They are provided as-is and any **extra security measures need to be added by you**, the developer.
- Before getting started with this project, make sure you have read the official [readme][core-readme-github] to understand how the PHP Telegram Bot library works and what is required to run a Telegram bot.

Let's get started then! :smiley:

## 1. Install your project (or new)

```bash
    composer require kseven/telegrambotci4
```

or change the `require` block in the `composer.json` file:

```json
    "require": {
        "kseven/telegrambotci4": "*"
    }
```

Now you can install all dependencies using [composer]:

```bash
    $ composer install
```

## 2. Adding your own commands

To use Commands enable the [`CustomCommands`](CustomCommands) folder in the config.

You can find a few example commands in the [`Commands`](Commands) folder.
Do **NOT** just copy all of them to your bot, but instead learn from them and only add to your bot what you need.


Adding any extra commands to your bot that you don't need can be a security risk!
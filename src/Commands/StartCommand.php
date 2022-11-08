<?php

    /**
     * This file is part of the Telegram Bot CodeIgniter 4 package.
     * https://github.com/KS7ven/TelegramBot-ci4
     *
     * (c) KSeven and PHP Telegram Bot Team
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace BotTelegram\Commands;

    /**
     * Start command
     *
     * Gets executed when a user first starts using the bot.
     *
     * When using deep-linking, the parameter can be accessed by getting the command text.
     *
     * @see https://core.telegram.org/bots#deep-linking
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Exception\TelegramException;

    class StartCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'start';

        /**
         * @var string
         */
        protected $description = 'Start command';

        /**
         * @var string
         */
        protected $usage = '/start';

        /**
         * @var string
         */
        protected $version = '1.2.0';

        /**
         * @var bool
         */
        protected $private_only = true;

        /**
         * Main command execution
         *
         * @return ServerResponse
         * @throws TelegramException
         */
        public function execute(): ServerResponse
        {
            // If you use deep-linking, get the parameter like this:
            // $deep_linking_parameter = $this->getMessage()->getText(true);

            return $this->replyToChat(
                'Hi there!' . PHP_EOL .
                'Type /help to see all commands!'
            );
        }
    }

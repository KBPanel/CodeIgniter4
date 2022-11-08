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

    namespace BotTelegram\Commands\Message;

    /**
     * Generic message command
     *
     * Gets executed when any type of message is sent.
     *
     * In this message-related context, we can handle any kind of message.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Request;

    class GenericmessageCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'genericmessage';

        /**
         * @var string
         */
        protected $description = 'Handle generic message';

        /**
         * @var string
         */
        protected $version = '1.0.0';

        /**
         * Main command execution
         *
         * @return ServerResponse
         */
        public function execute(): ServerResponse
        {
            $message = $this->getMessage();

            /**
             * Handle any kind of message here
             */

            $message_text = $message->getText(true);

            return Request::emptyResponse();
        }
    }

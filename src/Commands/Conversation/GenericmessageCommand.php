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

    namespace BotTelegram\Commands\Conversation;

    /**
     * Generic message command
     *
     * Gets executed when any type of message is sent.
     *
     * In this conversation-related context, we must ensure that active conversations get executed correctly.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Conversation;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Exception\TelegramException;
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
         * @var bool
         */
        protected $need_mysql = true;

        /**
         * Command execute method if MySQL is required but not available
         *
         * @return ServerResponse
         */
        public function executeNoDb(): ServerResponse
        {
            // Do nothing
            return Request::emptyResponse();
        }

        /**
         * Main command execution
         *
         * @return ServerResponse
         * @throws TelegramException
         */
        public function execute(): ServerResponse
        {
            $message = $this->getMessage();

            // If a conversation is busy, execute the conversation command after handling the message.
            $conversation = new Conversation(
                $message->getFrom()->getId(),
                $message->getChat()->getId()
            );

            // Fetch conversation command if it exists and execute it.
            if ($conversation->exists() && $command = $conversation->getCommand()) {
                return $this->telegram->executeCommand($command);
            }

            return Request::emptyResponse();
        }
    }

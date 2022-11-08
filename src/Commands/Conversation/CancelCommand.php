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
     * User "/cancel" command
     *
     * This command cancels the currently active conversation and
     * returns a message to let the user know which conversation it was.
     *
     * If no conversation is active, the returned message says so.
     */

    use Longman\TelegramBot\Commands\UserCommand;
    use Longman\TelegramBot\Conversation;
    use Longman\TelegramBot\Entities\Keyboard;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Exception\TelegramException;

    class CancelCommand extends UserCommand
    {
        /**
         * @var string
         */
        protected $name = 'cancel';

        /**
         * @var string
         */
        protected $description = 'Cancel the currently active conversation';

        /**
         * @var string
         */
        protected $usage = '/cancel';

        /**
         * @var string
         */
        protected $version = '0.3.0';

        /**
         * @var bool
         */
        protected $need_mysql = true;

        /**
         * Main command execution if no DB connection is available
         *
         * @throws TelegramException
         */
        public function executeNoDb(): ServerResponse
        {
            return $this->removeKeyboard('Nothing to cancel.');
        }

        /**
         * Main command execution
         *
         * @return ServerResponse
         * @throws TelegramException
         */
        public function execute(): ServerResponse
        {
            $text = 'No active conversation!';

            // Cancel current conversation if any
            $conversation = new Conversation(
                $this->getMessage()->getFrom()->getId(),
                $this->getMessage()->getChat()->getId()
            );

            if ($conversation_command = $conversation->getCommand()) {
                $conversation->cancel();
                $text = 'Conversation "' . $conversation_command . '" cancelled!';
            }

            return $this->removeKeyboard($text);
        }

        /**
         * Remove the keyboard and output a text.
         *
         * @param string $text
         *
         * @return ServerResponse
         * @throws TelegramException
         */
        private function removeKeyboard(string $text): ServerResponse
        {
            return $this->replyToChat($text, [
                'reply_markup' => Keyboard::remove(['selective' => true]),
            ]);
        }
    }

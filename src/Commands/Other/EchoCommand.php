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

    namespace BotTelegram\Commands\Other;

    /**
     * User "/echo" command
     *
     * Simply echo the input back to the user.
     */

    use Longman\TelegramBot\Commands\UserCommand;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Exception\TelegramException;

    class EchoCommand extends UserCommand
    {
        /**
         * @var string
         */
        protected $name = 'echo';

        /**
         * @var string
         */
        protected $description = 'Show text';

        /**
         * @var string
         */
        protected $usage = '/echo <text>';

        /**
         * @var string
         */
        protected $version = '1.2.0';

        /**
         * Main command execution
         *
         * @return ServerResponse
         * @throws TelegramException
         */
        public function execute(): ServerResponse
        {
            $message = $this->getMessage();
            $text    = $message->getText(true);

            if ($text === '') {
                return $this->replyToChat('Command usage: ' . $this->getUsage());
            }

            return $this->replyToChat($text);
        }
    }

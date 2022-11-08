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
     * User "/slap" command
     *
     * Slap a user around with a big trout!
     */

    use Longman\TelegramBot\Commands\UserCommand;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Exception\TelegramException;

    class SlapCommand extends UserCommand
    {
        /**
         * @var string
         */
        protected $name = 'slap';

        /**
         * @var string
         */
        protected $description = 'Slap someone with their username';

        /**
         * @var string
         */
        protected $usage = '/slap <@user>';

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

            $sender = '@' . $message->getFrom()->getUsername();

            // Username validation (simply checking for `@something` in the text)
            if (0 === preg_match('/@[\w_]{5,}/', $text)) {
                return $this->replyToChat('Sorry, no one to slap around...');
            }

            return $this->replyToChat($sender . ' slaps ' . $text . ' around a bit with a large trout');
        }
    }

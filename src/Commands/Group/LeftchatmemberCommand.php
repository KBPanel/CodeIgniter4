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

    namespace BotTelegram\Commands\Group;

    /**
     * Left chat member command
     *
     * Gets executed when a member leaves the chat.
     *
     * NOTE: This command must be called from GenericmessageCommand.php!
     * It is only in a separate command file for easier code maintenance.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Exception\TelegramException;

    class LeftchatmemberCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'leftchatmember';

        /**
         * @var string
         */
        protected $description = 'Left Chat Member';

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
            $member  = $message->getLeftChatMember();

            return $this->replyToChat('Sorry to see you go, ' . $member->getFirstName());
        }
    }

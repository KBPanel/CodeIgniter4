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
     * New chat members command
     *
     * Gets executed when a new member joins the chat.
     *
     * NOTE: This command must be called from GenericmessageCommand.php!
     * It is only in a separate command file for easier code maintenance.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Exception\TelegramException;

    class NewchatmembersCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'newchatmembers';

        /**
         * @var string
         */
        protected $description = 'New Chat Members';

        /**
         * @var string
         */
        protected $version = '1.3.0';

        /**
         * Main command execution
         *
         * @return ServerResponse
         * @throws TelegramException
         */
        public function execute(): ServerResponse
        {
            $message = $this->getMessage();
            $members = $message->getNewChatMembers();

            if ($message->botAddedInChat()) {
                return $this->replyToChat('Hi there, you BOT!');
            }

            $member_names = [];
            foreach ($members as $member) {
                $member_names[] = $member->tryMention();
            }

            return $this->replyToChat('Hi ' . implode(', ', $member_names) . '!');
        }
    }

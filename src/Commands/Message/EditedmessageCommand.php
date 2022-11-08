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
     * Edited message command
     *
     * Gets executed when a user message is edited.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\ServerResponse;

    class EditedmessageCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'editedmessage';

        /**
         * @var string
         */
        protected $description = 'Handle edited message';

        /**
         * @var string
         */
        protected $version = '1.2.0';

        /**
         * Main command execution
         *
         * @return ServerResponse
         */
        public function execute(): ServerResponse
        {
            // Get the edited message
            $edited_message = $this->getEditedMessage();

            return parent::execute();
        }
    }

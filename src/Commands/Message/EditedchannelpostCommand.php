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
     * Edited channel post command
     *
     * Gets executed when a post in a channel is edited.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\ServerResponse;

    class EditedchannelpostCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'editedchannelpost';

        /**
         * @var string
         */
        protected $description = 'Handle edited channel post';

        /**
         * @var string
         */
        protected $version = '1.1.0';

        /**
         * Main command execution
         *
         * @return ServerResponse
         */
        public function execute(): ServerResponse
        {
            // Get the edited channel post
            $edited_channel_post = $this->getEditedChannelPost();

            return parent::execute();
        }
    }

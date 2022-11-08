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
     * Channel post command
     *
     * Gets executed when a new post is created in a channel.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\ServerResponse;

    class ChannelpostCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'channelpost';

        /**
         * @var string
         */
        protected $description = 'Handle channel post';

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
            // Get the channel post
            $channel_post = $this->getChannelPost();

            return parent::execute();
        }
    }

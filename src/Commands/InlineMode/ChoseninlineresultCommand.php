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

    namespace BotTelegram\Commands\InlineMode;

    /**
     * Chosen inline result command
     *
     * Gets executed when an item from an inline query is selected.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\ServerResponse;

    class ChoseninlineresultCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'choseninlineresult';

        /**
         * @var string
         */
        protected $description = 'Handle the chosen inline result';

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
            // Information about the chosen result is returned.
            $inline_query = $this->getChosenInlineResult();
            $query        = $inline_query->getQuery();

            return parent::execute();
        }
    }

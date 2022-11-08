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
     * User "/markdown" command
     *
     * Print some text formatted with markdown.
     */

    use Longman\TelegramBot\Commands\UserCommand;
    use Longman\TelegramBot\Entities\ReplyKeyboardMarkup;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Exception\TelegramException;

    class MarkdownCommand extends UserCommand
    {
        /**
         * @var string
         */
        protected $name = 'markdown';

        /**
         * @var string
         */
        protected $description = 'Print Markdown Text';

        /**
         * @var string
         */
        protected $usage = '/markdown';

        /**
         * @var string
         */
        protected $version = '1.1.0';

        /**
         * Main command execution
         *
         * @return ServerResponse
         * @throws TelegramException
         */
        public function execute(): ServerResponse
        {
            return $this->replyToChat('
    *bold* _italic_ `inline fixed width code`

    ```
    preformatted code block
    code block
    ```

    [Best Telegram bot api!!](https://github.com/php-telegram-bot/core)', [
                'parse_mode' => 'markdown',
            ]);
        }
    }

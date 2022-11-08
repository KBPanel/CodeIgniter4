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
     * Inline query command
     *
     * Command that handles inline queries and returns a list of results.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\InlineQuery\InlineQueryResultArticle;
    use Longman\TelegramBot\Entities\InlineQuery\InlineQueryResultContact;
    use Longman\TelegramBot\Entities\InlineQuery\InlineQueryResultLocation;
    use Longman\TelegramBot\Entities\InlineQuery\InlineQueryResultVenue;
    use Longman\TelegramBot\Entities\InputMessageContent\InputTextMessageContent;
    use Longman\TelegramBot\Entities\ServerResponse;

    class InlinequeryCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'inlinequery';

        /**
         * @var string
         */
        protected $description = 'Handle inline query';

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
            $inline_query = $this->getInlineQuery();
            $query        = $inline_query->getQuery();

            $results = [];

            if ($query !== '') {
                // https://core.telegram.org/bots/api#inlinequeryresultarticle
                $results[] = new InlineQueryResultArticle([
                    'id'                    => '001',
                    'title'                 => 'Simple text using InputTextMessageContent',
                    'description'           => 'this will return Text',

                    // Here you can put any other Input...MessageContent you like.
                    // It will keep the style of an article, but post the specific message type back to the user.
                    'input_message_content' => new InputTextMessageContent([
                        'message_text' => 'The query that got you here: ' . $query,
                    ]),
                ]);

                // https://core.telegram.org/bots/api#inlinequeryresultcontact
                $results[] = new InlineQueryResultContact([
                    'id'           => '002',
                    'phone_number' => '12345678',
                    'first_name'   => 'Best',
                    'last_name'    => 'Friend',
                ]);

                // https://core.telegram.org/bots/api#inlinequeryresultlocation
                $results[] = new InlineQueryResultLocation([
                    'id'        => '003',
                    'title'     => 'The center of the world!',
                    'latitude'  => 40.866667,
                    'longitude' => 34.566667,
                ]);

                // https://core.telegram.org/bots/api#inlinequeryresultvenue
                $results[] = new InlineQueryResultVenue([
                    'id'        => '004',
                    'title'     => 'No-Mans-Land',
                    'address'   => 'In the middle of Nowhere',
                    'latitude'  => 33,
                    'longitude' => -33,
                ]);
            }

            return $inline_query->answer($results);
        }
    }

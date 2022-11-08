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

    namespace BotTelegram\Commands\Payments;

    /**
     * Pre-checkout query required for "/payment" command
     *
     * In this command you can perform any necessary verifications and checks
     * to allow or disallow the final checkout and payment of the invoice.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Entities\ServerResponse;

    class PrecheckoutqueryCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'precheckoutquery';

        /**
         * @var string
         */
        protected $description = 'Pre-Checkout Query Handler';

        /**
         * @var string
         */
        protected $version = '0.1.0';

        /**
         * Main command execution
         *
         * @return ServerResponse
         */
        public function execute(): ServerResponse
        {
            // Simply approve, no need for any checks at this point.
            return $this->getPreCheckoutQuery()->answer(true);

            // If we do make certain checks, you can define the error message displayed to the user like this.
            // return $this->getPreCheckoutQuery()->answer(false, [
            //     'error_message' => 'Registration (or whatever) required...',
            // ]);
        }
    }

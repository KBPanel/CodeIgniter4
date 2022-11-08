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
     * Generic message command
     *
     * Gets executed when any type of message is sent.
     */

    use Longman\TelegramBot\Commands\SystemCommand;
    use Longman\TelegramBot\Commands\UserCommands\PaymentCommand;
    use Longman\TelegramBot\Entities\ServerResponse;
    use Longman\TelegramBot\Request;

    class GenericmessageCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'genericmessage';

        /**
         * @var string
         */
        protected $description = 'Handle generic message';

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
            $message = $this->getMessage();
            $user_id = $message->getFrom()->getId();

            // Handle successful payment
            if ($payment = $message->getSuccessfulPayment()) {
                return PaymentCommand::handleSuccessfulPayment($payment, $user_id);
            }

            return Request::emptyResponse();
        }
    }

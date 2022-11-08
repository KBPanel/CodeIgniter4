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
    namespace BotTelegram\Config;

    use CodeIgniter\Config\BaseConfig;
    use CodeIgniter\Session\Handlers\FileHandler;

    class Bot extends BaseConfig
    {
        public static $NameGroup = 'bot'; // Default is "bot"; name of group route (example: seusite.com/"bot"/hook or manager)

        // Add you bot's API key and name
        public static $Token = '';

        public static $Username = ''; // Without "@"

        public static $Secret = 'super_secret'; // [Manager Only] Secret key required to access the webhook

        public static $Webhook = [
            'typeRequet' => "AcessHook", //AcessHook for Hook or AcessManager for Manager
            'certificate'     => __DIR__ . '/certificate.crt', // Use self-signed certificate
            'max_connections' => 40, // Limit maximum number of connections
        ];

        // All command related configs go here
        public static $Commands = [
            // Define all paths for your custom commands
            // DO NOT PUT THE COMMAND FOLDER THERE. IT WILL NOT WORK. 
            // Copy each needed Commandfile into the CustomCommand folder and uncommend the Line 49 below
            'paths'   => [
                __DIR__ . '/../Commands',
                __DIR__ . '/../CustomCommands',
            ],
            // Here you can set any command-specific parameters
            'configs' => [
                // - Google geocode/timezone API key for /date command (see DateCommand.php)
                'date'    => ['google_api_key' => 'your_google_api_key_here'],
                // - OpenWeatherMap.org API key for /weather command (see WeatherCommand.php)
                'weather' => ['owm_api_key' => 'your_owm_api_key_here'],
                // - Payment Provider Token for /payment command (see Payments/PaymentCommand.php)
                'payment' => ['payment_provider_token' => 'your_payment_provider_token_here'],
            ]
        ];

        public static $Administrators = [
            '12345', '67890'
        ]; // Define all IDs of admin users

        // Enter your MySQL database credentials 
        public static $MySQLDate = [
            'database' => false, // if false not save in mysql registers.
            'mysql' => [
                'host'     => '127.0.0.1',
                'user'     => 'root',
                'password' => 'root',
                'database' => 'telegram_bot',
                'port' => '3306',
            ]
        ];

        // Logging (Debug, Error and Raw Updates)
        public static $Logging = [
            'debug' => false,
            'path' => [
                'debug'  => __DIR__ . '/../Logs/telegram-bot-debug.log',
                'error'  => __DIR__ . '/../Logs/telegram-bot-error.log',
                'update' => __DIR__ . '/../Logs/telegram-bot-update.log',
            ]
        ];

        // Set custom Upload and Download paths
        public static $PathFiles = [
            'download' => __DIR__ . '/../Downloads',
            'upload'   => __DIR__ . '/../Uploads',
        ];

        // Requests Limiter (tries to prevent reaching Telegram API limits)
        public static $limiter = [
            'enabled' => true,
        ];

    }

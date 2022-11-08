<?php
    /**
     * This file is part of the Telegram Bot CodeIgniter 4 package.
     * https://github.com/KS7ven/TelegramBot-ci4
     *
     * (c) K'Seven and PHP Telegram Bot Team
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */
    namespace BotTelegram\Libraries;

    use Longman\TelegramBot\Telegram;
    use Longman\TelegramBot\TelegramLog;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use Monolog\Formatter\LineFormatter;
    use Longman\TelegramBot\Exception\TelegramException;
    use Longman\TelegramBot\Exception\TelegramLogException;

    class PHPBot
    {

        protected $Telegram;
        
        protected $TelegramManager;

        public function __construct($ApiToken, $Username)
        {
            $this->Telegram = new Telegram($ApiToken, $Username);
            $this->TelegramManager = new BotManager(["api_key" => $ApiToken, "bot_username" => $Username]);
        }

        public function Status() : bool
        {
            try {
                $result = $this->Telegram->getWebhook();
                return $result->ok;
            } catch (TelegramException $e) {
                return FALSE;
            }
        }

        public function Start(array $config, string $MaxConnection = "40") : bool
        {
            try {
                $this->Telegram->setWebhook(
                    $config['url'], [
                        'max_connections' => $MaxConnection
                    ]
                );
                return TRUE;

            } catch (TelegramException $e) {
                return FALSE;
            }
        }

        public function Stop() : bool
        {
            try {
                $this->Telegram->deleteWebhook();
                return TRUE;
            } catch (TelegramException $e) {
                return FALSE;
            }
        }

        public function Hook(array $config)
        {
            try {
                $this->Telegram->enableAdmins($config['admins']);
                $this->Telegram->addCommandsPaths($config['commands']['paths']);
                if(!$config['database']){
                    $this->Telegram->useGetUpdatesWithoutDatabase();
                }else{
                    $this->Telegram->enableMySql($config['mysql']);
                }
                if($config['debug']){
                    TelegramLog::initialize(
                        new Logger('telegram_bot', [
                            (new StreamHandler($config['logging']['debug'], Logger::DEBUG))->setFormatter(new LineFormatter(null, null, true)),
                            (new StreamHandler($config['logging']['error'], Logger::ERROR))->setFormatter(new LineFormatter(null, null, true)),
                        ]),
                        new Logger('telegram_bot_updates', [
                            (new StreamHandler($config['logging']['update'], Logger::INFO))->setFormatter(new LineFormatter('%message%' . PHP_EOL)),
                        ])
                    );
                }
                $this->Telegram->setDownloadPath($config['paths']['download']);
                $this->Telegram->setUploadPath($config['paths']['upload']);
                $this->Telegram->enableLimiter($config["Limiter"]);
                $this->Telegram->handle();
            } catch (TelegramException $e) {
                TelegramLog::error($e);
                // echo $e;
            } catch (TelegramLogException $e) {
                // echo $e;
            }
        }

        public function UpdatesCLI(array $config)
        {
            try {
                if(!$config['database']){
                    $this->Telegram->useGetUpdatesWithoutDatabase();
                }else{
                    $this->Telegram->enableMySql($config['mysql']);
                }
                $server_response = $this->Telegram->handleGetUpdates();
                if ($server_response->isOk()) {
                    $update_count = count($server_response->getResult());
                    $Date = date('Y-m-d H:i:s') . ' - Processed ' . $update_count . ' updates';
                    $Error = NULL;
                } else {
                    $Date = date('Y-m-d H:i:s') . ' - Failed to fetch updates' . PHP_EOL;
                    $Error = $server_response->printError();
                }
                return [
                    "date" => $Date,
                    "printError" => $Error,
                ];
            } catch (TelegramException $e) {
                TelegramLog::error($e);
                // echo $e;
            } catch (TelegramLogException $e) {
                // echo $e;
            }
        }

        public function Manager()
        {
            try {
                $this->TelegramManager->run();
            } catch (TelegramException $e) {
                TelegramLog::error($e);
                // echo $e;
            } catch (TelegramLogException $e) {
                // echo $e;
            }
        }

        public function Cron()
        {
            try {
                $this->Telegram->runCommands([
                    '/whoami',
                    "/echo I'm a bot!",
                ]);
            } catch (TelegramException $e) {
                TelegramLog::error($e);
                // echo $e;
            } catch (TelegramLogException $e) {
                // echo $e;
            }
        }

    }

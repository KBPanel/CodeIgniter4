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
    namespace BotTelegram\Controllers;

    use App\Controllers\BaseController;
    use BotTelegram\Libraries\PHPBot;

    class Bot extends BaseController
    {

        public function Start()
        {
            $Token = \BotTelegram\Config\Bot::$Token;
            $Username = \BotTelegram\Config\Bot::$Username;
            $Webhook = \BotTelegram\Config\Bot::$Webhook;
            $config = [
                "url" =>  route_to($Webhook["typeRequet"]), // Change in config (bot.php)
                //"certificate" =>  $Webhook["certificate"],
            ];
            $PHPBot = new PHPBot($Token, $Username);
            $SendStart = $PHPBot->Start($config, $Webhook["max_connections"]);
            if(!$SendStart){
                return redirect()->back()->withInput()->with('error', "Desculpe, não conseguimos ligar seu bot, se erro persistir entre em contato com o suporte.");
            }
            return redirect()->back()->withInput()->with('message', "Bot ligado com sucesso!");
        }

        public function Stop()
        {
            $Token = \BotTelegram\Config\Bot::$Token;
            $Username = \BotTelegram\Config\Bot::$Username;
            $PHPBot = new PHPBot($Token, $Username);
            $SendStop = $PHPBot->Stop();
            if(!$SendStop){
                return redirect()->back()->withInput()->with('error', "Desculpe, não conseguimos desligar seu bot, se erro persistir entre em contato com o suporte.");
            }
            return redirect()->back()->withInput()->with('message', "Bot desligado com sucesso!");
        }

        public function Restart()
        {
            $Token = \BotTelegram\Config\Bot::$Token;
            $Username = \BotTelegram\Config\Bot::$Username;
            $PHPBot = new PHPBot($Token, $Username);
            $SendStop = $PHPBot->Stop();
            if($SendStop){
                $Webhook = \BotTelegram\Config\Bot::$Webhook;
                $config = [
                    "url" =>  route_to($Webhook["typeRequet"]), // Change in config (bot.php)
                    //"certificate" =>  $Webhook["certificate"],
                ];
                $SendStart = $PHPBot->Start($config, $Webhook["max_connections"]);
                if(!$SendStart){
                    return redirect()->back()->withInput()->with('error', "Desculpe, não conseguimos reiniciar o bot, se erro persistir entre em contato com o suporte.");
                }
                return redirect()->back()->withInput()->with('message', "Bot reiniciado com sucesso!");
            }
            return redirect()->back()->withInput()->with('error', "Desculpe, não conseguimos reiniciar o bot, se erro persistir entre em contato com o suporte.");
        }

        public function Status()
        {
            $Token = \BotTelegram\Config\Bot::$Token;
            $Username = \BotTelegram\Config\Bot::$Username;
            $PHPBot = new PHPBot($Token, $Username);
            return $PHPBot->Status();
        }

        public function Cron()
        {
            $Token = \BotTelegram\Config\Bot::$Token;
            $Username = \BotTelegram\Config\Bot::$Username;
            $PHPBot = new PHPBot($Token, $Username);
            $PHPBot->Cron();
        }
    
        public function getUpdatesCLI()
        {
            $Token = \BotTelegram\Config\Bot::$Token;
            $Username = \BotTelegram\Config\Bot::$Username;
            $Mysql = \BotTelegram\Config\Bot::$MySQLDate;
            $PHPBot = new PHPBot($Token, $Username);
            $PHPBot->UpdatesCLI($Mysql);
        }

        public function Manager()
        {
            $Token = \BotTelegram\Config\Bot::$Token;
            $Username = \BotTelegram\Config\Bot::$Username;
            $PHPBot = new PHPBot($Token, $Username);
            $PHPBot->Manager();
        }

        public function Hook()
        {
            $Token = \BotTelegram\Config\Bot::$Token;
            $Username = \BotTelegram\Config\Bot::$Username;

            $Debug = \BotTelegram\Config\Bot::$Logging;
            $Command = \BotTelegram\Config\Bot::$Commands;
            $MySQL = \BotTelegram\Config\Bot::$MySQLDate;

            $config = [
                "logging"  => $Debug["path"],
                "commands" => [
                    'paths'   => $Command["paths"],
                    'configs'   => $Command["configs"],
                ],
                "paths" => \BotTelegram\Config\Bot::$PathFiles,
                "database" => $MySQL["database"],
                "mysql" => $MySQL["mysql"],
                "admins" => \BotTelegram\Config\Bot::$Administrators,
                "debug" => $Debug["debug"],
                "Limiter" => \BotTelegram\Config\Bot::$limiter,
            ];
            $PHPBot = new PHPBot($Token, $Username);
            $PHPBot->Hook($config);
        }
    }
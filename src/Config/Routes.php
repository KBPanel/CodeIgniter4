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

    $routes = \Config\Services::routes();

    $NameGroup = \BotTelegram\Config\Bot::$NameGroup;

    $routes->group($NameGroup, ['namespace' => 'BotTelegram\Controllers'], static function ($routes) {
        $routes->group('start', ['namespace' => 'BotTelegram\Controllers'], static function ($routes) {
            $routes->get('/', 'Bot::Start', ['as' => 'AccessStart']);
            $routes->post('/', 'Bot::Start');
        });
        $routes->group('stop', ['namespace' => 'BotTelegram\Controllers'], static function ($routes) {
            $routes->get('/', 'Bot::Stop', ['as' => 'AccessStop']);
            $routes->post('/', 'Bot::Stop');
        });
        $routes->group('restart', ['namespace' => 'BotTelegram\Controllers'], static function ($routes) {
            $routes->get('/', 'Bot::Restart', ['as' => 'AccessRestart']);
            $routes->post('/', 'Bot::Restart');
        });
        $routes->group('cron', ['namespace' => 'BotTelegram\Controllers'], static function ($routes) {
            $routes->get('/', 'Bot::Cron', ['as' => 'AccessCron']);
            $routes->post('/', 'Bot::Cron');
        });
        $routes->group('getupdatescli', ['namespace' => 'BotTelegram\Controllers'], static function ($routes) {
            $routes->get('/', 'Bot::getUpdatesCLI', ['as' => 'AccessGetUpdatesCLI']);
            $routes->post('/', 'Bot::getUpdatesCLI');
        });
        $routes->group('manager', ['namespace' => 'BotTelegram\Controllers'], static function ($routes) {
            $routes->get('/', 'Bot::Manager', ['as' => 'AccessManager']);
            $routes->post('/', 'Bot::Manager');
        });
        $routes->group('hook', ['namespace' => 'BotTelegram\Controllers'], static function ($routes) {
            $routes->get('/', 'Bot::Hook', ['as' => 'AccessHook']);
            $routes->post('/', 'Bot::Hook');
        });
    });

<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 11/07/2018
 * Time: 17:14
 */

define('DATABASE', [
    'USER' => 'root',
    'PASS' => '',
    'HOST' => 'localhost',
    'NAME' => 'play_notifysms'
]);

require_once __DIR__ . '/source/crud/Conn.php';
require_once __DIR__ . '/source/crud/Create.php';
require_once __DIR__ . '/source/crud/Read.php';
require_once __DIR__ . '/source/crud/Update.php';

require_once __DIR__ . '/source/models/User.php';

//You can send sms through tiniyo just signup on tiniyo, get your auth_id as CLIENT_ID and auth_secret as CLIENT_SECRET
//CALLBACK_URL is needed if you want to receive delivery report
define('CONFIG_SMS', [
    'CLIENT_ID' => '',
    'CLIENT_SECRET' => '',
    'CALLBACK_URL' => '',
    'GUHWEB' => ''
]);

require_once __DIR__ . '/source/notify/sms/DirectCall.php';

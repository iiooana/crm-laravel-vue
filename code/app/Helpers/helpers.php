<?php

Use Telegram\Bot\Api;

/**
 * Send message on Telegram chat
 */
function sendTelegramMessage(String $message)
{
    $telegram = new Api(getenv('TELEGRAM_API_TOKEN'));
    $telegram->sendMessage([
        'chat_id' => getenv('TELEGRAM_CHAT_ID'),
        'text' => $message
    ]);
}
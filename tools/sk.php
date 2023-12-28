<?php
if (preg_match('/^(\/sk|\.sk|!sk)/', $text)) {
  $sk = substr($message,4);
  }

  $ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');  
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');  
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]=4102770015058552&card[exp_month]=06&card[exp_year]=24&card[cvc]=997');  
$stripe1 = curl_exec($ch); 
if ((strpos($stripe1, 'declined')) || (strpos($stripe1, 'pm_')))
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/balance');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array(
'Authorization: Bearer '.$sk.'',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$stripe = curl_exec($ch);
//echo ($stripe);
$balance = trim(strip_tags(getStr($stripe,' "amount":',',')));
  
  $pbalance = trim(strip_tags(getStr($stripe,' "pending": [
    {
      "amount": ',',')));
$Currency = trim(strip_tags(getStr($stripe,'"currency": "','",')));
  $livmsg = urlencode("<b>
[火]SK KEY CHECK 🌩
━━━━━━━━━━━━━
•├LIVE SK ✅

•├KEY: <code>$sk</code>

•├BALANCE: $balance 
•├PENDING: $pbalance
•├CURRENCY : $Currency 

━━━━━━━━━━━━━
•├Dev: <code>@ownerb3</code>
  </b>");
  sendMessage($chatId,$livmsg,$messageId);
    
exit;
}
elseif(strpos($stripe1, 'rate_limit'))
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/balance');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array(
'Authorization: Bearer '.$sk.'',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$stripe = curl_exec($ch);
$balance = trim(strip_tags(getStr($stripe,' "amount":',',')));
  $pbalance = trim(strip_tags(getStr($stripe,' "pending": [
    {
      "amount": ',',')));
$Currency = trim(strip_tags(getStr($stripe,'"currency": "','",')));
  $livmsg = urlencode("<b>
[火]SK KEY CHECK 🌩
━━━━━━━━━━━━━
•├RATE LIMIT ⚠️

•├KEY: <code>$sk</code>

•├BALANCE: $balance 
•├PENDING: $pbalance
•├CURRENCY : $Currency 

━━━━━━━━━━━━━
•├Dev: <code>@ownerb3</code>
  </b>");
  sendMessage($chatId,$livmsg,$messageId);
  
exit;

}
elseif(strpos($stripe1, 'Your account cannot currently make live charges.'))
{
  $skmsg=urlencode("
<b>
[火]SK KEY CHECK 🌩
━━━━━━━━━━━━━
•├TESTMODE KEY ❌

•├KEY: <code>$sk</code>

•├STATUS: Your account cannot currently make live charges. 

━━━━━━━━━━━━━
•├Dev: <code>@ownerb3</code>
  </b>
");
}
elseif(strpos($stripe1, 'Expired API Key provided'))
{
   $skmsg=urlencode("
<b>
[火]SK KEY CHECK 🌩
━━━━━━━━━━━━━
•├EXPIRED KEY ❌

•├KEY: <code>$sk</code>

•├STATUS: Your Api key expired . 

━━━━━━━━━━━━━
•├Dev: <code>@ownerb3</code>
  </b>");
}
elseif(strpos($stripe1, 'The API key provided does not allow requests from your IP address.'))
{
   $skmsg=urlencode("
<b>
[火]SK KEY CHECK 🌩
━━━━━━━━━━━━━
•├DEAD KEY ❌

•├KEY: <code>$sk</code>

•├STATUS: The API key provided does not allow requests from your IP address. 

━━━━━━━━━━━━━
•├Dev: <code>@ownerb3</code>
");
}
else
{
  $skmsg = Getstr($stripe1,'"message": "','"');
  $skmsg=urlencode("
<b>
[火]SK KEY CHECK 🌩
━━━━━━━━━━━━━
•├DEAD KEY ❌

•├KEY: <code>$sk</code>

•├STATUS: $skmsg 

━━━━━━━━━━━━━
•├Dev: <code>@ownerb3</code>
");
}
sendMessage($chatId,$skmsg,$messageId);

?>
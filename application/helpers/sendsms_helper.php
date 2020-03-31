<?php
function sendsms(){
//    print_r($mobile); print_r($message); die;
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://d7networks.com/api/verifier/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('mobile' => '971509001994','sender_id' => 'SMSINFO','message' => 'Your otp code is {code}','expiry' => '900'),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Token e502106fa304c9d842f357ceee0bc500b6393109"
  ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;

}

function verify()
{
    
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://d7networks.com/api/verifier/verify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('otp_id' => 'b6ed371c-b25b-4669-b636-23f2be3fa0a8','otp_code' => '702720'),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Token e502106fa304c9d842f357ceee0bc500b6393109"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

}

function resend(){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://d7networks.com/api/verifier/resend",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('otp_id' => 'e8304abf-cbe1-4986-a560-91714d70c72d'),
  CURLOPT_HTTPHEADER => array(
    "Authorization: Token {e502106fa304c9d842f357ceee0bc500b6393109}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

}



function send_message_global($c_code, $mobile, $message) { //pre($mobile); pre($message); die;
    $url = "http://sms.bhashsms.com/api/sendmsg.php";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "user=appsquadz&pass=123456&sender=NIMBUS&priority=ndnd&stype=normal&phone=$mobile&text=$message");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $response = curl_exec($ch);
    if ($response != '') {
        return true;
    } else {
        return false;
    }
}

function send_message_global_public() {
//    print_r($mobile); print_r($message); die;
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://d7-verify.p.rapidapi.com/send",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{\"mobile\": 971562316353,\"sender_id\": \"SMSInfo\",\"message\":\"Your otp code is {code}\",\"expiry\": 900}",
	CURLOPT_HTTPHEADER => array(
		"accept: application/json",
		"authorization: 4208c36b99097aad59d64990ec60805bd194754c",
		"content-type: application/json",
		"x-rapidapi-host: d7-verify.p.rapidapi.com",
		"x-rapidapi-key: eaa34f17e6mshc3e43838610ca81p16746ajsn691a48599616"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
}
?>
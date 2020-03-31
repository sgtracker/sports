<?php

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

//function send_message_global($c_code, $mobile, $message) {
//$apiKey = urlencode(�Your apiKey�);
//// Message details
//$numbers = array(918123456789, 918987654321);
//$sender = urlencode(�TXTLCL�);
//$message = rawurlencode(�This is your message�);
// 
//$numbers = implode(�,�, $numbers);
// 
//// Prepare data for POST request
//$data = array(�apikey� => $apiKey, �numbers� => $numbers, �sender� => $sender, �message� => $message);
//// Send the POST request with cURL
//$ch = curl_init(�https://api.textlocal.in/send/�);
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$response = curl_exec($ch);
//curl_close($ch);
//// Process your response here
//echo $response;
//}




function send_message_global_old($c_code, $mobile, $message) {
    $apikey = "5aa1864c9e71a";
    $route = "transactional";
    $sender = "TeamSM";
    //$message  = "This is test sms";
    $mobile = $c_code . $mobile;
    // $message    =  urlencode($message);
    $api_url = "http://www.smsalert.co.in/api/push.json?apikey=$apikey&route=$route&sender=$sender&mobileno=$mobile&text=$message";
    //$api_url    = "https://www.smsalert.co.in/api/push.json?apikey=$apikey&route=$route&sender=$sender&mobileno=$mobile&text=$message";
    $response = json_decode(@file_get_contents($api_url));
    if ($response) {
        return true;
    } else {
        return false;
    }
//    return true;
}
 
function send_custom_email($mail) {
    $CI = & get_instance();
    $config = array(
        'protocol' => 'tls',
        'smtp_host' => 'email-smtp.us-east-1.amazonaws.com',
        'smtp_port' => 587,
        'smtp_user' => 'AKIAINB22IN5ULC7YYOQ',
        'smtp_pass' => 'AhtnfVC+erd1LE7cz4ceJufCDvJOcYtUw4YKD5RZk7rl',
        'mailtype' => 'html',
        'charset' => 'utf-8',
//          'charset' => 'iso-8859-1',
        'validation' => TRUE, // bool whether to validate email or not    
        'priority' => 3,
        'wordwrap' => TRUE
    );


    $CI->load->library('email', $config);
    $CI->email->set_newline("\r\n");
    $CI->email->from("support@visaproc.cn", 'Diabetes');
//    $CI->email->to('harish88kumar@yahoo.co.in');
    $CI->email->to($mail['email']);
    $CI->email->bcc('ck@appsquadz.com');
    $CI->email->bcc('share.js@gmail.com');
    $CI->email->bcc('harish88kumar@yahoo.co.in');
    $CI->email->subject($mail['subject']);
    $CI->email->message($mail['body']);
    $CI->email->set_mailtype("html");
    if (isset($mail['attachment'])) {
        $CI->email->attach($mail['attachment']);
    }
    $send = $CI->email->send();

    
    
//    $headers  = "From: Diabetes < support@visaproc.cn >\n";
////    $headers .= "Cc: testsite < mail@testsite.com >\n"; 
//    $headers .= "X-Sender: Diabetes < support@visaproc.cn >\n";
//    $headers .= 'X-Mailer: PHP/' . phpversion();
//    $headers .= "X-Priority: 1\n"; // Urgent message!
//    $headers .= "Return-Path: support@visaproc.cn\n"; // Return path for errors
//    $headers .= "MIME-Version: 1.0\r\n";
//    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
//    $headers .= "X-MSMail-Priority: High\n";
//    $headers .= "Importance: High\n";
//    
//    //pre($headers); die;
//    $send = mail($mail['email'], $mail['subject'], $mail['body'], $headers);
    return $send;
}

//"EMAIL" => array("SMTP_SENDER_TYPE" => "user",
//"SMTP_NAME" => "localhost",
//"SMTP_HOST" => "email-smtp.us-east-1.amazonaws.com",
//"SMTP_PORT" => 587,
//"SMTP_CONNECTION_CLASS" => "plain",
//"SMTP_USERNAME" => "AKIAINB22IN5ULC7YYOQ",
//"SMTP_PASSWORD" => "AhtnfVC+erd1LE7cz4ceJufCDvJOcYtUw4YKD5RZk7rl",
//"SMTP_SSL" => "tls", 
//"BODY" => "Diabetes",
//"FROM" => "support@visaproc.cn",
//
//"NOREPLYFROM" => "noreply@visaproc.cn",
//"TO" => "",
//"MAIL_FROM_NICK_NAME" => "Diabetes",
//"SUBJECT" => "Subscription Mail",
//"FROM_NICK_NAME" => "Diabetes"),



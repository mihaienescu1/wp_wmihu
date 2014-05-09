<?php
require_once( '../../../../wp-load.php' );

$sitename = get_bloginfo('name');
$siteurl =  get_bloginfo('siteurl');

$to = isset($_POST['to'])?trim($_POST['to']):'';
$first_name = isset($_POST['first_name'])?trim($_POST['first_name']):'';
$last_name = isset($_POST['last_name'])?trim($_POST['last_name']):'';
$email = isset($_POST['email'])?trim($_POST['email']):'';
$phone_no = isset($_POST['phone_no'])?trim($_POST['phone_no']):'';
$subject_text = isset($_POST['subject'])?trim($_POST['subject']):'';
$content = isset($_POST['content'])?trim($_POST['content']):'';


$error = false;
if($to === '' || $email === '' || $content === '' || $first_name === '' || $last_name === ''){
	$error = true;
}
if(!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)){
	$error = true;
}
if(!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $to)){
	$error = true;
}

if($error == false){
	$subject = "$sitename's message from $first_name $last_name";
	$body = "Site: $sitename ($siteurl) \n\nFirst Name: $first_name \n\nLast Name: $last_name \n\nEmail: $email \n\nPhone: $phone_no \n\nSubject: $subject_text \n\nMessages: $content";
	$headers = "From: $first_name $last_name <$email> \r\n";
	$headers .= "Reply-To: $email\r\n";
	
	
	if(wp_mail($to, $subject, $body, $headers)){
		echo 'success';
	}
}
<?php
// API access key from Google API's Console
define( 'API_SERVER_KEY', 'AAAAZNMvMQ0:APA91bEqa8Poy-1vOF4Y31O2dPihNzWICglqgmQLNPY-40pteM5h7s5cUmYQIauCKh4nrnolD-IxYbfRzbmuHbOrnMuiLR5atyTF2inBhiLHSp-egcFn64xDBqXvIjxHSOoYjiKUlH4r');
$json=json_decode(file_get_contents('php://input'),true);
$registrationIds =  [$json['device_id']];


// prep the bundle
$msg = array
(
	'message' 	=> $json['message'],
	'title'		=> 'New Movie Heads UP!',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon'
);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_SERVER_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;
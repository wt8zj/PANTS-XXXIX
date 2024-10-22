<?php
// generic_task.php

// Statcounter tracking (hidden within other tasks)
// Replace with your actual project ID and security code
$sc_project = '13048738';
$sc_security = '8914c5b7';

// Capture visitor information
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$current_url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

// Send data to Statcounter
$statcounter_url = "https://c.statcounter.com/{$sc_project}/0/{$sc_security}/1/?ip={$ip_address}&useragent=" . urlencode($user_agent) . "&referer=" . urlencode($referrer) . "&url=" . urlencode($current_url);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $statcounter_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Optionally, log the response or any errors for debugging
// file_put_contents('statcounter_log.txt', $response, FILE_APPEND);
?>

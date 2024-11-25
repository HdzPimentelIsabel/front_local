<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.siaweb.com.mx/api/'.$config->endpoint); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HEADER, 0); 
$data = curl_exec($ch); 
curl_close($ch); 
$get__response = json_decode($data);
?>
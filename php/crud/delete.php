<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
// Variables navegados
$endpoint = $_REQUEST['endpoint'];
$id = $_REQUEST['id'];
// CURL al endpoint POST
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.siaweb.com.mx/api/'.$endpoint.'/'.$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
));
$data = curl_exec($curl);
curl_close($curl);
// Retornar respuesta y enviar el estatus
$delete__response = json_decode($data);
//print_r($delete__response);
echo $delete__response->status;

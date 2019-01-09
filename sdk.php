<?php
require "Config.php";

function buildConfig( $teamName, $clientKey, $clientSecret) {
  return new Config($teamName, $clientKey, $clientSecret);
}

function publishEvent( $config, $eventName, $payload) {
  $teamName = $config.teamName;
  $clientKey = $config.clientKey;
  $clientSecret = $config.clientSecret;

  $url = "https://$teamName.reactivehub.io/event/$eventName/";

  $request = new HttpRequest($url, HttpRequest::METH_POST);
  $request->addHeaders(array('client_key' => $clientKey, 'client_secret' => $clientSecret));
  $request->setBody($payload);

  try {
      return $request->send()->getBody();
  } catch (HttpException $ex) {
      return $ex;
  }
}

?>
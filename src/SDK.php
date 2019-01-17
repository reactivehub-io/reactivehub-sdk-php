<?php
include "Config.php";

class SDK {

  public static function buildConfig( $teamName, $clientKey, $clientSecret) {
    return new Config($teamName, $clientKey, $clientSecret);
  }

  public static function publishEvent( $config, $eventName, $payload) {
    $teamName = $config->getTeamName();
    $clientKey = $config->getClientKey();
    $clientSecret = $config->getClientSecret();

    $url = "https://$teamName.reactivehub.io/event/$eventName/";

    print($url);

    $headers = "Content-Type: application/json\r\n"
      ."client_key: $clientKey\r\n"
      ."client_secret: $clientSecret\r\n";

    print($headers);

    $options = array(
      "http" => array(
        "header" => $headers,
        "method" => "POST",
        "contet" => http_build_query($payload)
      )
    );

    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
  }
}


?>
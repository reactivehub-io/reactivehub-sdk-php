<?php
class Config {
  private $teamName;
  private $clientKey;
  private $clientSecret;

  function __construct( $teamName, $clientKey, $clientSecret ) {
		$this->teamName = $teamName;
    $this->clientKey = $clientKey;
    $this->clientSecret = $clientSecret;
	}

  function getTeamName() {
    return $this->teamName;
  }

  function getClientKey() {
    return $this->clientKey;
  }

  function getClientSecret() {
    return $this->clientSecret;
  }
}
?>
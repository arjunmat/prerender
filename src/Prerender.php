<?php

namespace Arjunmat\Prerender;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\BadResponseException;

class Prerender {
  
  protected static $baseUrl = null;

  protected static $token = null;

  protected static $error = [
    'code'  => null,
    'message' => null,
  ];

  protected static $logFile = null;

  /**
   * @param string $token
   */
  public function __construct() {

    self::$token = config('prerender.token');

    self::$logFile = config('prerender.logFile');

    self::$baseUrl = config('prerender.baseUrl');

  }

  /**
   * @param string $url
   */
  public static function setBaseUrl($url) {

    self::$baseUrl = $url;

  }

  /**
   * @param string $token
   */
  public static function setToken($token) {

    self::$token = $token;

  }

  /**
   * returns @param array/string $error
   */
  public static function getError() {

    return self::$error;

  }

  /**
   * Writes to the logFile
   */
  public static function writeErrorToFile($url) {

    $errorMessage = "[" . date('Y-m-d H:i:s') . "] => Failed to recache url, " . $url . ". [Error Code] - " . self::$error['code'] . ", [Error Message] - " . self::$error['message'] . "\n";

    file_put_contents($config['prerender.logFile'], $errorMessage, FILE_APPEND);

  }

  /**
   * @param  string $url
   */
  public static function submitUrl($url)
  {
      $client = new Client();

      try {
        $request = $client->post(self::$baseUrl, [
          RequestOptions::JSON => [
            'url' => $url,
            'prerenderToken' => self::$token,
          ]
        ]);

        return true;
      }
      catch(BadResponseException $e) {

        self::$error['code'] = $e->getResponse()->getStatusCode();
        self::$error['message'] = $e->getResponse()->getBody()->getContents();

        if(config['prerender.logToFile']) {
          self::writeErrorToFile($url);
        }

        return false;
      }
  }

}
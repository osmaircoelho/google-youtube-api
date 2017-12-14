<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 * Class GoogleLogin
 * @package App\Services
 */
class GoogleLogin
{
  /**
   * @var \Google_Client
   */
  protected $client;
  protected $request_;

    /**
     * @param \Google_Client $client
     * @param Request $request
     */
  public function __construct(\Google_Client $client, Request $request )
  {
    $this->client = $client;
    $this->request_ = $request;

    $this->client->setClientId(\Config::get('google.client_id'));
    $this->client->setClientSecret(\Config::get('google.client_secret'));
    $this->client->setDeveloperKey(\Config::get('google.api_key'));
    $this->client->setRedirectUri(\Config::get('app.url') . ":8000/loginCallback");
    $this->client->setScopes(['https://www.googleapis.com/auth/youtube']);
    $this->client->setAccessType('offline');
  }

  /**
   * @return string
   */
  public function isLoggedIn()
  {

    if ($this->request_->session()->has('token')) {
       $this->client->setAccessToken($this->request_->session()->get('token'));
    }
    else{
      return false;
    }

    if ($this->client->isAccessTokenExpired()) {
        $this->request_->session()->put('token', $this->client->getRefreshToken());
    }

    return !$this->client->isAccessTokenExpired();
  }

  /**
   * @param $code
   * @return string
   */
  public function login($code)
  {
    $this->client->authenticate($code);
    $token = $this->client->getAccessToken();
    $this->request_->session()->put('token', $token);

    return $token;
  }

  /**
   * @return string
   */
  public function getLoginUrl()
  {
    $authUrl = $this->client->createAuthUrl();

    return $authUrl;
  }
}

 
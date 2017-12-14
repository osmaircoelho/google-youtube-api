<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class GoogleLoginController
 * @package App\Http\Controllers
 */
class GoogleLoginController extends Controller
{

  /**
   * @param \App\Services\GoogleLogin $ga
   * @return string
   */
  public function index(\App\Services\GoogleLogin $ga)
  {
    if ($ga->isLoggedIn()) {
      return \Redirect::to('/');
    }
    $loginUrl = $ga->getLoginUrl();

    return "<a href='{$loginUrl}'>Connect to your google account</a>";
  }

  /**
   * @param \App\Services\GoogleLogin $ga
   */
  public function store(\App\Services\GoogleLogin $ga, Request $request)
  {
    // User rejected the request
    if ($request->has('error')) {
      dd($request->get('error'));
    }

    if ($request->has('code')) {
      $code = $request->get('code');
      $ga->login($code);

      return \Redirect::to('/');
    } else {
      throw new \InvalidArgumentException("Code attribute is missing.");
    }
  }

}

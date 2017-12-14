<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Requests;

class YoutubeAPIController extends Controller
{

  public function searchItem(Requests $requests, $query){

    $options = ['maxResults' => 16, 'q' => $query];

    if ($requests->session()->has('page')) {
      $options['pageToken'] = $requests->session()->get('page');
    }

    $youtube = \App::make('youtube');
    $videos = $youtube->search->listSearch("snippet", $options);

      return \Response::json( ['videos' => $videos, 'query' => $query]);
  }

  public function search()
  {
      return view("search");
  }
}

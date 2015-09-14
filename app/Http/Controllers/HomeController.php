<?php

namespace App\Http\Controllers;

use App\Article;
use App\PhotoAlbum;
use DB;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('pages.home');
	}

}
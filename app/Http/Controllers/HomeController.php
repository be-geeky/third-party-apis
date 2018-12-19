<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home');
	}

	public function search_repos() {
		$api = resolve('api_resource');
		$searchterm = 'laravel';

		$response = $api->getReposWithSearchTerm('laravel');

		\Log::debug($response);
	}
	public function org_repos() {

		$api = resolve('api_resource');
		$organization = 'laravel';
		$response = $api->getOrganizationRepos($organization);
		\Log::debug(count($response));
		\Log::debug($response);
	}
}

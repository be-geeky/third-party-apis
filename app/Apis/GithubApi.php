<?php

namespace App\Apis;
/**
 *
 */
class GithubApi {

	protected $api_base_url;

	function __construct($api_base_url) {
		$this->api_base_url = $api_base_url;
	}

	public function getReposWithSearchTerm($searchTerm = NULL) {
		$url = $this->api_base_url . '/search/repositories?q=' . $searchTerm;
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				// Set Here Your Requesred Headers
				'Content-Type: application/json',
				'User-Agent: Awesome-Octocat-App',
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			return json_decode($response);
		}

	}

	public function getOrganizationRepos($organization = NULL) {
		$url = $this->api_base_url . '/orgs/' . $organization . '/repos?page=1&per_page=100';

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				// Set Here Your Requesred Headers
				'Content-Type: application/json',
				'User-Agent: Awesome-Octocat-App',
			),
		));
		$response = curl_exec($curl);
		echo
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			return json_decode($response);
			print_r(json_decode($response));
		}

	}
}
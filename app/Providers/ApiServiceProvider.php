<?php

namespace App\Providers;

use App\Apis\GithubApi;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind('api_resource', function ($app) {
			$base_path = config('services.github.base_path');

			return new GithubApi($base_path);
		});
	}
}

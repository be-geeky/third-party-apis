<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			'name' => $this->name,
			'email' => $this->email,
			'posts' => $this->posts,
		];
		//return parent::toArray($request);
	}

	public function with($request) {
		return [
			'status' => 'success',
		];
	}
}

<?php

namespace App\Core;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{


	protected $response;
	protected $auth;
	protected $created_by;
	protected $per_page = 10;

	//public abstract function Test();

	public function __construct()
	{
		$this->response = new BaseResponse();
	}

	protected function Paginate(object $entitys, int $page, int $per_page = null) :mixed
	{
		$perPage = $per_page ?? $this->per_page;
		return $entitys->paginate($perPage, ['*'], 'page', $page)->getCollection();
	}

	protected function rModel() :\Illuminate\Http\JsonResponse
	{
		return response()->json($this->response);
	}
}


class OBJ
{
}

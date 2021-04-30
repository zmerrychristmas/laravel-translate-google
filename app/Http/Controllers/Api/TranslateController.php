<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ApiTranslator;

class TranslateController extends Controller
{

	public function translateClient(Request $request)
	{
		return response()->json([
    		'status' => '200',
    		'Service' =>  ApiTranslator::getServiceName()
    	]);
	}

	public function translate(Request $request)
	{
		$input = $request->post('text');
		$result = '';
		if ($input) {
			$result = ApiTranslator::translate($request->post('text'), 'vi', 'en');
		}
		$data = [
			'success' => $result != '',
			'error' => null,
			'translation' => $result
		];
		return response()->json($data);
	}
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
	//资源服务器拉去用户授权页面 用户授权后 --->> 获取资源服务器返回的code
    public function getcode(Request $request){
    	// $code = $request->code;
    	// $access_token = $this->get_access_token($code);

    	$http = new \GuzzleHttp\Client();

	    $response = $http->post('http://www.passportdev.com/oauth/token', [
	        'form_params' => [
	            'grant_type' => 'authorization_code',
	            'client_id' => '4',
	            'client_secret' => '5VeG5mpkIizPYitxoB9ZYq8rlSGdfP1k3HGQAhXb',
	            'redirect_uri' => 'http://www.passportclient.com/callback',
	            'code' => $request->code,
	        ],
	    ]);

	    return json_decode((string) $response->getBody(), true);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19 0019
 * Time: 上午 10:18
 */

namespace App\Http\Controllers\Apis;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public $userModel;
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserInfoByToken(Request $request ,$openid = null){
        if(empty($openid)){
            return response()->json([
                'code' => '0',
                'message' => 'openid不能为空',
            ]);
        }
    }
    public function register(Request $request){

    }
    public function edit(Request $request ){

    }

}
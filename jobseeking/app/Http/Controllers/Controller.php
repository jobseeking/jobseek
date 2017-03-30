<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct() {

       $base_url = "/jobseek/jobseeking/public";
       //$base_url = "";

       View::share ( 'base_url', $base_url );
    } 

    public function getUser(Request $request){
        
        try {
            $token = $request->input('token'); // HTTP POST BODY
            if(!empty($token)){
                // Token in POST BODY PARAM
                if (! $user = JWTAuth::setToken($token)->authenticate()) {
                    return response()->json(['user_not_found'], 404);
                }
            }else{
                // Token in HEADER or HTTP GET PARAM
                if (! $user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
                }
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
 
            return response()->json(['token_expired'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
 
            return response()->json(['token_invalid'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
 
            return response()->json(['token_absent'], $e->getStatusCode());
 
        }
 
        return $user;
    }

}

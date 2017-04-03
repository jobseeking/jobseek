<?php
 
namespace App\Http\Controllers;


use Log;
use Validator;
use DB;

use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
 
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
 
 
class TokenAuthController extends Controller
{
    public function __construct(){
       parent::__construct();
    }

    // It takes the email and password from the request and try to generate a token for the given user credential.
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
 
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
 
        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
 
    // parse the token in the request and if the token is valid and the user is present it return the user itself
    public function getAuthenticatedUser()
    {
        try {
 
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
 
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
 
            return response()->json(['token_expired'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
 
            return response()->json(['token_invalid'], $e->getStatusCode());
 
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
 
            return response()->json(['token_absent'], $e->getStatusCode());
 
        }
 
        return response()->json(compact('user'));
    }
 
    // parse the request and create a new User in the database hashing the password
    public function register(Request $request){
 
        $newuser= $request->all();


        // Check email existence : 
        $query_result = DB::select("SELECT * FROM users WHERE email = '".$request->input('email')."'");
        if($query_result){
            Log::info('register email exist already: ', $query_result);
            return response()->json(['error' => 'This email has been registered, please use a different one.'], 500);
        }


        $password=Hash::make($request->input('password'));
 
        $newuser['password'] = $password;
 
        return User::create($newuser);
    }

    public function home_page(Request $request){   
        return view('home');
    }

    public function login_page(Request $request){
        return view('login.login');
    }

    public function register_page(Request $request){
        return view('login.register');
    }

    public function contactus_page(Request $request){   
        return view('contactus');
    }

    public function aboutus_page(Request $request){   
        return view('aboutus');
    }

    public function test(Request $request){
        
        $user = $this->getUser($request);
 
        return response()->json(compact('user'));
    }

}
 
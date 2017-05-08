<?php
 
namespace App\Http\Controllers;


use Log;
use Validator;
use DB;

use App\Job; // Model
use App\User;  // Model
use App\Classification; // Model
use App\Type;  // Model
use App\Location; // Model
use App\ClassificationSkill; // Model
use App\Education; // Model
use App\UserSkillExperience; // Model

use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
 
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 
 
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
 
        // Store Session 
        $user = User::where('email', $request->input('email'))->get();
        $request->session()->put('login_user_id', $user[0]->id);

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
 
    // Call this API to delete session when logout
    public function logout(Request $request){
        $request->session()->forget('login_user_id');
        return response()->json("logout OK");
    }

    public function get_login_user_id(Request $request){
        $user_id = $request->session()->get('login_user_id');
        return response()->json($user_id);
    }

    // parse the token in the request and if the token is valid and the user is present it return the user itself
    public function getAuthenticatedUser(Request $request)
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
 
        // Store Session 
        $request->session()->put('login_user_id', $user->id);

        return response()->json(compact('user'));
    }
 
    // parse the request and create a new User in the database hashing the password
    public function register(Request $request){
 
        // Check email existence : 
        $query_result = DB::select("SELECT * FROM users WHERE email = '".$request->input('email')."'");
        if($query_result){
            Log::info('register email exist already: ', $query_result);
            return response()->json(['error' => 'This email has been registered, please use a different one.'], 500);
        }



        // Create user in TABLE "users"
        $newuser = $request->only(["name", "last_name", "email", "password", "interest_classification_id", "location_id", "education_id"]);
        $password=Hash::make($request->input('password'));
        $newuser['password'] = $password;
        $user_created = User::create($newuser);


        // Create user's skill/experiecne in TABLE "user_skill_experiences" 
                // Create skill/experience to TABLE "job_skill_experiences"
        $classification_skills = ClassificationSkill::all();
        foreach ($classification_skills as $classification_skill) {
            $req_input_name = "classification_skill_".$classification_skill->id;
            if ($request->has($req_input_name)) {                
                UserSkillExperience::create(['user_id' => $user_created->id,
                                             'skill_id' => $classification_skill->id,
                                             'experience_years' => $request->input($req_input_name)
                                           ]);
            }
        }


        return $user_created;
    }

    public function home_page(Request $request){   
        $types = Type::all();
        $locations = Location::all();
        $classifications = Classification::all();


        // Recommended Jobs....
        $records_suggested = Job::findRecommended();
        foreach ($records_suggested as $record) {
            $record->type_name = Type::find($record->type_id)->name;
            $record->location_name = Location::find($record->location_id)->name;
            $record->classification_name = Classification::find($record->classification_id)->name;
            $record->user_name = User::find($record->user_id)->name ."  ". User::find($record->user_id)->last_name;
        }


        return view('home', [
                                'types' => $types, 
                                'locations' => $locations,
                                'classifications' => $classifications,
                                'records_suggested' => $records_suggested
                            ] );
    }

    public function login_page(Request $request){
        return view('login.login');
    }

    public function register_page(Request $request){
        $locations = Location::all();
        $educations = Education::all();
        $classifications = Classification::all();
        $classification_skills = ClassificationSkill::all();


        return view('login.register',[
                                      'classifications' => $classifications,
                                      'classification_skills' => $classification_skills,
                                      'locations' => $locations,
                                      'educations' => $educations
                                     ]);
    }

    public function contactus_page(Request $request){   
        return view('contactus');
    }

    public function aboutus_page(Request $request){   
        return view('aboutus');
    }

    public function edit_user_page(Request $request){
        $login_user_id = $request->session()->get('login_user_id');

        // Check if login_user is provided :  
        if (empty($login_user_id))
        {
            return redirect('/');
        }

        // Find user
        $user = User::where('id', $login_user_id)->get();
        if(empty($user))
        {
            return redirect('/');
        }

        $locations = Location::all();
        $educations = Education::all();
        $classifications = Classification::all();
        $classification_skills = ClassificationSkill::all();

        // Find user's skills
        $user_skills = UserSkillExperience::query()->where('user_id', $login_user_id)->get();
        $user_skills_years = array();
        if(!empty($user_skills)){
            foreach ($user_skills as $value) {
                $user_skills_years[$value->skill_id] = $value->experience_years;
            }
        }else{
            foreach ($classification_skills as $value) {
                $user_skills_years[$value->id] = 0;
            }
        }

        return view( "edituser", ['user' => $user[0],
                                  'user_skills_years' => $user_skills_years,
                                  'classifications' => $classifications,
                                  'classification_skills' => $classification_skills,
                                  'locations' => $locations,
                                  'educations' => $educations
                                  ]
                    );
    }

    public function update_user(Request $request){
        $login_user_id = $request->session()->get('login_user_id');

        // Check if login_user is provided :  
        if (empty($login_user_id))
        {
            return redirect('/');
        }

        // Find user
        $user = User::where('id', $login_user_id)->get();
        if(empty($user))
        {
            return redirect('/');
        }

        // Update user TABLE
        $user_data = $request->only([
                                      "name", 
                                      "last_name",  
                                      "interest_classification_id", 
                                      "location_id", 
                                      "education_id"
                                     ]);
        $user[0]->update($user_data);


        // Delete all records of this user in TABLE "user_skill_experiences"
        UserSkillExperience::where('user_id', $user[0]->id)->delete();

        // Update user's skill/experiecne in TABLE "user_skill_experiences"
        $classification_skills = ClassificationSkill::all();
        foreach ($classification_skills as $classification_skill) {
            $req_input_name = "classification_skill_".$classification_skill->id;
            if ($request->has($req_input_name)) {                
                UserSkillExperience::create(['user_id' => $user[0]->id,
                                             'skill_id' => $classification_skill->id,
                                             'experience_years' => $request->input($req_input_name)
                                           ]);
            }
        }


        return redirect('/');
    }

    public function test(Request $request){
        
        $user = $this->getUser($request);
 
        return response()->json(compact('user'));
    }

}
 
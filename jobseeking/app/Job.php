<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User; // Model
use App\JobSkillExperience; // Model
use App\UserSkillExperience; // Model

class Job extends Model {

    public $guarded = ["id","created_at","updated_at"];

    // For manually search (used by find job page)
    public static function find()
    {
        $query = Job::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('name') and $query->where('name','like','%'.\Request::input('name').'%');
        \Request::input('company') and $query->where('company','like','%'.\Request::input('company').'%');
        \Request::input('details') and $query->where('details','like','%'.\Request::input('details').'%');

        \Request::input('salary_top') and $query->where('salary','<',\Request::input('salary_top'));
        \Request::input('salary_bottom') and $query->where('salary','>=',\Request::input('salary_bottom'));

        \Request::input('location_id') and $query->where('location_id',\Request::input('location_id'));
        \Request::input('type_id') and $query->where('type_id',\Request::input('type_id'));
        \Request::input('classification_id') and $query->where('classification_id',\Request::input('classification_id'));

        //\Request::input('user_id') and $query->where('user_id',\Request::input('user_id'));
        \Request::input('user_name') and $query->join('users', 'users.id', '=', 'jobs.user_id')
        ->where('users.name',\Request::input('user_name'))->orWhere('users.last_name',\Request::input('user_name'));

        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));
        
        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(15);
    }

    // Recommended Jobs (with Algorithm)
    public static function findRecommended()
    {
        $login_user_id = \Request::input('rand');

        // Check if login_user is provided :  
        if (empty($login_user_id))
        {
            return array();
        }

        // Find user
        $user = User::where('id', $login_user_id)->get();
        if(empty($user))
        {
            return array();
        }
      
        // Find user's skills
        $user_skills = UserSkillExperience::query()->where('user_id', $login_user_id)->get();

        // Find jobs based on user's interest
        $query = Job::query();
        $jobs = $query->where('classification_id', $user[0]['interest_classification_id'])->get();
      
        foreach ($jobs as $job) {
            $points = 0;
            // Find job's skill
            $job_skills = JobSkillExperience::query()->where('job_id', $job->id)->get();

            // Skill match?
            foreach ($user_skills as $user_skill) {
                foreach ($job_skills as $job_skill) {
                    if($user_skill->skill_id == $job_skill->skill_id){
                        if($user_skill->experience_years >= $job_skill->experience_years){
                            // skill match
                            $points += 10;
                        }
                    }
                }
            }

            // Location match?
            if($job->location_id == $user[0]->location_id){
                $points += 30;
            }

            // Education match?
            if($job->education_id == $user[0]->education_id){
                $points += 10;
            }

            $job['points'] = $points;
        }
       
        $recommended_jobs = $jobs->sortByDesc('points')->slice(0, 5); // first 5 jobs
        return $recommended_jobs;
    }


    // For random recommended based on user's interest
    public static function findSuggested()
    {
        $login_user_id = \Request::input('rand');

        // Check if login_user is provided :  
        if (empty($login_user_id))
        {
            return array();
        }

        // Find user's interest
        $user = User::where('id', $login_user_id)->get();
        if(empty($user))
        {
            return array();
        }
      
        // Find jobs based on user's interest
        $query_1 = Job::query();
        $query_2 = Job::query();
        $jobs_1 = $query_1->where('classification_id', $user[0]['interest_classification_id'])->get();
        $jobs_2 = $query_2->where('classification_id', $user[0]['interest_classification_id_2'])->get();

        // Random select
        if($jobs_1->count() >= 2 ){
            $records_suggested_1 = $jobs_1->random(2)->all();
        }else if ($jobs_1->count() == 1){
            $records_suggested_1 = array($jobs_1[0]);
        }else{
            $records_suggested_1 = array();
        }
        
        if($jobs_2->count() >= 2 ){
            $records_suggested_2 = $jobs_2->random(2)->all();
        }else if ($jobs_2->count() == 1){
            $records_suggested_2 = array($jobs_2[0]);
        }else{
            $records_suggested_2 = array();
        }

        return array_merge($records_suggested_1, $records_suggested_2);
       
/*
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));

        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(15);
*/
    }

    // For manually search (basic)
    public static function findRequested()
    {
        $query = Job::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('name') and $query->where('name','like','%'.\Request::input('name').'%');
        \Request::input('company') and $query->where('company','like','%'.\Request::input('company').'%');
        \Request::input('salary') and $query->where('salary',\Request::input('salary'));
        \Request::input('details') and $query->where('details',\Request::input('details'));
        \Request::input('location_id') and $query->where('location_id',\Request::input('location_id'));
        \Request::input('type_id') and $query->where('type_id',\Request::input('type_id'));
        \Request::input('classification_id') and $query->where('classification_id',\Request::input('classification_id'));
        \Request::input('user_id') and $query->where('user_id',\Request::input('user_id'));
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));
        
        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(15);
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'salary' => 'required|integer',
            'details' => 'required',
            'location_id' => 'required|integer',
            'type_id' => 'required|integer',
            'classification_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];

        // no list is provided
        if(!$attributes)
            return $rules;

        // a single attribute is provided
        if(!is_array($attributes))
            return [ $attributes => $rules[$attributes] ];

        // a list of attributes is provided
        $newRules = [];
        foreach ( $attributes as $attr )
            $newRules[$attr] = $rules[$attr];
        return $newRules;
    }

}

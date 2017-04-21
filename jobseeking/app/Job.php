<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User; // Model

class Job extends Model {

    public $guarded = ["id","created_at","updated_at"];

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

    public static function findSuggested()
    {
        $login_user_id = \Request::input('login_user');

        // Check if login_user is provided :  
        if (empty($login_user_id))
        {
            return NULL;
        }

        // Find user's interest
        $user = User::where('id', $login_user_id)->get();
        if(empty($user))
        {
            return NULL;
        }
      
        // Find jobs based on user's interest
        $query = Job::query();
        $jobs_1 = $query->where('classification_id', $user[0]['interest_classification_id'])->get();
        $jobs_2 = $query->where('classification_id', $user[0]['interest_classification_id_2'])->get();


        // Random select
        $records_suggested = array();
        $rand_keys = array_rand((array)$jobs_1, 2);
        array_push($records_suggested, $jobs_1[$rand_keys[0]], $jobs_1[$rand_keys[1]]);
        $rand_keys = array_rand((array)$jobs_2, 2);
        array_push($records_suggested, $jobs_2[$rand_keys[0]], $jobs_2[$rand_keys[1]]);
        return $records_suggested;
       
/*
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));

        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(15);
*/
    }

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

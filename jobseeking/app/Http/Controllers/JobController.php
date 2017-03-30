<?php
namespace App\Http\Controllers;

use App\Location;
use App\Job;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public $viewDir = "job";

    public function __construct(){
       parent::__construct();
    }
    
    public function index()
    {
        $records = Job::findRequested();
        return $this->view( "index", ['records' => $records] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->validate($request, Job::validationRules());

        Job::create($request->all());

        return redirect('/job');
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Job $job)
    {
        return $this->view("show",['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Job $job)
    {
        return $this->view( "edit", ['job' => $job] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Job::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $job->update($data);
            return "Record updated";
        }

        $this->validate($request, Job::validationRules());

        $job->update($request->all());

        return redirect('/job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Job $job)
    {
        $job->delete();
        return redirect('/job');
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

    // post job page
    public function postjob_page( Request $request )
    {
        return view('postjob'); 
    }

    // post job page call this API
    public function postjob_api( Request $request )
    {
        $this->validate($request, Job::validationRules());

        Job::create($request->all());

        return redirect('/');
    }


}

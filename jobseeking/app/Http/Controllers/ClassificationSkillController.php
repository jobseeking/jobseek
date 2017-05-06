<?php
namespace App\Http\Controllers;

use App\ClassificationSkill;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClassificationSkillController extends Controller
{
    public $viewDir = "classification_skill";

    public function index()
    {
        $records = ClassificationSkill::findRequested();
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
        $this->validate($request, ClassificationSkill::validationRules());

        ClassificationSkill::create($request->all());

        return redirect('/classification-skill');
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, ClassificationSkill $classificationSkill)
    {
        return $this->view("show",['classificationSkill' => $classificationSkill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, ClassificationSkill $classificationSkill)
    {
        return $this->view( "edit", ['classificationSkill' => $classificationSkill] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, ClassificationSkill $classificationSkill)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, ClassificationSkill::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $classificationSkill->update($data);
            return "Record updated";
        }

        $this->validate($request, ClassificationSkill::validationRules());

        $classificationSkill->update($request->all());

        return redirect('/classification-skill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, ClassificationSkill $classificationSkill)
    {
        $classificationSkill->delete();
        return redirect('/classification-skill');
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}

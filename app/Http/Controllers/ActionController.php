<?php

namespace App\Http\Controllers;

use App\Action;
use App\School;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
		$schools = School::all()->where('owner_id','=',auth()->id());
		$actions = [];
		foreach($schools as $school) {
			$actions[] = Action::all()->where('school_id','=',$school->id);
		}
		//dd($actions);
		//$actions = Action::all()->where(Action::school()->owner_id, '=', auth()->id());
		return view('/actions.index', compact('actions'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$schools = School::all()->where('owner_id','=',auth()->id());
		return view('actions.create',compact('schools'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateAction();
        $attributes['logo'] = $request['logo'];
        $school = School::all()->where('name','=',$request['schoolname']);
        $attributes['school_id'] = $school->first()->id;
		Action::create($attributes);
		return redirect('/actions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(Action $action)
    {
		$this->authorize('view',$action);
		return view('/actions.show',compact('action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function edit(Action $action)
    {
		$this->authorize('edit',$action);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Action $action)
    {
		$this->authorize('update',$action);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(Action $action)
    {
		$this->authorize('delete',$action);
    }

	public function validateAction() {
		return \request()->validate([
			'name' => ['required','min:4'],
			'datetime' => 'required',
			'place' => ['required','max:255'],
			'cost' => 'required'
		]);
	}
}

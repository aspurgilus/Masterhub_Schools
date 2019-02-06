<?php

namespace App\Http\Controllers;

use App\School;
use App\Specialization;
use Illuminate\Http\Request;

class SchoolController extends Controller
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
		$schools = School::all();
		return view('/schools.index',compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = auth()->user()->schools;
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$attributes = $request->validate([
			'name' => ['required','min:4'],
			'city' => ['required','min:2'],
			'address' => ['required','max:255']
		]);
		$attributes['phone'] = $request['phone'];
		$attributes['owner_id'] = auth()->id();
		$spec = new Specialization();

		if(empty($request['cosmetology']) or empty($request['manicure']) or empty($request['pedicure']) or empty($request['makeup'])) {
			flash('Вы должны выбрать специализацию');
			return back();
		}
		if($request['cosmetology']) {
			$spec->create(['name' => 'Косметология','school_id' => auth()->id()]);
		}
		if($request['manicure']) {
			$spec->create(['name' => 'Маникюр','school_id' => auth()->id()]);
		}
		if($request['pedicure']) {
			$spec->create(['name' => 'Педикюр','school_id' => auth()->id()]);
		}
		if($request['makeup']) {
			$spec->create(['name' => 'Мейк-ап','school_id' => auth()->id()]);
		}

		School::create($attributes);
		flash('Ваша школа успешно добавлена');
		return redirect('/schools');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}

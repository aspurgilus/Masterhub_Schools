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
		$schools = School::all()->where('owner_id','=',auth()->id());

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
		$attributes = $this->validateSchool();
		$attributes['phone'] = $request['phone'];
		$attributes['owner_id'] = auth()->id();
		$spec = new Specialization();
		School::create($attributes);

		if(empty($request['cosmetology']) and empty($request['manicure']) and empty($request['pedicure']) and empty($request['makeup'])) {
			flash('Вы должны выбрать специализацию');
			return back();
		}
		if($request['cosmetology']) {
			$spec->create(['name' => 'Косметология','school_id' => School::all()->last()->id]);
		}
		if($request['manicure']) {
			$spec->create(['name' => 'Маникюр','school_id' => School::all()->last()->id]);
		}
		if($request['pedicure']) {
			$spec->create(['name' => 'Педикюр','school_id' => School::all()->last()->id]);
		}
		if($request['makeup']) {
			$spec->create(['name' => 'Мейк-ап','school_id' => School::all()->last()->id]);
		}


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
		$this->authorize('view',$school);

		return view('/schools.show',compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
		$this->authorize('edit',$school);
		return view('/schools.edit',compact('school'));
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
		$this->authorize('update',$school);
		$school->update($this->validateSchool());
		flash('Ваша школа была обновлена');
		return redirect('/schools');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
		$this->authorize('delete',$school);
		$school->delete();
		flash('Ваша школа была удалена');
		return redirect('/schools');
    }

	public function validateSchool() {
		return \request()->validate([
			'name' => ['required','min:4'],
			'city' => ['required','min:2'],
			'address' => ['required','max:255']]);
	}
}

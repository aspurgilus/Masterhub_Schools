@extends('layouts.app')

@section('title','Школы')

@section('content')

    <div>
        <div>
            @if(session('message'))
                <p>{{session('message')}}</p>
            @endif
            <a class="link" href="/schools/create">Добавить школу</a>
            <h1>Ваши школы</h1>
            <ul>
                @foreach($schools as $school)
                    <a class="buttonEdit" href="/schools/{{$school->id}}/edit">Редактировать</a>
                    <li><a href="/schools/{{$school->id}}">{{$school->name}}</a> </li>
                    <li>{{$school->city}}</li>
                    <li>{{$school->address}}</li>
                    @if($school->phone)
                        <li>{{$school->phone}}</li>
                    @endif
                    <br>

                    <form class="formdel" method="POST" action="/schools/{{$school->id}}">
                        @method('DELETE')
                        @csrf
                        <div class="form-group row mt-2">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-primary btndel">
                                    Удалить
                                </button>
                            </div>
                        </div>
                    </form>
                    <br><br>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
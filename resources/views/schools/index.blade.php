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
                    <li><a href="/schools/{{$school->id}}">{{$school->name}}</a> </li>
                    <li>{{$school->city}}</li>
                    <li>{{$school->address}}</li>
                    @if($school->phone)
                        <li>{{$school->phone}}</li><br><br>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection
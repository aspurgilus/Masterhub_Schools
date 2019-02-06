@extends('layouts.app')

@section('title', 'Показ')

@section('content')

    <div class="container col-md-6">
        <a href="/schools/{{$school->id}}/edit">Редактировать</a>
        <table>
            <tr>
                <th>Наименование</th>
                <th>Город</th>
                <th>Адресс</th>
            </tr>
            <tr>
                <td>{{$school->name}}</td>
                <td>{{$school->city}}</td>
                <td>{{$school->address}}</td>
            </tr>
        </table>


        <form method="POST" action="/schools/{{$school->id}}">
            @method('DELETE')
            @csrf
            <div class="form-group row mt-2">
                <div class="col-md-6 offset-md-0">
                    <button type="submit" class="btn btn-primary">
                        Удалить
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
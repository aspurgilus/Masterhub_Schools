@extends('layouts.app')

@section('title', 'Показ')

@section('content')

    <div class="container col-md-6">
        <a href="/actions/{{$action->id}}/edit">Редактировать</a>
        <table>
            <tr>
                <th>Название</th>
                @if($action->logo)
                    <th>Логотип</th>
                @endif
                <th>Дата и Время</th>
                <th>Место проведения</th>
                <th>Плата за вход</th>
            </tr>
            <tr>
                <td>{{$action->name}}</td>
                @if($action->logo)
                    <td>Логотип</td>
                @endif
                <td>{{$action->datetime}}</td>
                <td>{{$action->place}}</td>
                <td>{{$action->cost == 0 ? 'Бесплатно' : $action->cost}}</td>
            </tr>
        </table>

        <form method="POST" action="/actions/{{$action->id}}">
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
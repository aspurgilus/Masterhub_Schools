@extends('layouts.app')

@section('title','Мероприятия')

@section('content')

    <div>
        <div>
            <a class="link" href="/actions/create">Добавить мероприятие</a>
            <h1>Ваши мероприятия</h1>
            <ul>
                @foreach($actions as $action)
                    @foreach($action as $subaction)
                        <a class="buttonEdit" href="/actions/{{$subaction->id}}/edit">Редактировать</a>
                        <li><span class="span">Название: </span><a href="/actions/{{$subaction->id}}">{{$subaction->name}}</a></li>
                        @if($subaction->logo)
                            <li><img src="{{$subaction->logo}}"></li>
                        @endif
                        <li><span class="span">Дата и время проведения: </span>{{$subaction->datetime}}</li>
                        <li><span class="span">Место проведения: </span>{{$subaction->place}}</li>
                        <li><span class="span">Стоимость: </span>{{$subaction->cost}}</li>
                        <li><span class="span">Организатор: Школа </span>{{$subaction->school->name}}</li>
                        <br>

                        <form class="formdel" method="POST" action="/actions/{{$subaction->id}}">
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
                @endforeach
            </ul>
        </div>
    </div>
@endsection
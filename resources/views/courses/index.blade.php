@extends('layouts.app')

@section('title','Курсы')

@section('content')

    <div>
        <div>
            <a class="link" href="/courses/create">Добавить курс</a>
            <h1>Ваши курсы</h1>
            <ul>
                @foreach($courses as $course)
                    @foreach($course as $subcourse)
                        <a class="buttonEdit" href="/courses/{{$subcourse->id}}/edit">Редактировать</a>
                        <li><span class="span">Название: </span><a href="/courses/{{$subcourse->id}}">{{$subcourse->name}}</a></li>
                        @if($subcourse->logo)
                            <li><img src="{{$subcourse->logo}}"></li>
                        @endif
                        <li><span class="span">Количество часов: </span>{{$subcourse->hours}}</li>
                        <li><span class="span">Стоимость: </span>{{$subcourse->cost}}</li>
                        <li><span class="span">Организатор: Школа </span>{{$subcourse->school->name}}</li>
                        <br>

                        <form class="formdel" method="POST" action="/courses/{{$subcourse->id}}">
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
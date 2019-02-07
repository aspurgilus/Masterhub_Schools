@extends('layouts.app')

@section('title', 'Редактирование мероприятия')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Отредактируйте ваши данные</div>

                    <div class="card-body">

                        <form action="/actions/{{$action->id}}" method="POST">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Название: </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $action->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="datetime" class="col-md-4 col-form-label text-md-right">Дата и время проведения: </label>

                                <div class="col-md-6">
                                    <input id="datetime" type="datetime-local" class="form-control{{ $errors->has('datetime') ? ' is-invalid' : '' }}" name="datetime" value="{{ $action->datetime }}" required autofocus>

                                    @if ($errors->has('datetime'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('datetime') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="place" class="col-md-4 col-form-label text-md-right">Место проведения: </label>

                                <div class="col-md-6">
                                    <input id="place" type="text" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="place" value="{{ $action->place }}" required autofocus>

                                    @if ($errors->has('place'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cost" class="col-md-4 col-form-label text-md-right">Плата за вход: <br><span class="hint">(поставьте 0, если бесплатно)</span></label>

                                <div class="col-md-6">
                                    <input id="cost" type="text" class="form-control" name="cost" value="{{ $action->cost }}">

                                    @if ($errors->has('cost'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary mb-2">
                                        Обновить
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="/actions/{{$action->id}}">
                            @method('DELETE')
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Удалить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
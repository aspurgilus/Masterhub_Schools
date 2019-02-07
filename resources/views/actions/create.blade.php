@extends('layouts.app')

@section('title', 'Добавление мероприятия')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1>Добавить мероприятие</h1>
                    <div class="card-header">Заполните следующие поля</div>

                    <div class="card-body">

                        <form action="/actions" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Название: </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                    <input id="datetime" type="datetime-local" class="form-control{{ $errors->has('datetime') ? ' is-invalid' : '' }}" name="datetime" value="{{ old('datetime') }}" required autofocus>

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
                                    <input id="place" type="text" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="place" value="{{ old('place') }}" required autofocus>

                                    @if ($errors->has('place'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cost" class="col-md-4 col-form-label text-md-right">Плата за вход: <br><span class="hint">(оставьте 0, если бесплатно)</span></label>

                                <div class="col-md-6">
                                    <input id="cost" type="text" class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" name="cost" value='0'>

                                    @if ($errors->has('cost'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <select class="custom-select-lg" required>
                                    <option selected disabled>Выберите школу-организатор</option>
                                    @foreach($schools as $school)
                                        <option value="schoolname">{{$school->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Отправить
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
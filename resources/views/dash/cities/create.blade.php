@extends('layouts.app')
@inject('model','App\Models\City')

@section('title', 'cities')

@section('content_header')
create cities
@stop

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{!! Form::model($model, ['route' => 'cities.store']) !!}

    <div class="form-group">
      <label>name</label>
      {!! Form::text('name',null,['class' => 'form-control']) !!}
    </div>

    <select name="governorate_id" >
        @foreach($governorates as $id => $governorate)
                      <option value="{{ $id }}">
                          {{$governorate}}
                      </option>
        @endforeach
    </select>

    <div class="form-group">
      <button type="submit" class="btn btn-primary"> Submit </button>
    </div>

{!! Form::close() !!}

@stop

@section('css')
@stop

@section('js')
@stop

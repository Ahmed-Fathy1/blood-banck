@extends('layouts.app')
@inject('model','App\Models\Category')

@section('title', 'categories')

@section('content_header')
create categories
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

{!! Form::model($model, ['route' => 'categories.store']) !!}

    <div class="form-group">
      <label>name</label>
      {!! Form::text('name',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary"> Submit </button>
    </div>

{!! Form::close() !!}

@stop

@section('css')
@stop

@section('js')
@stop

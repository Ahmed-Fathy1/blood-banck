@extends('layouts.app')
@inject('model','App\Models\Post')

@section('title', 'posts')

@section('content_header')
create posts
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

{!! Form::model($model, ['route' => 'posts.store' , 'files' => 'true']) !!}

  <div class="form-group">
    <label>title</label>
    {!! Form::text('title',null,['class' => 'form-control' ]) !!}
  </div>

  <div class="form-group">
    <label>image</label>
    {!! Form::file('photo',null,['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    <label>content</label>
    {!! Form::textarea('content',null,['class' => 'form-control']) !!}
  </div>

  <select name="category_id" >
        @foreach($categories as $id => $category)
                      <option value="{{ $id }}">
                          {{$category}}
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

@extends('layouts.app')

@section('title', 'settings')

@section('content_header')
edit settings
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

@include('flash::message')
{!! Form::open( ['route' => ['settings.update', $model2->id], 'method' => 'put']) !!}

<div class="form-group">
    <label>Notification settings text</label>
    {!! Form::textarea('notification_setting_text',old('notification_setting_text'),[
      'class' => 'form-control'
    ]) !!}

  </div>

  <div class="form-group">
    <label>About us</label>
    {!! Form::textarea('about_app',old('about_app'),[
      'class' => 'form-control'
    ]) !!}

  </div>

  <div class="form-group">
    <label>phone</label>
    {!! Form::text('phone',old('phone'),[
      'class' => 'form-control'
    ]) !!}

  </div>

  <div class="form-group">
    <label>Email</label>
    {!! Form::text('email',old('email'),[
      'class' => 'form-control'
    ]) !!}

  </div>

  <div class="form-group">
    <label>Fb_link</label>
    {!! Form::text('facebook',old('facebook'),[
      'class' => 'form-control'
    ]) !!}

  </div>

  <div class="form-group">
    <label>Tw_link</label>
    {!! Form::text('twiter',old('twiter'),[
      'class' => 'form-control'
    ]) !!}

  </div>

  <div class="form-group">
    <label>Youtube_link</label>
    {!! Form::text('youtube',old('youtube'),[
      'class' => 'form-control'
    ]) !!}

  </div>

  <div class="form-group">
    <label>Whatsapp_link</label>
    {!! Form::text('whats_up',old('whats_up'),[
      'class' => 'form-control'
    ]) !!}

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

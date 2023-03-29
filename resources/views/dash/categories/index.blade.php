@extends('layouts.app')

@section('title', 'categories')

@section('content_header')
categories
@stop

@section('content')
<div class="card-body">

    <a href="{{url(route('categories.create'))}}" class="btn btn-primary">
       <i class="fa fa-plus"></i>
       New categories
    </a>
<br>
<br>
<br>
<br>
@include('flash::message')
@if(count($records))
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$record->name}}</td>
                    <td class="text-center">
                      <a href="{{url(route('categories.edit',$record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                    </td>
                      <td class="text-center">
                        {!! Form::open([
                            'route' => ['categories.destroy',$record->id],
                            'method' => 'delete'
                          ]) !!}
                          <button type="submit" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i>
                          </button>
                        {!! Form::close() !!}

                      </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-danger" role="alert">
    No Data
</div>
@endif

@stop

@section('css')
@stop

@section('js')
@stop

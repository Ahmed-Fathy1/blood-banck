@extends('layouts.app')

@section('title', 'cities')

@section('content_header')
list cities
@stop

@section('content')
<div class="card-body">

    <a href="{{url(route('cities.create'))}}" class="btn btn-primary">
       <i class="fa fa-plus"></i>
       New cities
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
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Governorate</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$record->name}}</td>
                    <td>{{$record->governorate->name}}</td>
                    <td class="text-center">
                        <a href="{{route('cities.edit',$record->id)}}" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                      </td>
                      <td class="text-center">
                        {!! Form::open([
                            'route' => ['cities.destroy',$record->id],
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


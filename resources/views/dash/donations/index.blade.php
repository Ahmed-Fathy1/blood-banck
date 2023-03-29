@extends('layouts.app')

@section('title', 'donations')

@section('content_header')
list donations
@stop

@section('content')
@include('flash::message')
@if(count($records))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Patient name</th>
                    <!-- <th class="text-center">Phone</th>
                    <th class="text-center">Patient age	</th> -->
                    <th class="text-center">Blood type</th>
                    <th class="text-center">Bags num</th>
                    <!-- <th class="text-center">Hospital name</th>
                    <th class="text-center">Hospital address</th>
                    <th class="text-center">Hospital name</th> -->
                    <th class="text-center">show</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($records as $record)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{$record->name}}</td>
                      <td class="text-center">{{$record->blood_type->name}}</td>
                      <td class="text-center">{{$record->bags_num}}</td>
                      <td class="text-center">
                        <a href="{{url(route('donations.show',$record->id))}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                      </td>
                          <td class="text-center">
                            {!! Form::open([
                                'route' => ['donations.destroy',$record->id],
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

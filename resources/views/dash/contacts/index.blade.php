@extends('layouts.app')

@section('title', 'contacts')

@section('content_header')
list contacts
@stop

@section('content')
<div class="card-body">
    @include('flash::message')
    @if(count($records))
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Subject</th>
                <th class="text-center">Message</th>
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($records as $record)
                <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td class="text-center">{{$record->name}}</td>
                  <td class="text-center">{{$record->email}}</td>
                  <td class="text-center">{{$record->phone}}</td>
                  <td class="text-center">{{$record->subject}}</td>
                  <td class="text-center">{{$record->message}}</td>
                      <td class="text-center">
                        {!! Form::open([
                            'route' => ['contacts.destroy',$record->id],
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

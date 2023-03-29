@extends('layouts.app')

@section('title', 'clients')

@section('content_header')
list clients
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
            <th class="text-center">Phone</th>
            <th class="text-center">Email</th>
            <th class="text-center">Active || Deactive</th>
            <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$record->name}}</td>
                    <td class="text-center">{{$record->phone}}</td>
                    <td class="text-center">{{$record->email}}</td>
                    <td class="text-center">
                       @if($record->is_activated)
                           <a href="{{url(route('clients.deactivate',$record->id))}}"
                              class="btn btn-danger btn-xs">إلغاء
                               التفعيل</a>
                       @else
                           <a href="{{url(route('clients.activate',$record->id))}}"
                              class="btn btn-success btn-xs">تفعيل</a>
                       @endif
                   </td>
                      <td class="text-center">
                        {!! Form::open([
                            'route' => ['clients.destroy',$record->id],
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


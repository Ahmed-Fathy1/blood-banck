@extends('layouts.app')

@section('title', 'posts')

@section('content_header')
list posts
@stop

@section('content')
<div class="card-body">

    <a href="{{url(route('posts.create'))}}" class="btn btn-primary">
       <i class="fa fa-plus"></i>
       New posts
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
                <th class="text-center">Title</th>
                <th class="text-center">Content</th>
                <th class="text-center">Image</th>
                <th class="text-center">Category</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center">{{$record->title}}</td>
                    <td class="text-center">{{$record->content}}</td>
                    <td class="text-center"><img src="{{asset('storage/'.$record->photo)}}" height="50px" width="50p"></td>
                    <td class="text-center">{{optional($record->category)->name}}</td>
                    <td class="text-center">
                      <a href="{{url(route('posts.edit',$record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                    </td>
                      <td class="text-center">
                        {!! Form::open([
                            'route' => ['posts.destroy',$record->id],
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

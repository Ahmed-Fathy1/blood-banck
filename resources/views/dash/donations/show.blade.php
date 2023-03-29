@extends('layouts.app')

@section('title', 'donations')

@section('content_header')
edit donations
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

<div class="card-body">
    @include('flash::message')
      <div class="table-responsive">
        <table class="table table-bordered">

          <tr>
            <th class="text-center" width="40%">Patient name</th>
            <td class="text-center">{{$model->name}}</td>
          </tr>

          <tr>
            <th class="text-center" >Phone</th>
            <td class="text-center">{{$model->phone}}</td>
          </tr>
          <tr>
            <th class="text-center">Patient age</th>
            <td class="text-center">{{$model->age}}</td>
          </tr>
          <tr>
            <th class="text-center">Blood type</th>
            <td class="text-center">{{$model->blood_type->name}}</td>
          </tr>
          <tr>
            <th class="text-center">Bags num</th>
            <td class="text-center">{{$model->bags_num}}</td>
          </tr>

          <tr>
            <th class="text-center">Hospital name</th>
            <td class="text-center">{{$model->hospital_name}}</td>
          </tr>

          <tr>
            <th class="text-center">Hospital address</th>
            <td class="text-center">{{$model->hospital_address}}</td>
          </tr>

          <tr>
            <th class="text-center">City</th>
            <td class="text-center"> {{ $model->city->name }} </td>
          </tr>

          {{-- <tr>
            <th class="text-center">Notes</th>
            <td class="text-center">{{$model->notes}}</td>
          </tr> --}}

          <tr>
            <th class="text-center">Donation's creator</th>
            <td class="text-center">{{$model->client->name}}</td>
          </tr>

        </table>

      </div>


  </div>
@stop

@section('css')
@stop

@section('js')
@stop



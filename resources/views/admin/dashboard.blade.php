
@extends('layouts.admin')

@section('content')
 <div class="container ">
    <h2>Welcome back , {{Auth::user()->name}}</h2>
    <span>I hope that you are will !</span>
 </div>
@endsection
@extends('todopackage::layouts.master')

@section('title')
{{ 'Dashboard' }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="alert alert-info">
        <span class="">Home Page</span>
        
    </div>
    <a href="{{ url('/todo/login') }}">Login</a>
</div>
@endsection
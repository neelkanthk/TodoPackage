@extends('todopackage::layouts.master')

@section('title')
{{ 'Home' }}
@endsection

@section('content')
<div class="container">
    <style>
        .content #title{
            font-size: 32px;
            text-align: center;
            text-decoration: underline;
        }
        .content #description{
            font-size: 32px;
            text-align: center;
        }
        .content #repo-link{
            font-size: 32px;
            margin-left: 40%;
        }
        .content #actions{
            margin-bottom: 50px;
            text-align: center;
            font-size: 24px;
        }
        #call-to-action{
            text-align: center;
        }
        #package-repo{
            float:left;
        }
        #blog-link{
            float:right;
        }
    </style>
    <div class="content">
        <div id="title">TodoPackage</div>
        <div id="description">A demo Task Manager app built over the</div>
        <span id="repo-link">
            <a href="https://github.com/neelkanthk/larapackboiler">LaraPackBoiler</a>
        </span>
        <hr>
        
        <div style="margin-bottom :50px;"></div>
        <div id="actions">
            <a href="{{ url('todo/login') }}">Go to app</a>

        </div>

        <div id="call-to-action">
            <a id="package-repo" href="https://github.com/neelkanthk/TodoPackage">Visit package repository</a>
            <a id="blog-link" href="https://cheerfulcoder.wordpress.com/">Cheerful Coder</a>
        </div>

    </div>
</div>
@endsection
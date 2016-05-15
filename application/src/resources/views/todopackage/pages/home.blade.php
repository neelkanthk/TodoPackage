@extends('todopackage::layouts.master')

@section('title')
{{ 'Home' }}
@endsection

@section('content')
<div class="container">
    <div class="content">
        <div id="title">TodoPackage</div>
        <div id="description">A demo "Task Manager" app built over the boilerplate</div>
        <span id="repo-link">
            <a href="https://github.com/neelkanthk/larapackboiler">LaraPackBoiler</a>
        </span>
        <hr>

        <div style="margin-bottom :50px;"></div>
        <div id="actions">
            <a href="{{ url('todo/login') }}">Go to app</a>

        </div>
        @if(isset($install) && $install == true)
        <div class="row">
            <div id="install-complete" class="col-lg-4 col-centered">
                <div class="alert alert-success">Todo Package installed Successfully.</div>
                <div class="alert alert-success">Todo Package Tables are created and seeded Successfully.</div>
            </div>
        </div>
        @endif
        <div id="call-to-action">
            <a id="package-repo" href="https://github.com/neelkanthk/">Github</a>
            <a id="blog-link" href="https://cheerfulcoder.wordpress.com/">Explore more @ Cheerful Coder</a>
        </div>

    </div>
</div>
@endsection
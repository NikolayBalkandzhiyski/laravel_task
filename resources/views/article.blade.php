@extends('layout.layout')

@section('content')

    <div class="panel panel-default">
        <div class="panel panel-heading">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <h4 class="text-left">{{ $article->name }}</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <h4 class="text-right">Date: {{ $article->created_at }}</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                    <h4 class="text-right">Date: {{ $article->adminName}}</h4>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {!!  nl2br($article->body) !!}
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-lg-offset-9">
                    <a href="{{ url('/articles') }}" class="btn btn-primary btn-block">
                        <span class="glyphicon glyphicon-step-backward"></span>
                        Back to articles
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
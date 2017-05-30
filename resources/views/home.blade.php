@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <a href="{{ url('article/' . $article->id) }}"><div class="panel-heading">{{$article->title}}</div></a>

                    <div class="panel-body">
                        {{$article->body}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

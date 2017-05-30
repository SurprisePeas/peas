@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        文章管理
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert-danger">
                            {!! implode('<br>',$errors->all()) !!}
                        </div>
                    @endif
                    <div class="panel-body">

                        <a href="{{ url('admin/article/create') }}" class="btn btn-lg btn-primary">新增文章</a>

                        @foreach($articles as $article)
                            <hr>
                            <div class="article">
                                <h4>{{ $article->title }}</h4>
                                <div class="content">
                                    <p>{{ $article->body }}</p>
                                </div>
                                <div>
                                    <p>发布时间: {{ $article->created_at }} </p>
                                    <p>修改时间: {{ $article->updated_at }} </p>
                                </div>
                            </div>
                            <a href="{{ url('admin/article/' . $article->id . '/edit') }}" class="btn btn-success">编辑</a>
                            <form action="{{ url('admin/article/' . $article->id) }}" method="POST" style="display:inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
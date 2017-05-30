@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        修改 {{ $article->title }} 文章
                    </div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert-danger">
                                <strong>修改失败</strong>
                                {!! implode('<br>',$errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/article/' . $article->id) }}" method="POST">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <input type="text" name="title" class="form-control" requeired="required" placeholder="标题" value="{{ $article->title }}">
                            <br>
                            <textarea name="body" class="form-control" cols="30" rows="10" requeired="required" placeholder="请输入内容">{{ $article->body }}</textarea>
                            <br>
                            <button type="submit" class="btn btn-info btn-lg">确认修改</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
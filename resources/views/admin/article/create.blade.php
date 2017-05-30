@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        新增文章
                    </div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert-danger">
                                <strong>新增失败</strong>
                                {!! implode('<br>',$errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/article') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="text" name="title" class="form-control" requeired="required" placeholder="标题">
                            <br>
                            <textarea name="body" class="form-control" cols="30" rows="10" requeired="required" placeholder="请输入内容"></textarea>
                            <br>
                            <button type="submit" class="btn btn-info btn-lg">新增文章</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
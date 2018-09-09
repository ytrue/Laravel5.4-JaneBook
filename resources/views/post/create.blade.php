@section('title', 'create')
@extends('common.layout')
@section('body')
    <div class="container">

        <div class="blog-header">
        </div>

        <div class="row">
            <div class="col-sm-8 blog-main">
                <form action="/posts" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>标题</label>
                        <input name="title" type="text" class="form-control" placeholder="这里是标题">
                    </div>
                    <div class="form-group">
                        <label>内容</label>

                        <textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%; " rows="10"></textarea>
                    </div>
                    @include('common.error')
                    <button type="submit" class="btn btn-default">提交</button>

                </form>
                <br>
            </div><!-- /.blog-main -->
            @include('common.right')
        </div>    </div><!-- /.row -->
    </div><!-- /.container -->
@endsection
@section('custom')
    <script>
        UE.getEditor('content',{initialFrameWidth:620,initialFrameHeight:400,});
    </script>
@endsection




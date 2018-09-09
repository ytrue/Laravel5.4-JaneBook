@section('title', 'shwo')
@extends('common.layout')
@section('body')
    <div class="container">

        <div class="blog-header">
        </div>

        <div class="row">
            <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <div style="display:inline-flex">
                        <h2 class="blog-post-title">{{$post->title}}</h2>
                        @if (\Auth::user()->can('update', $post))
                        <a style="margin: auto"  href="/posts/{{$post->id}}/edit">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        @endif
                        @if (\Auth::user()->can('update', $post))
                        <a style="margin: auto"  href="/posts/{{$post->id}}}/delete" >
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                        @endif
                    </div>

                    <p class="blog-post-meta">{{$post->created_at}}<a href="/user/{{$post->user->id}}}">&nbsp&nbsp{{$post->user->name}}</a></p>

                    {!! $post->content !!}
                    <div>
                        @if($post->zan(\Auth::id())->exists())
                            <a href="/posts/{{$post->id}}/unzan" type="button" class="btn btn-default btn-lg">取消赞</a>
                        @else
                            <a href="/posts/{{$post->id}}/zan" type="button" class="btn btn-primary btn-lg">赞</a>
                        @endif
                    </div>
                </div>

                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">评论</div>

                    <!-- List group -->
                    @foreach($post->comments as $key=>$value)
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h5>{{$value->created_at}} {{$value->user->name}}</h5>
                            <div>
                                 {{$value->content}}
                            </div>
                        </li>
                    </ul>
                    @endforeach


                </div>

                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">发表评论</div>

                    <!-- List group -->
                    <ul class="list-group">
                        <form action="/posts/comment" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="post_id" value="{{$post->id}}"/>
                            <li class="list-group-item">
                                <textarea name="content" class="form-control" rows="10"></textarea>
                                <button class="btn btn-default" type="submit">提交</button>
                            </li>
                        </form>

                    </ul>
                </div>

            </div><!-- /.blog-main -->
            @include('common.right')
        </div>    </div><!-- /.row -->
    </div><!-- /.container -->

@endsection




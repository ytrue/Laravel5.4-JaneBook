<style>
    #footer{
        margin-top: 160px;
    }
</style>
@section('title', 'create')
@extends('common.layout')
@section('body')
    <div class="container">

        <div class="blog-header">
        </div>

        <div class="row">

            <div class="col-sm-8">
                <blockquote>
                    <p><img src="/storage/9f0b0809fd136c389c20f949baae3957/iBkvipBCiX6cHitZSdTaXydpen5PBiul7yYCc88O.jpeg" alt="" class="img-rounded" style="border-radius:500px; height: 40px">{{$user->name}}
                    </p>


                    <footer>关注：{{$user->stars_count}}｜粉丝：{{$user->fans_count}}｜文章：{{$user->posts_count}} </footer>
                    <br>
                    @include('user.badges.like',['target_user'=>$user])

                </blockquote>

            </div>
            <div class="col-sm-8 blog-main">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
                        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">

                            @foreach($posts as $post)
                            <div class="blog-post" style="margin-top: 30px">
                                <p class=""><a href="/user/{{$user->id}}">{{$user->name}}</a> {{$post->created_at}}</p>
                                <p class=""><a href="/posts/{{$post->id}}" >{{$post->title}}</a></p>


                                <p>{!! str_limit($post->content,100,'...') !!}
                            </div>
                                @endforeach

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">

                            @foreach($susers as $user)
                            <div class="blog-post" style="margin-top: 30px">
                                <p class="">{{$user->name}}</p>
                                <p class="">关注：{{$user->stars_count}} | 粉丝：{{$user->fans_count}}｜ 文章：{{$user->posts_count}}</p>

                                @include('user.badges.like',['target_user'=>$user])

                            </div>
                            @endforeach



                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            @foreach($fusers as $user)
                                <div class="blog-post" style="margin-top: 30px">
                                    <p class="">{{$user->name}}}</p>
                                    <p class="">关注：{{$user->stars_count}}} | 粉丝：{{$user->fans_count}}}｜ 文章：{{$user->posts_count}}}</p>

                                    @include('user.badges.like',['target_user'=>$user])

                                </div>
                            @endforeach
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>


            </div><!-- /.blog-main -->



            <div id="sidebar" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">


                <aside id="widget-welcome" class="widget panel panel-default">
                    <div class="panel-heading">
                        欢迎！
                    </div>
                    <div class="panel-body">
                        <p>
                            欢迎来到简书网站
                        </p>
                        <p>
                            <strong><a href="/">简书网站</a></strong> 基于 Laravel5.4 构建
                        </p>
                        <div class="bdsharebuttonbox bdshare-button-style0-24" data-bd-bind="1494580268777"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_bdhome" data-cmd="bdhome" title="分享到百度新首页"></a></div>
                        <script>window._bd_share_config={"common":{"bdSnsKey":{"tsina":"120473611"},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["tsina","renren","douban","weixin","qzone","tqq","bdhome"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","renren","douban","weixin","qzone","tqq","bdhome"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                    </div>
                </aside>
                <aside id="widget-categories" class="widget panel panel-default">
                    <div class="panel-heading">
                        专题
                    </div>

                    <ul class="category-root list-group">
                        <li class="list-group-item">
                            <a href="/topic/1">旅游
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/topic/2">轻松
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/topic/5">测试专题
                            </a>
                        </li>
                    </ul>

                </aside>
            </div>
        </div>    </div><!-- /.row -->
    </div><!-- /.container -->
@endsection




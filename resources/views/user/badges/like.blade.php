@if($target_user->id != \Auth::id())
    <div>
        @if($target_user->hasFan(\Auth::id()))
            <a class="btn btn-default like-button"  href="/user/{{$target_user->id}}/unfan" _token="{{csrf_token()}}" >取消关注</a>
        @else
            <a class="btn btn-default like-button" href="/user/{{$target_user->id}}/fan"  _token="{{csrf_token()}}">关注</a>
        @endif
    </div>
@endif


<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo text-center">
        <a href="@if(Auth::check()){{ route('home') }}@endif" class="simple-text logo-normal">
            知識箱
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if(Auth::check())
                <li class="@if($firstLevel == 'information') active @endif">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-info-circle"></i>
                        <p>お知らせ</p>
                    </a>
                </li>
                <li class="@if($firstLevel == 'mypage') active @endif">
                    <a href="{{ route('member.detail', ['user_id' => 1]) }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>My知識箱</p>
                    </a>
                </li>
                <li class="@if($firstLevel == 'member') active @endif">
                    <a href="{{ route('member.member') }}">
                        <i class="fas fa-box-open"></i>
                        <p>みんなの知識箱</p>
                    </a>
                </li>
            @else
                <li class="@if($firstLevel == 'login') active @endif">
                    <a href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i>
                        <p>ログイン</p>
                    </a>
                </li>
                <li class="@if($firstLevel == 'register') active @endif">
                    <a href="{{ route('register') }}">
                        <i class="far fa-user"></i>
                        <p>ユーザ登録</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
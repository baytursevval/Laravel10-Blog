<?php
use Illuminate\Support\Facades\Auth;
$datalist = DB::table('categories')->get();
?>

<header class="tech-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('assets')}}/images/version/tech-logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                        <a href="{{route('category')}}" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">Kategoriler</a>
                        <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                            <li>
                                <div class="container">
                                    <div class="mega-menu-content clearfix">
                                        <div class="tab">
                                            @foreach ($datalist as $item)
                                                <button class="tablinks active" onclick="openCategory(event, 'cat01')">{{$item->title}}</button>

                @endforeach

            </div>


                                    </div><!-- end mega-menu-content -->
                                </div>
                            </li>
                        </ul>
                    </li>
                    @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog_add') }}">Yeni Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog') }}">Yazılarım</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mycomments')}}">Yorumlarım</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('blogsearch')}}" method="post">
                            @csrf
                            <input type="text" name="search" style="width: 200px" placeholder="Bloglarda Arayın...">
                            <button type="submit"><i class="btn btn-primary">ARA </i></button>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav mr-2">
                    <li class="nav-item">
                        <a class="nav-link" href="tech-contact.html">
                            @guest()
                            <a href="{{route('login')}}">Giriş Yap</a>
                            @endguest
                            @auth()
                                    {{Auth::user()->name}}<a href="{{route('logout')}}">Çıkış</a>
                             @endauth

                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->

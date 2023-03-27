<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Tech Blog - Stylish Magazine Blog Template</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{asset('assets')}}/images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="{{asset('assets')}}/css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="{{asset('assets')}}/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{asset('assets')}}/style.css" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="{{asset('assets')}}/css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="{{asset('assets')}}/css/colors.css" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="{{asset('assets')}}/css/version/tech.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<div id="wrapper">
    @include('home._header')

    <section class="section single-wrapper">
        <div class="custombox clearfix">

            <div class="row">
                <div class="col-lg-3">
                </div>

                <div class="col-lg-6" style="border: solid; padding: 40px">
                    <h4 class="small-title">Üye Ol</h4>
                    <form action="{{route('signupcheck')}}" method="post"  class="form-wrapper">
                        @csrf
                        <input type="text" class="form-control" name="name" placeholder="Your name">
                        <input type="email" class="form-control"name="email" placeholder="Email address">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <input type="text" class="form-control" name="company" placeholder="Company">

                        <button type="submit" class="btn btn-primary">Üye Ol</button>
                        <p class="form-control">Hesabın var mı?
                            <a href="{{route('login')}}">Giriş Yap</a></p>
                    </form>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
        </div>
    </section>
@include('home._footer')
@show

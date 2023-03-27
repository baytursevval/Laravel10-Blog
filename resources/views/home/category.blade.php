
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
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area text-center">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="breadcrumb-item active">Categories</li>
                            </ol>

                            <span class="color-orange"><a href="tech-category-01.html" title="">Technology</a></span>

                            <h3>Categories</h3>

                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img src="upload/tech_menu_08.jpg" alt="" class="img-fluid">
                        </div><!-- end media -->

                        <div class="blog-content">

                            <div class="card-body">
                                <h4 class="card-title">Kategoriler </h4>
                                @auth
                                @endauth
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tür</th>
                                            <th>Düzenleme</th>
                                            <th>Silme</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        @foreach($datalist as $rs)
                                            <tr>
                                                <td>{{$rs->id}}</td>
                                                <td>{{$rs->title}}</td>

                                                <td><a href="{{route('category_edit', ['id'=>$rs->id])}}">Edit</a></td>
                                                <td><a href="{{route('category_delete', ['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')">Delete</a></td>
                                            </tr>
                                    @endforeach
                                </div>

                                <div class="col-lg-12">

                                </div>



                            </div>

                        </div><!-- end content -->

                        <div class="blog-title-area">
                            <div class="tag-cloud-single">
                                <span>Tags</span>
                                <small><a href="#" title="">lifestyle</a></small>
                                <small><a href="#" title="">colorful</a></small>
                                <small><a href="#" title="">trending</a></small>
                                <small><a href="#" title="">another tag</a></small>
                            </div><!-- end meta -->


                        </div><!-- end title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis1">


                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">

                </div><!-- end col -->
            </div><!-- end row -->

        </div><!-- end container -->
    </section>
@include('home._footer')
@show

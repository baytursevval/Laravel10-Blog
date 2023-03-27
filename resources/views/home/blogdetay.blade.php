<?php
use Illuminate\Support\Facades\Auth;
$datalist = DB::table('categories')->get();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Blog</title>
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
<link href="style.css" rel="stylesheet">

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
                        <div class="blog-title-area text-center"><br><br>


                            <span class="color-orange"><a href="tech-category-01.html" title="">Technology</a></span>

                            <h3>{{$data_blog->title}}</h3>

                            <div class="blog-meta big-meta">
                                <small><a href="tech-single.html" title="">21 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">by Jessica</a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                            </div><!-- end meta -->
                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img src="{{asset('')}}storage/{{$data_blog->image}}" alt="" class="img-fluid"><br><br>
                        </div><!-- end media -->

                        <div class="blog-content">
                            <div class="pp">
                                <p> {{$data_blog->detail}} </p>
                            </div><!-- end pp -->
                        </div><!-- end content -->
                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">Yazar Hakkında</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img src="{{asset('assets')}}/upload/author.jpg" alt="" class="img-fluid rounded-circle">
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a href="#">Jessica</a></h4>
                                    <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->
                        <hr class="invis1">
                        <div class="custombox clearfix">
                            <h4 class="small-title">Yorumlar</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="comments-list">
                                        @foreach($datalist_comment as $rs)
                                        <div class="media">
                                            <a class="media-left" href="#">
                                                <img src="{{asset('assets')}}/upload/author.jpg" alt="" class="rounded-circle" width="100">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading user_name">{{$rs->user_id}}<small>{{$rs->created_at}}</small></h4>
                                                <p>{{$rs->comment}} </p>

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">
@auth
                        <div class="custombox clearfix">
                            <h4 class="small-title">Yorum Yap</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('add_comment',['blog_id'=>$data_blog->id])}}" method="post"  class="form-wrapper">
                                       @csrf
                                        <!--<input type="text" class="form-control" name="name" placeholder="Your name">
                                        <input type="text" class="form-control"name="email" placeholder="Email address">
-->
                                        <textarea class="form-control" name="comment" placeholder="Your comment"></textarea><br>
                                        <button type="submit" class="btn btn-primary">Submit Comment</button><br><br>

                                    </form>
                                </div>
                            </div>
                        </div>
                        @endauth

                        @guest
                            Yorum yapmak için Giriş Yapınız<br><br>
                        @endguest
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">

                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="widget">
                        <div class="footer-text text-left">
                            <a href="index.html"><img src="{{asset('assets')}}/images/version/tech-footer-logo.png" alt="" class="img-fluid"></a>
                            <p>Tech Blog is a technology blog, we sharing marketing, news and gadget articles.</p>
                            <div class="social">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            </div>

                            <hr class="invis">

                            <div class="newsletter-widget text-left">
                                <form class="form-inline">
                                    <input type="text" class="form-control" placeholder="Enter your email address">
                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                                </form>
                            </div><!-- end newsletter -->
                        </div><!-- end footer-text -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular Categories</h2>
                        <div class="link-widget">
                            <ul>
                                <li><a href="#">Marketing <span>(21)</span></a></li>
                                <li><a href="#">SEO Service <span>(15)</span></a></li>
                                <li><a href="#">Digital Agency <span>(31)</span></a></li>
                                <li><a href="#">Make Money <span>(22)</span></a></li>
                                <li><a href="#">Blogging <span>(66)</span></a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Copyrights</h2>
                        <div class="link-widget">
                            <ul>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Advertising</a></li>
                                <li><a href="#">Write for us</a></li>
                                <li><a href="#">Trademark</a></li>
                                <li><a href="#">License & Help</a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <br>
                    <div class="copyright">&copy; Tech Blog. Design: <a href="http://html.design">HTML Design</a>.</div>
                </div>
            </div>
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="{{asset('assets')}}/js/jquery.min.js"></script>
<script src="{{asset('assets')}}/js/tether.min.js"></script>
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/js/custom.js"></script>

</body>
</html>

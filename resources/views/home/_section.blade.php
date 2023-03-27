
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
$datalist_slider = DB::table('blogs')->limit(5)->paginate(5);
$datalist_category=DB::table('categories')->get();
foreach ($datalist_category as $rs)
    if ($rs->id == $datalist_slider[1]->category_id)
        $cname=$rs->title;

?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->
                    @foreach($datalist_slider as $rs)
                        <?php
                        foreach ($datalist_category as $category)
                            if ($category->id == $rs->category_id)
                                $cname=$category->title;
                        ?>
                    <div class="blog-list clearfix">
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{route('blogdetay',['blog_id'=>$rs->id])}}" title="">
                                        <img src="{{asset('')}}storage/{{$rs->image}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->


                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{route('blogdetay',['blog_id'=>$rs->id])}}" title="">{{$rs->title}}</a></h4>
                                <p></p>
                                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">{{$cname}}</a></small>
                                <small><a href="#" title="">{{$rs->created_at}}</a></small>
                                <small><a href="#" title="">by Matilda</a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> 1114</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                        @endforeach
                        <br><br>
                        {!! $datalist_slider->links() !!}


                        </div><!-- end blog-box -->
                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">


            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">




                    <div class="widget">

                                </a>
                            </div>
                        </div>
                    </div><!-- end widget -->


                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

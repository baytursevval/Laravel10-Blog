<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
$datalist_slider = DB::table('blogs')->get();
$datalist_category=DB::table('categories')->get();
foreach ($datalist_category as $rs)
    if ($rs->id == $datalist_slider[1]->category_id)
        $cname=$rs->title;
?>

<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <div class="first-slot">
                <div class="masonry-box post-media">
                    <?php
                    foreach ($datalist_category as $rs)
                        if ($rs->id == $datalist_slider[0]->category_id)
                            $cname=$rs->title;
                    ?>
                   <img src="{{asset('')}}storage/{{$datalist_slider[0]->image}}" alt="" class="img-fluid" style="height:300px; width:700px">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html" title="">{{$cname}}</a></span>
                                <h4><a href="{{route('blogdetay',['blog_id'=>$datalist_slider[0]->id])}}" title="">{{$datalist_slider[0]->title}}</a></h4>
                                <small><a href="tech-single.html" title="">{{$datalist_slider[0]->created_at}}</a></small>
                                <small><a href="tech-author.html" title="">by Amanda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->

            <div class="second-slot">
                <div class="masonry-box post-media">
                    <?php
                    foreach ($datalist_category as $rs)
                        if ($rs->id == $datalist_slider[1]->category_id)
                            $cname=$rs->title;
                    ?>
                    <img src="{{asset('')}}storage/{{$datalist_slider[1]->image}}" alt="" class="img-fluid" style="height: 300px; width: 400px">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html" title="">{{$cname}}</a></span>
                                <h4><a href="{{route('blogdetay',['blog_id'=>$datalist_slider[1]->id])}}" title="">{{$datalist_slider[1]->title}}</a></h4>
                                <small><a href="tech-single.html" title="">{{$datalist_slider[1]->created_at}}</a></small>
                                <small><a href="tech-author.html" title="">by Jessica</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->

            <div class="last-slot" >
                <div class="masonry-box post-media">
                    <?php
                    foreach ($datalist_category as $rs)
                        if ($rs->id == $datalist_slider[2]->category_id)
                            $cname=$rs->title;
                    ?>
                    <img src="{{asset('')}}storage/{{$datalist_slider[2]->image}}" alt="" class="img-fluid" style="height: 300px; width: 400px">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html" title="">{{$cname}}</a></span>
                                <h4><a href="{{route('blogdetay',['blog_id'=>$datalist_slider[2]->id])}}" title="">{{$datalist_slider[2]->title}}</a></h4>
                                <small><a href="tech-single.html" title="">{{$datalist_slider[2]->created_at}}</a></small>
                                <small><a href="tech-author.html" title="">by Jessica</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->
        </div><!-- end masonry -->
    </div>
</section>

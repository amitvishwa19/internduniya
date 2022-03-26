@extends('client.layout.layout')

@section('title','News')


@section('style')
@endsection


@section('content')

<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('public/client/images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Blog</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
                <div class="row">
                <div class="col-lg-9 column">
                    <div class="bloglist-sec">

                        <div class="blogpost">
                            <div class="blog-posthumb"> <a href="{{route('app.blog',['slug'=>'slug'])}}" title=""><img src="{{asset('public/client/images/resource/blog1.jpg')}}" alt="" /></a> </div>
                            <div class="blog-postdetail">
                                <ul class="post-metas"><li><a href="#" title=""><i class="la la-calendar-o"></i>November 23, 2017</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>4 comments</a></li></ul>
                                <h3><a href="{{route('app.blog',['slug'=>'slug'])}}" title="">11 Tips to Help You Get New Clients Through Cold Calling</a></h3>
                                <p>Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.</p>
                                <a class="bbutton" href="{{route('app.blog',['slug'=>'slug'])}}" title="">Read More</a>
                            </div>
                        </div><!-- Blog Post -->

                        <div class="blogpost">
                            <div class="blog-posthumb"> <a href="#" title=""><img src="{{asset('public/client/images/resource/blog1.jpg')}}" alt="" /></a> </div>
                            <div class="blog-postdetail">
                                <ul class="post-metas"><li><a href="#" title=""><i class="la la-calendar-o"></i>November 23, 2017</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>4 comments</a></li></ul>
                                <h3><a href="#" title="">New York is Leading</a></h3>
                                <p>Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.</p>
                                <a class="bbutton" href="#" title="">Read More</a>
                            </div>
                        </div><!-- Blog Post -->

                        <div class="blogpost">
                            <div class="blog-posthumb"> <a href="#" title=""><img src="{{asset('public/client/images/resource/blog1.jpg')}}" alt="" /></a> </div>
                            <div class="blog-postdetail">
                                <ul class="post-metas"><li><a href="#" title=""><i class="la la-calendar-o"></i>November 23, 2017</a></li><li><a class="metascomment" href="#" title=""><i class="la la-comments"></i>4 comments</a></li></ul>
                                <h3><a href="#" title="">The Best (and Worst) Canadian Merchant Account Providers</a></h3>
                                <p>Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.</p>
                                <a class="bbutton" href="#" title="">Read More</a>
                            </div>
                        </div><!-- Blog Post -->

                        <div class="pagination">
                            <ul>
                                <li class="prev"><a href="#"><i class="la la-long-arrow-left"></i> Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><span class="delimeter">...</span></li>
                                <li><a href="#">14</a></li>
                                <li class="next"><a href="#">Next <i class="la la-long-arrow-right"></i></a></li>
                            </ul>
                        </div><!-- Pagination -->
                    </div>
                </div>
                <aside class="col-lg-3 column">
                    <div class="widget">
                        <div class="search_widget_job no-margin">
                            <div class="field_w_search">
                                <input placeholder="Search Keywords" type="text">
                                <i class="la la-search"></i>
                            </div><!-- Search Widget -->
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Categories</h3>
                        <div class="sidebar-links">
                            <a href="#" title=""><i class="la la-angle-right"></i>Education</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>Information</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>Jobs</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>Learn</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>Skill</a>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Recent Posts</h3>
                        <div class="post_widget">
                            <div class="mini-blog">
                                <span><a href="#" title=""><img src="images/resource/mb1.jpg" alt="" /></a></span>
                                <div class="mb-info">
                                    <h3><a href="#" title="">Canada adds 12,500 jobs in modest July rebound</a></h3>
                                    <span>October 25, 2017</span>
                                </div>
                            </div>
                            <div class="mini-blog">
                                <span><a href="#" title=""><img src="images/resource/mb2.jpg" alt="" /></a></span>
                                <div class="mb-info">
                                    <h3><a href="#" title="">How to “Woo” a Recruiter and Land Your Dream Job</a></h3>
                                    <span>October 25, 2017</span>
                                </div>
                            </div>
                            <div class="mini-blog">
                                <span><a href="#" title=""><img src="images/resource/mb3.jpg" alt="" /></a></span>
                                <div class="mb-info">
                                    <h3><a href="#" title="">Hey Job Seeker, It’s Time To Get Up And Get Hired</a></h3>
                                    <span>October 25, 2017</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Archives</h3>
                        <div class="sidebar-links">
                            <a href="#" title=""><i class="la la-angle-right"></i>April 2017</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>March 2016</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>February 2015</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>July 2013</a>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Meta</h3>
                        <div class="sidebar-links">
                            <a href="#" title=""><i class="la la-angle-right"></i>Log in</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>Entries RSS</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>Comments RSS</a>
                            <a href="#" title=""><i class="la la-angle-right"></i>WordPress.org</a>
                        </div>
                    </div>
                    <div class="widget">
                        <h3>Tags</h3>
                        <div class="tags_widget">
                            <a href="#" title="">Adwords</a>
                            <a href="#" title="">Sales</a>
                            <a href="#" title="">Travel</a>
                            <a href="#" title="">Our Blog</a>
                            <a href="#" title="">Trade</a>
                            <a href="#" title="">Traffic</a>
                        </div>
                    </div>
                </aside>
                </div>
        </div>
    </div>
</section>


@endsection



@section('modal')
@endsection


@section('javascript')


  	<script>
  		$(function(){
         'use strict'





      });
  	</script>

@endsection
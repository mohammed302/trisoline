@extends('front.app')
@section('title', '| الأخبار  ')
@section('content')
   <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">الاخبار</h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('front.index')}}">الصفحة الرئيسية</a></li>
                            <li>الاخبار</li>
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 

 <!-- Blog posts -->
    <section class="flat-row blog-list">
        <div class="container">
            <div class="row">
          
                <div class="col-lg-12">
                    <div class="post-wrap post-list">
                        @foreach($news as $new)
                        <article class="entry border-shadow clearfix effect-animation"  data-animation="fadeInUp" data-animation-delay="0.2s" data-animation-offset="75%">
                            <div class="entry-border clearfix">
                                <div class="featured-post ">
                                    <a href="{{route('front.news.details',$new->id)}}"> 
                                        <img src="{{asset('img/thumbnail/'.$new->img)}}" alt="image" class="img-responsive" style=""></a>
                                </div><!-- /.feature-post -->
                                <div class="content-post">
                                  
                                    <h2 class="title-post"><a href="{{route('front.news.details',$new->id)}}">{{$new->title}}</a></h2>
                                    <div class="contentp">
                                        <p><?=$new->description?></p>
                                    </div>
                                    <a href="{{route('front.news.details',$new->id)}}" class="readmore">إقرأ المزيد</a>
                                </div><!-- /.contetn-post -->
                            </div><!-- /.entry-border -->
                        </article>
                    @endforeach
                    </div>  
                    <div class="blog-pagination clearfix">
                        <div class="text-center">  {{$news->links()}}</div>


                    </div><!-- /.blog-pagination --> 
                </div>
            </div><!-- /.row -->           
        </div><!-- /.container -->   
    </section>   

    @endsection
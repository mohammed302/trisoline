@extends('front.app')
@section('title', '| أعمالنا  ')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">
                             @if($t==1)
                            @if($id==1 || $id==2)
                              منتجاتنا
                                @elseif($id==3)
                              أعمالنا
                              @else
                              الجميع
                                @endif
                        @else
                             اعمالنا
                               @endif</h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('front.index')}}">الصفحة الرئيسية</a></li>
                            <li>
                                    @if($t==1)
                                @if($id==1 || $id==2)
                              منتجاتنا
                                @elseif($id==3)
                              أعمالنا
                              @else
                              الجميع
                                @endif
                                @else
                           اعمالنا
                               @endif</a>
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 

    <!-- Blog posts -->
    <section class="flat-row section-project-dynamic">
        <div class="container">
            <div class="post-wrap project-dynamic clearfix">
                <ul id="data-effect" class="data-effect clearfix">
                    <?php $i=1;?>
                    @foreach($works as $work )
                
                    <li >
                        <article class="entry clearfix">
                            <div class="entry-border clearfix">
                                <div class="featured-post">
                                       <?php $temp  = explode('|',$work->img );?>
                                    <img src="{{asset('img/'.$temp[0])}}" alt="image" style="
    height: 200px;    width: 100%;
">
                                </div><!-- /.feature-post -->
                                <div class="content-post effecthover">
                                    <div class="wrap-table">
                                        <div class="flat-tabcell">
                                            <span class="category">
                </span>
                                            <h2 class="title-post"><a @if($t==1)  
                                                
                                                href="{{route('front.work.details',$work->id)}}"
                                                @else
                                                 href="{{route('front.product.details',$work->id)}}"
                                                @endif"> {{$work->title}}   <br> 
                                                    @if($work->branch==1)
                  السعودية
                  @elseif($work->branch==2)
                  الصين
                  @else
                  تركيا
                  @endif
                   </a></h2>
                                          
                                            <a
                                                  @if($t==1)  
                                                
                                                href="{{route('front.work.details',$work->id)}}"
                                                @else
                                                 href="{{route('front.product.details',$work->id)}}"
                                                @endif
                                                class="readmore"> تفاصيل</a>
                                        </div>
                                    </div>
                                </div><!-- /.contetn-post -->
                            </div><!-- /.entry-border -->
                        </article>
                    </li>
                    <?php $i++;?>
                    @endforeach
                    @if($all==1)
              <?php $i=1;?>
                    @foreach($products as $work )
                
                    <li >
                        <article class="entry clearfix">
                            <div class="entry-border clearfix">
                                <div class="featured-post">
                                       <?php $temp  = explode('|',$work->img );?>
                                    <img src="{{asset('img/'.$temp[0])}}" alt="image" style="
    height: 200px;    width: 100%;
">
                                </div><!-- /.feature-post -->
                                <div class="content-post effecthover">
                                    <div class="wrap-table">
                                        <div class="flat-tabcell">
                                            <span class="category">
                </span>
                                            <h2 class="title-post"><a 
                                                
                                             
                                            
                                                 href="{{route('front.product.details',$work->id)}}"
                                            "> {{$work->title}}  <br>  @if($work->branch==1)
                  السعودية
                  @elseif($work->branch==2)
                  الصين
                  @else
                  تركيا
                  @endif  </a></h2>
                                          
                                            <a
                                                 
                                                 href="{{route('front.product.details',$work->id)}}"
                                            
                                                class="readmore"> تفاصيل</a>
                                        </div>
                                    </div>
                                </div><!-- /.contetn-post -->
                            </div><!-- /.entry-border -->
                        </article>
                    </li>
                    <?php $i++;?>
                    @endforeach
                 @endif
               
                </ul>
                <div class="blog-pagination clearfix">
                @if($all!=1) <div class="text-center">  {{$works->links()}}</div>@endif
            </div>       
            </div>
        </div><!-- /.container -->   
    </section>   
    @endsection
    @section('js')
      <script src="{{asset('style/web/javascript/jquery.hoverdir.js')}}"></script>
    @endsection
@extends('front_en.app')
@section('title', '|    product ')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">
                            
                       product 
                              
                     </h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home </a></li>
                            <li>
                                        product 
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
                    @foreach($products as $product )
                
                    <li >
                        <article class="entry clearfix">
                            <div class="entry-border clearfix">
                                <div class="featured-post">
                                       <?php $temp  = explode('|',$product->img );?>
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
                                                
                                                href="{{route('fronten.cproduct.details',$product->id)}}"
                                             > {{$product->title_e}}   <br>  
                   </a></h2>
                                          
                                            <a
                                                
                                                
                                                href="{{route('fronten.cproduct.details',$product->id)}}"
                                             
                                                class="readmore"> read more</a>
                                        </div>
                                    </div>
                                </div><!-- /.contetn-post -->
                            </div><!-- /.entry-border -->
                        </article>
                    </li>
                    <?php $i++;?>
                    @endforeach
           
               
                </ul>
                <div class="blog-pagination clearfix">
               <div class="text-center">  {{$products->links()}}</div>
            </div>       
            </div>
        </div><!-- /.container -->   
    </section>   
    @endsection
    @section('js')
      <script src="{{asset('style/web/javascript/jquery.hoverdir.js')}}"></script>
    @endsection
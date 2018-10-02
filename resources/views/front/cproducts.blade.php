@extends('front.app')
@section('title', '|      منتجات   ')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">
                            
                           منتجات 
                              
                     </h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('front.index')}}">الصفحة الرئيسية</a></li>
                            <li>
                                       منتجات 
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 
<div class="container">
        <form id="order" class="contactform style4 clearfix" 
                               method="post" action="{{route('front.cproduct.search')}}" >
                                {{ csrf_field() }}
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                     
                    <input type="text" name='search' id="search" class="form-control"  placeholder="بحث" >
                       <select class="form-control" name="br" id="br" style="
    border-right: 0;
    box-shadow: 0 0 0;
    border-color: #ccc;
    height: 40px;
">
                                 <option value="-1">الكل</option>
                                <option value="1">السعودية</option>
                                <option value="2">الصين</option>
                                <option value="3">تركيا</option>
                            </select>
                    <span class="input-group-addon" style="
    padding: 0;
">
                             
                        <button type="submit">
                          <i class="fa fa-search"></i>
                        </button>  
                    </span>
                    
                </div>
                   
            </div>
        </div>
	</div>
                                  <div id="wait" 
                                 style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;">
                                <img src='{{asset('img/ajax-loader.gif')}}' width="64" height="64" /><br>..</div>   
                                   </form>
</div>
    <!-- Blog posts -->
    <section class="flat-row section-project-dynamic cpr" id="result">
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
                                                
                                                href="{{route('front.cproduct.details',$product->id)}}"
                                             > {{$product->title}}   <br>  
                                                    @if($product->branch==1)
                  السعودية
                  @elseif($product->branch==2)
                  الصين
                  @else
                  تركيا
                  @endif
                   </a></h2>
                                          
                                            <a
                                                
                                                
                                                href="{{route('front.cproduct.details',$product->id)}}"
                                             
                                                class="readmore"> تفاصيل</a>
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
      <script>
            $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
      $('#order').submit(function(e)
{   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
    e.preventDefault();
    $.ajax({
        url: $(this).attr('action'),
        type: 'get',
         data: {search: $('#search').val(),br:$('#br').val()
        },
        success: function(data){
            $('#result').html(data);
        }
    });
});
      
      </script>
    @endsection
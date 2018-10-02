

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
  
 
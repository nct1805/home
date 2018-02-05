@extends('layouts.frontend.main')
@section('meta')
    <link rel="canonical" href="{{get_base_url()}}"/>
    <title>{{$title}}</title>
    <meta name="description" content="{{$des}}"/>
    <meta property="og:url" content=""/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$title}}"/>
    <meta property="og:description" content="{{$des}}"/>
    <meta property="og:image" content=""/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:locale:alternate" content="en_GB"/>
    <meta property="og:site_name" content="Đồ trang trí nội thất bền rẻ đẹp"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title"><span>{{$title}}</span></h1>
        </div>       
            @foreach($models as $product)            
                    <div class="col-md-3 col-xs-6 col-sm-3">
                        <div class="products">
                            <div class="products-image">
                                <a href="{{ $product->alias}}.html" title="Chi tiết sản phẩm: dfgdg"
                                   class="img-thumbnail img-center text-center">
                                    <img src="public/uploads/san-pham/{{$product->image}}"
                                         data-src="public/ft/img/load_image.gif"
                                         alt=""
                                         class="img-responsive img-products-lazy"/>
                                </a>
                            </div>
                            <div class="products-title">
                                <h2><a href="{{ $product->alias}}.html"
                                       title="Chi tiết sản phẩm: {{$product->alias}}">{{$product->title}}</a>
                                </h2>
                            </div>
                            <p class="products-price"><strong>{{number_format($product->price)}}</strong></p>
                        </div>
                    </div>
                
            @endforeach

            <div class="paginationsw">
                {{$models->links()}}
            </div>        
    </div>
@endsection

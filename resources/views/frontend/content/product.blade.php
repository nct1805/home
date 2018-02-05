<?php
$webTitle = $metaModel->meta_title;
$microFormat = [
    '@context' => 'http://schema.org',
    '@type' => 'Product',
    'name' => $metaModel->meta_title,
    'image'=>getAsset('images/san-pham/200x200/'.$metaModel->meta_image),
    'mpn'=>rand(1,10000),
    'description' => $metaModel->meta_description,
    'brand'=>[
    	'@type'=>'Thing',
    	'name'=>'Ironstyle'
    ],
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => ((rand(0, 10) / 10) + 4),
        'reviewCount' => rand(10, 100)
    ],
   'offers'=> [
	    '@type'=> 'Offer',
	    'availability'=> 'http://schema.org/InStock',
	    'price'=> str_replace(',', '.', $model->price),
	    'priceCurrency'=> 'VND',
	    'seller' => [
	      '@type'=> 'Organization',
	      'name'=> 'Ironstyle'
	    ]
	],
];
?>
@extends('layouts.frontend.main')
@section('meta')
    <link rel="canonical" href="{{ $metaModel->link }}"/>
    <meta name="description"
          content="{{ $metaModel->meta_description }}"/>
    <meta property="og:url" content="{{ $metaModel->link }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ $metaModel->meta_title }}"/>
    <meta property="og:description"
          content="{{ $metaModel->meta_description }}"/>
    @if($model instanceof \libs\models\PostModel)
        <meta property="og:image" content="images/bai-viet/200x200/{{ $metaModel->meta_image }}"/>
        <meta property="og:image:width" content="200"/>
        <meta property="og:image:height" content="200"/>
    @endif
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:locale:alternate" content="en_GB"/>
    <meta property="og:site_name" content="Đồ trang trí nội thất bền rẻ đẹp"/>
@endsection
@section('content')
    <div class="row">
        @if($model)
            <div class="col-md-12">
                <div class="product">
                    <div class="product-detail">
                        <h1><span>{{ $model->title }}</span></h1>
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-thumbnail img-responsive"
                                     src="{{ getAsset('images/san-pham/200x200/'.$metaModel->meta_image) }}"
                                     alt="{{ str_slug($metaModel->meta_title,' ') }}">
                            </div>
                            <div class="col-md-9">
                                <div class="product-cart-detail">
                                    <p class="name"><strong>Sản phẩm:</strong> {{ $model->title }}</p>
                                    <p class="price"><strong>Giá bán:</strong> {{ $model->sellPrice }}</p>
                                    <p class="order"><a href="{{ route('Ft_Cart_Order',['id'=>$model->id]) }}"
                                                        title="Đặt mua sản phẩm {{ $model->title }}"><img
                                                    src="{{ getAsset('ft/img/buy-button.png') }}"
                                                    class="img-center img-responsive"
                                                    alt="Đặt mua sản phẩm"/></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        {!! $model->content !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection


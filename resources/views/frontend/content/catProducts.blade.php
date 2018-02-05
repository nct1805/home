<?php
/*$webTitle = $metaModel->meta_title;
$microFormat = [
    '@context' => 'http://schema.org',
    '@type' => 'LocalBusiness',
    'name' => $metaModel->meta_title,
    'image' => getAsset('ft/img/logo.png'),
    'description' => $metaModel->meta_description,
    'logo' => getAsset('ft/img/logo.png'),
    'url' => $metaModel->link,
    'openingHours' => 'Mo, Tu, We, Th, Fr, Sa, Su 08:00-21:00',
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Ho Chi Minh',
        'addressRegion' => 'VN',
        'postalCode' => '700000',
        'streetAddress' => '25C Trần Quang Khải, Q.1, TP.HCM'
    ],
    'priceRange' => '1.000.000 vnđ - 5.000.000 vnđ',
    'paymentAccepted' => ['Cash', 'credit card'],
    'telephone' => '+84.908.115.916',
    'email' => 'tananhcorp@gmail.com',
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => ((rand(0, 10) / 10) + 4),
        'reviewCount' => rand(1000, 10000)
    ],
    'review' => [
        '@type' => 'Review',
        'author' => 'Kevin Dang',
        'datePublished' => '2017-04-01',
        'description' => 'Đồng hồ đẹp, giá rẻ, chất lượng, shop bán hàng sẽ ghé lại khi có nhu cầu..',
        'name' => 'Đặng Long',

    ],
];
*/
?>
@extends('layouts.frontend.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title"><span>{{ isset($data['title']) ? $data['title']: '' }}</span></h1>
        </div>
        @if($models->count())
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
            <div class="col-md-12">
                <div class="paginationsw">
                    {{$models->links()}}
                </div>
            </div>
            
        @endif
    </div>
@endsection

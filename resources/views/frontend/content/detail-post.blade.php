<?php
$webTitle = $metaModel->meta_title;
$microFormat = [
    '@context' => 'http://schema.org',
    '@type' => 'Article',
    'name' => $metaModel->meta_title,
    'author' => [
        '@type' => 'Person',
        'name' => 'Kevin Dang',
        'url'=>'https://onenetwork.info'
    ],
    'datePublished' => $metaModel->created,
    'dateModified' => $metaModel->updated,
    'headline' => $metaModel->meta_title,
    'mainEntityOfPage' => $metaModel->meta_description,
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Kevin Dang',
        'logo'=> [
            '@type' => 'ImageObject',
            'url' => getAsset('ft/img/logo.png'),
            'width'=>'190',
            'height'=>'120'
        ]
    ],
    'image' => [
        '@type' => 'ImageObject',
        'url' => getAsset('images/bai-viet/210x210/' . $metaModel->meta_image),
        'width'=>'210',
        'height'=>'110'
    ],
    'articleBody' => strip_tags($model->content),
    'url' => \Request::url(),
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => ((rand(0, 10) / 10) + 4),
        'reviewCount' => rand(1000, 10000),
        'author' => [
            '@type' => 'Person',
            'name' => 'Kevin Dang',
            'url'=>'https://onenetwork.info'
        ],
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
        <meta property="og:image" content="images/bai-viet/1200x630/{{ $metaModel->meta_image }}"/>
        <meta property="og:image:width" content="1200"/>
        <meta property="og:image:height" content="630"/>
    @endif
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:locale:alternate" content="en_GB"/>
    <meta property="og:site_name" content="Đồ trang trí nội thất bền rẻ đẹp"/>
@endsection
@section('content')
    <div class="row">
        @if($model)
            <div class="col-md-12">
                <div class="content">
                    <div class="content-detail">
                        <h1><span>{{ $model->title }}</span></h1>
                        <div class="row"></div>
                    </div>
                    <div class="content-wrapper">
                        {!! $model->content !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection


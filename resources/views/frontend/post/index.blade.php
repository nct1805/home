<?php
/*$microFormat = [
    '@context'=> 'http://schema.org',
    '@type'=> 'CreativeWork',
    'about'=> config('app.name'),
    'accessMode'=> ['textual', 'visual'],
    'accessModeSufficient'=>['textual', 'visual'],
    'accountablePerson'=>'Kevin Dang - longdhb@gmail.com',
    'aggregateRating'=>[
        '@type'=> 'AggregateRating',
        'ratingValue'=> ((rand(0, 10) / 10) + 4),
        'reviewCount'=> rand(1000,10000)
    ],
    'author'=>'Kevin Dang',
    'commentCount'=> rand(100,2000),
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
            @foreach($models as $model)
                    <div class="col-md-12">
                        <div class="posts row">
                            <div class="posts-image col-md-4">
                                <a href="{{ $model->alias }}.html" title="Chi tiết bài viết {{ $model->title }}"
                                   class="img-thumbnail img-center text-center">
                                    <img src="public/uploads/bai-viet/{{ $model->image }}"
                                         data-src="public/ft/img/load_image.gif"
                                         alt="{{ $model->meta_title}}"
                                         class="img-responsive img-posts-lazy"/>
                                </a>
                            </div>
                            <div class="posts-title col-md-8">
                                <h2><a href="{{ $model->alias }}.html"
                                       title="Chi tiết bài viết: {{ $model->title }}">{{ $model->title }}</a>
                                </h2>
                                <p class="posts-description">{{ fewchars($model->content,300) }}</p>

                            </div>
                            <a href="{{ $model->alias }}.html" title="Xem thêm {{ $model->title }}"
                               class="btn btn-primary read-more"> Xem thêm</a>
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

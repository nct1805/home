@extends('layouts.frontend.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title"><span>{{ isset($title) ? $title: '' }}</span></h1>
        </div>
        @if($models->count())
            @foreach($models as $model)
                <?php
                $product = $model->modelIns;
                ?>
                @if($product)
                    <div class="col-md-3 col-xs-6 col-sm-3">
                        <div class="products">
                            <div class="products-image">
                                <a href="{{ $model->link }}" title="Chi tiết sản phẩm: {{ $model->meta_title }}"
                                   class="img-thumbnail img-center text-center">
                                    <img src="{{ $model->imageProduct }}"
                                         data-src="{{ getAsset('ft/img/load_image.gif') }}"
                                         alt="{{ str_slug($model->meta_title,' ') }}"
                                         class="img-responsive img-products-lazy"/>
                                </a>
                            </div>
                            <div class="products-title">
                                <h2><a href="{{ $model->link }}"
                                       title="Chi tiết sản phẩm: {{ $model->meta_title }}">{{ $model->meta_title }}</a>
                                </h2>
                            </div>
                            <p class="products-price"><strong>{{ $product->sellPrice }}</strong></p>
                        </div>
                    </div>
                @endif
            @endforeach
                <div class="paginationsw">
                    {{ $models->appends(\Request::only('keywords'))->links('vendor.pagination.home') }}
                </div>

        @endif
    </div>
@endsection

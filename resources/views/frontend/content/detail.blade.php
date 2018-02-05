@extends('layouts.frontend.main')
@section('content')
    <div class="row">
        @if($models)
            <div class="col-md-12">
                <div class="product">
                    <div class="product-detail">
                        <h1><span>{{ $models->title }}</span></h1>
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-thumbnail img-responsive" src="public/uploads/san-pham/{{$models->image}}" alt="{{ $models->title }}">
                            </div>
                            <div class="col-md-9">
                                <div class="product-cart-detail">
                                    <p class="name"><strong>Sản phẩm:</strong> {{ $models->title }}</p>
                                    <p class="price"><strong>Giá bán:</strong> {{ number_format($models->price) }} vnđ</p>
                                    <p class="order">
                                    <form method="POST" action="{{url('cart')}}">
                                    <input type="hidden" name="product_id" value="{{$models->id}}">
                                    {{ csrf_field() }}
                                    <button style="background-color: #fff;" type="submit" class="btn btn-fefault add-to-cart" name="Đặt hàng"><img src="http://ironstyle.net/public/ft/img/buy-button.png" class="img-center img-responsive" alt="Đặt mua sản phẩm"></button>
                                    <!--<a href="http://localhost/iron.net/dat-hang/{{ $models->id }}.html" title="Đặt mua sản phẩm {{ $models->title }}"><img src="http://ironstyle.net/public/ft/img/buy-button.png" class="img-center img-responsive" alt="Đặt mua sản phẩm"></a>-->
                                    </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrapper">
                        {!! $models->content !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
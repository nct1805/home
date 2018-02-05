@extends('layouts.frontend.main')
@section('content')
    <div class="row">
        @if($cart)
            
            <div class="col-md-12">
                <div class="cart">
                    <div class="row">
                        <h1><span>Giỏ hàng</span></h1>

                    </div>
                    <div class="row hidden-xs hidden-sm">
                        <div class="col-md-3">
                            <p><strong>Sản phẩm</strong></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Giá</strong></p>
                        </div>
                        <div class="col-md-2">
                            <p><strong>Số lượng</strong></p>
                        </div>
                        <div class="col-md-3">
                            <p><strong> Thành tiền</strong></p>
                        </div>
                        <div class="col-md-1">
                            <p><strong></strong></p>
                        </div>
                    </div>
                    <?php $total = 0; $totalNumber = 0?>
                    @foreach($cart as $item)
                        <?php
                        $sum = $item->qty * $item->price;
                        $total += $sum;
                        $totalNumber += $item->qty;
                        ?>
                        <div class="row">
                            <div class="col-md-3">
                                <p>{{ $item->title }}</p>
                                <p>
                                    <img src="public/uploads/san-pham/{{ $item->image }}" alt=""
                                         class="img-responsive img-thumbnail"/>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>{{ number_format($item->price) }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <p><a class="cart_quantity_up" href='{{url("updatecart?product_id=$item->id&increment=1")}}'> + </a>
                                        <input type="text" class="form-control input-sm" name="count[{{$item->id}}]" value="{{ $item->qty }}"/>
                                        <a class="cart_quantity_down" href='{{url("updatecart?product_id=$item->id&decrease=1")}}'> - </a>
                                    </p>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p>{{ number_format($sum) }} vnđ</p>
                            </div>
                            <div class="col-md-1">
                            <a class="btn btn-danger btn-sm" href='{{url("deletecart?product_id=$item->id&delete=1")}}'><i
                                                    class="glyphicon glyphicon-remove"></i>xoá</a>
                                
                            </div>
                        </div>
                    @endforeach
                    <div class="cart-content">
                        <div class="row">

                            <div class="col-md-6">
                                Thành tiền: <strong>{{ $totalNumber }} món hàng = {{ number_format($total) }}
                                    vnđ</strong>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('Ft_Cart_CheckOut') }}" class="btn btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i> Đặt Hàng</a>
                                <a href="{{ route('Ft_Home_Index') }}" class="btn btn-warning">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        @endif
    </div>
@endsection


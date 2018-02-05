@extends('layouts.frontend.main')
@section('content')
    <div class="row">

            
            <div class="col-md-12">
                <div class="cart">
                    <div class="row">
                        <h1><span>Thông tin khách hàng</span></h1>
                        <div class="col-md-12">
                        <form name="" action="{{ route('Ft_Cart_CheckOut') }}" method="post">
                        {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Họ tên:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>Nhập lại họ tên</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone">Điện thoại:</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" />
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>Nhập lại điện thoại</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Hộp thư:</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}" />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>Nhập lại hộp thư</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                <label for="notes">Địa chỉ / lời nhắn:</label>
                                <textarea name="notes" id="" class="form-control" cols="10" rows="5">{{ old('notes') }}</textarea>
                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>Nhập lại địa chỉ, ghi chú</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-send"></i>  Thanh toán</button>
                                <a href="{{ route('Ft_Cart_Index') }}" class="btn btn-warning"><i class="glyphicon glyphicon-shopping-cart"></i> Xem lại giỏ hàng</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            

    </div>
@endsection


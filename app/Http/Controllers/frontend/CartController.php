<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Cart;
use Session;
use App\Http\Controllers\Controller;
use App\Models\frontend\ProductsModel;
use App\Models\frontend\CategoryModel;
use App\Models\frontend\PostModel;
use App\Models\frontend\CustommerModel;
use App\Models\frontend\Orders;
use App\Models\frontend\OrderDetail;

class CartController extends Controller
{
    public function __construct(){
    }
    public function addTocart(Request $request){
            if ($request->product_id) {
                $id = $request->product_id;
                $product = ProductsModel::find($id);
                Cart::add(array('id' => $id, 'name' => $product->title, 'qty' => 1, 'price' => $product->price));
            }
            return redirect()->route('Ft_Cart_Index');
    }
    public function updateCart(Request $request){
            //increment the quantity
            if (Input::get('product_id') && Input::get('increment') == 1) {
                $rowId = Cart::search(function($key, $value) { 
                    return $key->id == Input::get('product_id'); 
                });
                $item = $rowId->first();
                $rowid=$item->rowId;
                Cart::update($rowid, $item->qty + 1);
            }
            //decrease the quantity
            if (Input::get('product_id') && Input::get('decrease') == 1) {
                $rowId = Cart::search(function($key, $value) { 
                    return $key->id == Input::get('product_id'); 
                });
                $item = $rowId->first();
                $rowid=$item->rowId;
                Cart::update($rowid, $item->qty - 1);
            }
            
            return redirect()->route('Ft_Cart_Index');
    }
    public function deleteCart(Request $request){
            if (Input::get('product_id') && Input::get('delete') == 1) {
                $rowId = Cart::search(function($key, $value) { 
                    return $key->id == Input::get('product_id');  
                });
                $item = $rowId->first();
                $rowid=$item->rowId;
                Cart::remove($rowid);
            }
            return redirect()->route('Ft_Cart_Index');
    }
    public function index()
    {

        $cart = Cart::content();
        return view('frontend.cart.index', array('cart' => $cart, 'title' => 'Welcome','device' =>'desktop'));
    }

    public function getPayment(){

        if(empty(Cart::content())){
            return redirect()->route('Ft_Cart_Index');
        }
        return view('frontend.cart.checkout', array('title' => 'Welcome','device' =>'desktop'));
    }
    public function postPayment(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3|max:255',
                'phone' => 'required|min:3|max:255',
                'email' =>'required','email',

            ],
            [
                'name.required' =>'Vui lòng nhập tên',         
                'name.min' => 'Tên có ít nhất 3 ký tự',
                'name.max' => 'Tên tối đa dài 255 ký tự',
                'phone.required' =>'Vui lòng nhập số điện thoại',         
                'phone.min' => 'Tên có ít nhất 10 ký tự',
                'phone.max' => 'Tên tối đa dài 11 ký tự',
                'email.required' =>'Vui lòng nhập địa chỉ email', 
            ]
        );
        $cart = Cart::content();
        $total = 0; 
        $totalNumber = 0;
        foreach($cart as $item){
                        $sum = $item->qty * $item->price;
                        $total += $sum;
                        $totalNumber += $item->qty;
        }
        $order = new Orders;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->notes = $request->notes;
        $order->qty = $totalNumber;
        $order->total = $total;
        $order->status = 1;
        $order->save();
        foreach ($cart as $item) {
            $orderdetail = new OrderDetail;
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $item->id;
            $orderdetail->qty = $item->qty;
            $orderdetail->price = $item->price;
            $orderdetail->save();
        }
        Cart::destroy();
        return redirect()->route('muahangthanhcong');
    }
    public function thanks()
    {
        return view('frontend.cart.thank', array('title' => 'Welcome','device' =>'desktop'));
    }
}
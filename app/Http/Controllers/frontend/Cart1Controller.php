<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use libs\controllers\FrontendController;
use libs\models\CustommerModel;
use libs\models\MetaModel;
use libs\models\ProductModel;
use libs\models\SaleItemModel;
use libs\ultils\Cart;
use libs\validates\CustommerValidate;

class CartController extends FrontendController
{
    protected $model = null;
    protected $cart = null;

    public function __construct(ProductModel $model, Cart $cart)
    {
        parent::__construct();
        $this->model = $model;
        $this->cart = $cart;
    }

    public function order($id)
    {
        $model = $this->model->findById($id);
        $this->cart->addItem($model);
        return redirect()->action('Frontend\CartController@index');
    }

    public function index()
    {
        $cart = $this->cart->getCart();
        $cart = array_reverse($cart);
        return view('frontend.cart.index', ['cart' => $cart]);
    }

    public function update(Request $request)
    {
        $all = $request->all();
        $this->cart->updateCart($all);
        return redirect()->action('Frontend\CartController@index');
    }

    public function check()
    {
        $cart = $this->cart->getCart();
        $cart = array_reverse($cart);
        return view('frontend.cart.checkout', ['cart' => $cart]);
    }

    public function paid(CustommerValidate $request)
    {
        $all = $request->all();
        $custommer = CustommerModel::create($all);
        if ($custommer) {
            $cart = $this->cart->getCart();
            $cart = array_reverse($cart);
            if ($cart) {
                SaleItemModel::saveAllItems($cart, $custommer->id);
            }
            @Mail::to(config('post.saleEmail'))->send(new OrderShipped($cart, $custommer));
            $this->cart->emptyCart();
        }
        return view('frontend.cart.thank');
    }
}
<?php

namespace libs\ultils;

use Illuminate\Support\Facades\Session;
use App\Models\frontend\ProductsModel;

class Cart
{
    protected $items = null;

    public function __construct()
    {

        if (!Session::has('carts')) {
            Session::put('carts', [], 120);
        }
    }

    public function getCart()
    {
        return Session::get('carts', []);
    }

    public function addItem(ProductsModel $model)
    {
        $this->items = $this->getCart();

        if (isset($this->items[$model->id])) {
            $this->items[$model->id]['count']++;
        } else {
            $datas = $this->sanalizeData($model);
            if ($datas) {
                $this->items[$model->id] = $datas;
            }
        }

        Session::put('carts', $this->items, 120);
    }

    public function sanalizeData(ProductsModel $model)
    {
        $meta = $model->getMetaCacheData();
        $datas = [];
        if ($meta) {
            $datas = [
                'id' => $model->id,
                'title' => $model->title,
                'price' => $model->price,
                'image' => $meta->meta_image,
                'count' => 1
            ];
        }
        return $datas;
    }

    public function updateCart($data)
    {
        if (isset($data['del']) && is_array($data['del'])) {
            foreach ($data['del'] as $key => $value) {
                $this->delItem($key);
            }
        }
        if (isset($data['update']) && is_array($data['update'])) {
            foreach ($data['update'] as $key => $value) {
                if (isset($data['count'][$key])) {
                    $this->updateCount($key, $data['count'][$key]);
                }
            }
        }
    }

    public function delItem($id)
    {
        $cart = $this->getCart();
        unset($cart[$id]);
        Session::put('carts', $cart, 120);
    }

    public function updateCount($id, $count)
    {
        $cart = $this->getCart();
        if (isset($cart[$id])) {
            $cart[$id]['count'] = $count;
        }
        Session::put('carts', $cart, 120);
    }

    public function emptyCart(){
        Session::forget('carts');
    }
}
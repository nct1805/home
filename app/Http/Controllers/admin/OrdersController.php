<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\OrdersModel;

class OrdersController extends Controller
{
    protected $name = 'orders';
    public function __construct(){
        $this->middleware('auth');
    }
    public function getList()
    {
        $orders = OrdersModel::all();
        return view('admin.orders.index',
            [   'title'=>'Đơn hàng',
                'data'=>$orders
            ]
        );
           
    }
    public function getEdit($id){
        $orders = OrdersModel::find($id);
        $orderdetails = OrderdetailsModel::where('order_id',$id);
        return view('admin.orders.edit',['data' => $orders,'data_details' =>$orderdetails]);    
    }
    public function postEdit(Request $request,$id){
        $orders = OrdersModel::find($id);
        $orders->status = $request->status;
        $orders->notes = $request->notes;
        $orders->save();
        return redirect('admin/orders/edit/'.$id)->with('thongbao','Cập nhật thành công');    
    }
    public function getDelete($id)
    {
        $orders = OrdersModel::find($id);
        $orders->delete();
        return redirect('admin/orders/list')->with('thongbao','Xóa thành công id:' .$id);
    }
}

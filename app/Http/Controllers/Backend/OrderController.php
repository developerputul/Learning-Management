<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Course;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\Orderconfirm;

class OrderController extends Controller
{
    public function AdminPendingOrder(){

        $payment = Payment::where('status','pending')->orderBy('id','DESC')->get();
        return view('admin.backend.orders.pending_order',compact('payment'));
    } // End Method

    public function AdminOrdertDetails($payment_id){

        $payment = Payment::where('id',$payment_id)->first();
        $orderItem = Order::where('payment_id',$payment_id)->orderBy('id','DESC')->get();

        return view('admin.backend.orders.admin_order_details',compact('payment','orderItem'));

    } // End Method

    public function PendingToConfirm($payment_id){

        Payment::find($payment_id)->update(['status' => 'confirm']);

        $notification = array(
            'message' => 'Order Confrim Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.confirm.order')->with($notification);  

    } // End Method

    public function AdminConfirmOrder(){

        $payment = Payment::where('status','confirm')->orderBy('id','DESC')->get();
        return view('admin.backend.orders.confirm_order',compact('payment'));

    } // End Method

    public function InstructorAllOrder(){

        $id = Auth::user()->id;
        $orderItem = Order::where('instructor_id',$id)->orderBy('id','DESC')->get();
        return view('instructor.orders.all_orders',compact('orderItem'));

    } // End Method

    public function InstructorOrderDetails($payment_id){

        $payment = Payment::where('id',$payment_id)->first();
        $orderItem = Order::where('payment_id',$payment_id)->orderBy('id','DESC')->get();

        return view('instructor.orders.instructor_order_details',compact('payment','orderItem'));

    } // End Method


}

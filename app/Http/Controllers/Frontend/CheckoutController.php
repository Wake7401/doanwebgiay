<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this -> orderService = $orderService;
        $this -> orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('frontend.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        //them don hang
        $data = $request -> all();
        $data['status'] = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);

        //them chi tiet don hang
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];
            $this->orderDetailService->create($data);
        }

        if($request -> payment_type == 'pay_later'){
            //Gui mail
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this -> sendEmail($order,$total,$subtotal);

            //xoa gio hang
            Cart::destroy();
        
            //tra ve thong bao
            return Redirect::to('checkout/result')->with('notification', 'Thanh toán thành công. Vui lòng kiểm tra email !!!');
        }

        if($request -> payment_type == 'online_payment'){
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order -> id,
                'vnp_OrderInfo' => 'Mo ta don hang',
                'vnp_Amount' => Cart::total(0,'',''),
            ]);
            return redirect()-> to($data_url);
        }
    }

    public function vnPayCheck(Request $request){
        $vnp_ResponseCode = $request -> get('vnp_ResponseCode');
        $vnp_TxnRef = $request -> get('vnp_TxnRef');
        $vnp_Amount = $request -> get('vnp_Amount');

        if($vnp_ResponseCode != null){
            if($vnp_ResponseCode == 00){
                //Gui mail
                $order = $this -> orderService-> find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this -> sendEmail($order,$total,$subtotal);

                Cart::destroy();

                return Redirect::to('checkout/result')->with('notification', 'Thanh toán thành công. Vui lòng kiểm tra email !!!');
            }else{
                $this -> orderService ->delete($vnp_TxnRef);

                return Redirect::to('checkout/result')->with('notification', 'Thanh toán không thành công. Vui lòng kiểm tra thông tin !!!');
            }
        }
    }

    public function result()
    {
        $notification = session('notification');
        return view('frontend.checkout.result',compact('notification'));
    }

    private function sendEmail($order,$total,$subtotal){
        $email_to = $order -> email;
        Mail::send('frontend.checkout.email',compact('order','total', 'subtotal'),
                    function ($message) use ($email_to) {
                        $message -> from('akshop@gmail.com', 'SHOP AK');
                        $message -> to($email_to, $email_to);
                        $message -> subject('Thông báo đơn hàng');
                    });
    }
}

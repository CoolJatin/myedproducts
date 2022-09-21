<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddToCart as cart;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;
use Session;

class AddToCart extends Controller
{
    protected $cart;
    // autoload function
    public function __construct()
    {
        $this->cart = new cart();
    }
    //Add To Cart in Cart Table
    public function AddToCartItem(Request $request){

    if (empty(Session::get('id'))) {
        if (empty(Session::get('cartid'))) {
            Session::put('cartid', $request->cartid);
            $CartChek = $this->cart->CartChekItem($request, Session::get('cartid'));
            if ($CartChek==1) {
                $data = $this->cart->UpdateCartItem($request);
                $cart = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.qty');
                $price = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.price');
                if ($data == 1) {
                    return response()->json(['status'=>200,'cart'=>$cart,'total'=>$price,'data'=>'Product All Ready Add!']);
                }
            } else {
                $data = $this->cart->AddToCartItem($request);
                $cart = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.qty');
                $price = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.price');
                return response()->json(['status'=>200,'cart'=>$cart,'total'=>$price,'data'=>'Item Add Successfull!']);
            }
        } else {
            $CartChek = $this->cart->CartChekItem($request, Session::get('cartid'));
            if ($CartChek==1) {
                $data = $this->cart->UpdateCartItem($request);
                $cart = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.qty');
                $price = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.price');
                if ($data == 1) {
                    return response()->json(['status'=>200,'cart'=>$cart,'total'=>$price,'data'=>'Product All Ready Add!']);
                }
            } else {
                $data = $this->cart->AddToCartItem($request);
                $cart = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.qty');
                $price = DB::table('add_to_cart')->where('userid', Session::get('cartid'))->sum('add_to_cart.price');
                return response()->json(['status'=>200,'cart'=>$cart,'total'=>$price,'data'=>'Item Add Successfull!']);
            }
        }
    } else {
        $CartChek = $this->cart->CartChekItem($request,Session::get('id'));
        if ($CartChek==1) {
            $data = $this->cart->UpdateCartItem1($request);
            $cart = DB::table('add_to_cart')->where('userid',Session::get('id'))->sum('add_to_cart.qty');
             $price = DB::table('add_to_cart')->where('userid', Session::get('id'))->sum('add_to_cart.price');
             if ($data == 1) {
                return response()->json(['status'=>200,'cart'=>$cart,'total'=>$price,'data'=>'Product All Ready Add!']);
            }
        } else {
            $data = $this->cart->AddToCartItem1($request);
            $cart = DB::table('add_to_cart')->where('userid', Session::get('id'))->sum('add_to_cart.qty');
             $price = DB::table('add_to_cart')->where('userid', Session::get('id'))->sum('add_to_cart.price');
            return response()->json(['status'=>200,'cart'=>$cart,'total'=>$price,'data'=>'Item Add Successfull!']);
        }

    }
}
    //remove add to cart
    public function RemoveCart($id){
        $data = cart::find($id);
        if($data->delete()){
            return redirect()->back()->with('success', 'Remove Item In cart!');
        } else {
            return redirect()->back()->with('success', 'Query Not Run!');
        }
    }


}

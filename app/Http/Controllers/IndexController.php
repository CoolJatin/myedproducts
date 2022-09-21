<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Validator;
use Auth;
use DB;
use Session;

class IndexController extends Controller
{
    protected $admin;
    public function __construct(){
        $this->admin = new admin();
    }

    public function index(){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = $this->admin->GetallData('product');
        $result['homecategory'] = $this->admin->GetbyDataCondition('categorys',['type'=>'home']);
        $result['about'] = $this->admin->SingalDatawitoutCondition('aboutus');
        $result['sale'] = $this->admin->GetbyDataCondition('product',['type'=>'1']);
        $result['saleoffer'] = $this->admin->SingalData('categorys','type','sale');
        return view('web.index',$result);
    }
    // login controller
    public function loginuser(Request $request){
        $validator = Validator::make($request->all(),[
           'email' => 'required',
           'password' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json(['status'=>201,'error'=>$validator->errors()]);
        } else {
            $chack = DB::table('customer')->where('email',$request->email)->where('password',md5($request->password))->first();
            if(!empty($chack)){
                Session::put('id',$chack->id);
                DB::table('add_to_cart')->where('userid',Session::get('cartid'))->update(['userid'=>$chack->id]);
                return response()->json(['status'=>200,'success'=>'Login Successful!']);
            } else {
                return response()->json(['status'=>203,'wrongdetaisl'=>'User name and password do not match']);
            }
        }
    }

    public function myaccount(){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = $this->admin->GetallData('product');
        return view('web.account',$result);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'name'=>'required',
            'password' => 'required',
            'cpassword' => 'required|same:password'
        ]);
        if($validator->fails()){
            return response()->json(['status'=>201,'error'=>$validator->errors()]);
        }  else {
        $chack = $this->admin->checkduplicateentry('customer','email',$request->email);
          if(empty($chack)){
              $data['name'] = $request->name;
              $data['email'] = $request->email;
              $data['password'] = md5($request->password);
              $result = $this->admin->insertdata('customer', $data);
              if ($result==1) {
                  return response()->json(['status'=>200,'success'=>'Registration Successful!']);
              } else {
                  return response()->json(['status'=>200,'success'=>'Query Not Run!']);
              }
          } else {
            return response()->json(['status'=>203,'email'=>'Email is already taken!']);
          }
        }
    }

    public function logoutuser(){
       session()->forget('id');
       return redirect('/');
    }
    
    public function forgetpassword(){
     return view('web.forget-password');
}
    
    
    
    public function emailmatch(Request $request){
        
        $this->validate($request, [
            'email' => 'required',
        ]);
        $otp = mt_rand(100000,999999);
        Session::put('otp',mt_rand(1111,9999));
        Session::put('email',$request->email);
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $chack = DB::table('customer')->where('email',$request->email)->first();
        
        if(!empty($chack)){
                $to = $request->email;
                $subject = "OTP";
                $txt = 'Email:'.$request->email."\r\n Otp:".Session::get('otp',mt_rand(1111,9999));
                $headers = "From: $request->email" . "\r\n" .
                "CC: $request->email";
                mail($to,$subject,$txt,$headers); 
                return redirect('otp');
        } else {
         return redirect()->back()->with('success', 'Email Was Wrong!');
        }
    }
    
    public function otp(){
         $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
                $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
                $result['productss'] = $this->admin->GetallData('product');
                return view('web.otp',$result);
    }
    
    public function matchotp(Request $request){
        // echo Session::get('otp').'   '.$request->otp; die;
         $this->validate($request, [
            'otp' => 'required',
        ]);
        if(Session::get('otp')==$request->otp){
             $password = md5($request->password);
             $result = DB::table('customer')->where('email',Session::get('email'))->update(['password'=>$password]);
            if($result==1){
                 return redirect('myaccount')->with('success','Password Successfull Change!');
            } else {
                 return redirect('myaccount')->with('success','query Not Run!');
            }
        } else {
           return redirect()->back()->with('success', 'your otp wrong!');
        }
    }
    
    public function fillotp(Request $request){
        //echo Session::get('otp'); die;
        //echo "sdfdwhgfvshfdsdf"; die;
        if(Session::get('otp')==$request->otps){
        $data['password'] = md5($request->password);
         $result =  DB::table('customers')->where('email',session::get('email'))->update($data);
       //dd($result);
        if($result==1){
             return redirect('front.signup')->with('success', 'Password Was Successful Change!');
        } else {
            return redirect()->back()->with('success','Query Not Run!');
        }
        } else{
             return redirect()->back()->with('success','otp not match!'); 
        }
    }

    public function page($slug){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['cats'] = $this->admin->SingalData('categorys','slug',$slug);
        $result['products'] = $this->admin->GetbyDataConditionpaginat('product',['catid'=> $result['cats']->id],'15');
        $result['productss'] = $this->admin->GetallData('product');
        return view('web.page',$result);
    }

    public function ShopProduct($slug){
        $result['productss'] = $this->admin->GetallData('product');
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['singaldata'] = $this->admin->SingalData('product','slug',$slug);
       return view('web.shop',$result);
    }

    public function Cart(){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = $this->admin->GetallData('product');
        $cart = $this->admin->GetbyDataCondition('add_to_cart',['userid'=>session::get('id')]);
        if($cart->count() > 0){
            $result['cart'] = $cart;
            return view('web.cart',$result);
        } else {
            $result['cart'] = $this->admin->GetbyDataCondition('add_to_cart',['userid'=>session::get('cartid')]);

            return view('web.cart',$result);
        }
    }

    public function remove($id=""){
        $result = $this->admin->RemoveItem('add_to_cart',$id);
        if($result==1){
            return redirect()->back()->with('success','remove Item Successful!');
        } else {
            return redirect()->back()->with('success','Query Not Run!!');
        }
    }
    public function checkout(){
        if(!empty(session::get('id'))){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = $this->admin->GetallData('product'); 
        $cart = $this->admin->GetbyDataCondition('add_to_cart',['userid'=>session::get('id')]);
        $cart = $this->admin->GetbyDataCondition('add_to_cart',['userid'=>session::get('id')]);
        if($cart->count() > 0){
            $result['cart'] = $cart;
        } else {
            $result['cart'] = $this->admin->GetbyDataCondition('add_to_cart',['userid'=>session::get('cartid')]);
        }

        return view('web.checkout',$result);
    }
        else {
            return redirect('myaccount');
        }
    }


    public function placeorder(Request $request){
       // dd($request->all());
        $orderid = uniqid();
        $this->validate($request, [
            "fname" =>"required",
            "lname" =>"required",
            "email" => "required",
            "street" => "required",
            "state" => "required",
            "country" => "required",
            "city" => "required",
            "pincode" => "required",
            "shippingaddress" => "required",
            "paymentMethod" => "required",
            
         ]);
         $data['fname'] = $request->fname;
         $data['lname'] = $request->lname;
         $data['email'] = $request->email;
         $data['street'] = $request->street;
         $data['state'] = $request->state;
         $data['address'] = $request->address;
         $data['country'] = $request->country;
         $data['city'] = $request->city;
         $data['pincode'] = $request->pincode;
         $data['shippingaddress'] = $request->shippingaddress;
         $data['paymentMethod'] = $request->paymentMethod;
         $data['cardname'] = $request->cardname;
         $data['cardnumber'] = $request->cardnumber;
         $data['expiration'] = $request->expiration;
         $data['cvv'] = $request->cvv;
          $data['paypal'] = $request->paypal;
         $data['datetime'] = date('Y/m/d');
         $data['orderid'] = $orderid;
         $data['userid'] = session::get('id');
         $result = $this->admin->insertdata('address',$data);
         if($result==1){
            $datads =  $this->MyOrder($orderid);
              $this->emailsend($request->email);
            return redirect('thankyou')->with('success','Address Successful Save!');
         } else {
            return redirect()->back()->with('success','Query Not Run!');
         }
    }

    public function MyOrder($orderid=""){
        if(!empty(session::get('id'))){
                $ids = array();
                $addtocart =  $this->admin->GetbyDataCondition('add_to_cart',['userid'=>session::get('id')]);
              //  dd($addtocart);
            foreach($addtocart as $itemaddtocat){
                array_push($ids,$itemaddtocat->id);
                $data['userid'] =$itemaddtocat->userid;
                $data['orderid'] = $orderid;
                $data['datetime'] = date('Y/m/d');
                $data['title'] = $itemaddtocat->title;
                $data['price'] = $itemaddtocat->price;
                $data['productid'] = $itemaddtocat->productid;
                $data['qty'] = $itemaddtocat->qty;
                $data['image'] = $itemaddtocat->image;
                $this->admin->insertdata('orders',$data);
            }
        } else {
            return redirect('myaccount');
        }
        $this->DeleteCart($ids);
    }
    
    
    public function emailsend($email){
   
    $to      = 'example@gmail.com';
    $subject = 'the subject';
    
    $headers = 'From: webmaster@example.com'       . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message  = '<html><head>';
    $message .= '<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">';
    $message .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
    $message .= ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
    $message .= ' <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>';
    $message .= '</head><body>';
    $message .= '<section class="order-details" >
     <div class="container">
         <header>';
    $message .= ' <div class="row">
               <div class="col-sm-12 col-xs-12 left-logo">
                  <img src="https://myedproductss.com/public/assets/imgs/16.png" class="img-responsive" width="200px" height="120px">
                  <p>Thank you for your interest in MYEDPRODUCTS. Your order has been received and will be processed once payment has been confirmed.</p>
               </div>
         </header>';
    $message .= ' <div class="row">
         <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
         <thead>
         <tr>
         <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#534b52;font-weight:bold;text-align:left;padding:7px;color:#ffffff" colspan="2">
         Order Details
         </td>
         </tr></thead>';
    $message .= '
         <tbody>';
    $message .= ' 
         <tr>
         <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
         <b>Order ID:</b> 749<br>
         <b>Date Added:</b> 19/05/2022<br>
         <b>Payment Method:</b> card/paypal/bitcoin <br>
         <b>Shipping Method:</b> Flat Shipping Rate
         </td> 
         <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
         <b>E-mail:</b> <a href="mailto:abhaygazingtechnosoft@gmail.com" target="_blank">abhaygazingtechnosoft@gmail.<wbr>com</a><br>
         <b>Telephone:</b> 2292198<br>
         <b>IP Address:</b> 2401:4900:1c5c:d64a:cd29:ef7a:<wbr>350f:8572<br>
         <b>Order Status:</b> Pending<br>
         </td>
         </tr>';
    $message .= '
         </tbody>
         </table>
         </div>
         </div>
      </section>';
    $message .= '  
      <section class="order-details paynow">
         <div class="container">
            <div class="row">
               <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
                  <thead>
                     <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#534b52;font-weight:bold;text-align:left;padding:7px;color:#ffffff">
                           Instructions
                        </td>
                     </tr>
                  </thead>';
    $message .= ' <tbody>
                     <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                           <a href="/pay" style="background-color:red;border:1px solid #eb7035;border-radius:3px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:16px;line-height:40px;text-align:center;text-decoration:none;width:100%" target="_blank" data-saferedirecturl="">Pay Now</a><br>
                           <br>
                           <p style="color:red;font-size:14px">Your order will not ship until we receive payment.</p>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </section>';
    $message .= '<section class="order-details Payment-sec">
         <div class="container">
            <div class="row">
               <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
                  <thead>
                     <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#534b52;font-weight:bold;text-align:left;padding:7px;color:#ffffff">
                           Payment Address
                        </td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#534b52;font-weight:bold;text-align:left;padding:7px;color:#ffffff">
                           Shipping Address
                        </td>
                     </tr>
                  </thead>';
    $message .= '<tbody>
                     <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                           abhay singh<br>noida<br>noida<br>noida, New York 201031<br>United States
                        </td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                           abhay singh<br>noida<br>noida<br>noida, New York 201031<br>United States
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </section>';
    $message .= '<section class="order-details Payment-sec 
         Product">
         <div class="container">
            <div class="row">
               <table style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;margin-bottom:20px">
                  <thead>
                     <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#534b52;font-weight:bold;text-align:left;padding:7px;color:#ffffff">
                           Product
                        </td>';  
    $message .= ' <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#534b52;font-weight:bold;text-align:center;padding:7px;color:#ffffff">
                           Quantity
                        </td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#534b52;font-weight:bold;text-align:center;padding:7px;color:#ffffff">
                           Total
                        </td>
                     </tr>
                  </thead>';  
    $message .= ' <tbody>
                     <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px">
                           Aspadol 100 mg
                           <br>
                           &nbsp;<small>- Select Quantity: 90 Tablets</small>
                           <br>
                           &nbsp;<small>- Select Dosage: 100 mg</small>
                           <br>
                           &nbsp;<small>- Model: Aspadol 100mg</small>
                        </td>';  
    $message .= ' <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:center;padding:7px">
                           1 x ($164.00)
                        </td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:center;padding:7px">
                           $164.00
                        </td>
                     </tr>
                  </tbody>';  
    $message .= ' <tfoot>
                     <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="2">
                           <b>Sub-Total:</b>
                        </td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                           $164.00
                        </td>
                     </tr>';     
    $message .= '
                     <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="2">
                           <b>Flat Shipping Rate:</b>
                        </td>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                           $30.00
                        </td>
                     </tr>'; 
     $message .= ' <tr>
                        <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px" colspan="2">
                           <b>Total:</b>
                        </td>';
     
     $message .= '  <td style="font-size:12px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:right;padding:7px">
                           $194.00
                        </td>
                     </tr>
                  </tfoot>
               </table> ';
    
    $message .= ' <p >
                  Please reply to this e-mail if you have any questions.
               </p>';
    $message .= '</div>
         </div>'; 
    $message .= '</section>';  
  
                  
     $message .= '
     </body></html>';
   
    mail($to, $subject, $message, $headers);
    }

    public function DeleteCart($id){
        $data = DB::table('add_to_cart')->whereIn('id',$id)->delete();
        return $data;
    }
    
    
    public function about(){
         $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = $this->admin->GetallData('product');
        $result['about'] = $this->admin->GetAllData('aboutus');
        return view('web.about',$result);
    }
    
    public function shop(){
         $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
         $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
         $result['productss'] = $this->admin->GetallData('product');
         return view('web.shopall',$result);
    }
    
    public function faq(){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = $this->admin->GetallData('product');
        return view('web.faq',$result);
   }

   public function deliveryInfo(){
    $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
    $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
    $result['productss'] = $this->admin->GetallData('product');
    return view('web.delivery-info',$result);
}

    public function myprice($id=""){
        $data = $this->admin->SingalData('multisize','id',$id);
        if(!empty($data)){
          return response()->json(['status'=>200,'data'=>$data]);
        } else {
            return response()->json(['status'=>201]);
        }
    }
    public function thankyou(){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = $this->admin->GetallData('product');
        $result['homecategory'] = $this->admin->GetbyDataCondition('categorys',['type'=>'home']);
        return view('web.thankyou',$result);
    }
    
    public function qtyrun($id,$qty){
        $data = DB::table('add_to_cart')->where('id',$id)->update(['qty'=>$qty]);
        return response()->json(['status'=>200]);
    }
    
    public function myAllProduct(){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = DB::table('product')->latest()->paginate(15);
        return view('web.myallproduct',$result);
    }
    
    public function forgotpassword(){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = $this->admin->GetallData('product');
        return view('web.forgotpassword',$result);  
    }
    
    public function myorderuser(){
        $result['category'] = $this->admin->LimtData('categorys','0','6','normal');
        $result['second'] = $this->admin->LimtData('categorys','6','100','normal');
        $result['productss'] = $this->admin->GetallData('product');
        return view('web.myorder',$result);
    }

}

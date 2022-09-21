<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Validator;
use Auth;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Auth\Events\Validated;

class AdminController extends Controller
{
    protected $admin;
    public function __construct(){
        $this->admin = new admin();
    }

    public function Admin()
    {
        return view('admin.login');
    }

    //login method
    public function adminlogin(Request $request){
        $this->validate($request, [
            "email" => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }
        return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials');
    }
    // deshboard route
    public function dashboard(){
        return view('admin.index');
    }
    //Category Rought
    public function Category(){
        $result['category'] = $this->admin->GetallData('categorys');
        $result['dropdown'] = $this->admin->GetbyDataCondition('categorys',['parent_id'=>0]);
        return view('admin.categorys.category',$result)->with('i');
    }
    //add category
    public function addcategory(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
            'category' => 'required',
            'slug' => 'required',
           ]);
        if($validator->fails()) {
            return response()->json(['status'=>201,'error'=>$validator->errors()]);
        } else {
            if (request()->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnail1 = "thumbnail".time().'.'.$thumbnail->getClientOriginalExtension();
                $destinationPath = public_path('/admin/images');
                $thumbnail->move($destinationPath, $thumbnail1);
                $data['thumbnail'] = $thumbnail1;
            }
            if (empty($request->id)) {
                $check = $this->admin->checkduplicateentry('categorys', 'slug', $request->slug);
                if (empty($check)) {
                    $data['name'] = $request->name;
                    $data['status'] = $request->status;
                    $data['parent_id'] = $request->category;
                    $data['slug'] = $request->slug;
                    $data['type'] = $request->type;
                    $result = $this->admin->insertdata('categorys',$data);
                    if ($result==1) {
                        return response()->json(['status'=>200,'success'=>'Record Successfully Create!']);
                    } else {
                        return response()->json(['status'=>200,'success'=>'This Query Not Run!']);
                    }
                } else {
                    return response()->json(['status'=>202,'error'=>'sulag value all already exists']);
                }
            } else {
                $data['name'] = $request->name;
                $data['status'] = $request->status;
                $data['parent_id'] = $request->category;
                $data['slug'] = $request->slug;
                $data['type'] = $request->type;
                $result = $this->admin->UpdateItem('categorys',$request->id,$data);
                if ($result==1) {
                    return response()->json(['status'=>200,'success'=>'Record Successful Update!']);
                } else {
                    return response()->json(['status'=>200,'success'=>'This Query Not Run!']);
                }
            }
        }
    }
    public function editcategory($id=""){
        $result = $this->admin->EditeItem('categorys','id',$id);
        if (!empty($result)) {
            return response()->json(['status'=>200,'sussess'=>$result]);
        } else {
            return response()->json(['status'=>201,'sussess'=>$result]);
        }
    }

    public function removecategory($id){
        $result = $this->admin->RemoveItem('categorys',$id);
        if ($result==1) {
            return redirect()->back()->with('success', 'Remove Record Successfully!');
        } else {
            return redirect()->back()->with('success', 'Query Not Run!');
        }
    }

    //create product
    public function product(){
        $result['product'] = $this->admin->GetallData('product');
        return view('admin.product.product',$result)->with('i');
    }
    public function createproduct(){
        $result['category'] = $this->admin->GetallData('categorys');
        return view('admin.product.createproduct',$result);
    }
    //create product
    public function addproduct(Request $request){
        if (empty($request->id)) {
            $this->validate($request, [
               "title" =>"required",
               "category" =>"required",
               "status" =>"required",
               "mrp" => "required",
               "price" => "required",
               "shortdescription" => "required",
               "description" => "required",
               "moredescription" => "required",
               "slug" => "required",
               "sku" => "required",
               'image' => 'image|mimes:jpeg,jpg,png,gif|required',
            ]);
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/admin/images');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }

            $data['title'] = $request->title;
            $data['catid'] = $request->category;
            $data['mrp_price'] = $request->mrp;
            $data['price'] = $request->price;
            $data['shortdescription'] = $request->shortdescription;
            $data['description'] = $request->description;
            $data['more_infomation'] = $request->moredescription;
            $data['slug'] = $request->slug;
            $data['sku'] = $request->sku;
            $data['status'] = $request->status;
            $data['type'] = $request->type;
            $result = $this->admin->insertdatagetid('product', $data);
            if ($result>0) {
                $this->admin->gallery($result, $request);
                return redirect()->back()->with('success', 'Product Create Successful!');
            } else {
                return redirect()->back()->with('success', 'Query Not Run!');
            }
        } else {
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/admin/images');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $data['title'] = $request->title;
            $data['catid'] = $request->category;
            $data['mrp_price'] = $request->mrp;
            $data['price'] = $request->price;
            $data['shortdescription'] = $request->shortdescription;
            $data['description'] = $request->description;
            $data['more_infomation'] = $request->moredescription;
            $data['slug'] = $request->slug;
            $data['sku'] = $request->sku;
            $data['status'] = $request->status;
            $data['type'] = $request->type;
            $update = $this->admin->UpdateItem('product',$request->id,$data);
            if($update==1){
               return redirect('admin/product')->with('success', 'Product Update Successful!');
            } else {
               return redirect()->back()->with('success', 'No Changes This Record!');
            }
        }
    }

    public function editproduct($id=""){
       $result['category'] = $this->admin->GetallData('categorys');
       $result['data'] = $this->admin->EditeItem('product','id',$id);
       return view('admin.product.createproduct',$result);
    }

    public function editimage($id){
       $data = $this->admin->EditeItem('product','id',$id);
       $result['proid'] = $id;
       if(!empty($data)){
          $result['image'] = $this->admin->GetbyDataCondition('gallery',['productid'=>$data->id]);
          return view('admin.product.gallery',$result)->with('i');
       } else {
          return redirect()->back()->with('success','Data Not Found');
       }
    }
    public function editgallery($id){
         $data = $this->admin->EditeItem('gallery','id',$id);
         return response()->json(['status'=>200,'sussess'=>$data]);
    }

    public function updategallery(Request $request){
        $validator = Validator::make($request->all(), [
            "image" => 'image|mimes:jpeg,jpg,png,gif|required',
           ]);
        if($validator->fails()) {
            return response()->json(['status'=>201,'error'=>$validator->errors()]);
        } else {
            if(empty($request->id)){
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/admin/images');
                    $image->move($destinationPath, $name);
                    $data['image'] = $name;
                    $data['productid'] = $request->proid;
                    $result = $this->admin->insertdata('gallery',$data);
                    if ($result==1) {
                        return response()->json(['status'=>200,'success'=>'Record Add Successful!']);
                    } else {
                        return response()->json(['status'=>201,'success'=>'Not Update Successful!']);
                    }
                }
            }  else {
                if(request()->hasFile('image')) {
                    $image = $request->file('image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/admin/images');
                    $image->move($destinationPath, $name);
                    $data['image'] = $name;
                    $result = $this->admin->UpdateItem('gallery', $request->id, $data);
                    if ($result==1) {
                        return response()->json(['status'=>200,'success'=>'Update Record Successful!']);
                    } else {
                        return response()->json(['status'=>201,'success'=>'Not Update Successful!']);
                    }
                }
            }
    }
    }
    public function removegallery($id=""){
        $result = $this->admin->RemoveItem('gallery',$id);
        if ($result==1) {
            return redirect()->back()->with('success', 'Remove Record Successfully!');
        } else {
            return redirect()->back()->with('success', 'Query Not Run!');
        }
    }

    public function addmultiprice($id=""){
        $result['data'] = $this->admin->GetbyDataCondition('multisize',['productid'=>$id]);
      
        $result['id'] = $id;
        return view('admin.product.addprice',$result)->with('i');
    }

    public function SaveSize(Request $request){

        $validator = Validator::make($request->all(), [
            'size' => 'required',
            'price' => 'required',
           ]);
           if ($validator->fails()) {
               return response()->json(['status'=>201,'error'=>$validator->errors()]);
           } else {
               $data['size'] = $request->size;
               $data['prices'] = $request->price;
               $data['productid'] = $request->productid;
               if (empty($request->id)) {
                   $result = $this->admin->insertdata('multisize', $data);
                   if ($result==1) {
                       return response()->json(['status'=>200,'success'=>'Record Add Successful!']);
                   } else {
                       return response()->json(['status'=>200,'success'=>'Not Change Record!']);
                   }
               } else {
                $result = $this->admin->UpdateItem('multisize',$request->id,$data);
                if ($result==1) {
                    return response()->json(['status'=>200,'success'=>'Record Update Successful!']);
                } else {
                    return response()->json(['status'=>200,'success'=>'Not Update Record!']);
                }
               }
        }
    }
    public function editsize($id=""){
        $data = $this->admin->EditeItem('multisize','id',$id);
        return response()->json(['status'=>200,'success'=>$data]);
    }
    public function removeprice($id=""){
        $result = $this->admin->RemoveItem('multisize',$id);
        if ($result==1) {
            return redirect()->back()->with('success', 'Remove Record Successfully!');
        } else {
            return redirect()->back()->with('success', 'Query Not Run!');
        }
    }

    public function aboutUs(){
        $result['data'] = $this->admin->SingalDatawitoutCondition('aboutus');
        return view('admin.about.about',$result);
    }
    public function createAbout(Request $request){
        $this->validate($request, [
            "title" =>"required",
            "description" => "required",
         ]);
         $data['title'] = $request->title;
         $data['description'] = $request->description;
         if(request()->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/admin/images');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
         }
        if(empty($request->id)){
            $result = $this->admin->insertdata('aboutus',$data);
            if ($result==1) {
                return redirect()->back()->with('success', 'Add Record Successfully!');
            } else {
                return redirect()->back()->with('success', 'Not Update Successful!');
            }
        } else {
            $update = $this->admin->UpdateItem('aboutus',$request->id,$data);
            if($update==1){
               return redirect()->back()->with('success', 'About Us Update Successful!');
            } else {
               return redirect()->back()->with('success', 'No Changes This Record!');
            }
        }
    }

    public function orders(){
        $result['order'] = $this->admin->GetAllData('orders');
        return view('admin.order.order',$result)->with('i');
    }

    //logout user
    public function adminlogout(){
        Auth::logout();
        return redirect('admin');
    }
    public function removeproduct($id=""){
          $result = $this->admin->RemoveItem('product',$id);
        if ($result==1) {
            return redirect()->back()->with('success', 'Remove Record Successfully!');
        } else {
            return redirect()->back()->with('success', 'Query Not Run!');
        }
    }

}

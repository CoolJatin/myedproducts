<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class admin extends Model{
    use HasFactory;
    //get all data for your table
    public function GetallData($table){
        $data = DB::table($table)->orderBy('id','DESC')->get();
        return $data;
    }
    //get all data by condition
    public function GetbyDataCondition($table,$data){
        $data = DB::table($table)->where($data)->latest()->get();
        return $data;
    }
     //get all data by condition
     public function GetbyDataConditionpaginat($table,$data,$value){
        $data = DB::table($table)->where($data)->latest()->paginate($value);
        return $data;
    }
    //insert data model
    public function insertdata($table,$data){
        $data = DB::table($table)->insert($data);
        return $data;
    }
    //checkduplicateentry
    public function checkduplicateentry($table,$fieldName,$name){
        $data = DB::table($table)->where($fieldName,$name)->first();
        return $data;
    }
    //Edit item
    public function EditeItem($table,$fild,$id){
        $data = DB::table($table)->where($fild,$id)->first();
        return $data;
    }
     //singal data
     public function SingalDatawitoutCondition($table){
        $data = DB::table($table)->first();
        return $data;
    }
    //singal data
    public function SingalData($table,$fild,$id){
        $data = DB::table($table)->where($fild,$id)->first();
        return $data;
    }
    //update items
    public function UpdateItem($table,$id,$data){
        $data = DB::table($table)->where('id',$id)->update($data);
        return $data;
     }
     //RemoveItem items
     public function RemoveItem($table,$id){
        $data = DB::table($table)->where('id',$id)->delete();
        return $data;
    }
    // limit function
    public function LimtData($table,$statr,$end,$fild){
        $data = DB::table($table)->where('type',$fild)->skip($statr)->take($end)->orderBy('id','DESC')->get();
        return $data;
    }
    //get singal id
    public function getdatabysingal($table,$columname,$name){
        $data = DB::table($table)->where($columname,$name)->first();
        return $data;
    }
    // insert get id
    public function insertdatagetid($table,$data){
        $data = DB::table($table)->insertGetId($data);
        return $data;
    }
    //gallery add
    public function gallery($id="",$request){
    $i = 1;
    $image = $request->file('multiimage');
        foreach ($image as $files) {
            $destinationPath = 'public/admin/images';
            $file_name = $i.time() . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $file_name);
            $data['image'] = $file_name;
            $data['productid'] = $id;
            DB::table('gallery')->insert($data);
            $i++;
        }
    }

}

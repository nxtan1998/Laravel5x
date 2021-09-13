<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Session;
use Auth;
// use Gloudemans\Shoppingcart\Facades\Cart;

class pagecontroller extends Controller
{
   public function muahang( Request $req)
    {
          $product = Product::where('id',$req->id)->first();
          
          
         // $product=Product::find($id);
                  // $a=Cart::add('293ad', 'Product 1', 1, 9.99)

           Cart::add(['id' =>$product->id, 'name' =>$product->name, 'qty' => 1, 'price' =>$product->unit_price*($product->promotion_price),'options' => ['img' => $product->image,'khuyenmai' =>$product->unit]]);
            // dd(Cart::content());
           $data=Cart::Content();                                         
      return redirect()->route('giohang');
      
    }
    public function getindex()
    {
         $slide=slide::all();
          $data=Cart::content();
        $product=Product::all();
         $new_product = Product::where('new',1)->paginate(4);
         $sanphamkhuyenmai=Product::where('unit','<>',0)->paginate(4);
        

        
    	 return view('page.trangchu',compact('slide','new_product','sanphamkhuyenmai','product','data'));
        // return view('page.trangchu',['slide'=>$slide]) ;
        

    }
    public function getloaisp($type)
    {
        $sp_theoloai = Product::where('id_type',$type)->paginate(4);
        $sanphamkhac=Product::where('id_type','<>',$type)->paginate(4);
        $loai = ProductType::all();
        $ten = ProductType::where('id',$type)->first();
        $data=Cart::content();
    	return view('page.loaisanpham',compact('sp_theoloai','sanphamkhac','loai','ten','data'));
    }
 
    public function getsp( Request $id)
    {
        $chitiet=Product::where('id',$id->id)->first();
        $spcungloai=Product::where('id_type',$chitiet->id_type)->paginate(3);
         $sanphammoi=Product::where('new','<>',0)->paginate(4);
         $sanphamkhuyenmai=Product::where('promotion_price','<>',0)->paginate(4);
         
    	return view('page.sanpham',compact('chitiet','spcungloai','sanphammoi','sanphamkhuyenmai'));
    }
    public function getlienhe()
    {
    	return view('page.lienhe');
    }
    public function getgioithieu()
    {
    	return view('page.gioithieu');
        
    }
   
    public function giohang()
    {
        $data=Cart::content();
        $total=Cart::subtotal();
        $product=Product::all();
        
        

         
      

     

        return view('page.giohang',compact('data','total','product'));

        


    }
     public function xoasanpham($id)
     {
      if($id=='all')
        Cart::destroy();
      else    
        Cart::remove($id);
        return back();
     }
     public function getcheckout()
     {
        $total=Cart::subtotal();

        return view('page.dathang',compact('total'));
     }
     public function postcheckout(Request $req)
     {
        $product=Product::all();
        $content=Cart::content();
        $total=Cart::subtotal();

        
        

        $customer = new Customer;
        $customer->name=$req->name;
        $customer->gender=$req->gender;
        $customer->email=$req->email;
        $customer->address=$req->address;
        $customer->phone_number=$req->phone;
        $customer->note=$req->notes;
        $customer->save();

        $bill=new Bill;
       $a=$bill->id_customer=$customer->id;
       $b=$bill->date_order=date('Y-m-d');
        $c= $bill->total=$total;
       
          $bill->payment=$req->payment;
          $bill->note=$req->notes;
           $bill->save();


        foreach ($content as $key => $value)
         {
            $a=Cart::content();
            
             $billdetail = new BillDetail;
             $billdetail->id_bill=$bill->id;
                $billdetail->id_product=$value->id;
              $billdetail->quantity=$value->qty;
             $billdetail->unit_price=($value->price)*($value->qty);
             $billdetail->save();
        }

           
           
         
  if(route('dathang'))
  {
      foreach ($content as $key => $value) 
      {
           foreach($product as $item)
           {
            if($item->id==$value->id)
                {
                  $key=$item->id;
                  $item->soluong=($item->soluong)-($value->qty);
                  $item->save();
                }
                
           }
      }
    }
    if(route('dathang'))
    {
      Cart::destroy();

    }

      return redirect()->back()->with('dathang','Đặt Hàng Thành Công');


      
    }
    public function getdangnhap()
    {
        return view('page.dangnhap');
    }
    public function postdangnhap(Request $req)
    {
    $validate=$req->validate(
      [
      'email'=>'required|email',
      'password'=>'required|min:6|max:20'

      ],
      [

      'email.required'=>'vui lòng nhập email',
      'email.email'=>'không đúng định dạng email',
      'password.required'=>'vui lòng nhập mật khẩu',
      'password.min'=>'mật khẩu chứa ít nhất 6 kí tự'
      ]);
      $dangnhap=array('email'=>$req->email,'password'=>$req->password);
      if(Auth::attempt($dangnhap)){
        return redirect()->back()->with('dangnhap','Đăng Nhập Thành Công');
      }
      else{
        return redirect()->back()->with('dangnhap','Đăng Nhập Không Thành Công');
      }
        



    }
    public function getdangki()
    {
        return view('page.dangki');
    }

    public function  postdangki(Request $req)
    {
        $validate=$req->validate(
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                 'fullname'=>'required',
                 'address'=>'required',
                 're_password'=>'required|same:password'
            ],
            [

                'email.required'=>'vui lòng nhập email',
                'email.email'=>'không đúng',
                'email.unique'=>'đã có người sử dụng email này',
                'password.required'=>'vui lòng nhập mật khẩu',
                're_password'=>'Mật khẩu không giống nhau',
                'password.min'=>'mật khẩu chứa ít nhất 6 kí tự'
            ]
        );
        $user=new User();
        $user->full_name=$req->fullname;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','tạo tài khoản thành công');

 
    }
    public function getdangxuat()
    {
      Auth::logout();
      return redirect()->route('trangchu');
    }
    public function gettimkiem(Request $req)
    {
      $product = Product::where('name','like','%'.$req->key.'%')
      ->orWhere('unit_price',$req->key)
      ->get();
      return view('page.timkiem',compact('product'));
    }
    public function abc()
    {
      return redirect()->back()->with('kiemtra','Không Đủ Số Lượng');
    }
    
 
}

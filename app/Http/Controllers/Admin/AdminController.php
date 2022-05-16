<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Admin;
use Image;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    } 
    public function updateAdminPassword(Request $request){
      if($request->isMethod('post')){
          $data = $request->all();
         // echo "<pre>"; print_r($data); die; 
          // Check if Current password entered by admin is correct
          if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
              //Check if Current password entered by admin is correct

              if($data['confirm_password']==$data['new_password']){
                 Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]); 
                 return redirect()->back()->with('success_message','Password Has been updated Successfully!');
              }else{
                return redirect()->back()->with('error_message','New Password and Confirm password do not match!');
              }
          }else{
              return redirect()->back()->with('error_message','Your current password is Incorrect!');
          }
      }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->
            toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function updateAdminDetails(Request $request){
        if($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;

           $rules = [
               'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
               'admin_mobile' => 'required|numeric',
           ];

           
           $customMessages = [
            'admin_name.required' => 'Name is required',
            'admin_mobile.regex' => 'Valid Name is required',
            'admin_mobile.required' => 'Mobile is required',
            'admin_mobile.numeric' => 'Valid Mobile is required',
        ];

           $this->validate($request,$rules,$customMessages);

         if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image'); 
                if($image_tmp->isValid()){
                   //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension(); 
                   // Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension; 
                    $imagePath = 'admin/images/photos/'.$imageName;
                   //Upload The Image 
                   Image::make($image_tmp)->save($imagePath);
                } 
        }else if(!empty($data['current_admin_image'])){
            $imageName = $data['current_admin_image'];
        }else{ 
            $imageName = "";
        }
        

        //Update ADmin Details
        Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'], 'mobile'=>$data['admin_mobile'],'image'=>$imageName]);
        return redirect()->back()->with('success_message','Admin Details Updated Successfully');
    }
    return view('admin.update-admin-details');
}

     


    public function mpesa(){
        return view('admin.mpesa');
    }

    public function pricing(){
        return view('admin.pricing');
    } 


    public function checkAdminPassword(Request $request){
        $data= $request->all();
        //echo "<pre>"; print_r($data); die;
        if(Hash::check($data['current_password'],Auth::guard("admin")->user()->password)){
        return "true";
         }else{
          return "false";
    }
}
    

    public function login(Request $request){
        // echo $password = Hash::make('123456'); die;

        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [ 
                'email.required' => 'Email is required!',
                'email.email' => 'Valid Email Address is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message','Invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}

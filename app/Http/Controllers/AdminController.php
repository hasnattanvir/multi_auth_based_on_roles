<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    function index(){
        return view('dashboard.admins.index');
    }

    function profile(){
        return view('dashboard.admins.profile');
    }

    function settings(){
        return view('dashboard.admins.settings');
    }

    function updateInfo(Request $request){
        $validator = \Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.Auth::user()->id,
            'favoritecolor'=>'required',

        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $query = User::find(Auth::user()->id)->update([
                'name' =>$request->name,
                'email'=>$request->email,
                'favoritecolor'=>$request->favoritecolor,
            ]);

            if(!$query){
                return response()->json(['status'=>0, 'msg'=>'Something went wrong.']);
            }else{
                return response()->json(['status'=>1, 'msg'=>'Your Profile info has been update successfuly.']);
               
            }
        }
    }



    function updatePicture(Request $request){
        $path = 'users/images/';
        $file = $request->file('admin_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        // upload new image
        $uplode = $file->move(public_path($path), $new_name);
        if(!$uplode){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed']);
        }else{
            //get old picture
            $oldpicture = User::find(Auth::user()->id)->getAttributes()['picture'];
            if($oldpicture != ''){
                if(\File::exists(public_path($path.$oldpicture))){
                    \File::delete(public_path($path.$oldpicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);
            if(!$uplode){
                return response()->json(['status'=>0, 'msg'=>'Something went wrong, updating picture in db failed.']);
            }else{
                return response()->json(['status'=>1, 'msg'=>'Your Profile picture has been update successfully']);
            }
        }
    }


    function changePasswordAdminForm(Request $request){
        $validator = \Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if(!\Hash::check($value, Auth::user()->password)){
                        return $fail(__('The Current Password is incorrent'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newpassword'=>'required|min:8|max:30',
            'cnewpassword'=>'required|same:newpassword'
        ],[
            'oldpassword.required'=>'Enter Your Current Password',
            'newpassword.required'=>'Enter Your New Password',
            'cnewpassword.required'=>'ReEnter Your New Password',
            'cnewpassword.same'=>'Password Not Match',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
           $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);
           if(!$update){
            return response()->json(['status'=>0, 'msg'=>'Something went wrong, Failed to update password in db']);
           }else{
            return response()->json(['status'=>1, 'msg'=>'Your password has been changed successfully']);
           }
        }
    }

}

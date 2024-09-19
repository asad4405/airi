<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    function user_update()
    {
        return view('backend.user.profile');
    }

    function user_update_store(Request $request)
    {
        User::find(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('user_update','User Updated!');
    }

    function user_password_update(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = User::find(Auth::id());
        if(Hash::check($request->current_password , $user->password)){
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return back()->with('pass_success','Password Updated!');
        }else{
            return back()->with('pass_wrong','Current Password Wrong!');
        }
    }

    function user_photo_update(Request $request)
    {
        if(Auth::user()->photo == null){
            $photo = $request->photo;
            $exension = $photo->extension();
            $file_name = Auth::id() . '.' . $exension;

            Image::make($photo)->save(public_path('uploads/user/' . $file_name));

            User::find(Auth()->id())->update([
                'photo' => $file_name,
            ]);

            return back()->with('photo_update', 'Photo Udated Successfull!');
        }else{
            $current_img = public_path('uploads/user/' . Auth::user()->photo);
            unlink($current_img);

            $photo = $request->photo;
            $exension = $photo->extension();
            $file_name = Auth::id() . '.' . $exension;

            Image::make($photo)->save(public_path('uploads/user/' . $file_name));

            User::find(Auth()->id())->update([
                'photo' => $file_name,
            ]);

            return back()->with('photo_update', 'Photo Udated Successfull!');
        }
    }

    function index(Request $request)
    {
        $users = User::where('id','!=',Auth::id())->get();
        return view('backend.user.index',compact('users'));
    }

    function user_store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return back()->with('add_user','User Added Success!');
    }

    function user_delete($id)
    {
        $user = User::find($id);

        if($user->photo){
            $current_img = public_path('uploads/user/' . Auth::user()->photo);
            unlink($current_img);
        }

        $user->delete();
        return back()->with('user_delete','User Deleted Success!');
    }
}

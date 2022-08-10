<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
class AdminController extends Controller
{
    //

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile',compact('adminData'));

    }

    public function Editprofile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));

    }

    public function Updateprofile(Request $request)
    {
         $id = Auth::user()->id;
         $data = User::find($id);
         $data->name = $request->name;
         $data->email = $request->email;
         $file =  time().".".$request->image->extension(); 
         $request->image->move('image', $file);
         $data->image = $file;
         $data->save();
         return redirect()->route('admin.profile'); 
    }

    public function ChangePassword(){
        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request){

        $validate = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);
        $hashedpassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedpassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->newpassword);
            $user->save();
            $request->session()->flash('message','Password Updated Successfully');
            return back();
        }else{
            $request->session()->flash('message','Old Password deos not Match');
            return back();
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vote;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard1()
    {
        $users=User::all();
        $votes=Vote::all();
        $questions=Question::all();
        return view('home1',compact('users','votes','questions'));
    }
    public function profile(){
        return view("profile.index");
    }
    public function postProfile(Request $request){
        $user = auth()->guard('admin')->user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id
        ]);

        $user->update($request->all());

        return redirect()->back()->with('success', 'Profile Successfully Updated');
    }
    public function getPassword(){
        return view('profile.password');
    }

    public function postPassword(Request $request){

        $this->validate($request, [
            'newpassword' => 'required|min:6|max:30|confirmed'
        ]);

        $user = auth()->guard('admin')->user();

        $user->update([
            'password' => bcrypt($request->newpassword)
        ]);

        return redirect()->back()->with('success', 'Password has been Changed Successfully');
    }
    public function getuserstatus()
    {
       $users=User::all();
       return view('Notifications.index',compact('users'));
    }
    // public function changeStatus(Request $request) {
    //    $data=User::findOrFial($request->id)->update(['status'=>$request->status]);
    //   if($request->status==0)
    //   {
    //       $newStatus='<br><button type="button class="btn btn-sm btn-danger">incative</button>';
    //   }
    //   else{
    //     $newStatus='<br><button type="button class="btn btn-sm btn-success">incative</button>';
    //   }
    //   return response()->json(['var'=>''.$newStatus.'']);

    // }



}

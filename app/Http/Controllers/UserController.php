<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatabaseStorageModel;
use Session;
use Auth;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session as FacadesSession;

class UserController extends Controller
{
    public function adminLogin(){

        
        return view('pages.login');
    }

    public function postAdminLogin(Request $request){

        



       if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
       {
           return redirect('admin/dashboard');
       }else{
           return redirect('/login');
       }

        
        return view('pages.login');
    }

    public function sign_in_form(){
        return view('registration.signin');
    }

    public function forgot_passsword_form(){
        return view('registration.forgot_password');
    }

    public function store_user(Request $request){
        $this->validate($request, [
            'first_name'    => 'required', 
            'last_name'    => 'required', 
            'user_name'    => 'required', 
            'email'    => 'required|email|unique:users,email', 
            'password' => 'required|min:6'
        ]);

        $user=New User();
        $user->first_name=$request->Input('first_name');
        $user->last_name=$request->Input('last_name');
        $user->user_name=$request->Input('user_name');
        $user->email=$request->Input('email');
        $user->password=bcrypt($request->Input('password'));
        if($user->save()){
            $data=$html=[
                'name'=>$user->first_name.' '.$user->last_name,
                'email'=>$request->Input('email')
            ];

            $view = view('email.welcome',compact('data','html'))->render();
            // echo $view;exit();

            // Mail::send('email.welcome',['html' => $data], function($message) use ($email) {
            //         $message->to($email);
            //         $message->subject('Welcome to Autodukan');
            // });
            Session::flash('success',"User Created Successfully.");
            return back();
        }else{
            Session::flash('error',"Something went wrong while updating user.");
            return back();
        }
    }

    public function edit_profile($user_id){
        $user_id=base64_decode($user_id);
        $user=User::find($user_id);
        return view('user.edit_profile',compact('user'));
    }

    public function profile_detail(){
        $auth_id=Auth::id();
        $user=User::where('id',$auth_id)->first();
        return view('user.profile',compact('user'));
    }

    public function update_user(Request $request,$user_id){
        $this->validate($request, [
            'first_name'    => 'required', 
            'last_name'    => 'required', 
            'user_name'    => 'required', 
            'email'    => 'required|email|unique:users,email,'.$user_id, 
        ]);

        $user=User::find($user_id);
        $user->first_name=$request->Input('first_name');
        $user->last_name=$request->Input('last_name');
        $user->user_name=$request->Input('user_name');
        $user->email=$request->Input('email');
        if($user->save()){
            Session::flash('success',"Profile Updated Successfully.");
            return redirect('profile-detail');
        }else{
            Session::flash('error',"Something went wrong while updating profile.");
            return back();
        }
    }

    public function forgot_password(Request $request){
        $this->validate($request, [
            'email'    => 'required|email'
        ]);
        $email=$request->Input('email');
        $user_info=User::where('email',$email)->first();
        if(!empty($user_info)){

            $token = md5(strtotime(date('Y-m-d H:i:s')) . md5($user_info->id));
            $reset_url = url('/set-password?token='). $token;
            $data  = array(
                'reset_token' => $token
            );
            User::where('id',$user_info->id)->update($data);

            $html=$data=[
                'name'=>$user_info['first_name'].' '.$user_info['last_name'],
                'email'=>$user_info['email'],
                'reset_link'=>$reset_url
                // 'token'=>$token
            ];
            $email=$user_info['email'];
            $view = view('email.reset',compact('data','html'))->render();
            // echo $view;exit();
            // Mail::send('email.reset',['html' => $data], function($message) use ($email) {
            //         $message->to($email);
            //         $message->subject('Wandermonkey - Forgot Password');
            // });

            Session::flash('success',"We sent you an email with a token to reset your password.");
            return back();
        }else{
            Session::flash('error',"Email does not exists.");
            return back();
        }
    }

    function change_password(){
        return view('user.change_password');
    }

    function update_password(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
          ]);
  
          $user = User::find(Auth::id());
          if (!Hash::check($request->current_password, $user->password)) {
              Session::flash('error',"Current password does not match!");
              return back();
          }
  
          $user->password = bcrypt($request->password);
          if($user->save()){
            Session::flash('success',"Password successfully changed!");
            return redirect('profile-detail');
          }else{
            Session::flash('error',"Something went wrong while updating password.");
            return back();
          }
    }

    function getReset(Request $request){
        $token = $request->query('token');
        return view('registration.reset',compact('token'));
    }

    function reset_password(Request $request) {
        
        $password=$request->Input('password');
        $confirm_password=$request->Input('confirm_password');
        $token=$request->Input('token');

        if($password != $confirm_password){
            Session::flash('fails',' Repeat password does not match');
            return back();
            exit;
        }

        $user_info=User::where('reset_token',$token)->first();
        if(empty($user_info)){
            Session::flash('fails',' Invalid token' );
            return back();
            exit;
        }

        if(!empty($user_info)){
            $data  = array(
                'reset_token' => "",
                'password'=> bcrypt($password)
             );
            User::where('reset_token',$token)->update($data);
            Session::flash('success',"Password set successfully.");
            return back();
            exit;
        }
    }
    
    public function login(Request $request){
        $this->validate($request, [
            'email'    => 'required|email', 
            'password' => 'required'
        ]);

        $user = trim($request->Input('email'));
        $pass = trim($request->Input('password'));
        
        if(Auth::attempt(['email' => $user, 'password' => $pass])) 
        {  
            $userID=\Session::getId();
            $cart_id=$userID.'_cart_items';
            $cart=DatabaseStorageModel::where('id',$cart_id)->first();
            if(!empty($cart)){
                $userID=Auth::id();
                $cart_id=$userID.'_cart_items';
                DatabaseStorageModel::where('id',$cart_id)->update(['id'=>$cart_id]);
            }
            return Redirect('/');
        }
        else
        {
            Session::flash('fails',' Incorrect email or password..!');
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Auth;
use App\Order;
use App\orders_item;
use DB;

class UserController extends Controller
{

    //Sign Up Functions

    public function getSignup()
    {
      return view('user.signup');
    }

    public function postSignup(Request $request)
    {
      $this->validate($request,[
        'email' =>'email|required|unique:users',
        'password'=>'required|min:4'
      ]);

      $user = new User([
        'email' => $request->input('email'),
        'password'=> bcrypt($request->input('password')),
        'name'=> 1,
        'name_of_practice'=>'test',
        'contact_no'=>'02089333538',
        'tier'=>1,
        'warehouse'=>'warehouse1'
      ]);

      $user->save();
      Auth::login($user);
      return redirect()->route('product.index');
    }

      //Sign In Functions

    public function getSignin()
    {
      return view('user.signin');
    }

    public function postSignin(Request $request)
    {
      $this->validate($request,[
        'email' =>'email|required',
        'password'=>'required|min:4'
      ]);

      if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')]))
        {
          return redirect()->route('user.profile');
        }
        return redirect()->route('product.index');
    }

    //Get User's Profile

    public function getProfile()
    {
      return view('user.profile');
    }

    //Grab Orders

    public function getOrders()
    {
      $user = Auth::user()->id;
      $Orders = DB::table('orders')->where('user_id', $user)->get();
      if (empty($Orders)) {
        return redirect()->route('user.yourOrders');
      }
      return view('user.yourorders', ['orders' => $Orders]);
    }

    public function getorderDetails($id)
    {
      $user = Auth::user()->id;
      $Orders = DB::select("select * from orders_items inner join orders where orders_items.order_id = orders.id and user_id = $user and order_id = $id");
      if (empty($Orders)) {
        return redirect()->route('user.yourOrders');
      }
      return view('user.yourorderDetails', ['orders' => $Orders, 'orderid' => $id]);
    }

    //Logout Function

    public function getLogout()
    {
      Auth::logout();
      return redirect()->route('product.index');
    }
}

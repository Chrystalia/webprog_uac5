<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request){
        // validate request data
        $validated = $request->validate([
            'gender' => 'required|in:Male,Female',
            'field_of_work_interests' => 'required|array|min:3',
            'field_of_work_interests.*' => 'string',
            'linkedin_username' => 'required|string',
            'mobile_number' => 'required|digits_between:10,15',
            'location' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|string|min:8'
        ]);
        // process data
        $user = new User();
        $user->gender = $validated['gender'];
        $user->field_of_work_interests = $validated['field_of_work_interests'];
        $user->linkedin_username = $validated['linkedin_username'];
        $user->mobile_number = $validated['mobile_number'];
        $user->location = $validated['location'];
        if($request->photo){
            $user->photo = $request->photo ? $request->file('photo')->store('') : ''; // upload file jika ada dan simpan path-nya
        }
        $user->password = Hash::make($request->password);
        // $user->save();
        // return success message
        // return redirect('/payment')->with('registered', 'Your account have been registered');

        return view('payment',[
            'new_user' => $user,
            'registration_price' => rand(100000, 125000)
        ]);
    }

    public function payment(Request $request){
        $user = new User();
        $user->gender = $request->input('gender');
        $user->field_of_work_interests = json_encode($request->input('field_of_work_interests'));
        $user->linkedin_username = $request->input('linkedin_username');
        $user->mobile_number = $request->input('mobile_number');
        $user->location = $request->input('location');
        $user->photo = $request->input('photo');
        $user->password = $request->input('password');

        if($request->money < $request->registration_price ){
            return redirect('/login')->with('underpaid', 'You are still underpaid ' . $request->registration_price - $request->money);
        } else if($request->money > $request->registration_price){
            $user->money =$request->money - $request->registration_price;
            $user->save();
            return redirect('/login')->with('overpaid', 'Account created. You are overpaid, ' . $request->money - $request->registration_price . ' the rest of your money is inputted to the wallet' );
        } else {
            $user->save();
            return redirect('/login')->with('success', 'Account created' );
        }
    }

    public function login(Request $request){
        $validate = $request->validate([
            'input' => 'required',
            'password' => 'required',
        ]);

        // Attempt to login with email
        $validate = ['linkedin_username' => $request->input, 'password' => $request->password];
        if (Auth::attempt($validate)) {
            // Login successful, redirect to desired location
            $request->session()->regenerate();
            return redirect('/dashboard');
        } else {
            // Login failed, redirect back with an error message
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout(){
        // logout dengan menggunakan model Auth
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function showSignUpForm()
    {
        return view('admin.signup');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees',
            'password' => 'required|min:3|max:255',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.signin');
    }

    public function showSignIn()
    {
        return view('admin.signin');
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email,'password' => $request->password, ])) {
                 return redirect()->route('admin.profile');
        }
    return redirect()->back();
 }

    public function profile()
    {
        $employee = auth()->user();
        return view('admin.profile', compact('employee'));
    }

    public function logout(Request $request)
    {
        auth()->guard('web')->logout();
        $request->session()->invalid();
        $request->session()->generateToken();
        return redirect()->route('admin.signin');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_request(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Admin::query()->where('email', $request->email)->exists()) {
            if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'success' => true,
                    'message' => 'Admin Logged In Successfully'
                ]);
            } else {
                if (Admin::query()->where('email', $request->email)->count() > 0) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Password you entered is Incorrect'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Something went wrong try again Later'
                    ]);
                }
            }

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email you entered is Invalid. Try again with Valid email'
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}

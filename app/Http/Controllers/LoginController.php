<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Handle user login.
     */
    public function check(Request $request)
    {
   
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

     
        if (Auth::attempt($validated)) {
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

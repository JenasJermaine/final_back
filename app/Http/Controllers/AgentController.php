<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return response()->json($agents);
    }
    //
    public function show($id)
    {
        $agent = Agent::find($id);
        return response()->json($agent);
    }
    //
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_and_second_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:agent,email',
            'phone_number' => 'required|string|max:20',
            'county' => 'required|string|max:255',
            'commission_rate' => 'required|numeric|min:0|max:100',
            'successful_sales' => 'required|integer|min:0',
        ]);

        // Handle the profile picture upload
        if ($request->hasFile('profile_pic')) {
            $path = $request->file('profile_pic')->store('profile_pics', 'public');
            $validatedData['profile_pic'] = $path;
        }

        // Create a new agent record
        $agent = Agent::create($validatedData);

        // Return a response
        return response()->json([
            'message' => 'Agent profile created successfully',
            'agent' => $agent,
        ], 201);
    }
}

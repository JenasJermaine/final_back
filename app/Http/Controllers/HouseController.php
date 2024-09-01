<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        return response()->json($houses);
    }
    //
    public function show($id)
    {
        $agent = House::find($id);
        return response()->json($agent);
    }
    /**
     * Store a newly created house in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'photos' => 'array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'homeType' => 'required|string|max:255',
            'noFloors' => 'required|integer|min:1',
            'noBedrooms' => 'required|integer|min:1',
            'noFullBathrooms' => 'required|integer|min:1',
            'maxHouseWidth' => 'required|integer|min:1',
            'maxHouseLength' => 'required|integer|min:1',
            'landSize' => 'required|integer|min:1',
            'yearBuilt' => 'required|integer|min:1800|max:' . date('Y'),
            'furnishedStatus' => 'required|string|max:255',
            'garageType' => 'required|string|max:255',
            'sellType' => 'required|string|in:For Rent,Permanent',
            'price' => 'required|integer|min:0',
            'email' => 'required|email|max:255',
            'phoneNumber' => 'required|string|max:20|',
            'county' => 'required|string|max:255',
            'coordinates' => 'required|string',
        ]);

        $photoPaths = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('house_photos', 'public');
                $photoPaths[] = $path;
            }
        }

        // Create the house record
        $house = House::create([
            'photoPaths' => $photoPaths, // Store photo paths as JSON
            'homeType' => $validatedData['homeType'],
            'noFloors' => $validatedData['noFloors'],
            'noBedrooms' => $validatedData['noBedrooms'],
            'noFullBathrooms' => $validatedData['noFullBathrooms'],
            'maxHouseWidth' => $validatedData['maxHouseWidth'],
            'maxHouseLength' => $validatedData['maxHouseLength'],
            'landSize' => $validatedData['landSize'],
            'yearBuilt' => $validatedData['yearBuilt'],
            'furnishedStatus' => $validatedData['furnishedStatus'],
            'garageType' => $validatedData['garageType'],
            'sellType' => $validatedData['sellType'],
            'price' => $validatedData['price'],
            'email' => $validatedData['email'],
            'phoneNumber' => $validatedData['phoneNumber'],
            'county' => $validatedData['county'],    // Save location data
            'coordinates' => $validatedData['coordinates'],
        ]);

        return response()->json(['success' => true, 'house' => $house], 201);
    }
}

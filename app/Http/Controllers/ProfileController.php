<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'max:255',
            'business_address' => 'max:255',
        ]);
        try {
            $request->user()->update($validated);
        } catch (\Exception $e) {
            return response()->json([], 500);
        }
        return response()->json([], 200);
    }
}
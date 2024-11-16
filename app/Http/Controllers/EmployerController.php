<?php

namespace App\Http\Controllers;

use App\Models\employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('employeeProfile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $employeeProfile = employer::where('user_id', $user->id)->first();
        if ($employeeProfile) {
            return redirect()->to("/employeeProfile/{$employeeProfile->id}/edit");
        }

        return view('employeeProfile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id',
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'industry' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $profilePicturePath = null;
        if ($request->hasFile('logo')) {
            $profilePicturePath = $request->file('logo')->store('logo', 'public');
        }

        employer::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'company_description' => $request->company_description,
            'industry' => $request->industry,
            'website' => $request->website,
            'phone' => $request->phone,
            'address' => $request->address,
            'profile_picture' => $profilePicturePath,
        ]);

        return redirect()->to('/employeeProfile')->with('success', 'Profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employer $employeeProfile)
    {
        return view('employeeProfile.edit', ['employer' => $employeeProfile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employer $employer)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'industry' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profilePicturePath = $employer->logo;
        if ($request->hasFile('logo')) {
            $profilePicturePath = $request->file('logo')->store('logo', 'public');
        }

        $employer->update([
            'company_name' => $request->company_name,
            'company_description' => $request->company_description,
            'industry' => $request->industry,
            'website' => $request->website,
            'phone' => $request->phone,
            'address' => $request->address,
            'logo' => $profilePicturePath,
        ]);

        return redirect()->to('/employeeProfile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employer $employer)
    {
        //
    }
}

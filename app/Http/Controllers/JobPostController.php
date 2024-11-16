<?php

namespace App\Http\Controllers;

use App\Models\jobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jobPost.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobPost.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'job_type' => 'required|string',
            'contact_phone' => 'required|string',
            'contact_email' => 'required|email',
            'status' => 'required|string',
        ]);

        // Dapatkan user yang sedang login
        $user = Auth::user();

        // Cek apakah user memiliki employerProfile
        if ($user && $user->employerProfile) {
            $validatedData['employer_id'] = $user->employerProfile->id;
        } else {
            // Jika tidak ada employerProfile, redirect dengan error
            return redirect()->back()->with('error', 'Employer profile is required.');
        }

        // Simpan job post
        jobPost::create($request->all());

        return redirect()->to('/jobPost')->with('success', 'Job post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(jobPost $jobPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jobPost $jobPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jobPost $jobPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jobPost $jobPost)
    {
        //
    }
}


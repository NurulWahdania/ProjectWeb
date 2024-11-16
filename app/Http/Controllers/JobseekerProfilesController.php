<?php

namespace App\Http\Controllers;

use App\Models\jobseekerProfiles;
use Illuminate\Http\Request;

class JobseekerProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jobSeekerProfile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(jobseekerProfiles $jobseekerProfiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jobseekerProfiles $jobseekerProfiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jobseekerProfiles $jobseekerProfiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jobseekerProfiles $jobseekerProfiles)
    {
        //
    }
}

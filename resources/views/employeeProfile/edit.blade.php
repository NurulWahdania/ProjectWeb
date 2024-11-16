@extends('dashboard.template')

@section('header')
    Edit Employee Profile
@endsection

@section('content')
<div class="container">
    <form action="{{ url("/employeeProfile/$employer->id") }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2 class="mb-4">EMPLOYEE PROFILE</h2>
        <div>
            <label for="profile_picture">Masukan foto Profile</label>
            <input type="file" id="logo" name="logo">
        </div>
        <div>
            <label for="company_Name">Nama Perusahaan</label>
            <input type="text" id="company_name" name="company_name" value="{{ $employer->company_name }}">
        </div>
        <div>
            <label for="company_Name">Deskripsi Perusahaan</label>
            <input type="text" id="company_description" name="company_description" value="{{ $employer->company_description }}">
        </div>
        <div>
            <label for="company_Name">Industri</label>
            <input type="text" id="industry" name="industry" value="{{ $employer->industry }}">
        </div>
        <div>
            <label for="company_Name">Website Perusahaan</label>
            <input type="text" id="website" name="website" value="{{ $employer->website }}">
        </div>
        <div>
            <label for="company_Name">Nomor Perusahaan</label>
            <input type="text" id="phone" name="phone" value="{{ $employer->phone }}">
        </div>
        <div>
            <label for="company_Name">Alamat Perusahaan</label>
            <input type="text" id="address" name="address" value="{{ $employer->address }}">
        </div>
    </div>
    <button type="submit" class="bg-red-900">Update</button>
    </form>
</div>
@endsection
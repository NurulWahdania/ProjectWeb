@extends('dashboard.template')

@section('header')
    Create Employee Profile
@endsection

@section('content')
<div class="container">
    <form action="{{ url('/employeeProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 class="mb-4">EMPLOYEE PROFILE</h2>
        <div>
            <label for="profile_picture">Masukan foto Profile</label>
            <input type="file" id="logo" name="logo">
        </div>
        <div>
            <label for="company_Name">Nama Perusahaan</label>
            <input type="text" id="company_name" name="company_name">
        </div>
        <div>
            <label for="company_Name">Deskripsi Perusahaan</label>
            <input type="text" id="company_description" name="company_description">
        </div>
        <div>
            <label for="company_Name">Industri</label>
            <input type="text" id="industry" name="industry">
        </div>
        <div>
            <label for="company_Name">Website Perusahaan</label>
            <input type="text" id="website" name="website">
        </div>
        <div>
            <label for="company_Name">Nomor Perusahaan</label>
            <input type="text" id="phone" name="phone">
        </div>
        <div>
            <label for="company_Name">Alamat Perusahaan</label>
            <input type="text" id="address" name="address">
        </div>
    </div>
    <button type="submit" class="bg-red-900">Update</button>
    </form>
</div>
@endsection
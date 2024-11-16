<!-- filepath: /d:/4. PROJECT/PROJEK WEB/ProjectWeb/resources/views/jobPost/create.blade.php -->
@extends('dashboard.template')

@section('header')
    Create Job Post
@endsection

@section('content')
    <div class="container">
        <form action="{{ url('/jobPost') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Job Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" required>
            </div>
            <div>
                <label for="type">Type</label>
                <select class="form-control" id="type" name="job_type" required>
                    <option value="fulltime">Full Time</option>
                    <option value="parttime">Part Time</option>
                    <option value="contract">Contract</option>
                </select>
            </div>
            <div>
                <label for="contact_phone">Phone</label>
                <input type="text" id='contact_phone' name='contact_phone'>
            </div>
            <div>
                <label for="contact_phone">email</label>
                <input type="text" id='contact_email' name='contact_email'>
            </div>
            <div>
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

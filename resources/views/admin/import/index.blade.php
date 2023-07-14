@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-3" style="width: 930px">
        <h1 class="text-dark">Dashboard</h1>
        <p class="text-secondary">
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Import Data</span>
            </span>
        </p>
        @if ($message = Session::get('success'))
            <div class="alert alert-success fade show" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <span><strong>Success :</strong> {{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="text-secondary">Import Data from Excel file</h3>
            </div>
            <hr class="m-0">
            <div class="card-body">
                <form action="{{ route('import.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mx-1 d-flex justify-content-between align-items-center">
                        <input type="file" name="file" class="form-control w-50 col-lg-9">
                        <button class="btn text-light mb-2 col-lg-3" id="bg-sews">Import Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

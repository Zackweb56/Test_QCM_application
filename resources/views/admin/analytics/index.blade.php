@extends('admin.dashboard')

@section('dashboard')
    <div class="container m-4" style="width: 930px">

        <h1 class="text-dark">Analytics Page</h1>
        <p class="text-secondary">
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Analytics Page</span>
            </span>
        </p>

        <div class="row">
            <div class="col-lg-4" style="width: 300px">
                <div class="box1 card rounded-3">
                    <div class="text-dark p-2 d-flex justify-content-between align-items-center">
                        <h2 class="py-3 px-1">Total Admins</h2>
                        <h1 class="p-3 fa-solid fa-users"></h1>
                    </div>
                    <h1 class="px-3 fs-1">{{ $total_admins }}</h1>
                </div>
            </div>
            <div class="col-lg-4" style="width: 300px">
                <div class="box2 card rounded-3">
                    <div class="text-dark p-2 d-flex justify-content-between align-items-center">
                        <h4 class="py-3 px-1">Total Users Not Approved</h4>
                        <h1 class="p-3 fa-solid fa-users"></h1>
                    </div>
                    <h1 class="px-3 fs-1">{{ $total_users_notapproved }}</h1>
                </div>
            </div>
            <div class="col-lg-4" style="width: 300px">
                <div class="box3 card rounded-3">
                    <div class="text-dark p-2 d-flex justify-content-between align-items-center">
                        <h4 class="py-3 px-1">Total Users Approved</h4>
                        <h1 class="p-3 fa-solid fa-users"></h1>
                    </div>
                    <h1 class="px-3 fs-1">{{ $total_users_approved }}</h1>
                </div>
            </div>
            <hr class="m-0 py-3">
            <div class="col-lg-4" style="width: 300px">
                <div class="box4 card rounded-3">
                    <div class="text-dark p-2 d-flex justify-content-between align-items-center">
                        <h2 class="py-3 px-1">Total Categories</h2>
                        <h1 class="p-3 fa-solid fa-list"></h1>
                    </div>
                    <h1 class="px-3 fs-1">{{ $total_categories }}</h1>
                </div>
            </div>
            <div class="col-lg-4" style="width: 300px">
                <div class="box5 card rounded-3">
                    <div class="text-dark p-2 d-flex justify-content-between align-items-center">
                        <h2 class="py-3 px-1">Total Questions</h2>
                        <h1 class="text-dark p-3 fa-solid fa-question-circle"></h1>
                    </div>
                    <h1 class="px-3 fs-1">{{ $total_questions }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

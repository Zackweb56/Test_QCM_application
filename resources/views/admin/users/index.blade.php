@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-3" style="width: 930px">
        <h1 class="text-dark">Dashboard</h1>
        <p class="text-secondary">
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Users</span>
            </span>
        </p>
        @if ($message = Session::get('success'))
            <div class="alert alert-success fade show" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <span><strong>Success :</strong> {{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @elseif ($message = Session::get('failed'))
            <div class="alert alert-warning fade show" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <span><strong>Warning :</strong> {{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        {{-- ------------ --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="text-secondary">Users Admin Page</h1>
            </div>
            <hr class="m-0">
            <div class="card-body">
                <form action="{{ route('users.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" name="submit_btn" value="approve" class="btn btn-success mt-0 mb-3">
                        <i class="fa-solid fa-check"></i>&nbsp; Approve
                    </button>

                    <button type="submit" name="submit_btn" value="disapprove" class="btn btn-danger mt-0 mb-3">
                        <i class="fa-solid fa-close"></i>&nbsp; Disapprove
                    </button>

                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select_all_id" id="select_all_id"></th>
                                    <th>#</th>
                                    <th>name</th>
                                    <th class="w-50">Email</th>
                                    <th>type</th>
                                    <th>is validated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="users[]" class="checkbox_ids" value="{{ $user->id }}">
                                        </td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email  }}</td>
                                        <td>{{ $user->user_type  }}</td>
                                        <td>
                                            @if ($user->is_validated == false)
                                                <span class="badge bg-danger fs-5 text-light">not approved</span>
                                            @else
                                                <span class="badge bg-success fs-5 text-light">approved</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <span class="text-danger fs-2 bg-danger text-white p-2">No Data Available !</span>
                                @endforelse
                            </tbody>
                        </table>
                    {{-- </form> --}}
                </form>

                {{ $users->links() }}

            </div>
        </div>
    </div>

@endsection

@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-3" style="width: 930px">
        <h1 class="text-dark">Dashboard</h1>
        <p class="text-secondary">
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Candidate Results</span>
            </span>
        </p>
        {{-- ------------ --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="text-secondary">Candidate Results Page</h1>
            </div>
            <hr class="m-0">
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            {{-- <th><input type="checkbox" name="select_all_id" id="select_all_id"></th> --}}
                            {{-- <th>#</th> --}}
                            <th>Candidate Name</th>
                            <th>Test Category</th>
                            <th>Test Status</th>
                            <th>Test Score</th>
                            <th class="w-25">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($results as $result)
                            <tr>
                                {{-- <td>{{ $result->id }}</td> --}}
                                <td>{{ $result->user->name }}</td>
                                <td>{{ $result->category  }}</td>
                                <td>
                                    @if ($result->status >= 70)
                                        <span class="badge bg-success text-light fs-5">Succeeded</span>
                                    @else
                                        <span class="badge bg-danger text-light fs-5">Failed</span>
                                    @endif
                                </td>
                                <td>{{ $result->status }} %</td>
                                <td>
                                    <a href="{{ route('adminResults.show', $result->id) }}" class="btn btn-md text-light" id="bg-sews"><i class="fa-solid fa-eye"></i> Show Result</a>
                                </td>
                            </tr>
                        @empty
                            <span class="text-danger fs-2 bg-danger text-white p-2">No Candidate Result Available !</span>
                        @endforelse
                    </tbody>
                </table>
                {{ $results->links() }}
            </div>
        </div>
    </div>

@endsection

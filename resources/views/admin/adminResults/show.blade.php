@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-3" style="width: 930px"">
        <h1 class="text-dark">Dashboard</h1>
        <p class="text-secondary d-flex justify-content-between align-items-center">
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Result Page</span>
            </span>
            <a href="{{ route('adminResults.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
        </p>
        {{-- @forelse ($results as $result) --}}
        <div class="card w-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="fs-3">Candidate Name : <span class="text-secondary">{{ $showResults->user->name }}</span></h1>
                <h1 class="fs-3">Category : <span class="text-secondary">{{ $showResults->category }}</span></h1>
                <h1 class="fs-3">score : <span class="text-secondary">{{ $showResults->status }} %</span></h1>
                <h1 class="fs-3">Status :
                    <span  class="{{ $showResults->status >= 70 ? 'text-success' : 'text-danger' }}">
                        @if ($showResults->status >= 70)
                            Succeeded
                        @else
                            Failed
                        @endif
                    </span>
                </h1>
            </div>
            <hr class="m-0 p-0">
            <div class="card-body d-flex justify-content-center align-items-center">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th class="w-50">Questions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $key => $value)
                            <tr>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th class="w-50">User Answers</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userAnswers as $key => $value)
                            <tr>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th class="w-50">Correct Answers</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($correct_answers as $key => $value)
                            <tr>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

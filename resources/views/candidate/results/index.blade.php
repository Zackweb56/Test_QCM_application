@extends('layouts.app')

@section('content')
    <div class="container mt-3" style="width: 930px"">
        <h1 class="text-dark">Dashboard</h1>
        <p class="text-secondary d-flex justify-content-between align-items-center">
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Result Page</span>
            </span>
            <a href="{{ route('tests.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back to the Home Page</a>
        </p>
        {{-- @forelse ($results as $result) --}}
            <div class="card w-100">
                {{-- <h1 class="p-4">name : {{ Auth::user()->name }}</h1> --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1>Category : {{ $results->category }}</h1>
                    <h1>score : {{ $results->status }} %</h1>
                    <h1>Status :
                        <span  class="{{ $results->status >= 70 ? 'text-success' : 'text-danger' }}">
                            @if ($results->status >= 70)
                                Succeeded
                            @else
                                Failed
                            @endif
                        </span>
                    </h1>
                </div>
                <hr class="m-0">
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
        {{-- @empty
            <span class="text-danger fs-2 bg-danger text-white p-2">No Results Available !</span>
        @endforelse --}}
    </div>
@endsection

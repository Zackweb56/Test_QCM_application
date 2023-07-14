@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-3" style="width: 930px">
        <h1 class="text-dark">Dashboard</h1>
        <p class="text-secondary">
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Show</span>
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
                <h1 class="text-secondary">Questions Admin Page</h1>
                <a href="{{ route('questions.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>&nbsp; Add New Questions</a>
            </div>
            <hr>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="w-50">Question name</th>
                            <th class="w-50">Question category</th>
                            <th class="w-25">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->question_name }}</td>
                                <td>{{ $question->category->category_name }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn text-light mx-1" id="bg-sews"><i class="fa-solid fa-edit"></i></a>
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('are you sure you want to delete this Question?')" class="btn btn-danger mx-1"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <span class="text-danger fs-2 bg-danger text-white p-2">No Data Available !</span>
                        @endforelse
                    </tbody>
                </table>

                {{ $questions->links() }}

            </div>
        </div>
    </div>
@endsection

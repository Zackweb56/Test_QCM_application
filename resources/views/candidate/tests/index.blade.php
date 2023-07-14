@extends('layouts.app')

@section('content')
    <div class="container m-4" style="width: 930px">

        <h1 class="text-dark">Categories Page</h1>
        <p class="text-secondary">
            Choose your category for your test &nbsp;&nbsp;
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Categories Page</span>
            </span>
        </p>
        @if($message = Session::get('failed'))
            <div class="alert alert-danger fade show" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <span><strong>Failed :</strong> {{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="row">
            @forelse ($categories as $category)
                <a href="{{ route('tests.ready', $category->id) }}" class="col-md-3" id="a">
                    <div class="box card rounded-3" id="box">
                        <h1 class="category_name text-center text-dark w-75">{{ $category->category_name }}</h1>
                        <div class="desc mx-4 w-75 text-dark">
                            {{ $category->description }}
                        </div>
                    </div>
                </a>
            @empty
                <span class="text-danger fs-2 bg-danger text-white p-2">No Category Available !</span>
            @endforelse
        </div>
    </div>
@endsection

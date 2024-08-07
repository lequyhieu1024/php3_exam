@extends('app')
@section('content')
    <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('title')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <input type="file" name="cover_art" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Develop</label>
            <input type="text" value="{{ old('develop') }}" name="develop" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('develop')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Release Year</label>
            <input type="text" value="{{ old('release_year') }}" name="release_year" class="form-control"
                id="exampleInputPassword1">
            @error('release_year')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Genre</label>
            <input type="text" value="{{ old('genre') }}" name="genre" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('genre')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

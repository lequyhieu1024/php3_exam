@extends('app')
@section('content')
    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" value="{{ $game->title }}" name="title" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('title')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <input type="file" name="cover_art" class="form-control" id="exampleInputPassword1">
            ảnh hiện tại:
            <img style="width:100px" src="/{{ $game->cover_art }}" alt="">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Develop</label>
            <input type="text" value="{{ $game->develop }}" name="develop" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('develop')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Release Year</label>
            <input type="text" value="{{ $game->release_year }}" name="release_year" class="form-control"
                id="exampleInputPassword1">
            @error('release_year')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Genre</label>
            <input type="text" name="genre" value="{{ $game->genre }}" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('genre')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

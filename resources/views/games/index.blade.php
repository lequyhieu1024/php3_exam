@extends('app')
@section('content')
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Develop</th>
            <th>Release Yẻar</th>
            <th>Genre</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>{{ $game->id }}</td>
                    <td>{{ $game->title }}</td>
                    <td><img style="width: 100px" src="/{{ $game->cover_art }}" alt=""></td>
                    <td>{{ $game->develop }}</td>
                    <td>{{ $game->release_year }}</td>
                    <td>{{ $game->genre }}</td>
                    <td class="d-flex gap-1 text-nowrap">
                        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa game này?')"
                                class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1>All Posts</h1>
      </div>

      <div class="col-md-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary pull-right" style="margin-top:15px;">Create New Post</a>
      </div>
    </div>
    <hr />
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Published</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($posts as $post)
          <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->published ? "Published" : "Draft" }}</td>
            <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-default">Edit</a></td>
            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-default">View</a></td>
            <td>

              <button onclick="event.preventDefault();
              document.getElementById('delete-post-form').submit();" class="btn btn-lg btn-danger"><i class="fa fa-trash"></i></button>
              <form id="delete-post-form" method="post" action="{{ route('posts.destroy', $post->id) }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
              </form>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-center">
      {{ $posts->links() }}
    </div>

  </div>
@endsection

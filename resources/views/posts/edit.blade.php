@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('posts.update',$post->id)}}" method="Post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">title</label>
                <input value="{{$post->title}}" type="text" name="title" id="" class="form-control" placeholder="Title"
                       aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="body">Message</label>
                <textarea  name="body" id="body" class="form-control" rows="3">
                    {{$post->body}}

                </textarea>
            </div>
            <button type="submit" class="btn bg-primary float-right">
                Save <span class="badge badge-primary"></span>
            </button>
        </form>

    </div>
@endsection

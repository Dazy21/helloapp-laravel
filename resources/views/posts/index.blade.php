@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        List Of Post
                        <div class="col-lg-12">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button">×</button>
                                    {{session('message')}}

                                </div>
                            @endif

                            <div class="col-lg-12">
                                @if (count($errors)>0)
                                    <div class="alert alert-danger">
                                        <button data-dismiss="alert" class="close" type="button">×</button>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>


                                    </div>
                                @endif
                                <form action="{{route('posts.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">title</label>
                                        <input type="text" name="title" id="" class="form-control" placeholder="Title"
                                               aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Message</label>
                                        <textarea name="body" id="body" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn bg-primary float-right">
                                        Save <span class="badge badge-primary"></span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                            <div class="card-body">
                                <span>{{$posts->count()}}</span>
                                <div class="list-group">
                                    @foreach($posts as $p)
                                    <a href="#"
                                       class="list-group-item list-group-item-action flex-column align-items-start active">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{$p->title}}</h5>
                                            <small>{{$p->user->first_name.' '.$p->user->last_name}}</small>
                                            <small>{{$p->updated_at->diffForHumans()}}</small>
                                            @if (auth()->id()==$p->user_id)

                                                <form action="{{route('posts.destroy',$p->id)}}" method="Post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit">x</button>
                                                </form>
                                            @endif

                                        </div>
                                        <p class="mb-1">{{$p->body}}</p>
                                        @if ($p->user_id ==Auth::id())
                                            <small>
                                                <a class="btn btn-danger float-right" href="{{route('posts.edit',$p->id)}}">Edit</a>
                                            </small>
                                        @endif

                                    </a>
                                        <hr/>
                                    @endforeach


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection

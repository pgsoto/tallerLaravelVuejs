@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="{{ route('post.create') }}" class="btn btn-success">Crear Discución</a>
                        <hr>
                        <ul class="list-unstyled">
                            @foreach($channels as $channel)
                                <li>
                                    <a class="btn btn-link" href="{{ route('postChannel', $channel->slug) }}">{{ $channel->name }}</a>
                                    <span class="badge">{{ $channel->posts->count() }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-11">
                                @foreach($posts as $post)
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <a href="#">
                                                <img width="50" class="media-object" src="//www.gravatar.com/avatar/79546ee47756b679f7f314b894d0c1ed?s=100&d=https%3A%2F%2Flaracasts.s3.amazonaws.com%2Fimages%2Fgeneric-avatar.png" alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="">
                                                <h4 class="media-heading">{{ $post->title }}</h4>
                                            </a>
                                            <small>
                                        <span>
                                            <a class="btn-link">{{ $post->channel->name }}</a>
                                            Created By
                                            <a href="" class="btn-link">{{  $post->user->name }}</a>
                                        </span>
                                            </small>
                                            <p>
                                                <small>{{ $post->body }}</small>
                                            </p>
                                        </div>
                                        <div class="media-right media-middle">
                                            <h1>{{ $post->total_replies }}</h1>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')


<!-- Jumbotron -->
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    <div class="well well-lg">
        <h1>{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
    </div>
    <a  class="pull-right btn btn-default btn-sm" href="/projects/create/{{ $project->id }}">Add Project</a>

    <br>

    <div class="roew container-fluid">
        <form action="{{ route('comments.store') }}" method="post">
                {{ csrf_field() }}
                <!-- <input type="hidden" name="_method" value="put"> -->
                <div class="form-group">
                        <label for="comment-content">Comment</label>
                        <textarea
                            placeholder="Enter comment"
                            style="resize:vertical"
                            id="comment-content"
                            name="body"
                            row="4" spellcheck="false"
                            class="form-control autosize-target text-left">
                        </textarea>
                </div>
                <input type="hidden" name="commentable_type" value="App\Project"/>
                <input type="hidden" name="commentable_id" value="{{ $project->id }}"/>
                
                <div class="form-group">
                    <label for="compant-content">Proof of work done (Url/photos)</label>
                    <textarea
                        placeholder="Enter url or screenshots"
                        style="resize:vertical"
                        id="project-content"
                        name="description"
                        row="2" spellcheck="false"
                        class="form-control autosize-target text-left">
                    </textarea>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



        <!-- Example row of columns -->
   {{-- <div class="row" style="background: white; margin: 10px;">

    
    @foreach($project->comments as $comment)
        <div class="col-lg-4 col-md-4 col-sm-4">
            <h2>{{ $comment->body }}</h2>
            <p class="text-danger">{{ $comment->url }}</p>
            <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project</a></p>
        </div>
        @endforeach
    </div>
</div> --}}




<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
        <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
        <li><a href="/projects/create">Add New project</a></li>
        <li><a href="/projects">My projects</a></li>
        <br>
        @if($project->user_id == Auth::user()->id)
        <li>     
            <a   
            href="#"
                onclick="
                var result = confirm('Are you sure you wish to delete this project?');
                    if( result ){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                    }
                        "
                        >
                Delete
            </a>

            <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" 
                method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
            </form>
        </li>
        @endif
        <!-- <li><a href="#">Add New Member</a></li> -->
        </ol>
    </div>
    <!-- <div class="sidebar-module">
    <h4>Members</h4>
    <ol class="list-unstyled">
        <li><a href="#">March 2014</a></li>
    </ol>
    </div>        -->
</div>


@include('partials.comments')

@endsection






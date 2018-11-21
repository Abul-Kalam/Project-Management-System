@extends('layouts.app')

@section('content')


<!-- Jumbotron -->
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <!-- Example row of columns -->
    <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">
        <form action="{{ route('projects.update',[$project->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                    <label for="project-name">Name<span class="required">*</span></label>
                    <input  type="text" 
                            class="form-control"
                            id="project-name" 
                            placeholder="Enter name"
                            required
                            name="name"
                            spellcheck="false"
                            value="{{ $project->name }}"
                        >
                </div>
                <div class="form-group">
                    <label for="compant-content">Descroption</label>
                    <textarea
                        placeholder="Enter description"
                        style="resize:vertical"
                        id="project-content"
                        name="description"
                        row="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        {{ $project->description }}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
        <li><a href="/projects/{{ $project->id }}">View projects</a></li>
        <li><a href="/projects">All projects</a></li>
        </ol>
    </div>
    <!-- <div class="sidebar-module">
    <h4>Members</h4>
    <ol class="list-unstyled">
        <li><a href="#">March 2014</a></li>
    </ol>
    </div>        -->
</div>


@endsection





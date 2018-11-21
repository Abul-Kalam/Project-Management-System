@extends('layouts.app')

@section('content')


<!-- Jumbotron -->
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
<h2>Create New project</h2>
        <!-- Example row of columns -->
    <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">
        <form action="{{ route('projects.store') }}" method="post">
            {{ csrf_field() }}
            <!-- <input type="hidden" name="_method" value="put"> -->
            <div class="form-group">
                    <label for="project-name">Name<span class="required">*</span></label>
                    <input  type="text" 
                            class="form-control"
                            id="project-name" 
                            placeholder="Enter name"
                            required
                            name="name"
                            spellcheck="false"
                        >
                </div>
                <input  type="hidden" 
                        name="company_id"
                        value="{{ $company_id }}"
                        >
                @if($companies != null)
                <div class="form-group">
                    <label for="company-content">Select company</label>
                    <select
                        style="resize:vertical"
                        name="company_id"
                        row="5" spellcheck="false"
                        class="form-control autosize-target text-left">
                        @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                <div class="form-group">
                    <label for="company-content">Description</label>
                    <textarea
                        placeholder="Enter description"
                        style="resize:vertical"
                        id="project-content"
                        name="description"
                        row="5" spellcheck="false"
                        class="form-control autosize-target text-left">
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
        <li><a href="/projects">My projects</a></li>
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





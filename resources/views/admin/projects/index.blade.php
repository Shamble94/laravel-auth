@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
               <div class="d-flex justify-content-between">
                    <div>
                        <h2>All Projects</h2>
                    </div>

                    <div>
                        <a href=""><button class="btn btn-primary">Add New Project</button></a>
                    </div>    
               </div>
            </div>
            <div class="col-12">
                <table class=" table mt-3 table-stipred">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Assigned by</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->id}}</td>
                                <td>{{ $project->name}}</td>
                                <td>{{ $project->slug}}</td>
                                <td>{{ Str::limit($project->description, 30, "(...)") }}</td>
                                <td>{{ $project->assigned_by}}</td>
                                <td>
                                    
                                </td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
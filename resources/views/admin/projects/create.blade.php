@extends("layouts.admin")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <h2 class="text-center">Inserisci nuovo fumetto</h2>
        </div>
        <div class="col-12">
            <form action="{{ route("admin.projects.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="mt-3" for="name">Titolo</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nome progetto" required  value="{{ old("name")}}">
                @error('name')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="mt-3" for="description">Descrizione</label>
                <textarea type="text" name="description" id="description" class="form-control" placeholder="Descrizione fumetto" value="{{ old("description")}}"></textarea>
                @error('description')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="mt-3" for="assigned_by">Assigned by</label>
                <textarea type="text" name="assigned_by" id="assigned_by" class="form-control" placeholder="Descrizione fumetto" value="{{ old("assigned_by")}}"></textarea>
                @error('assigned_by')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route("admin.projects.index")}}"><button type="submit" class="btn btn-primary mt-3 ">Salva</button></a>
            
            </form>
        </div>
    </div>
</div>
</body>
@endsection
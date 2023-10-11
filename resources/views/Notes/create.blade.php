@extends("layouts.main")

@section("content")
@include("layouts.partials.navbar")
    <div class="container mt-5">
        <div class="row mb-2">
            <div class="col">
                <h1>Notes App</h1>
                <a href="/dashboard" class="btn btn-primary">Back</a>
            </div>    
            <div class="row mt-3">
                <div class="col-sm-6">
                    <div class="card border-0 shadow">
                    <div class="card-body">
                    <h5 class="card-title">Create Notes</h5>
                    <form method="POST" action="/notes/create">
                    @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('title')
                                is-invalid @enderror" 
                                id="floatingInput" placeholder="name@example.com" name="title">
                                @error('title')
                                <div class="invalid-feedback">
                                    {${message}}
                                </div>
                                @enderror
                                <label for="floatingInput">Notes Title</label>
                            </div>
                            <div class="form-floating">
                            <textarea class="form-control @error('description')is-invalid @enderror" placeholder="Description" id="floatingTextarea" name="description"></textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {${message}}
                                </div>
                            @enderror
                            <label for="floatingTextarea">Description</label>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
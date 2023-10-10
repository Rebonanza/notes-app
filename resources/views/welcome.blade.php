@extends("layouts.main")

@section("content")
    <div class="container mt-5 text-center ">
        <div class="row mt-5 ms-3">
            <div class="col-md-6 mx-auto mt-4">
                <div class="card shadow p-3 mt-5 border-0 "  style="width: 30rem;">
                    <div class="card-body">
                        <h1 class="card-title">Notes App</h1>
                        <span class="card-text">Where u can place your thoughts</span>
                        <div class="row mt-3">
                            <div class="col-sm-6 text-right"><a href="/login" class="btn btn-warning">Login</a></div>
                            <div class="col-sm-6 text-left"><a href="/login" class="btn btn-warning">Register</a></div>
                        </div>
                    </div>
                </div>
        </div>
            </div>
    </div>
@endsection
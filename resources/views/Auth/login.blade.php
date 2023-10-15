@extends("layouts.main")

@section("content")
    <div class="container mt-5 text-center">
        <div class="row mt-5 ms-5">
            <div class="col-md-6 mx-auto mt-4">
                <div class="card shadow p-3 mt-5 border-0"  style="width: 25rem;">
                    <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hurray !!</strong>
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session()->has('login-error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                        <h2 class="card-title">Notes App</h2>
                        <span class="card-text">Please login to enter the app</span>
                        
                        <form method="POST" class="mt-4" action="/login">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <span class="mt-3">Don't have an account <a href="/register" class="link-primary">Register</a></span>
                            <br>
                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
            </div>
    </div>
@endsection
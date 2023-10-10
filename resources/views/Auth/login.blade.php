@extends("layouts.main")

@section("content")
    <div class="container mt-5 text-center">
        <div class="row mt-5 ms-5">
            <div class="col-md-6 mx-auto mt-4">
                <div class="card shadow p-3 mt-5 border-0"  style="width: 25rem;">
                    <div class="card-body">
                        <h2 class="card-title">Notes App</h2>
                        <span class="card-text">Please login to enter the app</span>
                        <form method="POST" action="">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
            </div>
    </div>
@endsection
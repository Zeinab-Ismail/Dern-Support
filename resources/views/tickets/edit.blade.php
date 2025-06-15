<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dern-Support</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
</head>
        <body>
            <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0" >
                <nav class="navbar navbar-expand-lg navbar-light" style="font-weight: bold">
                    <a href="/" class="navbar-brand p-0">
                        <h1 class="display-6 text-dark">Dern-Support</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto py-0">
                            <a href="/" class="nav-item nav-link ">Home</a>
                            @if (Route::has('login'))
                            @auth
                            <a href="{{route('dashboard')}}" class="nav-item nav-link" >Dashboard</a>
                            <a href="{{route('tickets.index')}}" class="nav-item nav-link active " style="color: rgb(59, 130, 246 )">Tickets</a>
                            <a href="{{url('employees')}}" class="nav-item nav-link ">Employees</a>
                            @else
                            <a href="#service" class="nav-item nav-link">Services</a>
                        </div>
                        <div class="team-icon d-none d-xl-flex justify-content-center me-3">
                            <a class="btn btn-square btn-light rounded-circle mx-1" href="https://www.facebook.com/share/1BC4ZArpsi/"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-light rounded-circle mx-1" href="https://www.instagram.com/zeinab_ismail669?igsh=MWhzM2hra2x1OWY1bQ=="><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-light rounded-circle mx-1" href="https://www.linkedin.com/in/zeinab44?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="nav-item ">
                            <a href="{{route('login')}}" class=" rounded-pill py-2 px-4 flex-shrink-0" style="background-color: rgb(59 ,130, 246 )">Login</a>
                        </div>
                        @if (Route::has('register'))
                        <div class="nav-item ">
                            <a href="{{route('register')}}" class="rounded-pill py-2 px-4 flex-shrink-0"  style="background-color: rgb(59 ,130, 246 )">Register</a>
                        </div>
                        @endif
                    @endauth
                    </div>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <x-dropdown-link style="background-color: rgb(50, 130, 246 ) ; color: white; border-radius: 5px;"   :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </nav>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('tickets.update', $ticket) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="employee" class="form-label">Employee</label>
                        <select class="form-select" name="employee" id="employee">
                            <option value="unassigned">Unassigned</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee }}" {{ old('employee', $ticket->employee) == $employee ? 'selected' : '' }}>{{ $employee }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            @foreach ($status as $statue)
                                <option value="{{ $statue }}" {{ old('status', $ticket->status) == $statue ? 'selected' : '' }}>{{ $statue }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ old('price', $ticket->price) }}">
                    </div>
                    <button type="submit" class="btn text-white" style="background-color: rgb(59 ,130, 246 )">Save</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

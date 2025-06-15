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
                            <a href="{{route('tickets.index')}}" class="nav-item nav-link active " style="color: rgb(60, 190, 248)">Tickets</a>
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
                            <a href="{{route('login')}}" class="nav-link  btn btn-outline-primary rounded-pill py-2 px-4 flex-shrink-0" >Login</a>
                        </div>
                        @if (Route::has('register'))
                        <div class="nav-item ">
                            <a href="{{route('register')}}" class="nav-link  btn btn-primary rounded-pill py-2 px-4 flex-shrink-0" >Register</a>
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
<div class="container mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden" style="border: 1px solid gray">
                    <div class=" px-2 py-5 text-center">
                        <div class="py-5">
                            <h1 class="mb-3" style="color: rgb(60, 190, 248)" >
                                {{ $ticket->title }}
                            </h1>
                            <div class="col-lg-6 mx-auto text-capitalize">
                                <p class="fs-5 mb-3">
                                    {{ $ticket->description }}
                                </p>
                                <p class="fs-4"><span style="font-weight: bold; ">Employee:</span>
                                    {{ $ticket->employee }}
                                </p>
                                <p class="fs-4"><span style="font-weight: bold; ">Price:</span>
                                    {{ $ticket->price == null ? "Unassigned" : $ticket->price }}
                                </p>
                                <p class="fs-4"><span style="font-weight: bold; ">Method:</span>
                                    {{ $ticket->delivery_method }}
                                </p>
                                <div class="container">                                        
                                    <a name="return" id="return" class="btn text-light" style="background-color: rgb(60, 190, 248)" href={{ route('tickets.index') }} role="button">Back</a>
                                    @if ($ticket->status == App\TicketStatus::COMPLETED)
                                            <a name="pay" id="pay" class="btn text-light" href={{ route('payment', $ticket->id) }}  style="background-color: rgb(60, 190, 248)" role="button">Pay</a>
                                        </div>
                                    @endif
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>

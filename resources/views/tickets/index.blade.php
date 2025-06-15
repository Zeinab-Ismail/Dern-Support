<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dern-Support</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    </head>
    <body>
        <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light">
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
                        <a href="{{route('dashboard')}}" class="nav-item nav-link ">Dashboard</a>
                        <a href="{{route('tickets.index')}}" class="nav-item nav-link active">Tickets</a>
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
                        <a href="{{route('login')}}" class="nav-link  btn  rounded-pill py-2 px-4 " style="color: rgb(59, 130, 246 )">Login</a>
                    </div>
                    @if (Route::has('register'))
                    <div class="nav-item ">
                        <a href="{{route('register')}}" class="nav-link  btn rounded-pill py-2 px-4 flex-shrink-0" style="background-color: rgb(59, 130, 246 )">Register</a>
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  ">
                    <div class="table-responsive">
                      
                        <table class="table " style="border: 1px solid grey">
                            <thead>
                                <tr >
                                    <th scope="col" style="color: rgb(59, 130, 246 )">Title</th>
                                    <th scope="col" style="color: rgb(59, 130, 246 )">Description </th>
                                    <th scope="col" style="color: rgb(59, 130, 246 )" >Employee</th>
                                    <th scope="col" style="color: rgb(59, 130, 246 )">Type</th>
                                    <th scope="col" style="color: rgb(59, 130, 246 )">Method</th>
                                    <th scope="col" style="color: rgb(59, 130, 246 )">Statue</th>
                                    <th scope="col" style="color: rgb(59, 130, 246 )">Price</th>
                                    <th scope="col" style="color: rgb(59, 130, 246 )">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($tickets->isEmpty())
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            No Tickets Found
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($tickets as $ticket)
                                        <tr class="">
                                            <td scope="row">{{ $ticket->title}} </td>
                                            <td>
                                                <span
                                                    style="display: block; max-width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">

                                                    {{ $ticket->description }}
                                                </span>
                                            </td>
                                            <td>{{ $ticket->employee}} </td>
                                            <td>{{ $ticket->user_type }}</td>
                                            <td>{{ $ticket->delivery_method}} </td>
                                            <td>{{ $ticket->status }}</td>
                                            <td>{{ $ticket->price}} </td>
                                            <td>
                                                @role('admin')
                                                <a href={{ route('tickets.edit', $ticket) }} ><button class="btn text-white" style="background-color: rgb(59, 130, 246 )">Edit</button></a> 
                                                @endrole
                                                @if ($ticket->status == App\TicketStatus::COMPLETED)
                                                <a href={{ route('tickets.show', $ticket) }} ><button class="btn btn-secondary text-white">Details</button> </a>
                                            @endif
                                                @if($ticket->status == App\TicketStatus::COMPLETED)
                                                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST"
                                                        class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger text-white" >Delete
                                                        </button>
                                                    </form>
                                                @endif
                                               
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif
                            </tbody>
                        </table>
                        @role('individual')
                        <a class="btn btn-primary mb-3" href={{ route('tickets.create') }} role="button">Add
                            Ticket</a>
                        @endrole
                        @role('business')
                        <a class="btn btn-primary mb-3" href={{ route('tickets.create') }} role="button">Add
                            Ticket</a>
                        @endrole
                        <div class="mt-4">
                            {{ $tickets->links() }}
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
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    Google fonts--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet">

    {{--Browser Icon and Title--}}
    <link rel="icon" href="/images/MobileHealthTabLogo.png" type="/image/MobileHealthTabLogo.png">
    <title>Mobile Health</title>

    <!-- CSS Files -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/fontawesome.css">
    <link rel="stylesheet" href="/css/mobilehealth.css">

</head>
<body>
<header>

    <nav class="navbar navbar-light navbar-expand-md bg-faded">
        <div class="container">

            <a class="navbar-brand d-flex w-25 me-auto nav-img" id="logoimage" href="/"><img
                    src="/images/MobileHealth1.png"
                    alt="Mobile Health Logo"></a>

            <!-- Toggler/collapse Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="nav navbar-nav ms-auto w-100 justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/facourses">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/bookings/create">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aboutus">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactus">Contact Us</a>
                    </li>
                    <li>
                        <a href="/bookings/create" class="btn btn-book">Book now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>

<main>
    @auth
        <div class="container">
            <h1>Mobile Health Administration</h1>

            <div class="logout">
                @if (Auth::check())
                    <a class="btn btn-outline-secondary mx-1"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Logout</a>

                @endif
                <form id="logout-form" class="nav" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            <div class="mt-2">
                <a class="btn btn-outline-primary mx-1" href="/courses">Courses</a>
                <a class="btn btn-outline-primary mx-1 " href="/coursedates">Course Dates</a>
                <a class="btn btn-outline-primary mx-1 " href="/bookings">Bookings</a>
                @can('isAdmin')
                    <a class="btn btn-outline-primary mx-1 " href="/users">Users</a>
                @endcan
            </div>

    @endauth

            <div>
                @yield('content')
            </div>
        </div>
</main>


<!-- Footer Starts Here -->
<footer>

    <div class="footer footer-menu footer-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h5>Location</h5>
                    <p>18 Glenda Drive </p>
                    <p>Frankton</p>
                    <p>Queenstown</p>
                    <p>PO Box 2036, Queenstown</p>
                    <p>Central&nbspOtago, 9300</p>

                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h5>Contact</h5>
                    <a href="#"><i class="fa fa-phone-square"></i> 03 111 2222</a>
                    <a href="#"><i class="fa fa-phone-square"></i> 0274 423 624</a>
                    <a href="mailto:firstaid@mobilehealth.co.nz" target="_blank">
                        <i class="fa fa-envelope" aria-hidden="true"></i>&nbspfirstaid@mobilehealth.co.nz</a>
                    <p class="social-icons">
                        <a href="https://www.facebook.com/Mobile-Industrial-Health-Services-Engage-Safety-1562735880645278/"
                           target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/mobilehealthqueenstown/about/"
                           target="_blank">
                            <i class="fa fa-linkedin"></i>
                        </a></p>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h5>Other</h5>
                    <ul>
                        <li><a href="https://www.termsfeed.com/live/01b54658-9762-4347-8c16-3fd90e4ec5a3"
                               target="_blank">Privacy Policy</a></li>
                        <li><a href="/terms" target="_blank">Terms and Conditions</a></li>
                        <li>
                            <a href="https://engagesafety.co.nz/" target="_blank">
                                <img src="/images/EngageSafetyLogo.png" alt="Engage Safety Logo"
                                     class="footer-media">&nbspwww.engagesafety.co.nz
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h5>Site Map</h5>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/facourses">Courses</a></li>
                        <li><a href="/bookings/create">Book</a></li>
                        <li><a href="/aboutus">About Us</a></li>
                        <li><a href="/contactus">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <!-- Footer Ends Here -->

            <!-- Sub Footer Starts Here -->
            <div class="sub-footer">
                <div class="row col-md-12">
                    <div class="copyright-text">

                        <a href="{{ route('login') }}">Copyright &copy; 2021 Mobile Health | Design by:
                            SIT-SS-DESIGN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Footer Ends Here -->

</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


<!-- Additional Scripts -->
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');
    const cardHolderName = document.getElementById('card-holder-name');
    const form = document.getElementById('stripe');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const {paymentMethod, error} = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: {name: cardHolderName.value}
            }
        );
        if (error) {
            // Display "error.message" to the user...
        } else {
            console.log('Card verified successfully');
            console.log(paymentMethod.id);
            document.getElementById('pmethod').setAttribute('value', paymentMethod.id);
            form.submit();
        }
    });


</script>

</body>
</html>

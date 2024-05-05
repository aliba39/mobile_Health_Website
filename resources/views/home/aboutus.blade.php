@extends('layouts.app')
@section('content')

    @if (Auth::check())
    @else
        <div class="container">
    @endif

    <!-- About us starts Here -->
        <h1>About Debbie and the team at Mobile Health</h1>
        <hr>
        <h5>
            We are the premier provider of Workplace Health and Safety Services in the Queenstown Lakes and
            Central Otago region.
        </h5>
        <p>We are <strong>locally owned and operated company</strong>.</p>
        <p>Along with First Aid Courses, we offer a range of services including:
        <ul>
            <li>Health and Safety advice and consultation</li>
            <li>Health Monitoring</li>
        </ul>
        </p>

        <!-- About the team starts here -->
        <div class="row">
            <div class="col-md-12">
                <h2>Our first aid course team</h2>
                <hr>
            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <img src="/images/aboutus/DebbieSwainRewi.jpg" alt="Debbie Swain-Rewi"
                                 class="card-img-top image-greyscale">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Debbie Swain-Rewi</h5>
                            <h6>Director</h6>
                            <p class="card-text">
                            <ul>
                                <li>PostGradDip Health Sciences</li>
                                <li>Endorsed Occupational Health and Safety</li>
                                <li>Certificated Independent Vaccinator</li>
                                <li>NZQA Qualified Urine Collector, and Workplace Drug Tester</li>
                                <li>Smoking Cessation Practitioner</li>
                            </ul>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <img src="/images/aboutus/MelWright.jpg" alt="Mel Wright"
                                 class="card-img-top image-greyscale">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Mel Wright</h5>
                            <h6>Registered Nurse and Training Course Co-ordinator</h6>
                            <p class="card-text">
                            <ul>
                                <li>First Aid Instructor</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <img src="/images/aboutus/PamShaw.jpg" alt="Pam Shaw"
                                 class="card-img-top image-greyscale">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pam Shaw</h5>
                            <h6>Registered Nurse</h6>
                            <p class="card-text">
                            <ul>
                                <li>Trained in Spirometry</li>
                                <li>Audiometry</li>
                                <li>Drug Testing</li>
                            </ul>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <img src="/images/aboutus/AmyMead.jpg" alt="Amy Mead"
                                 class="card-img-top image-greyscale">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Amy Mead</h5>
                            <h6></h6>
                            <p class="card-text">
                            <ul>
                                <li>Registered Nurse</li>
                            </ul>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Community work starts here -->

        <div class="row">
            <div class="col-md-12">
                <h2>Our recent work in the community</h2>
                <hr>
                <p>
                    We are <strong>locally owned and operated company</strong> employing a team
                    of local nurses
                    and Health and Safety specialists. We provide mobile services at great
                    prices to
                    suit your
                    needs.
                </p>
                <p>
                    Contact us for more information.
                </p>
            </div>


            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="https://www.odt.co.nz/regions/wanaka/%E2%80%98happy%E2%80%99-receive-covid-jabs"
                               target="_blank">
                                <img src="/images/aboutus/driveThruVaccinations.png"
                                     alt="image of drive thru vaccination"
                                     class="card-img-top image-greyscale">
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="https://www.odt.co.nz/regions/wanaka/%E2%80%98happy%E2%80%99-receive-covid-jabs"
                               target="_blank"><h5 class="card-title">Drive Through Vaccination</h5></a>
                            <p class="card-text">
                            <p><small>6 September 2021</small></p>
                            <p>Vaccinating the unvaccinated in big numbers and safely was the aim of three
                                separate pop-up Covid-19 vaccination clinics in Wanaka over the weekend.
                            </p>
                            <a href="https://www.odt.co.nz/regions/wanaka/%E2%80%98happy%E2%80%99-receive-covid-jabs"
                               target="_blank" class="readmore">Read more</a>
                        </div>
                        </a>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="http://www.kaitahu.maori.nz/southern-stop-smoking-inspirational-stories/glenorchy-debbie-swain-rewi"
                               target="_blank">
                                <img src="/images/aboutus/smokingCessation.png"
                                     alt="image of smoking cessation"
                                     class="card-img-top image-greyscale">
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="http://www.kaitahu.maori.nz/southern-stop-smoking-inspirational-stories/glenorchy-debbie-swain-rewi"
                               target="_blank"><h5 class="card-title">Smoking Cessation Services</h5></a>
                            <p class="card-text">
                            <p><small>02 September 2020</small></p>

                            <p>For approximately 8 years now, Debbie Rewi has travelled to Glenorchy
                                once a week, to provide smoking cessation services and support to this
                                community, a small settlement at the northern end of Lake Wakatipu, 45km
                                from Queenstown.
                            </p>
                            <a href="http://www.kaitahu.maori.nz/southern-stop-smoking-inspirational-stories/glenorchy-debbie-swain-rewi"
                               target="_blank" class="readmore">Read more</a>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="https://theflyer.co.nz/2019/12/delivering-medical-missions-to-glenorchy/"
                               target="_blank">
                                <img src="/images/aboutus/news_glenorchy_debbie.jpg"
                                     alt="image of glenorchy medical support"
                                     class="card-img-top image-greyscale">
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="https://theflyer.co.nz/2019/12/delivering-medical-missions-to-glenorchy/"
                               target="_blank"><h5 class="card-title">Delivering Medical Missions to Glenorchy</h5>
                            </a>
                            <p class="card-text">
                            <p><small>2021</small></p>
                            <p>She’s been an angel of light to the Glenorchy community for five years now and
                                Queenstown
                                nurse Debbie Swain-Rewi is showing no signs of leaving her post.
                            </p>
                            <a href="https://theflyer.co.nz/2019/12/delivering-medical-missions-to-glenorchy/"
                               target="_blank" class="readmore">Read more</a>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="https://www.odt.co.nz/regions/queenstown/karma-giver%E2%80%99s-time-receive"
                               target="_blank">
                                <img src="/images/aboutus/karmaglenorchy.jpg"
                                     alt="image of smoking cessation"
                                     class="card-img-top image-greyscale">
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="https://www.odt.co.nz/regions/queenstown/karma-giver%E2%80%99s-time-receive"
                               target="_blank"><h5 class="card-title">Karma giver’s time to receive</h5></a>
                            <p class="card-text">
                            <p><small>10 June 2019</small></p>

                            <p>When a Glenorchy resident was diagnosed with terminal cancer in early 2015, a
                                Queenstown nurse decided to dip into her own pocket to provide some support.
                            </p>
                            <a href="https://www.odt.co.nz/regions/queenstown/karma-giver%E2%80%99s-time-receive"
                               target="_blank" class="readmore">Read more</a>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About us ends Here -->

@endsection




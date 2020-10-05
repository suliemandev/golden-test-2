@extends('welcome')

@section('content')


        <!-- WELCOME-->
        <section class="welcome p-t-10">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">{{ __('words.welcome_back') }}
                        <span>{{ Auth::user()->name }}!</span>
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!-- END WELCOME-->

        <!-- STATISTIC-->
        <section class="statistic statistic2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item statistic__item--green">
                        <h2 class="number">{{ $analytics['questions']['count'] }}</h2>
                        <h2 class="number" style="font-size: 20px;">{{ $analytics['questions']['active'] }} active</h2>
                            <span class="desc">Questions</span>
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item statistic__item--blue">
                            <h2 class="number">{{ $analytics['quizzes']['count'] }}</h2>
                            {{-- <h2 class="number" style="font-size: 20px;">{{ $analytics['paid']['earnings'] }}₪</h2> --}}
                            <span class="desc">Quizzes</span>
                            <div class="icon">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item statistic__item--orange">
                            <h2 class="number">{{ $analytics['trends']['count'] }}</h2>
                            <h2 class="number" style="font-size: 20px;">{{ $analytics['trends']['active'] }} active</h2>
                            <span class="desc">Trends</span>
                            <div class="icon">
                                <i class="zmdi zmdi-calendar-note"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item statistic__item--red">
                            {{-- <h2 class="number">{{ $analytics['top_trends'] }}</h2> --}}
                            <ul class="top3-products">
                                @foreach($analytics['top_trends'] as $trend)
                                <li>{{ $trend->title['ar'] }} ({{ $trend->suitable_count }})</li>
                                @endforeach
                            </ul>
                            <span class="desc">Top trends</span>
                            <div class="icon">
                                <i class="zmdi zmdi-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END STATISTIC-->

        <!-- STATISTIC CHART-->
        {{-- <section class="statistic-chart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">statistics</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <!-- CHART-->
                        <div class="statistic-chart-1">
                            <h3 class="title-3 m-b-30">chart</h3>
                            <div class="chart-wrap">
                                <canvas id="widgetChart5"></canvas>
                            </div>
                            <div class="statistic-chart-1-note">
                                <span class="big">10,368</span>
                                <span>/ 16220 items sold</span>
                            </div>
                        </div>
                        <!-- END CHART-->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <!-- TOP CAMPAIGN-->
                        <div class="top-campaign">
                            <h3 class="title-3 m-b-30">top campaigns</h3>
                            <div class="table-responsive">
                                <table class="table table-top-campaign">
                                    <tbody>
                                        <tr>
                                            <td>1. Australia</td>
                                            <td>$70,261.65</td>
                                        </tr>
                                        <tr>
                                            <td>2. United Kingdom</td>
                                            <td>$46,399.22</td>
                                        </tr>
                                        <tr>
                                            <td>3. Turkey</td>
                                            <td>$35,364.90</td>
                                        </tr>
                                        <tr>
                                            <td>4. Germany</td>
                                            <td>$20,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>5. France</td>
                                            <td>$10,366.96</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END TOP CAMPAIGN-->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <!-- CHART PERCENT-->
                        <div class="chart-percent-2">
                            <h3 class="title-3 m-b-30">chart by %</h3>
                            <div class="chart-wrap">
                                <canvas id="percent-chart2"></canvas>
                                <div id="chartjs-tooltip">
                                    <table></table>
                                </div>
                            </div>
                            <div class="chart-info">
                                <div class="chart-note">
                                    <span class="dot dot--blue"></span>
                                    <span>products</span>
                                </div>
                                <div class="chart-note">
                                    <span class="dot dot--red"></span>
                                    <span>Services</span>
                                </div>
                            </div>
                        </div>
                        <!-- END CHART PERCENT-->
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- END STATISTIC CHART-->

@endsection
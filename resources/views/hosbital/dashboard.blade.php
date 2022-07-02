
@extends('layouts.hosbital')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-3 col-md-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>أجمالي المبيعات </h4>
                                         </div>
                                        <div class="col-5 text-right">
                                            <h4>$9,980</h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>أجمالي الطلبات</h4>
                                         </div>
                                        <div class="col-5 text-right">
                                            <h4>$944</h4>
                                         </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد ألاطباء </h4>
                                         </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Model\doctor::count()}}</h4>
                                         </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد العملاء</h4>
                                         </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\User::count()}}</h4>
                                         </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

                <!-- Sell Orders & Buy Order -->
                <div class="row match-height "style="width: 1800px;" >
                    <div class="col-12 col-xl-8">
                    <div class="card-title text-center">
                            <div class="p-1"style="margin-top: 10px;margin-left: 100px;">
                            <a class="navbar-brand" href="#"><span class="text-primary">Tabeb</span></a>
                            <img style="width: 800px;margin-top: 10px;margin-left: 10px;" src="{{asset('assets/front/u/assets/img/r.png')}}" alt="...">
                            <a class="navbar-brand" href="#"><span class="text-primary">Bisat</span>-areeh</a>
                            </div>
                        </div>
                            </div>
                            </div>
                <!--/ Sell Orders & Buy Order -->

            </div>
        </div>
    </div>

    @stop

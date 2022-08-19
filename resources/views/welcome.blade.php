@extends('layouts.app')

@section('content')
    <section id="hero" class="section-pad">
        <div class="container">
            <h1 class="text-center">Airlangga 2022</h1>

            <div class="row">
                <div class="col-md-4 text-start box-red-phoenix order-1-custom">
                    <h3 class="mb-10px">Red Phoenix</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Id dignissim vitae rutrum est at posuere
                        iaculis.</p>
                </div>
                <div class="col-md-4 order-0-custom">
                    <img class="mascot" src="{{ asset('img/mascot.png') }}" alt="">
                </div>
                <div class="col-md-4 text-end box-mpk order-2-custom">
                    <p class="mb-10px">Presented by</p>
                    <h2>MPK Satria Adhijaya</h2>
                </div>
            </div>

            <div class="text-center sponsor">
                <p class="mb-30px">Our incredible sponsor</p>

                <div class="flex">
                    <img class="item" src="{{ asset('img/unguin.png') }}" alt="">
                    <img src="{{ asset('img/unguin.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="choose" class="section-pad relative">
        <img class="absolute right-0 blur-right-blue" src="{{ asset('img/blur-right/blue.svg') }}" alt="">
        <img class="absolute right-0 blur-right-blue-bottom" src="{{ asset('img/blur-right/blue-bottom') }}.svg"
            alt="">
        <img class="absolute right-0 blur-right-red" src="{{ asset('img/blur-right/red.svg') }}" alt="">
        <img class="absolute right-0 blur-right-yellow" src="{{ asset('img/blur-right/yellow.svg') }}" alt="">
        <div class="container">
            <div class="title">
                <h1>CHOOSE THE</h1>
                <h1 class="offset">NEXT LEADER</h1>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-6">
                    <img class="w-100 box-yellow" src="{{ asset('img/box-yellow.png') }}" alt="">
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <img class="w-100 box-pink" src="{{ asset('img/box-pink.png') }}" alt="">
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <img class="w-100 box-green" src="{{ asset('img/box-green.png') }}" alt="">
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <img class="w-100 box-blue" src="{{ asset('img/box-blue.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="how" class="section-pad relative">
        <img class="absolute blur-how-blue" src="{{ asset('img/blur-how/blue.svg') }}" alt="">
        <img class="absolute blur-how-red" src="{{ asset('img/blur-how/red.svg') }}" alt="">
        <img class="absolute blur-how-yellow" src="{{ asset('img/blur-how/yellow.svg') }}" alt="">
        <img class="absolute blur-how-white" src="{{ asset('img/blur-how/white.svg') }}" alt="">

        <div class="container">
            <h1 class="title text-center">HOW TO</h1>

            <div class="box box-airlangga relative">
                <p>Dapatkan akunmu</p>
                <img class="chain" src="{{ asset('img/chain.png') }}" alt="">
                <p>Pergi ke <a target="_blank" href="https://airlangga2022.online">airlangga2022.online</a></p>
                <img class="chain" src="{{ asset('img/chain.png') }}" alt="">
                <p>Klik tombol Login</p>
                <img class="chain" src="{{ asset('img/chain.png') }}" alt="">
                <p>Vote ketua OSIS pilihanmu</p>
                <img class="chain" src="{{ asset('img/chain.png') }}" alt="">
                <p>Ikuti <a target="_blank" href="https://www.instagram.com/mpk.smerusaka/">Instagram</a> kami untuk streaming live counting
                </p>

                <div class="particle">
                    <img class="absolute done" src="{{ asset('img/done.png') }}" alt="">
                    <img class="absolute date" src="{{ asset('img/date.png') }}" alt="">
                    <img class="absolute smile" src="{{ asset('img/smile.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection

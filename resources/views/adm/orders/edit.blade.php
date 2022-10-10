@extends('adm.layouts.main')
@section('title', "Pedido #" . str_pad($order->id, 4, '0', STR_PAD_LEFT))

<!-- content -->
@section('content')

<!-- order -->
<section class="module">

    <!-- container -->
    <div class="container">

        <!-- header -->
        <header class="module__header">

            <!-- headline -->
            <h2 class="module__headline">

                Pedidos

                <!-- featured -->
                <span class="module__featured">

                    #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}

                </span>

            </h2>

            <!-- back -->
            <a class="module__back" href="/admin/orders" title="Voltar">

                <!-- icon -->
                <i class="ri-arrow-go-back-line module__icon--button"></i>

                <!-- button -->
                <span class="module__legend--button">

                    Voltar

                </span>

            </a>

        </header>

        <!-- session -->
        @if (session('message'))

        <!-- alert -->
        <div class="alert alert-success" role="alert">

            <!-- message -->
            {{session('message')}}

        </div>

        @endif

        <!-- form -->
        <form class="module__form" action="/admin/orders/update/{{ $order->id }}" method="post"
            enctype="multipart/form-data">

            <!-- csrf -->
            @csrf

            <!-- method -->
            @method('PUT')

            <!-- row -->
            <div class="row g-4">

                <!-- cover -->
                <div class="col-12 col-lg-6">

                    <!-- showcase -->
                    <div class="module__showcase">

                        <!-- row -->
                        <div class="row g-2">

                            <!-- loop -->
                            @foreach ($items as $item)

                            <!-- column -->
                            <div class="col-12 col-sm-6 col-xl-4">

                                <!-- item -->
                                <label class="module__catalog" data-id="{{ $item->id }}">

                                    <!-- cover -->
                                    <img class="modules__thumb" src="{{ $item->product()->cover }}"
                                        alt="{{ $item->product()->name }}" title="{{ $item->product()->name }}">

                                    <!-- price -->
                                    <p class="modules__price">

                                        <!-- price -->
                                        R$ {{ number_format($item->price, 2, ',', '.') }}

                                    </p>

                                </label>

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>

                <!-- grid -->
                <div class="col-12 offset-lg-1 col-lg-5">

                    <!-- row -->
                    <div class="row g-4">

                        <!-- column -->
                        <div class="col-12">

                            <!-- label -->
                            <label for="user_id" class="form-label module__label">

                                Cliente

                            </label>

                            <!-- field -->
                            <input id="name" class="form-control module__field" type="text" name="name"
                                value="{{ $user->first_name }}" placeholder="Nome" required disabled>

                        </div>

                        <!-- column -->
                        <div class="col-12">

                            <!-- cart -->
                            <div class="module__cart">

                                <!-- resume -->
                                <p class="module__resume">

                                    Total de

                                    <!-- amount -->
                                    <span class="module__amount js-catalog-resume">

                                        {{ $order->count() }}

                                    </span>

                                    <!-- variant -->
                                    <span class="js-catalog-variant">

                                        item

                                    </span>

                                </p>

                                <!-- total -->
                                <p class="module__total js-catalog-total">

                                    R$ {{ number_format($order->total, 2, ',', '.') }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection

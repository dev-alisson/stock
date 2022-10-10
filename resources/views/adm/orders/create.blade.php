@extends('adm.layouts.main')
@section('title', 'Novo Pedido')

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

                    cadastrar

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

        <!-- form -->
        <form class="module__form js-form-ajax" action="/admin/orders/store">

            <!-- csrf -->
            @csrf

            <!-- row -->
            <div class="row g-4">

                <!-- cover -->
                <div class="col-12 col-lg-6">

                    <!-- showcase -->
                    <div class="module__showcase">

                        <!-- row -->
                        <div class="row g-2">

                            <!-- loop -->
                            @foreach ($products as $product)

                            <!-- column -->
                            <div class="col-12 col-sm-6 col-xl-4">

                                <!-- item -->
                                <label class="module__catalog js-catalog-item" data-id="{{ $product->id }}"
                                    data-price="{{ $product->price }}">

                                    <!-- cover -->
                                    <img class="modules__thumb" src="{{ $product->cover }}" alt="{{ $product->name }}"
                                        title="{{ $product->name }}">

                                    <!-- price -->
                                    <p class="modules__price">

                                        <!-- price -->
                                        R$ {{ number_format($product->price, 2, ',', '.') }}

                                    </p>

                                    <!-- field -->
                                    <input class="modules__checkbox" type="checkbox" name="products[]"
                                        value="{{ $product->id }}">

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
                            <select id="user_id" class="form-select module__field" name="user_id">

                                <!-- default -->
                                <option value="">

                                    Selecione

                                </option>

                                <!-- loop -->
                                @foreach ($users as $user)

                                <!-- user -->
                                <option value="{{ $user->id }}">

                                    {{ $user->first_name }}

                                </option>

                                @endforeach

                            </select>

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

                                        0

                                    </span>

                                    <!-- variant -->
                                    <span class="js-catalog-variant">

                                        item

                                    </span>

                                </p>

                                <!-- total -->
                                <p class="module__total js-catalog-total">

                                    R$ 0,00

                                </p>

                            </div>

                        </div>

                        <!-- column -->
                        <div class="col-12">

                            <!-- label -->
                            <button type="submit"
                                class="float-end module__button module__button--full js-catalog-button" disabled>

                                <!-- icon -->
                                <i class="ri-save-line module__icon--button"></i>

                                <!-- toggle -->
                                <span class="js-catalog-toggle">

                                    Adicione um produto

                                </span>

                            </button>
                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection

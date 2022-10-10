@extends('adm.layouts.main')
@section('title', $product->name)

<!-- content -->
@section('content')

<!-- product -->
<section class="module">

    <!-- container -->
    <div class="container">

        <!-- header -->
        <header class="module__header">

            <!-- headline -->
            <h2 class="module__headline">

                Produtos

                <!-- featured -->
                <span class="module__featured">

                    {{ $product->name }}

                </span>

            </h2>

            <!-- back -->
            <a class="module__back" href="/admin/products" title="Voltar">

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
        <form class="module__form js-form-ajax" action="/admin/products/update/{{ $product->id }}">

            <!-- csrf -->
            @csrf

            <!-- method -->
            @method('PUT')

            <!-- row -->
            <div class="row">

                <!-- cover -->
                <div class="col-12 col-lg-4 module__cover">

                    <!-- image -->
                    <img class="js-preview" src="{{ $product->cover }}" alt="{{ $product->name }}"
                        title="{{ $product->name }}" />

                </div>

                <!-- grid -->
                <div class="col-12 col-lg-8">

                    <!-- row -->
                    <div class="row g-4">

                        <!-- column -->
                        <div class="col-12">

                            <!-- label -->
                            <label for="name" class="form-label module__label">

                                Nome

                            </label>

                            <!-- field -->
                            <input id="name" class="form-control module__field" type="text" name="name"
                                value="{{ $product->name }}" placeholder="Nome">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-xl-6">

                            <!-- label -->
                            <label for="cover" class="form-label module__label">

                                Capa

                            </label>

                            <!-- field -->
                            <input id="cover" class="form-control module__field js-file" type="file" name="cover">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-sm-6">

                            <!-- label -->
                            <label for="price" class="form-label module__label">

                                Preço

                            </label>

                            <!-- field -->
                            <input id="price" class="form-control module__field" type="text" name="price"
                                value="{{ number_format($product->price, 2, ',', '.') }}" placeholder="Preço">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-sm-6">

                            <!-- label -->
                            <label for="stock" class="form-label module__label">

                                Estoque

                            </label>

                            <!-- field -->
                            <input id="stock" class="form-control module__field" type="number" name="stock"
                                value="{{ $product->stock }}" placeholder="Estoque">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-md-6">

                            <!-- label -->
                            <label for="seller_id" class="form-label module__label">

                                Vendedor

                            </label>

                            <!-- field -->
                            <select id="seller_id" class="form-select module__field" name="seller_id">

                                <!-- default -->
                                <option value="">

                                    Selecione

                                </option>

                                <!-- loop -->
                                @foreach ($sellers as $seller)

                                <!-- seller -->
                                <option {{ ($product->seller_id == $seller->id ? 'selected' : '') }}
                                    value="{{ $seller->id }}">

                                    {{ $seller->name }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- column -->
                        <div class="col-12">

                            <!-- label -->
                            <button type="submit" class="float-end module__button">

                                <!-- icon -->
                                <i class="ri-save-line module__icon--button"></i>

                                Atualizar

                            </button>
                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection

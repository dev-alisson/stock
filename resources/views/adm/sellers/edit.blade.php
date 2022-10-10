@extends('adm.layouts.main')
@section('title', $seller->name)

<!-- content -->
@section('content')

<!-- seller -->
<section class="module">

    <!-- container -->
    <div class="container">

        <!-- header -->
        <header class="module__header">

            <!-- headline -->
            <h2 class="module__headline">

                Vendedores

                <!-- featured -->
                <span class="module__featured">

                    {{ $seller->name }}

                </span>

            </h2>

            <!-- back -->
            <a class="module__back" href="/admin/sellers" title="Voltar">

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
        <form class="module__form js-form-ajax" action="/admin/sellers/update/{{ $seller->id }}">

            <!-- csrf -->
            @csrf

            <!-- method -->
            @method('PUT')

            <!-- row -->
            <div class="row">

                <!-- cover -->
                <div class="col-12 col-lg-4 module__cover">

                    <!-- image -->
                    <img class="js-preview" src="{{ $seller->cover }}" alt="{{ $seller->name }}"
                        title="{{ $seller->name }}" />

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
                                value="{{ $seller->name }}" placeholder="Nome">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">

                            <!-- label -->
                            <label for="cover" class="form-label module__label">

                                Capa

                            </label>

                            <!-- field -->
                            <input id="cover" class="form-control module__field js-file" type="file" name="cover">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-md-6">

                            <!-- label -->
                            <label for="document" class="form-label module__label">

                                CNPJ

                            </label>

                            <!-- field -->
                            <input id="document" class="form-control module__field" type="text" name="document"
                                value="{{ $seller->document }}" placeholder="CNPJ">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-md-6">

                            <!-- label -->
                            <label for="email" class="form-label module__label">

                                E-mail

                            </label>

                            <!-- field -->
                            <input id="email" class="form-control module__field" type="text" name="email"
                                value="{{ $seller->email }}" placeholder="E-mail">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-md-6">

                            <!-- label -->
                            <label for="phone" class="form-label module__label">

                                Telefone

                            </label>

                            <!-- field -->
                            <input id="phone" class="form-control module__field" type="text" name="phone"
                                value="{{ $seller->phone }}" placeholder="Telefone">

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

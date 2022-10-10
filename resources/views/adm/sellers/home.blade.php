@extends('adm.layouts.main')
@section('title', 'Vendedores')

<!-- content -->
@section('content')

<!-- sellers -->
<section class="modules">

    <!-- container -->
    <div class="container">

        <!-- header -->
        <header class="modules__header">

            <!-- headline -->
            <h2 class="modules__headline">

                Vendedores

                <!-- featured -->
                <span class="modules__featured">

                    listagem

                </span>

            </h2>

            <!-- plus -->
            <a class="modules__plus" href="/admin/sellers/create" title="Adicionar">

                <!-- icon -->
                <i class="ri-add-circle-line modules__icon--plus"></i>

                <!-- button -->
                <span class="modules__legend--button">

                    Adicionar

                </span>

            </a>

        </header>

        <!-- row -->
        <div class="row g-4">

            <!-- loop -->
            @foreach ($sellers as $seller)

            <!-- column -->
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">

                <!-- item -->
                <article class="modules__item js-module-item">

                    <!-- cover -->
                    <img class="modules__cover" src="{{ $seller->cover }}" alt="{{ $seller->name }}"
                        title="{{ $seller->name }}">

                    <!-- title -->
                    <h3 class="modules__name">

                        {{ $seller->name }}

                    </h3>

                    <!-- description -->
                    <p class="modules__description">

                        <!-- document -->
                        {{ $seller->document }}

                    </p>

                    <!-- actions -->
                    <div class="modules__actions">

                        <!-- button -->
                        <a class="modules__button modules__button--edit" href="/admin/sellers/edit/{{ $seller->id }}"
                            title="Editar">

                            <!-- icon -->
                            <i class="ri-edit-box-line modules__icon"></i>

                        </a>

                        <!-- button -->
                        <button class="modules__button modules__button--remove js-module-remove"
                            data-action="/admin/sellers/destroy/{{ $seller->id }}" data-id="{{ $seller->id }}">

                            <!-- icon -->
                            <i class="ri-delete-bin-6-line modules__icon"></i>

                        </button>

                    </div>

                </article>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection

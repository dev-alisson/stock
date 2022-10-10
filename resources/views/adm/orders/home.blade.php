@extends('adm.layouts.main')
@section('title', 'Pedidos')

<!-- content -->
@section('content')

<!-- orders -->
<section class="modules">

    <!-- container -->
    <div class="container">

        <!-- header -->
        <header class="modules__header">

            <!-- headline -->
            <h2 class="modules__headline">

                Pedidos

                <!-- featured -->
                <span class="modules__featured">

                    listagem

                </span>

            </h2>

            <!-- plus -->
            <a class="modules__plus" href="/admin/orders/create" title="Adicionar">

                <!-- icon -->
                <i class="ri-add-circle-line modules__icon--plus"></i>

                <!-- button -->
                <span class="modules__legend--button">

                    Adicionar

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

        <!-- datagrid -->
        <form class="datagrid">

            <!-- table -->
            <table class="datagrid__table responsive nowrap">

                <!-- header -->
                <thead class="datagrid__header">

                    <!-- fields -->
                    <tr class="datagrid__fields">

                        <!-- column -->
                        <th class="datagrid__column">

                            Pedido

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Cliente

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Total

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Data

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            <!-- empty -->

                        </th>

                    </tr>

                </thead>

                <!-- body -->
                <tbody class="datagrid__body">

                    <!-- loop -->
                    @foreach ($orders as $order)

                    <!-- item -->
                    <tr class="datagrid__item">

                        <!-- data -->
                        <td class="datagrid__data">

                            #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $order->user()->first_name }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            R$ {{ number_format($order->total, 2, ',', '.') }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ date('d/m H:i', strtotime($order->created_at)) }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data datagrid__actions">

                            <!-- button -->
                            <a class="datagrid__button" href="/admin/orders/edit/{{ $order->id }}">

                                <!-- icon -->
                                <i class="ri-edit-box-line datagrid__icon"></i>

                            </a>

                            <!-- button -->
                            <button class="datagrid__button js-data-remove"
                                data-action="/admin/orders/destroy/{{ $order->id }}">

                                <!-- icon -->
                                <i class="ri-delete-bin-6-line modules__icon"></i>

                            </button>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </form>

    </div>

</section>

@endsection

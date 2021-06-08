@extends('layout')

@section('title', 'Usuarios')

@section('content')

    {{--    <div class="d-flex justify-content-between align-items-end mb-3 mt-5">--}}
    {{--        <h1 class="pb-1">{{ trans("users.title.{$view}") }}</h1>--}}
    {{--        <p>--}}
    {{--                @if ($view == 'index')--}}
    {{--                <a href="{{ route('users.trashed') }}" class="btn btn-outline-dark">Ver papelera</a>--}}
    {{--                    <a href="{{ route('products.create') }}" class="btn btn-primary">Nuevo producto</a>--}}
    {{--                  @else--}}
    {{--                <a href="{{ route('users.index') }}" class="btn btn-outline-dark">Regresar al listado de usuarios</a>--}}
    {{--                @endif--}}
    {{--        </p>--}}
    {{--    </div>--}}

        @includeWhen($view == 'index', 'products._filters')

    {{--@if ($products->isNotEmpty())--}}
    <h1>Listado de Productos</h1>

    <div class="table-responsive-lg">
        <table class="table table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#<span></span></th>

                <th scope="col"><a href="{{ $sortable->url('name') }}" class="{{ $sortable->classes('name') }}">Nombre</a></th>
                <th scope="col"><a href="{{ $sortable->url('code') }}" class="{{ $sortable->classes('code') }}">Codigo</a></th>
                <th scope="col"><a href="{{ $sortable->url('price') }}" class="{{ $sortable->classes('price') }}">Precio</a></th>
                <th scope="col"><a href="{{ $sortable->url('expiration_date') }}" class="{{ $sortable->classes('expiration_date') }}">Fecha Cadudidad</a></th>
                <th scope="col"><a href="{{ $sortable->url('shipment') }}" class="{{ $sortable->classes('shipment') }}">Envío</a></th>
                <th scope="col"><a href="{{ $sortable->url('stock') }}" class="{{ $sortable->classes('stock') }}">Stock</a></th>

            </tr>
            </thead>
            <tbody>
            @each('products._row', $products, 'product')
            </tbody>
        </table>
{{ $products->links() }}
    </div>

    {{--@else--}}
    {{--    <p>No hay usuarios registrados</p>--}}
    {{--@endif--}}
@endsection

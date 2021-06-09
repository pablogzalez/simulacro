@extends('layout')

@section('title', 'Crear productos')

@section('content')
    <x-card>
        @slot('header', 'Crear un producto')
        @include('shared._errors')

        <form method="post" action="{{ route('products.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" placeholder="Nombre" value="{{ old('name', $product->name) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="code">Codigo:</label>
                <input type="text" name="code" placeholder="Codigo" value="{{ old('code', $product->code) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="text" name="price" placeholder="price" value="{{ old('price', $product->price) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="expiration_date">Fecha de Caducidad:</label>
                <input type="text" name="expiration_date" placeholder="Anyos" value="{{ old('expiration_date', $product->expiration_date) }}" class="form-control">
            </div>

            <label for="stock">Envío:</label>

            @foreach([ '1' => 'Con Envio'] as $value => $text)
                <div class="form-check form-check-inline ml-3">
                    <input type="checkbox" class="form-check-input" name="shipment" id="products_{{ $value ?: 'all' }}"
                           value="{{ $value }}" {{ $value === request('shipment', '') ? 'checked' : '' }}>
                    <label class="form-check-label" for="products_{{ $value ?: 'all' }}">{{ $text }}</label>
                </div>
            @endforeach
            <br>

            <label for="stock">Stock:</label>

            @foreach([ '1' => 'Stock', '0' => 'Sin Stock'] as $value => $text)
                <div class="form-check form-check-inline ml-3">
                    <input type="radio" class="form-check-input" name="stock" id="products_{{ $value ?: 'all' }}"
                           value="{{ $value }}" {{ $value === request('stock', '') ? 'checked' : '' }}>
                    <label class="form-check-label" for="products_{{ $value ?: 'all' }}">{{ $text }}</label>
                </div>
            @endforeach

            <h5>Categorias</h5>
            @foreach($categories as $category)
                <div class="form-check form-check-inline">
                    <input name="subjects[{{ $category->id }}]" class="form-check-input" type="checkbox"
                           id="subject_{{ $category->id }}" value="{{ $category->id }}"
                            {{ ($errors->any() ? old('subjects.'.$category->id) : $product->categories->contains($product)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="subject_{{ $category->id }}">{{ $category->name }}</label>
                </div>
            @endforeach


            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Crear producto</button>
                <a href="{{ route('products.index') }}" class="btn btn-link">Regresar al listado de productos</a>
            </div>
        </form>
    </x-card>
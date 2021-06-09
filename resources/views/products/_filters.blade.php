<form method="get" action="{{ route('products.index') }}">
    <div class="row row-filters ">
    @foreach(['' => 'Todos', 'active' => 'Con Envio', 'inactive' => 'Sin Envio'] as $value => $text)
        <div class="form-check form-check-inline ml-3">
            <input type="radio" class="form-check-input" name="shipment" id="students_{{ $value ?: 'all' }}"
                   value="{{ $value }}" {{ $value === request('shipment', '') ? 'checked' : '' }}>
            <label class="form-check-label" for="products_{{ $value ?: 'all' }}">{{ $text }}</label>
        </div>
    @endforeach
    </div>

    <h6>Max-Min precio:</h6>
    <div class="row row-filters">
        <div class="col-md-6">
            <div class="form-inline form-search">
                <div class="input-group mr-2">
                    <input type="search" name="minPrice" value="{{ request('minPrice') }}"
                           class="form-control form-control-sm" placeholder="Min precio...">
                </div>
                <div class="input-group">
                    <input type="search" name="maxPrice" value="{{ request('maxPrice') }}"
                           class="form-control form-control-sm" placeholder="Max precio...">
                </div>
            </div>
        </div>
    </div>

    <h6>Max-Min date:</h6>
    <div class="row row-filters">
        <div class="col-md-6">
            <div class="form-inline form-search">
                <div class="input-group mr-2">
                    <input type="search" name="minDate" value="{{ request('minDate') }}"
                           class="form-control form-control-sm" placeholder="Min fecha...">
                </div>
                <div class="input-group">
                    <input type="search" name="maxDate" value="{{ request('maxDate') }}"
                           class="form-control form-control-sm" placeholder="Max fecha...">
                </div>
            </div>
        </div>
    </div>

    <div class="row row-filters">

        <div class="col-2">

            <h6>Buscador:</h6>
            <div class="input-group">

                <input type="search" name="search" value="{{ request('search') }}"
                       class="form-control form-control-sm" placeholder="Buscar...">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Filtrar</button>
</form>
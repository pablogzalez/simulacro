<form method="get" action="{{ route('products.index') }}">
    <div class="row row-filters">
        <div class="col-2">
            {{--@foreach(['' => 'Todos', 'active' => 'working', 'inactive' => 'not working'] as $value => $text)
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="work" id="students_{{ $value ?: 'all' }}"
                           value="{{ $value }}" {{ $value === request('work', '') ? 'checked' : '' }}>
                    <label class="form-check-label" for="students_{{ $value ?: 'all' }}">{{ $text }}</label>
                </div>
            @endforeach--}}
            <h6>Buscador:</h6>
            <div class="input-group">

                <input type="search" name="search" value="{{ request('search') }}"
                       class="form-control form-control-sm" placeholder="Buscar...">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Filtrar</button>
</form>
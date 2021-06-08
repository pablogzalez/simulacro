<tr>
    <td rowspan="2">{{ $product->id }}</td>
    <td>
        {{ $product->name }}
        {{--        <span class="status st-{{ $student->work_status ? 'active' : 'inactive' }}"></span>--}}
        {{--        <span class="note">{{ $cabbie->company->name }}</span>--}}
    </td>
    <td>{{ $product->code }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->expiration_date }}</td>
    <td>{{ $product->shipment }}</td>
    <td>{{ $product->stock }}</td>
    {{--    <td>Modelo: {{ $cabbie->car->model }} <br>Marca: {{ $cabbie->car->brand }} <br>Matricula: {{ $cabbie->car->enrollment }}--}}
    {{--        <br>Kilometros: {{ $cabbie->car->kms }}</td>--}}

</tr>

<tr class="categories">

    <td colspan="6"><span class="note">{{ $product->categories->implode('name', ', ') ?: 'Sin Categorias'}}</span></td>
</tr>
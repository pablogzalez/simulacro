<?php

namespace App\Filters;

use App\Rules\SortableColumn;
use App\Sortable;
use Illuminate\Support\Facades\DB;

class ProductFilter extends QueryFilter
{
    public function rules(): array
    {
        return [
            'search' => 'filled',
            'order' => [new SortableColumn(['name', 'code', 'price', 'expiration_date', 'shipment', 'stock'])],
        ];
    }

    public function search($query, $search)
    {
        return $query->where('name' ,  'like', "%$search%")
            ->orWhere('code', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%")
            ->orWhere('expiration_date', 'like', "%$search%");
    }

    public function getColumnName($alias)
    {
        return $this->aliasses[$alias] ?? $alias;
    }


    public function order($query, $value)
    {
        [$column, $direction] = Sortable::info($value);

        $query->orderBy($this->getColumnName($column), $direction);
    }
}
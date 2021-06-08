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
            'order' => [new SortableColumn(['name', 'code', 'price', 'expiration_date', 'shipment', 'stock'])],
        ];
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
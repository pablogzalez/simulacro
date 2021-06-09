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
            'minPrice' => 'numeric',
            'maxPrice' => 'numeric',
            'minDate' => 'date_format:Y-m-d',
            'maxDate' => 'date_format:Y-m-d',
            'shipment' => 'in:active,inactive',
            'stock' => 'in:active,inactive',
        ];
    }

    public function shipment($query, $active)
    {
        return $query->when($active, function ($query, $active) {
            if ($active == 'active') {
                $query->where('shipment', 1);
            } elseif ($active == 'inactive') {
                $query->where('shipment', 0);
            }
        });
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

    public function minPrice($query, $desde)
    {
        $query->where('price', '>=', $desde);
    }

    public function maxPrice($query, $a)
    {
        $query->where('price', '<=', $a);
    }

    public function minDate($query, $desde)
    {
        $query->where('expiration_date', '>=', $desde);
    }

    public function maxDate($query, $a)
    {
        $query->where('expiration_date', '<=', $a);
    }


    public function order($query, $value)
    {
        [$column, $direction] = Sortable::info($value);

        $query->orderBy($this->getColumnName($column), $direction);
    }
}
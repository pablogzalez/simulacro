<?php

namespace App;

class ProductQuery extends QueryBuilder
{
    public function findByName($name)
    {
        return $this->where(compact('name'))->first();
    }

}
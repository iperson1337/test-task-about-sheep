<?php

namespace App\Filters;

class HistoryFilter extends QueryFilter
{
    public function day($value)
    {
        $this->builder->where('day', $value);
    }
}

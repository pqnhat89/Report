<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class BaseBuilder extends Builder
{
    /**
     * Update a record in the database.
     *
     * @param  array $values
     * @return int
     */
    public function update(array $values)
    {
        $data = $this->addUpdatedAtColumn($values);
        if (Auth::guard()->check()) {
            $data[BaseModel::UPDATED_BY] = Auth::user()->userid;
        }
        return $this->toBase()->update($data);
    }
}

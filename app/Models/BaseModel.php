<?php

namespace App\Models;

use App\Models\BaseBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Tsyama\LaravelSoftDeleteFlag\Traits\SoftDeleteFlagTrait;

class BaseModel extends Model
{
    use SoftDeleteFlagTrait;

    protected $guarded = [];

    const CREATED_AT = 'created_at';
    const CREATED_BY = 'created_by';

    const UPDATED_AT = 'updated_at';
    const UPDATED_BY = 'updated_by';

    const IS_DELETED = 'is_deleted';
    const DELETED_AT = 'is_deleted';

    public static function getTableName()
    {
        return (new static())->getTable();
    }

    public static function getPrimaryKeyName()
    {
        return (new static())->primaryKey;
    }

    public function setCreateBy($user)
    {
        if ($user) {
            $this->{static::CREATED_BY} = $user->getAuthIdentifier();
        }
    }

    public function setUpdateBy($user)
    {
        if ($user) {
            $this->{static::UPDATED_BY} = $user->getAuthIdentifier();
        }
    }

    protected function updateTimestamps()
    {
        $time = $this->freshTimestamp();

        $user = Auth::user();

        if (!$this->isDirty(static::UPDATED_AT)) {
            $this->setUpdatedAt($time);
            $this->setUpdateBy($user);
        }

        if (!$this->exists && !$this->isDirty(static::CREATED_AT)) {
            $this->setCreatedAt($time);
            $this->setCreateBy($user);
        }
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new BaseBuilder($query);
    }
}

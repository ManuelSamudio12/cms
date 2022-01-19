<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuids
{
    protected static function boot()
    {
        parent::boot();

        $creationCallback = function ($model) {
            if (empty($model->{$model->getKeyName()}))
            {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        };

        static::creating($creationCallback);
    }

    public function getIncrementing() : bool
    {
        return false;
    }

    public function getKeyType() : string
    {
        return 'string';
    }
}

<?php

namespace App\Http\Transformers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface InterfaceTransformer
{
    /**
     * transform
     *
     * @param  mixed $model
     * @return array
     */
    public function transform(Model $model): array;

    /**
     * transformMany
     *
     * @param  mixed $collection
     * @return array
     */
    public function transformMany(Collection $collection): array;
}

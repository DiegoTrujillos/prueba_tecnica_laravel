<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domain\Repositories\MoveRepository;
use App\Domain\Entities\Move as DomainMove;
use App\Infrastructure\Persistence\Eloquent\Models\MoveModel;

class EloquentMoveRepository implements MoveRepository
{
    public function findByName(string $name): ?DomainMove
    {
        $model = MoveModel::whereRaw('LOWER(name) = ?', [mb_strtolower($name)])->first();
        if (!$model) {
            return null;
        }
        return new DomainMove($model->id, $model->name);
    }
}

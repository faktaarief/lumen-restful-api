<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentUserRepository implements UserRepository {
    protected $model;

    public function __construct(User $user) {
        $this->model = $user;
    }

    public function FindAll(): Collection {
        return $this->model->all();
    }

    public function FindById(int $userId): ?Model {
        return $this->model->findOrFail($userId);
    }

    public function Create(array $payload): ?Model {
        return $this->model->create($payload);
    }

    public function Update(int $userId, array $payload): bool {
        return $this->model->findOrFail($userId)->update($payload);
    }

    public function Delete(int $userId): bool {
        return $this->model->findOrFail($userId)->delete();
    }
}

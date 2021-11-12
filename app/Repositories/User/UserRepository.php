<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Any;

interface UserRepository {
    public function FindAll(): Collection;
    public function FindById(int $userId): ?Model;
    public function Create(array $payload): ?Model;
    public function Update(int $userId, array $payload): bool;
    public function Delete(int $userId): bool;
}

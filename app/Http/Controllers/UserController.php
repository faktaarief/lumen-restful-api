<?php

namespace App\Http\Controllers;

use App\Repositories\User\EloquentUserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $eloquentUser; 

    public function __construct(EloquentUserRepository $eloquentUser) {
        $this->eloquentUser = $eloquentUser;
    }

    public function FindAll() {
        $users = $this->eloquentUser->FindAll();
        return $users;
    }

    public function FindById($userId) {
        return $this->eloquentUser->FindById($userId);
    }

    public function Create(Request $request) {
        return $this->eloquentUser->Create($request->all());
    }

    public function Update(int $userId, Request $request) {
        return $this->eloquentUser->Update($userId, $request->all());
    }

    public function Delete(int $userId) {
        return $this->eloquentUser->Delete($userId);
    }
}

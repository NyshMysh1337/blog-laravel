<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user) {
        dd($user);
        return view('admin.users.edit', compact('user'));
    }
}

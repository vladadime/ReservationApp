<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get('role');
            return Inertia::render('MyApp/pages/Home', [
                'roles' => $users
            ]);
    }
}

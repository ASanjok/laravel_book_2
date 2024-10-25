<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        // Получаем информацию о текущем пользователе
        $user = Auth::user();
        
        return view('account.index', compact('user'));
    }
}
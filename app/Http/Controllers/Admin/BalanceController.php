<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BalanceController extends Controller
{
    public function index()
    {
        return view('admin.balance.index');
    }
}

<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller {

    public function index() {

        $user = Auth::user();

        return view('layouts.account.settings', ['user' => $user]);
    }

}

<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Requests\StoreAccountSettingsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller {

    public function index() {

        $user = Auth::user();

        return view('layouts.account.settings', ['user' => $user]);
    }

    public function update(StoreAccountSettingsRequest $request) {
        $user = Auth::user();

        $user->name = $request->get('name', $user->name);
        $user->email = $request->get('email', $user->email);
        $user->password = ($request->password) ? Hash::make($request->password) : $user->password;

        $user->save();

        session()->flash('success_message', 'Profile updated.');

        return redirect()->route('account.settings');
    }

}

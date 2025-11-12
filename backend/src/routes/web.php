<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get('/sanctum/csrf-cookie', fn() => response()->noContent());

    Route::post('/login', function (Request $request) {
        $cred = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!Auth::attempt($cred)) {
            return response()->json(['message' => 'invalid'], 422);
        }
        $request->session()->regenerate();
        return response()->json(['message' => 'ok']);
    });

    Route::post('/logout', function (Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'ok']);
    });
});

Route::middleware(['api', 'auth:sanctum'])->get('/api/user', fn(Request $r) => $r->user());

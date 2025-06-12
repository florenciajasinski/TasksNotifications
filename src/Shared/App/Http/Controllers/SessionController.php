<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($attributes)) {
            request()->session()->regenerate();
            return redirect('/jobs');
        } else {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}

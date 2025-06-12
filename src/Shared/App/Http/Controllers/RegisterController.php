<?php

declare(strict_types=1);

namespace Lightit\Shared\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
}

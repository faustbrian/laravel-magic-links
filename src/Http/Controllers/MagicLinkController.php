<?php

declare(strict_types=1);

namespace BombenProdukt\MagicLinks\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;

final class MagicLinkController
{
    public function __invoke(Request $request)
    {
        abort_unless($request->hasValidSignature(), 401);

        Auth::loginUsingId($request->get('userId'));

        return resolve(LoginResponse::class);
    }
}

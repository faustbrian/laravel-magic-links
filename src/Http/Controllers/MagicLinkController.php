<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\MagicLinks\Http\Controllers;

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

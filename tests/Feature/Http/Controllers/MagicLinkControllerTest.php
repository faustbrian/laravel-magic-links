<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Feature\Http\Controllers;

use BaseCodeOy\MagicLinks\Http\Controllers\MagicLinkController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

it('should log in the user if the signature is valid', function (): void {
    Route::middleware('web')->get('/_test', MagicLinkController::class)->name('login.magic');

    $link = URL::temporarySignedRoute('login.magic', now()->addMinutes(15), ['userId' => 1]);

    Auth::shouldReceive('loginUsingId')->once()->with(1)->andReturn(true);

    $this->get($link)->assertRedirect('/home');
});

it('should fail to log in the user if the link has expired', function (): void {
    Route::middleware('web')->get('/_test', MagicLinkController::class)->name('login.magic');

    $link = URL::temporarySignedRoute('login.magic', now()->addMinutes(15), ['userId' => 1]);

    Carbon::setTestNow(Carbon::now()->addHour());

    $this->get($link)->assertUnauthorized();
});

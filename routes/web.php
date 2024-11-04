<?php

declare(strict_types=1);

use BaseCodeOy\MagicLinks\Http\Controllers\MagicLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/login/magic', MagicLinkController::class)
    ->middleware('web')
    ->name('login.magic');

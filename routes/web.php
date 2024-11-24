<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\MagicLinks\Http\Controllers\MagicLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/login/magic', MagicLinkController::class)
    ->middleware('web')
    ->name('login.magic');

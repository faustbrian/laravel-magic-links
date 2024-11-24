<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\MagicLinks\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

final class SendMagicLink extends Notification
{
    use Queueable;

    public function __construct(
        public int $userId,
    ) {
        //
    }

    public function via()
    {
        return ['mail'];
    }

    public function toMail()
    {
        return (new MailMessage())
            ->subject('Your magic link for '.config('app.name'))
            ->line('Here is your magic link. It will expire after 15 minutes.')
            ->line(URL::temporarySignedRoute('login.magic', now()->addMinutes(15), ['userId' => $this->userId]))
            ->line('Thank you for using our application!');
    }
}

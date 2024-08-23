<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class RegisterEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    private $user;
    public function __construct(User $user)
    {
        $this->user=$user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::send('email.cartbook', [], function($message) {
            $message->to($this->user->email);
            $message->subject('Successfully Booked Your Tourist Plan');
        });
}
}

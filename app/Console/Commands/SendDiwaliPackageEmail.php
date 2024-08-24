<?php

namespace App\Console\Commands;

use App\Mail\DiwaliPackageMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDiwaliPackageEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-diwali-package';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Diwali package announcement email to all users';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users=User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new DiwaliPackageMail());
        }
        $this->info('Diwali package announcement emails have been sent to all users.');

    }
}

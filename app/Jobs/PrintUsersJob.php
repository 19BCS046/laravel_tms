<?php

namespace App\Jobs;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\CsvDownloadLink;

class PrintUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $fileName;
    public $userEmail;

    public function __construct()
    {
        //filename
        $this->fileName = 'users_' . date('Ymd_His') . '.csv';
        //auth user
        $this->userEmail = User::where('id', auth()->id())->value('email');
    }

    public function handle(): void
    {
        // Store the CSV file in the public disk-downloads
        $filePath = 'downloads/' . $this->fileName;
        Excel::store(new UsersExport, $filePath, 'public');
        $baseUrl = 'http://127.0.0.1:8000/';
        $downloadUrl = $baseUrl . 'storage/' . $filePath;
        Mail::to($this->userEmail)->send(new CsvDownloadLink($downloadUrl));
    }
}

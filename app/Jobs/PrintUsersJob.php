<?php

namespace App\Jobs;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\CsvDownloadLink;
use Maatwebsite\Excel\Facades\Excel;

class PrintUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $fileName;
    public $userEmail;

    public function __construct()
    {
        // Define the CSV filename with a timestamp
        $this->fileName = 'users_' . date('Ymd_His') . '.csv';
        $this->userEmail = User::where('id', auth()->id())->value('email');
    }

    public function handle(): void
    {
        // Store the CSV file using Maatwebsite Excel
        $filePath = 'downloads/' . $this->fileName;
        Excel::store(new UsersExport, $filePath, 'public');

        // Generate the download URL
        $downloadUrl = url('storage/' . $filePath);

        // Send the email with the download link
        Mail::to($this->userEmail)->send(new CsvDownloadLink($downloadUrl));
    }

    private function createCsv($users)
    {
        // CSV Header
        $csvContent = "ID,Name,Email,Phone,City,Address\n";

        // Add users data
        foreach ($users as $user) {
            $csvContent .= "{$user->id},{$user->name},{$user->email},{$user->phone},{$user->city},{$user->address}\n";
        }

        return $csvContent;
    }

    private function sendDownloadLink($downloadUrl)
    {
       Mail::to($this->userEmail)->send(new CsvDownloadLink($downloadUrl));

    }
}

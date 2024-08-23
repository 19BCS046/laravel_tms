<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all(['id', 'name', 'email', 'phone', 'city', 'address']);
    }
    public function headings(): array
    {
        return ['ID', 'Name', 'Email', 'Phone', 'City', 'Address'];
    }
}

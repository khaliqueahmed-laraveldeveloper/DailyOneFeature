<?php

namespace App;

use App\Models\File;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FileDataExport implements FromCollection, WithHeadings
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
  public function headings(): array  
{
    return [
        'ID',
        'Title',
        'Path',
        'Mime Type',
        'Created At',
        'Updated At'
    ];
}
    public function collection()
    {
        return File::all();
    }
}

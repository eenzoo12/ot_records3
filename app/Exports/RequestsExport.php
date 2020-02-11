<?php

namespace App\Exports;

use App\ot_tbl;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
// use Maatwebsite\Excel\Concerns\WithMultipleSheets;

    // Format of Heading
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

// WithMultipleSheets

class RequestsExport implements FromQuery, WithMapping, WithHeadings, WithEvents, WithColumnFormatting
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    
    
    public function query()
    {
        // GET ALL = return ot_tbl::all();
        // Selecting row longcut  = return ot_tbl::select('id', 'name', 'job_content')->where('id', '>', '5');
        return ot_tbl::where('id', '<', '5');
    }

    // Data to be shown
    public function map($request): array
    {
        return [
            
            $request->name,
            'Custom try text '.$request->department->name,
            $request->date,
            $request->shift->name,
            $request->time_from,
            $request->time_to,
            $request->time_hrs,
            $request->job_content, 
            $request->results,
            $request->first_process,
            $request->second_process,
            $request->updated_at->toDateTimeString(),
        ];
    }

    // Heading of Data in Excel
    public function headings(): array
    {
        return [
            'Name',
            'Department',
            'OT Date',
            'Shift',
            'From',
            'To',
            'Total Hrs',
            'Job Content',
            'Results',
            'Supervisor',
            'Manager',
            'Date Approved',
        ];
    }

    // Created_at not working
    public function columnFormats(): array
    {
        return [   
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
    
    // Bold Heading of Excel Working on xlsx not csv
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $request) {
                $request->sheet->getStyle('A1:Z1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    
                ]);
            },
        ];
    }
}



// Multiple Sheet Download
    // public function sheets(): array
    // {
    //     $sheets = [];

    //     for ($month = 1; $month <= 12; $month++) {
    //         $sheets[] = new RequestsPerMonthSheet();
    //     }

    //     return $sheets;
    // }

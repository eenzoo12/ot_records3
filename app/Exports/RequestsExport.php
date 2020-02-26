<?php

namespace App\Exports;

use App\ot_tbl;
use Auth;
use Carbon\Carbon;

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
    public function __construct($from,$to,$shift)
    {
        $this->from = $from;
        $this->to = $to;
        $this->shift = $shift;
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
            'Date Created',
            'Last Update'
        ];
    }

    // Data to be shown
    public function map($request): array
    {
        return [
            
            $request->name,
            $request->department->name,
            $request->date,
            $request->shift->name,
            $request->time_from,
            $request->time_to,
            $request->time_hrs,
            $request->job_content, 
            $request->results,
            $request->first_process,
            $request->second_process,
            $request->created_at->toDateTimeString(),
            $request->updated_at->toDateTimeString(),
        ];
    }
    public function query()
    {
        $date1 = $this->from;
        $date2 = Carbon::parse($this->to.' 06:00:00')->addDay();
        $shiftChosen = $this->shift;

        if(Auth::user()->position_id==5){
            $request = ot_tbl::where('agency_id', 'like', '1');
        }
        elseif(Auth::user()->position_id==6){
            $request = ot_tbl::where('agency_id', 'like', '2' );
        }
        elseif(Auth::user()->position_id==7){
            $request = ot_tbl::where('agency_id', 'like', '3');
        }
        elseif(Auth::user()->position_id==8){
            $request = ot_tbl::where('agency_id', 'like', '4');
        }
        
        if($shiftChosen == 1){
            $request = $request->where('shift_sched', 'like', '1' );
        }
        elseif($shiftChosen == 2){
            $request = $request->where('shift_sched', 'like', '2' );
        }
        
        
        $request = $request->whereDate('date','>=',$date1.' 06:00:00')
                            ->whereDate('date','<',$date2);
                        
         return $request;
       
        
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

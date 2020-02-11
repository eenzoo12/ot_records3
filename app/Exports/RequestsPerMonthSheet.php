<?php

namespace App\Exports;

use App\ot_tbl;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;



class RequestsPerMonthSheet implements FromQuery, WithTitle, WithMapping, WithHeadings, WithEvents 
{
    
    /**
     * @return Builder
     */

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            AfterSheet::class => function (AfterSheet $request) {
                $request->sheet->getStyle('A1:Z1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    
                ]);
            },     
        ];


                    /*   ANOTHER OPTION TO MANIPULATE EXCEL */
        // $stylearray = [
        //     'font' => [
        //         'bold' => true,
        //     ],
        // ];

        // return [
        //     // Handle by a closure.
        //     AfterSheet::class => function (AfterSheet $request) use($stylearray) {
        //         $request->sheet->getStyle('A1:Z1')->applyFromArray($stylearray);
        //     },
        // ];
    }

    public function query()
    {
        return ot_tbl
            ::query()
            ->where('id',"<",25);
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Department',
            'Date',
            'Job Content',
            'Date Created',
        ];
    }
    public function map($request): array
    {
        return [
            $request->id,
            $request->name,
            'Custom try text '.$request->department->name,
            $request->date,
            $request->job_content, 
            $request->created_at->toDateTimeString(),
        ];
    }


    /**
     * @return string
     */
    public function title(): string
    {
        return 'Month';
    }
}
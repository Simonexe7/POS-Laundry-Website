<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminates\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;


class GuruExport implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        return Guru::all();
    }

    public function headings() : array
    {
        return [
            'ID',
            'Nama',
            'NIP',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'NIK',
            'Agama',
            'Alamat',
            'Keaktifan',
            'Status',
            'Created at',
            'Updated at'
        ];
    }
    
    public function registerEvents(): array
    {
        return [
          AfterSheet::class => function(AfterSheet $event)  {
            $event->sheet->getColumnDimension('A')->setAutosize(true);
            $event->sheet->getColumnDimension('B')->setAutosize(true);
            $event->sheet->getColumnDimension('C')->setAutosize(true);
            $event->sheet->getColumnDimension('D')->setAutosize(true);
            $event->sheet->getColumnDimension('E')->setAutosize(true);
            $event->sheet->getColumnDimension('F')->setAutosize(true);
            $event->sheet->getColumnDimension('G')->setAutosize(true);
            $event->sheet->getColumnDimension('H')->setAutosize(true);
            $event->sheet->getColumnDimension('I')->setAutosize(true);
            $event->sheet->getColumnDimension('J')->setAutosize(true);
            $event->sheet->getColumnDimension('K')->setAutosize(true);

            $event->sheet->insertNewRowBefore(1, 2);
            $event->sheet->mergeCells('A1:M1');
            $event->sheet->setCellValue('A1', 'DATA GURU');
            $event->sheet->getStyle('A1')->getFont()->setBold(true);
            $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $event->sheet->getStyle('A3:M'.$event->sheet->getHighestRow())->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000']
                    ]
                ]
            ]);
          }
        ];
    }
}

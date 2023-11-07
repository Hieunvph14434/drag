<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CategoriesExport implements FromView, WithStyles
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     //
    // }

    public function view(): View
    {
        return view('tableExport', [
            'cates' => Category::all()
        ]);
    }

    public function styles(Worksheet $sheet) 
    {
        $styleArray = array(
            'borders' => array(
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED],
                ],
            ),
            'fill' => array(
                'fillType' => Fill::FILL_SOLID,
                'startColor' => array('argb' => 'FF4F81BD')
            ),
            'font' => array(
                "color" => array('argb' => 'ffffff')
            )
        );
        $sheet->getStyle("A1:H1")->applyFromArray($styleArray);
        // set filter 
        $sheet->setAutoFilter("B1:C1");
        // $sheet->getColumnDimension("B")->setAutoSize(true);
        // auto set with 
        $toCol = $sheet->getHighestColumn();
        for ($i = 'A'; $i !== $toCol; $i++) {
            $sheet->getColumnDimension($i)->setAutoSize(true);
        }
        
    }
}

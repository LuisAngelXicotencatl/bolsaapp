<?php

namespace App\Exports;

use App\Models\EventDate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;


class EventDatesExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $event;

    public function __construct($event)
    {
        $this->event = $event;
    }
    
    public function collection()
    {
        /*return EventDate::all();*/
        /*return EventDate::where('event_dates.event_id', $this->event->id)
        ->leftJoin('events', 'event_dates.event_id', '=', 'events.id')
        ->leftJoin('dates', 'event_dates.date_id', '=', 'dates.id')
        ->select(`event_dates`.`id`, `event_dates`.`date_id`, `event_dates`.`event_id`, `events`.`id`, `events`.`titulo`, `events`.`fecha`, `events`.`lugar`, `dates`.`id`, `dates`.`fecha`, `dates`.`hora`, `dates`.`status`, `dates`.`empresa`)
        ->get();*/
        return EventDate::where('event_dates.event_id', $this->event->id)
        ->leftJoin('events', 'event_dates.event_id', '=', 'events.id')
        ->leftJoin('dates', 'event_dates.date_id', '=', 'dates.id')
        ->select(
            'event_dates.id as event_date_id',
            'event_dates.date_id',
            'event_dates.event_id',
            'events.id as event_id',
            'events.titulo',
            'events.fecha as event_fecha',
            'events.lugar',
            'dates.id as date_id',
            'dates.fecha as date_fecha',
            'dates.hora',
            'dates.status',
            'dates.empresa'
        )
        ->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'id_Fecha',
            'Id_evento',
            'Titulo',
            'Fecha',
            'Lugar',
            'Cita_Fecha',
            'Cita_Hora',
            'Disponible(Tomada = 1 /No tomada = 0 or NULL)',
            'Empresa'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setWidth(200 / 7); // 7 es un factor de conversión aproximado de px a unidades de Excel
        }
        $sheet->getColumnDimension('A')->setWidth(30 / 7);
        $sheet->getColumnDimension('I')->setWidth(250/ 7);
        foreach ($sheet->getRowIterator(2) as $row) {
            $cellI = $sheet->getCell('I' . $row->getRowIndex());
            $fillColor = '';
            
            if ($cellI->getValue() == 1) {
                $fillColor = 'FFFFE0E0'; // Rosa muy claro
            } elseif ($cellI->getValue() == 0 || $cellI->getValue() === null) {
                $fillColor = 'FFE0FFE0'; // Verde muy claro
            }
            
            if ($fillColor !== '') {
                $sheet->getStyle('B' . $row->getRowIndex() . ':' . $sheet->getHighestColumn() . $row->getRowIndex())
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB($fillColor);
            }
        }
    
        // Estilo para los encabezados
        $sheet->getStyle('A1:L1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => Color::COLOR_WHITE],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF4682B4'], // Azul acero claro
            ],
        ]);
    
        $sheet->getStyle('A1:A9')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => Color::COLOR_WHITE],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF6495ED'], // Azul aciano
            ],
        ]);
    }
}

<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\data_peserta;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class data_pesertaExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{

  public $id;
  public function __construct($id)
  {
    $this->id = $id;
  }
    // public function view(): View
    // {
    //     return view('pesertaExport',[
    //     'data_peserta'=>data_peserta::where('competition_id', $this->id)->get()
    //   ]);

    // }
    public function collection()
    {
        return data_peserta::where('competition_id', $this->id)->get();
    }

    public function map($registration) : array {
        return [
            $registration->id,
            $registration->data_peserta['name'],
            $registration->data_peserta['username'],
            $registration->title,
            $registration->description,
            $registration->user_id,
            $registration->files['new_name'],
            $registration->url,
            $registration->created_at->format('F j, Y h:i a')
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    public function headings() : array {
        return [
           'ID',
           'Nama Peserta',
           'Username Peserta',
           'Title',
           'Deskripsi',
           'Nama Folder',
           'Nama File',
           'Link Google Drive',
           'Tanggal Upload'
        ] ;
    }


}

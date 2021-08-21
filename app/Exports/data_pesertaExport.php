<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\data_peserta;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class data_pesertaExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
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
            $registration->title,
            $registration->description,
            $registration->files['new_name'],
            $registration->url,
            $registration->created_at->format('F j, Y h:i a')
        ];
    }

    public function headings() : array {
        return [
           'ID',
           'Nama Peserta',
           'Title',
           'Deskripsi',
           'File',
           'Link Google Drive',
           'Tanggal Upload'
        ] ;
    }


}

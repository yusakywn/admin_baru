<?php

namespace App\Exports;

use App\Models\data_peserta;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class data_pesertaExport implements FromView, ShouldAutoSize
{

  public $id;
  public function __construct($id)
  {
    $this->id = $id;
  }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('pesertaExport',[
        'data_peserta'=>data_peserta::where('competition_id', $this->id)->get()
      ]);

    }
}
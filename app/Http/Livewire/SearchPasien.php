<?php

namespace App\Http\Livewire;

use App\Models\KajianPasien;
use Livewire\Component;


class SearchPasien extends Component
{
    public $searchkajian;

    public function render()
    {
        return view('livewire.search-pasien', [
            'kajian_pasiens' => KajianPasien::where('pasiens_no_rm', 'like', '%'.$this->searchkajian.'%')
                ->orWhereHas('pasiens', function ($q) {
                    return $q->where('name', 'like', '%'.$this->searchkajian.'%');
                })->get()
        ]);
    }
}

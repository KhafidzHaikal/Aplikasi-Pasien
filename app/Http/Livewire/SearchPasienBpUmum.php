<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KajianPasien;

class SearchPasienBpUmum extends Component
{
    
    public $searchkajianBPUmum;

    public function render()
    {
        return view('livewire.search-pasien-bp-umum', [
            'kajian_pasiens' => KajianPasien::where('pasiens_no_rm', 'like', '%'.$this->searchkajianBPUmum.'%')
                ->orWhereHas('pasiens', function ($q) {
                    return $q->where('name', 'like', '%'.$this->searchkajianBPUmum.'%');
                })->get()
        ]);
    }
}

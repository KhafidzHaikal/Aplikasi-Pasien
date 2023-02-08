<div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Cari Nama Pasien</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" wire:model="searchkajian" value="{{ old('searchkajian') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">No Registrasi Pasien</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="kajian_pasiens_id"
                value=@foreach ($kajian_pasiens as $kajian_pasien) 
                @if ($searchkajian == null)
                    
                @else
                {{ $kajian_pasien->pasiens->no_rm }}
                @endif @endforeach>
            {{-- <input type="text" value={{ $kajian_pasien->id }}>  --}}
        </div>
    </div>
</div>

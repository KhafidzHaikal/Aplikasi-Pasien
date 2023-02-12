<div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Cari Nama / Nomor Registrasi Pasien</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" wire:model="searchkajian" value="{{ old('searchkajian') }}"
                placeholder="Masukkan Nama Pasien, No Registrasi Pasien">
        </div>
    </div>
    @if ($kajian_pasiens->count() == 0)
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"></label>
            <div class="col-sm-5">
                <label for=""><strong style="color: rgb(255, 0, 0)">Nama Tidak Ditemukan</strong></label>
            </div>
        </div>
    @else
    @endif
    <div class="form-group row" style="display: none">
        <label class="col-sm-3 col-form-label">No. Kajian Pasien</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="kajian_pasiens_id"
                value=@foreach ($kajian_pasiens as $kajian_pasien) 
            @if ($searchkajian == null)

            @else
            {{ $kajian_pasien->id }}
            @endif @endforeach>
            <small style="font-size: 12px; color:rgb(255, 0, 0)">No. Kajian terisi otomatis</small>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">No Registrasi Pasien</label>
        <div class="col-sm-5">
            @foreach ($kajian_pasiens as $kajian_pasien)
                @if ($searchkajian == null)
                    
                @else
                    <p>{{ $kajian_pasien->pasiens->no_rm }}</p>
                @endif
            @endforeach
            {{-- <input type="text" class="form-control"
                value=@foreach ($kajian_pasiens as $kajian_pasien) 
            @if ($searchkajian == null)

            @else
            {{ $kajian_pasien->pasiens->no_rm }}
            @endif @endforeach>
            <small style="font-size: 12px; color:rgb(255, 0, 0)">No. Register terisi otomatis setelah mencari nama/no registrasi pasien</small> --}}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama Pasien</label>
        <div class="col-sm-5">
            @foreach ($kajian_pasiens as $kajian_pasien)
                @if ($searchkajian == null)
                    
                @else
                    <p>{{ $kajian_pasien->pasiens->name }}</p>
                @endif
            @endforeach
            {{-- <input style="background-color: #e6e6e6" type="text" disabled class="form-control"
                value=@foreach ($kajian_pasiens as $kajian_pasien) 
            @if ($searchkajian == null)

            @else
            {{ $kajian_pasien->pasiens->name }}
            @endif @endforeach> --}}
        </div>
    </div>
    @foreach ($kajian_pasiens as $kajian_pasien)
        @if ($searchkajian == null)
        @else
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-5">
                    <a class="btn btn-primary col-12" href={{ route('kajian-pasiens.show', $kajian_pasien->pasiens_no_rm) }}
                        target="_blank">Detai Pasien</a>
                </div>
            </div>
        @endif
    @endforeach

</div>

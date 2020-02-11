@if(session('alertDestroy'))
    <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Kamu berhasil <strong>menghapus</strong> Data
    </div>
@elseif(session('alertUpdate'))
    <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Kamu berhasil <strong>mengubah</strong> Data
    </div>
@elseif(session('alertStore'))
    <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Kamu berhasil <strong>menambah</strong> Data
    </div>

@elseif(session('alertBlock'))
    <div class="alert alert-primary alert-dismissible fade show bg-success text-white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Kamu gagal <strong>menyimpan</strong> Data
    </div>
@endif

@error('email')
    <div class="alert alert-primary alert-dismissible fade show bg-success text-white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Gagal menyimpan data email sudah digunakan
    </div>
@enderror

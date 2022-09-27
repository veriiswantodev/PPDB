<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
    <form action="" method="post">
      @csrf
      @method('post')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah">
            @error('nama_sekolah')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Sekolah</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>
            @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon">
            @error('telepon')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="embed_lokasi" class="form-label">Embed Lokasi</label>
            <input type="text" name="embed_lokasi" class="form-control @error('embed_lokasi') is-invalid @enderror" id="embed_lokasi">
            @error('embed_lokasi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="jam_operasional" class="form-label">Jam Operasional</label>
            <input type="text" name="jam_operasional" class="form-control @error('jam_operasional') is-invalid @enderror" id="jam_operasional">
            @error('jam_operasional')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit"  class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>  
  </div>
</div>
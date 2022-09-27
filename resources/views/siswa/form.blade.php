<!-- Modal -->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
      <form action="" method="post">
        @csrf
        @method('post')
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col">
                <label>Nama Lengkap <span class="text-danger">*</span></label> 
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                <span></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4">
                <label>NISN <span class="text-danger">*</span></label>
                <input type="text" name="nisn" class="form-control" id="nisn" placeholder="NISN">
                <span></span>
              </div>
              <div class="form-group col-4">
                <label>NIK <span class="text-danger">*</span></label>
                <input type="text" name="nik" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan (NIK)">
                <span></span>
              </div>
              <div class="form-group col-4">
                <label>KIP</label>
                <input type="text" name="kip" class="form-control" id="kip" placeholder="KIP">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>

              <div class="form-group col-6">
                <label>Jurusan <span class="text-danger">*</span></label>
                <select class="form-control jurusan" name="jurusan_id" id="jurusan_id">
                  @foreach ($jurusan as $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                  @endforeach
                </select>
                <span></span>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                <label>Asal Sekolah <span class="text-danger">*</span></label>
                <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" placeholder="Asal Sekolah">
                <span></span>
              </div>

              <div class="form-group col-6">
                <label>Tahun Lulus <span class="text-danger">*</span></label>
                <input type="text" name="tahun_lulus" class="form-control" id="tahun_lulus" placeholder="Tahun Lulus">
                <span></span>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                <label>Tempat Lahir <span class="text-danger">*</span></label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat lahir">
                <span></span>
              </div>
              <div class="form-group col-6">
                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="text" name="tgl_lahir" class="form-control datepicker" id="tanggal_lahir">
                <span></span>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                <label>Agama <span class="text-danger">*</span></label>
                <select class="form-control" name="agama" id="agama">
                  <option value="Islam">Islam</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                </select>
                <span></span>
              </div>

              <div class="form-group col-6">
                <label>No. Telephone <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-phone"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control phone-number" id="telepon" name="telepon">
                  <span></span>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-12">
                <label>Alamat <span class="text-danger">*</span></label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
                <span></span>
              </div>
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
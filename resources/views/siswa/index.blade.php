@extends('layout.app')

@section('title')
    Siswa
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Siswa</h1>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-user-tie"> </i>
                <h4 class="pr-2"> Siswa</h4>
                <div class="ml-auto">
                  <a class="btn btn-success fa fa-file-excel" href="{{ route('siswa.export') }}" ></a>
                  <button class="btn btn-primary fa fa-plus" onclick="addForm('{{ route('siswa.store') }}')"></button>
                </div>
              </div>

              <div class="card-body">
                <table class="table table-striped" style="width: 100%" id="tableID">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 5%">No.</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Jurusan</th>
                      <th class="text-center">Asal Sekolah</th>
                      <th class="text-center" style="width: 15%">Aksi</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>
    @includeIf('siswa.form')
    @includeIf('siswa.show')

@endsection

@push('script')
<script>
      let tableID;

      $(function (){
        tableID = $('#tableID').DataTable({
          processing: true,
          autowidht: false,
          ajax: {
            url: '{{ route('siswa.data') }}',
          },
          columns: [
            {data : 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'nama'},
            {data: 'jurusan_id'},
            {data: 'asal_sekolah'},
            {data: 'aksi', searchable: false, sortable: false}
          ]
        });

        $('.datepicker').datepicker(
          {
            format: 'yyyy-mm-dd',
            autoclose: true
          }
        );

        $('#modalForm').validator().on('submit', function(e){
          if(! e.preventDefault()){
            $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
              .done((response) => {
                $('#modalForm').modal('hide');
                iziToast.success({
                  title: 'Sukses!',
                  message: 'Data Berhasil disimpan',
                  position: 'topRight'
                });
                tableID.ajax.reload();
              })
              .fail(errors => {
                if(errors.status == 422){
                  loopErrors(errors.responseJSON.errors);
                }
                swal( 'Gagal disimpan!', {
                  icon: 'error',
                });
                return;
              });
            }
          });
      })

      function loopErrors(errors){
        $('.invalid-feedback').remove();
        if(errors == undefined){
          return;
        }
        
        for (error in errors){
          $(`[name=${error}]`).addClass('is-invalid');

          $(`<span class="invalid-feedback">${errors[error][0]}</span>`)
              .insertAfter($(`[name=${error}]`).next());
        }
      }

      function addForm(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Tambah Siswa');

        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('post');
        $('#modalForm [name="nama"]').focus();
      }

      function editForm(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Siswa');
        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('put');
        $('#modalForm [name=nama]').focus();
        $.get(url)
          .done((response) => {
            $('#modalForm [name=nama]').val(response.nama);
            $('#modalForm [name=nisn]').val(response.nisn);
            $('#modalForm [name=nik]').val(response.nik);
            $('#modalForm [name=jurusan_id]').val(response.jurusan_id);
            $('#modalForm [name=jenis_kelamin]').val(response.jenis_kelamin);
            $('#modalForm [name=asal_sekolah]').val(response.asal_sekolah);
            $('#modalForm [name=tempat_lahir]').val(response.tempat_lahir);
            $('#modalForm [name=tgl_lahir]').val(response.tgl_lahir);
            $('#modalForm [name=agama]').val(response.agama);
            $('#modalForm [name=telepon]').val(response.telepon);
            $('#modalForm [name=alamat]').val(response.alamat);
          })
          .fail((errors) => {
            swal( 'Gagal disimpan!', {
              icon: 'error',
            });
            return;
          })
      }

      function deleteData(url){
      swal({
        title: 'Yakin menghapus?',
        text: 'Data akan terhapus, jika anda tekan ok data akan terhapus',
        icon: 'warning',
        buttons: true,
        dangerMode: true
      })
      .then((willDelete) => {
        if(willDelete){
          $.post(url, {
            '_token': $('[name=csrf-token]').attr('content'),
            '_method': 'delete'
          })
          .done((response) => {
            tableID.ajax.reload();
            iziToast.success({
              title: 'Sukses!',
              message: 'Data Berhasil dihapus',
              position: 'topRight'
            });
          });
        }
      });
      }
    </script>
@endpush
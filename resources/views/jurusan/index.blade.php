@extends('layout.app')

@section('title')
    Jurusan
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Jurusan</h1>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-graduation-cap"></i>
                <h4> Jurusan</h4>
                <button class="btn fa fa-plus ml-auto" onclick="addForm('{{ route('jurusan.store') }}')"></button>
              </div>

              <div class="card-body">
                <table class="table table-striped" style="width: 100%" id="tableID">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 5%">No.</th>
                      <th class="text-center">Nama</th>
                      {{-- <th class="text-center" style="width: 15%">Aksi</th> --}}
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>
    @includeIf('jurusan.form')

@endsection

@push('script')
<script>
      let tableID;

      $(function (){
        tableID = $('#tableID').DataTable({
          processing: true,
          autowidht: false,
          ajax: {
            url: '{{ route('jurusan.data') }}',
          },
          columns: [
            {data : 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'nama'},
            // {data: 'aksi', searchable: false, sortable: false}
          ]
        });

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
              .fail((errors) => {
                swal( 'Gagal disimpan!', {
                  icon: 'error',
                });
                return;
              });
            }
          });
      })

      function addForm(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Tambah Jurusan');

        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('post');
        $('#modalForm [name="nama"]').focus();
      }

      function editForm(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Jurusan');
        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('put');
        $('#modalForm [name=nama]').focus();
        $.get(url)
          .done((response) => {
            $('#modalForm [name=nama]').val(response.nama);
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
          text: 'Data akan terhapus, jika anda tekan yes',
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
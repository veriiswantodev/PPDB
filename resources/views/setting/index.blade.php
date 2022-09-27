@extends('layout.app')

@section('title')
    Setting
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Setting</h1>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-cog"> </i>
                 <h4> Setting</h4>
              </div>

              <div class="card-body">
                <table class="table table-striped" style="width: 100%" id="tableID">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 5%">No.</th>
                      <th class="text-center">Nama Sekolah</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Telepon</th>
                      <th class="text-center">Embed Lokasi</th>
                      <th class="text-center">Jam Operasional</th>
                      <th class="text-center" style="width: 15%">Aksi</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>
    @includeIf('setting.form')

@endsection

@push('script')
<script>
      let tableID;

      $(function (){
        tableID = $('#tableID').DataTable({
          processing: true,
          autowidht: false,
          ajax: {
            url: '{{ route('setting.data') }}',
          },
          columns: [
            {data : 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'nama_sekolah'},
            {data: 'alamat'},
            {data: 'telepon'},
            {data: 'embed_lokasi'},
            {data: 'jam_operasional'},
            {data: 'aksi', searchable: false, sortable: false}
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

      function editForm(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Setting');
        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('put');
        $('#modalForm [name=nama]').focus();
        $.get(url)
          .done((response) => {
            $('#modalForm [name=nama_sekolah]').val(response.nama_sekolah);
            $('#modalForm [name=alamat]').val(response.alamat);
            $('#modalForm [name=telepon]').val(response.telepon);
            $('#modalForm [name=embed_lokasi]').val(response.embed_lokasi);
            $('#modalForm [name=jam_operasional]').val(response.jam_operasional);
          })
          .fail((errors) => {
            swal( 'Gagal disimpan!', {
              icon: 'error',
            });
            return;
          })
      }
    </script>
@endpush
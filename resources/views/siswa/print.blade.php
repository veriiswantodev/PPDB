<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    .text-center
    {
      text-align: center !important;
    }
  </style>
</head>
<body>
  <p>
    <h4 class="text-center">Kartu Pendaftaran {{$setting->nama_sekolah}}</h4>
  </p>
  <table border="1">
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td>{{$siswa->nama}}</td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td>:</td>
      <td>{{$siswa->jurusan->nama}}</td>
    </tr>
  </table>
</body>
</html>
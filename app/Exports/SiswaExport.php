<?php

namespace App\Exports;

use App\Models\Siswa;
use Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::with('jurusan')->get();
    }

    public function map($siswa) : array {
        return [
            $siswa->id,
            $siswa->nama,
            $siswa->nisn,
            $siswa->nik,
            $siswa->kip,
            $siswa->jurusan->nama,
            $siswa->asal_sekolah,
            $siswa->jenis_kelamin,
            $siswa->tahun_lulus,
            $siswa->tempat_lahir,
            Carbon\Carbon::parse($siswa->tgl_lahir)->translatedFormat(' d F Y'),
            $siswa->agama,         
            $siswa->telepon,         
            $siswa->alamat,         
        ];
    }

    public function headings() : array {
        return [
            'No.',
            'Nama',
            'NISN',
            'NIK',
            'KIP',
            'Jurusan',
            'Asal Sekolah',
            'Jenis Kelamin',
            'Tahun Lulus',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Telepon',
            'Alamat',
        ];
    }
}

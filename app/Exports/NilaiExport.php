<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;

class NilaiExport implements FromView, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    protected $siswa;
    protected $mapel;
    protected $nilai;
    protected $wali_kelas;
    protected $title;

    public function __construct($siswa, $mapel, $nilai, $wali_kelas, $title)
    {
        $this->siswa = $siswa;
        $this->mapel = $mapel;
        $this->nilai = $nilai;
        $this->wali_kelas = $wali_kelas;
        $this->title = $title;
    }

    public function view(): View
    {
        return view('guru.export', [
            'siswa' => $this->siswa,
            'mapel' => $this->mapel,
            'nilai' => $this->nilai,
            'title' => $this->title,
            'wali_kelas' => $this->wali_kelas,
        ]);
    }

    public function map($nilai): array
    {
        return [
            $nilai->siswa->nama_siswa,
            $nilai->siswa->nip,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIP',
            // ... (nama kolom nilai lainnya)
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = count($this->siswa) + 4; // +1 karena baris judul dihitung juga
        $lastColumn = count($this->mapel) + 3; // +1 karena kolom nama dihitung juga

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];
        $sheet->getStyle('C')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
        $range = 'A4:' . $sheet->getCellByColumnAndRow($lastColumn, $lastRow)->getColumn() . $lastRow;
        $sheet->getStyle($range)->applyFromArray($styleArray);
        //setting a1, a2, a3 font size to 11
        $sheet->mergeCells('A1:J1');
        //set a1 to center
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:A3')->getFont()->setSize(11);
    }
    public function registerEvents(): array
    {
        $lastRow = count($this->siswa) + 4; // +5 untuk memberikan ruang kosong antara teks dan tabel

        return [
            AfterSheet::class => function (AfterSheet $event) use ($lastRow) {
                $event->sheet->setCellValue('A1', 'Data Nilai Kelas ' . $this->title);
                $event->sheet->setCellValue('A2', 'Wali Kelas: ' . $this->wali_kelas->nama_guru);
                $event->sheet->setCellValue('A3', 'Jumlah Siswa: ' . count($this->siswa));
            },
        ];
    }
}

    // $sheet->getStyle('C')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
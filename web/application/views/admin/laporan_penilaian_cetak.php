<?php
$pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetTitle('LAPORAN PENILAIAN KINERJA');
$pdf->setFooterMargin(10);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->SetFont('Times', '', 10);
$pdf->SetMargins(10, 10, 10, true);


$html='
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LAPORAN PENGADUAN PER BULAN</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
    .text-center {
        vertical-align: middle;
        text-align: center;
    }
    .text-left {
        vertical-align: middle;
        text-align: left;
    }

    .dashed {
        border: 2px dashed gray;
        padding-left: 1em;
        padding-right: 1em;
        font-family: monospace;
    }
    .solid {
        border: 2px solid gray;
        padding-left: .75em;
        padding-right: .75em;
        margin-left: 1em;
        margin-right: .5em;
        font-family: monospace;
    }
    .solid:first-child {
        margin-left: 0;
    }
    
    .text-center{
        text-align:center;
    }

    .text-right{
        text-align:right;
    }
  </style>
</head>
<body>

<table width="100%" style="font-size: 12pt; padding: 2px">
    <tr><td class="text-center" colspan="2"><h2>LAPORAN PENILAIAN KINERJA TAHUN '.substr($this->input->get('bulan'), 0, 4) .'</h2></td> </tr>
    <tr><td class="text-center" colspan="2"></td></tr>
    <tr><td class="text-center" colspan="2"></td></tr>
</table>

<table width="100%"  border="1" style="font-size: 12pt; padding: 4px">
    <tr>
        <th class="text-center" width="5%">No</th>
        <th class="text-center" width="35%">Nama Pegawai</th>
        <th class="text-center" width="25%">Jabatan</th>
        <th class="text-center" width="25%">Point Kinerja</th>
        <th class="text-center" width="10%">Grade</th>
    </tr>';

    $no = 1;
    foreach ($dtkaryawan as $row) {
      
        $html.= '
        <tr>
        <td class="text-center">' . $no . '</td>
        <td class="text-left">' . $row->nama_karyawan . '</td>
        <td class="text-left">' . $row->jabatan . '</td>
        <td class="text-right">' . $row->hasil . '</td>
        <td class="text-center">' . $row->grade . '</td>
        </tr>';
        $no++;
    }



$html.= '
</table>';

$pdf->AddPage('L', 'F4');
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_penilaian_kinerja.pdf', 'I');
?>
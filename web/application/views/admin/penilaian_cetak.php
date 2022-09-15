<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetTitle('PENILAIAN KINERJA KARYAWAN');
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
    <tr><td class="text-center" colspan="2"><h2>PENILAIAN KINERJA KARYAWAN</h2></td> </tr>
    <tr><td class="text-center" colspan="2"></td></tr>
    <tr><td class="text-center" colspan="2"></td></tr>
    <tr>
        <td class="text-left" width="20%">Nama Karyawan</td>
        <td class="text-left" width="80%">: '.$karyawan->nama_karyawan.' </td>
    </tr>
    <tr>
        <td class="text-left" width="20%">Bulan</td>
        <td class="text-left" width="80%">: '.$bulan.' </td>
    </tr>
    <tr><td class="text-center" colspan="2"></td></tr>
</table>

<table width="100%"  border="1" style="font-size: 12pt; padding: 4px">
    <tr>
        <th class="text-center" width="80%">Kualitas Kinerja</th>
        <th class="text-center" width="20%">Bobot</th>
    </tr>';

    $kelompok = '';
    foreach ($kualitas as $row) {
        $TotalBobot = $row->point != '' ? $row->point : 0;
        $isedit = $row->id_kinerja_pegawai != '' ? 'edit' : 'tambah';
        if($kelompok !== $row->nama_kualitas){
            $no = 0;
            $html .= '<tr style="background:#f7f7f7;">
            <td><strong>'.ucwords($row->nama_kualitas).'</strong></td>
            <td class="text-right"><h5>'.$TotalBobot.'</h5></td>
            </tr>';
            $kelompok = $row->nama_kualitas;
        }
        $html .= '<tr>
        <td class="text-left">' . $row->nama . '</td>
        <td class="text-right">';

            if($row->nama == 'Kehadiran'){
                $point_kehadiran = ($row->point_kehadiran / 100 * $TotalBobot);
                $kehadiran = $row->point_kinerja != '' ? $row->point_kinerja : $point_kehadiran;
                $html .=  $kehadiran;
            }else{
                $html .=  $row->point_kinerja;
            }
            
        $html .= '</td>
        
        </tr>';
    }
    $html .= '<tr>
                <td class="text-center"><strong>Jumlah Total</strong></td>
                <td class="text-right"><strong>('.$kualitas[0]->grade.') '.$kualitas[0]->hasil.'</strong></td>
            </tr>';

$html.= '
</table>';

$pdf->AddPage('P', 'A4');
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('kinerja_pegawai.pdf', 'I');
?>
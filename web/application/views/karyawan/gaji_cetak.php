<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetTitle('LAPORAN PENGGAJIAN KARYAWAN');
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
    <tr><td class="text-center" colspan="2"><h2>LAPORAN PENGGAJIAN BULAN '.substr($this->input->get('bulan'), 5, 2) .'-'.substr($this->input->get('bulan'), 0, 4).'</h2></td> </tr>
    <tr><td class="text-center" colspan="2"></td></tr>
    <tr><td class="text-center" colspan="2"></td></tr>
</table>

<table width="100%"  border="1" style="font-size: 12pt; padding: 4px">
    <tr>
        <th><b>Jenis Gaji</b></th>
        <th><b>Keterangan Gaji</b></th>
        <th><b>Nominal Gaji</b></th>
    </tr>';
    foreach ($jenis_gaji as $jenis) {
        $total[] = $jenis->nominal_gaji;
        $html.= '
        <tr>
            <td>'.$jenis->nama_jn_gaji .'</td>
            <td>
                '.$jenis->nama_gaji.'
            </td>
            <td>
                Rp. '.number_format($jenis->nominal_gaji) .'
            </td>
        </tr>';
    }
    
$html.= '
    <tr>
        <td colspan="2"><b>Total</b></td>
        <td><b>Rp. '.number_format(array_sum($total)).'</b></td>
    </tr>
</table>';

$pdf->AddPage('P', 'A4');
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_penggajian.pdf', 'I');

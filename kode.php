<!-- < ?php 
$q_lhp_reguler	= $this->db->query("SELECT * FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekomendasi b ON a.id=b.id_temuan WHERE nm_obrik = '$nm_obrik' AND th_pemeriksaan = '$th_lhp'")->row();
//$q_lhp_reguler	= $this->db->query("SELECT * FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekomendasi b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id WHERE nm_obrik = '$nm_obrik' AND th_pemeriksaan = '$th_lhp'")->row();
?>
< ?php 
$q_nilai_temuan	= $this->db->query("SELECT SUM(nilai_temuan) FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekomendasi b ON a.id=b.id_temuan")->row();
//$q_lhp_reguler	= $this->db->query("SELECT * FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekomendasi b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id WHERE nm_obrik = '$nm_obrik' AND th_pemeriksaan = '$th_lhp'")->row();
?> -->
<html>

<head>
	<style type="text/css" media="print">
		table {
			border: solid 1px #000;
			border-collapse: collapse;
			width: 100%
		}

		tr {
			border: solid 1px #000;
			page-break-inside: avoid;
		}

		td {
			border: solid 1px #000;
			padding: 5px 3px;
			font-size: 10px
		}

		th {
			font-family: Arial;
			color: black;
			font-size: 11px;
			background-color: lightgrey;
			padding: 2px 0;
			border: solid 1px #000;
			align: center;
		}

		thead {
			display: table-header-group;
		}

		tbody {
			display: table-row-group;
		}

		h3 {
			margin-bottom: -17px
		}

		h2 {
			margin-bottom: 0px
		}
	</style>
	<style type="text/css" media="screen">
		table {
			border: solid 1px #000;
			border-collapse: collapse;
			width: 100%
		}

		tr {
			border: solid 1px #000
		}

		th {
			font-family: Arial;
			color: black;
			font-size: 11px;
			background-color: #999;
			padding: 2px 0;
			border: solid 1px #000;
			align: center;
		}

		td {
			border: solid 1px #000;
			padding: 5px 3px;
			font-size: 10px
		}

		h3 {
			margin-bottom: -17px
		}

		h2 {
			margin-bottom: 0px
		}
	</style>
	<title>Rekap Temuan Hasil Pemeriksaan All</title>
</head>

<body onload="window.print()">
	<center><b style="font-size: 20px">REKAP TEMUAN HASIL PEMERIKSAAN</b></center>
	<center><b style="font-size: 17px">INSPEKTORAT KABUPATEN BANJARNEGARA</b></center><br>
	<!-- <b style="font-size: 12px">No. LHP</b> <a style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;< ?php echo $q_lhp_reguler->no_lhp; ?><br> -->

	<?php
	$day = date("D");
	switch ($day) {
		case 'Sun':
			$hari = "Minggu";
			break;
		case 'Mon':
			$hari = "Senin";
			break;
		case 'Tue':
			$hari = "Selasa";
			break;
		case 'Wed':
			$hari = "Rabu";
			break;
		case 'Thu':
			$hari = "Kamis";
			break;
		case 'Fri':
			$hari = "Jum'at";
			break;
		case 'Sat':
			$hari = "Sabtu";
			break;
	}
	?>

	<b>Cetak Per Hari, Tanggal</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;<?php echo $hari . ", " . $tgl = date('d-m-Y'); ?><br>
	<!-- <b>Periode Rekapitulasi</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;< ?php echo " s/d &nbsp;".tgl_jam_sql3($tgl_sampai = $this->input->post('tgl_sampai'));?><br> -->
	<b>Periode Rekapitulasi</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;<?php echo tgl_jam_sql3($tgl_mulai = $this->input->post('tgl_mulai')) . "&nbsp; s/d &nbsp;" . tgl_jam_sql3($tgl_sampai = $this->input->post('tgl_sampai')); ?><br>
	<!-- <b>Unit Kerja</b> &nbsp; : &nbsp;&nbsp;< ?php echo $q_lhp_reguler->nm_obrik; ?></a><br> -->
	<br>

	<table>
		<thead>
			<tr>
				<!-- <th width="3%">No.</td> -->
				<th width="3%" rowspan="2" align="center">
					<center>PKPT</center>
				</th>
				<th width="5%" rowspan="2" align="center">
					<center>Temuan</center>
				</th>
				<th width="6%" rowspan="2" align="center">
					<center>Rekomendasi</center>
				</th>
				<th width="7%" colspan="3" align="center">
					<center>Status TL</center>
				</th>
				<th width="10%" colspan="3" align="center">
					<center>Kerugian Negara</center>
				</th>
				<th width="10%" colspan="3" align="center">
					<center>Kerugian Daerah</center>
				</th> <!-- td -->
				<th width="10%" colspan="3" align="center">
					<center>Kerugian Lainnya</center>
				</th> <!-- td -->
			</tr>
			<tr>
				<th width="5%">
					<center>S</center>
				</th> <!-- td -->
				<th width="5%">
					<center>D</center>
				</th>
				<th width="5%">
					<center>B</center>
				</th>
				<th width="7%">
					<center>Nilai</center>
				</th>
				<th width="7%">
					<center>Setoran</center>
				</th>
				<th width="7%">
					<center>Kurang</center>
				</th>
				<th width="7%">
					<center>Nilai</center>
				</th>
				<th width="7%">
					<center>Setoran</center>
				</th>
				<th width="7%">
					<center>Kurang</center>
				</th>
				<th width="7%">
					<center>Nilai</center>
				</th>
				<th width="7%">
					<center>Setoran</center>
				</th>
				<th width="7%">
					<center>Kurang</center>
				</th>
			</tr>
		</thead>
		<tbody>

			<?php
			function rupiah($nilai, $pecahan = 0)
			{
				return number_format($nilai, $pecahan, ',', '.');
			}
			?>

			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				foreach ($datpil2 as $d) {
					$no++;
			?> -->


			<tr>
				<!-- <td>< ?php echo $no; ?></td> -->
				<!-- Tahun Pemeriksaan -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tahun_pemeriksaan = $this->db->query("SELECT a.id, d.th_pemeriksaan As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' GROUP BY th_pemeriksaan ASC");
					foreach ($tahun_pemeriksaan->result() as $item) {
					?>
						<?php echo $item->Jumlah; ?>
					<?php } ?>
				</td>

				<!-- Jumlah Temuan -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai 	= $this->input->post('tgl_sampai');
					$kode_temuan = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp >= '$tgl_mulai' AND tgl_lhp <= '$tgl_sampai'");
					foreach ($kode_temuan->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Jumlah Rekomendasi -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai 	= $this->input->post('tgl_sampai');
					$kode_rekomendasi = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp >= '$tgl_mulai' AND tgl_lhp <= '$tgl_sampai'");
					foreach ($kode_rekomendasi->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Status S -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai = $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(status_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND status_rekomendasi='S' AND tgl_rekomendasi <= '$tgl_sampai'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Status D -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(status_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND status_rekomendasi='D' AND tgl_rekomendasi <= '$tgl_sampai'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Status B -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jml1[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_b1 = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah1 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai'");
					foreach ($status_b1->result() as $item1) {
						$jml1[$x] = $item1->Jumlah1;
					} ?>

					<?php
					$x = 0;
					$jml2[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_b2 = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah2 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_rekomendasi <= '$tgl_sampai' AND status_rekomendasi='S'");
					foreach ($status_b2->result() as $item2) {
						$jml2[$x] = $item2->Jumlah2;
					} ?>

					<?php
					$x = 0;
					$jmlall[$x]  = 0;
					$jml3[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_b3 = $this->db->query("SELECT count(status_rekomendasi) As Jumlah3 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_rekomendasi <= '$tgl_sampai' AND status_rekomendasi='D'");
					foreach ($status_b3->result() as $item3) {
						$jml3[$x] = $item3->Jumlah3;
						$jmlall[$x]  = $item1->Jumlah1 - ($item2->Jumlah2 + $item3->Jumlah3);
						$x++;
					?>
						<!-- < ?php echo rupiah($item1->Jumlah1 - $item2->Jumlah2); ?> -->
						<!-- < ?php if(($item1->Jumlah1 - $item2->Jumlah2)=="") echo "-"; else if (($item1->Jumlah1 - $item2->Jumlah2)=="0") echo "-"; else echo rupiah($item1->Jumlah1 - $item2->Jumlah2); ?> -->
						<?php if (($item1->Jumlah1 - ($item2->Jumlah2 + $item3->Jumlah3)) == "") echo "-";
						else if (($item1->Jumlah1 - ($item2->Jumlah2 + $item3->Jumlah3)) == "0") echo "-";
						else echo rupiah($item1->Jumlah1 - ($item2->Jumlah2 + $item3->Jumlah3)); ?>
					<?php } ?>
				</td>

				<!-- Nilai Temuan Rugi Negara -->
				<td align="right" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$nilai_temuan = $this->db->query("SELECT SUM(nilai_rekomendasi) AS Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND jenisrugi_rekomendasi ='Negara'");
					foreach ($nilai_temuan->result() as $item) {
					?>
						<!-- < ?php echo "Rp. ".rupiah($item->Jumlah).",-"; ?> -->
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo "Rp. " . rupiah($item->Jumlah) . ",-"; ?>
					<?php } ?>
				</td>

				<!-- Nilai Setoran Rugi Negara -->
				<td align="right" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					//$nilai_setoran = $this->db->query("SELECT SUM(nilai_tl) AS Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE jenisrugi_tl ='Negara' AND th_pemeriksaan='$th_pemeriksaan' AND tgl_tl >= '$tgl_mulai' AND tgl_tl <= '$tgl_sampai' GROUP BY th_pemeriksaan ASC");
					$nilai_setoran = $this->db->query("SELECT SUM(nilai_tl) AS Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE th_pemeriksaan='$th_pemeriksaan' AND jenisrugi_tl ='Negara' AND tgl_tl <= '$tgl_sampai'");
					foreach ($nilai_setoran->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo "Rp. " . rupiah($item->Jumlah) . ",-"; ?>
					<?php } ?>
				</td>

				<!-- Nilai Kekurangan Rugi Negara -->
				<td align="right" valign="top">
					<?php
					$x = 0;
					$jml1[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					//$nilai_kekurangan1 = $this->db->query("SELECT SUM(nilai_rekomendasi) AS Jumlah1 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE jenisrugi_tl ='Daerah' AND th_pemeriksaan='$th_pemeriksaan' AND tgl_tl <= '$tgl_sampai' GROUP BY th_pemeriksaan ASC");
					$nilai_kekurangan1 = $this->db->query("SELECT SUM(nilai_rekomendasi) AS Jumlah1 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND jenisrugi_rekomendasi ='Negara'");
					foreach ($nilai_kekurangan1->result() as $item1) {
						$jml1[$x] = $item1->Jumlah1;
					} ?>

					<?php
					$x = 0;
					$jmlall[$x]  = 0;
					$jml2[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					//$nilai_kekurangan2 = $this->db->query("SELECT SUM(nilai_tl) AS Jumlah2 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE jenisrugi_tl ='Negara' AND th_pemeriksaan='$th_pemeriksaan' AND tgl_tl >= '$tgl_mulai' AND tgl_tl <= '$tgl_sampai' GROUP BY th_pemeriksaan ASC");
					$nilai_kekurangan2 = $this->db->query("SELECT SUM(nilai_tl) AS Jumlah2 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE th_pemeriksaan='$th_pemeriksaan' AND jenisrugi_tl ='Negara' AND tgl_tl <= '$tgl_sampai'");
					foreach ($nilai_kekurangan2->result() as $item2) {
						$jml2[$x] = $item2->Jumlah2;
						$jmlall[$x]  = $item1->Jumlah1 - $item2->Jumlah2;
						$x++;
					?>
						<?php if ($item1->Jumlah1 - $item2->Jumlah2 == "") echo "-";
						else if ($item1->Jumlah1 - $item2->Jumlah2 == "0") echo "-";
						else echo "Rp. " . rupiah($item1->Jumlah1 - $item2->Jumlah2) . ",-"; ?>
					<?php } ?>
				</td>

				<!-- Nilai Temuan Rugi Daerah -->
				<td align="right" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai 	= $this->input->post('tgl_sampai');
					$nilai_temuan = $this->db->query("SELECT SUM(nilai_rekomendasi) AS Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND jenisrugi_rekomendasi ='Daerah'");
					foreach ($nilai_temuan->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo "Rp. " . rupiah($item->Jumlah) . ",-"; ?>
					<?php } ?>
				</td>

				<!-- Nilai Setoran Rugi Daerah -->
				<td align="right" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$nilai_setoran = $this->db->query("SELECT SUM(nilai_tl) AS Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE th_pemeriksaan='$th_pemeriksaan' AND jenisrugi_tl ='Daerah' AND tgl_tl <= '$tgl_sampai'");
					foreach ($nilai_setoran->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo "Rp. " . rupiah($item->Jumlah) . ",-"; ?>
					<?php } ?>
				</td>

				<!-- Nilai Kekurangan Rugi Daerah -->
				<td align="right" valign="top">
					<?php
					$x = 0;
					$jml1[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					//$nilai_kekurangan1 = $this->db->query("SELECT SUM(nilai_rekomendasi) AS Jumlah1 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE jenisrugi_tl ='Daerah' AND th_pemeriksaan='$th_pemeriksaan' AND tgl_tl <= '$tgl_sampai' GROUP BY th_pemeriksaan ASC");
					$nilai_kekurangan1 = $this->db->query("SELECT SUM(nilai_rekomendasi) AS Jumlah1 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND jenisrugi_rekomendasi ='Daerah'");
					foreach ($nilai_kekurangan1->result() as $item1) {
						$jml1[$x] = $item1->Jumlah1;
					} ?>

					<?php
					$x = 0;
					$jmlall[$x]  = 0;
					$jml2[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$nilai_kekurangan2 = $this->db->query("SELECT SUM(nilai_tl) AS Jumlah2 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE th_pemeriksaan='$th_pemeriksaan' AND jenisrugi_tl ='Daerah' AND tgl_tl <= '$tgl_sampai'");
					foreach ($nilai_kekurangan2->result() as $item2) {
						$jml2[$x] = $item2->Jumlah2;
						$jmlall[$x]  = $item1->Jumlah1 - $item2->Jumlah2;
						$x++;
					?>
						<?php if ($item1->Jumlah1 - $item2->Jumlah2 == "") echo "-";
						else if ($item1->Jumlah1 - $item2->Jumlah2 == "0") echo "-";
						else echo "Rp. " . rupiah($item1->Jumlah1 - $item2->Jumlah2) . ",-"; ?>
					<?php } ?>
				</td>

				<!-- Nilai Temuan Kerugian Lainnya -->
				<td align="right" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					//$nilai_temuan = $this->db->query("SELECT SUM(nilai_temuan) AS Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekomendasi b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND jenisrugi_temuan ='Lainnya'");
					$nilai_temuan = $this->db->query("SELECT SUM(nilai_rekomendasi) AS Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND jenisrugi_rekomendasi ='Lainnya'");
					foreach ($nilai_temuan->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo "Rp. " . rupiah($item->Jumlah) . ",-"; ?>
					<?php } ?>
				</td>

				<!-- Nilai Setoran Kerugian Lainnya -->
				<td align="right" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$nilai_setoran = $this->db->query("SELECT SUM(nilai_tl) AS Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE th_pemeriksaan='$th_pemeriksaan' AND jenisrugi_tl ='Lainnya' AND tgl_tl <= '$tgl_sampai'");
					foreach ($nilai_setoran->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo "Rp. " . rupiah($item->Jumlah) . ",-"; ?>
					<?php } ?>
				</td>

				<!-- Nilai Kekurangan Kerugian Lainnya -->
				<td align="right" valign="top">
					<?php
					$x = 0;
					$jml1[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					//$nilai_kekurangan1 = $this->db->query("SELECT SUM(nilai_rekomendasi) AS Jumlah1 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE jenisrugi_tl ='Daerah' AND th_pemeriksaan='$th_pemeriksaan' AND tgl_tl <= '$tgl_sampai' GROUP BY th_pemeriksaan ASC");
					$nilai_kekurangan1 = $this->db->query("SELECT SUM(nilai_rekomendasi) AS Jumlah1 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND jenisrugi_rekomendasi ='Lainnya'");
					foreach ($nilai_kekurangan1->result() as $item1) {
						$jml1[$x] = $item1->Jumlah1;
					} ?>

					<?php
					$x = 0;
					$jmlall[$x]  = 0;
					$jml2[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$nilai_kekurangan2 = $this->db->query("SELECT SUM(nilai_tl) AS Jumlah2 FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan LEFT JOIN t_tl c ON b.id=c.id_rekomendasi WHERE th_pemeriksaan='$th_pemeriksaan' AND jenisrugi_tl ='Lainnya' AND tgl_tl <= '$tgl_sampai'");
					foreach ($nilai_kekurangan2->result() as $item2) {
						$jml2[$x] = $item2->Jumlah2;
						$jmlall[$x]  = $item1->Jumlah1 - $item2->Jumlah2;
						$x++;
					?>
						<?php if ($item1->Jumlah1 - $item2->Jumlah2 == "") echo "-";
						else if ($item1->Jumlah1 - $item2->Jumlah2 == "0") echo "-";
						else echo "Rp. " . rupiah($item1->Jumlah1 - $item2->Jumlah2) . ",-"; ?>
					<?php } ?>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<b>Kode : 1 <i>( TEMUAN KETIDAKPATUHAN TERHADAP PERATURAN )</i></b><br><br>
	<b>Kode Temuan : 1.01. </b> <i>( Kerugian Negara/Daerah atau kerugian negara/daerah yang terjadi pada perusahaan milik negara/daerah )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.04</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.05</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.06</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.07</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.08</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.09</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.10</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.11</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.12</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.13</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.14</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.15</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.16</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.17</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.18</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.01.19</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 1.01.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.03'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.04'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.05'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.06 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.06'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.07 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.07'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.08 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.08'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.09 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.09'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.10 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.10'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.11 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.11'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.12 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.12'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.13 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.13'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.14 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.14'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.15 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.15'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.16 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.16'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.17 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.17'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.18 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.18'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.01.19 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.01.19'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 1.01. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%1.01.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<b>Kode Temuan : 1.02. </b> <i>( Potensi kerugian negara/daerah atau kerugian negara/daerah yang terjadi pada perusahaan milik negara/daerah )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.04</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.05</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.06</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.07</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.08</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.09</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.02.10</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 1.02.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.02.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.02.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.03'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.02.04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.04'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.02.05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.05'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.02.06 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.06'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.02.07 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.07'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.02.08 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.08'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.02.09 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.09'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.02.10 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.02.10'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 1.02. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%1.02.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<b>Kode Temuan : 1.03. </b> <i>( Kekurangan penerimaan negara/daerah atau perusahaan milik negara/daerah )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>1.03.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.03.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.03.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.03.04</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.03.05</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.03.06</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.03.07</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 1.03.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.03.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.03.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.03.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.03.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.03.03'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.03.04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.03.04'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.03.05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.03.05'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.03.06 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.03.06'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.03.07 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.03.07'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 1.03. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%1.03.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<b>Kode Temuan : 1.04. </b> <i>( Administrasi )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.04</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.05</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.06</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.07</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.08</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.09</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.10</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.11</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.12</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.13</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.14</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.15</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.04.16</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 1.04.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.03'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.04'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.05'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.06 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.06'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.07 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.07'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.08 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.08'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.09 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.09'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.10 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.10'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.11 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.11'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.12 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.12'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.13 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.13'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.14 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.14'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.15 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.15'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.04.16 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.04.16'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 1.04. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%1.04.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<b>Kode Temuan : 1.05. </b> <i>( Indikasi tindak pidana )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>1.05.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.05.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.05.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.05.04</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.05.05</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.05.06</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>1.05.07</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 1.05.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.05.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.05.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.05.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.05.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.05.03'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.05.04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.05.04'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.05.05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.05.05'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.05.06 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.05.06'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 1.05.07 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='1.05.07'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 1.05. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%1.05.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<br>
	<b>Kode : 2 <i>( TEMUAN KELEMAHAN SISTEM PENGENDALIAN INTERN )</i></b><br><br>
	<b>Kode Temuan : 2.01. </b> <i>( Kelemahan sistem pengendalian akuntansi dan pelaporan )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>2.01.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.01.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.01.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.01.04</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.01.05</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 2.01.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.01.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.01.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.01.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.01.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.01.03'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.01.04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.01.04'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.01.05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.01.05'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 2.01. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%2.01.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<b>Kode Temuan : 2.02. </b> <i>( Kelemahan sistem pengendalian pelaksanaan anggaran pendapatan dan belanja )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>2.02.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.02.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.02.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.02.04</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.02.05</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.02.06</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.02.07</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>

				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 2.02.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.02.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.02.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.02.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.02.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.02.03'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.02.04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.02.04'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.02.05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.02.05'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.02.06 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.02.06'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.02.07 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.02.07'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 2.02. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%2.02.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<b>Kode Temuan : 2.03. </b> <i>( Kelemahan struktur pengendalian intern )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>2.03.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.03.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.03.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.03.04</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>2.03.05</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>

				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 2.03.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.03.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.03.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.03.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.03.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.03.03'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.03.04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.03.04'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 2.03.05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='2.03.05'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 2.03. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%2.03.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<br>
	<b>Kode : 3 <i>( TEMUAN 3E (EFISIEN, EFEKTIF, & EKONOMIS) )</i></b><br><br>
	<b>Kode Temuan : 3.01. </b> <i>( Ketidakhematan/pemborosan/ketidakekonomisan )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>3.01.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.01.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.01.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 3.01.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.01.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.01.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.01.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.01.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.01.03'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 3.01. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%3.01.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<b>Kode Temuan : 3.02. </b> <i>( Ketidakefisienan )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>3.02.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.02.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 3.02.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.02.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.02.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.02.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 3.02. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%3.02.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<b>Kode Temuan : 3.03. </b> <i>( Ketidakefektifan )</i>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" rowspan="2" align="center">
					<center>3.03.01</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.03.02</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.03.03</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.03.04</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.03.05</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.03.06</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.03.07</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>3.03.08</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 3.03.01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.03.01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.03.02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.03.02'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.03.03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.03.03'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.03.04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.03.04'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.03.05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.03.05'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.03.06 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.03.06'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.03.07 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.03.07'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 3.03.08 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan='3.03.08'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode 3.03. -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_temuan) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_temuan LIKE '%3.03.%'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<br>
	<b>Kode : 00 <i>( REKOMENDASI )</i></b><br>
	<br>
	<table>
		<thead>
			<tr>
				<th width="2%" colspan="14" align="center">
					<center>Kode Rekomendasi</center>
				</th>
				<th width="2%" rowspan="2" align="center">
					<center>JUMLAH TOTAL REKOMENDASI</center>
				</th>
				<!-- td -->
			</tr>
			<tr>
				<th width="2%">
					<center>01</center>
				</th>
				<th width="2%">
					<center>02</center>
				</th>
				<th width="2%">
					<center>03</center>
				</th>
				<th width="2%">
					<center>04</center>
				</th>
				<th width="2%">
					<center>05</center>
				</th>
				<th width="2%">
					<center>06</center>
				</th>
				<th width="2%">
					<center>07</center>
				</th>
				<th width="2%">
					<center>08</center>
				</th>
				<th width="2%">
					<center>09</center>
				</th>
				<th width="2%">
					<center>10</center>
				</th>
				<th width="2%">
					<center>11</center>
				</th>
				<th width="2%">
					<center>12</center>
				</th>
				<th width="2%">
					<center>13</center>
				</th>
				<th width="2%">
					<center>14</center>
				</th>
				<!-- td -->
			</tr>
		</thead>
		<tbody>
			<!-- < ?php 
			if (!empty($datpil2)) {
				$no = 0;
				{
				$no++;
			?> -->

			<tr>
				<!-- Kode 01 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='01'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 02 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='02'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 03 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='03'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 04 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='04'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 05 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='05'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 06 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='06'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 07 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='07'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 08 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='08'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 09 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='09'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 10 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='10'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 11 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='11'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 12 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='12'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 13 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='13'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- Kode 14 -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_s = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai' AND kd_rekomendasi='14'");
					foreach ($status_s->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>

				<!-- JUMLAH Kode Rekomendasi -->
				<td align="center" valign="top">
					<?php
					$x = 0;
					$jmlall[$x] = 0;
					$th_pemeriksaan = $this->input->post('th_pemeriksaan');
					//$tgl_mulai		= $this->input->post('tgl_mulai');
					$tgl_sampai		= $this->input->post('tgl_sampai');
					$status_d = $this->db->query("SELECT count(kd_rekomendasi) As Jumlah FROM t_lhp_reguler d LEFT JOIN t_temuan a ON d.id=a.id_lhp LEFT JOIN t_rekom b ON a.id=b.id_temuan WHERE th_pemeriksaan='$th_pemeriksaan' AND tgl_lhp <= '$tgl_sampai'");
					foreach ($status_d->result() as $item) {
					?>
						<?php if ($item->Jumlah == "") echo "-";
						else if ($item->Jumlah == "0") echo "-";
						else echo rupiah($item->Jumlah); ?>
					<?php } ?>
				</td>
			</tr>
			<!-- < ?php 
				}
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?> -->
		</tbody>
	</table>
	<br>
	<br>
	<br>
	<a style="font-size: 12px">Keterangan :<br>
		B &nbsp;:&nbsp; Belum<br>
		D &nbsp;:&nbsp; Dalam Proses<br>
		S &nbsp; :&nbsp; Selesai</a><br>
	<br>
	<br>
	<a style="font-size: 8px">&copy;eSIMWAS_inspektoratkabbanjarnegara<?php $tahun = date('Y');
																		echo ($tahun); ?></a>
</body>

</html>

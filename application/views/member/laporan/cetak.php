
<style>
html {
	   background-image: url('<?php echo ASSET_SAYA ?>images/02.jpg');
	   background-size: 650px;
	   background-color:#CCC;
	   width:650px;
	   background-repeat: no-repeat;
	   font-family:Arial, Helvetica, sans-serif;
	   margin:0 auto;
} 
.tb1 {
  border-collapse: collapse;
  border-spacing: 0;
  border: 1px solid #ddd !important;
   width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.tb1 th,
.tb1 td {
    border: 1px solid #ddd !important;
}
</style>
<html>
<body onload="window.print()">

<div style="margin-top:160px; min-height:500px;">
	<center><h2>SLIP PEMESANAN</h2></center>
	<table>
		<tr>
			<td>Atas Nama</td>
			<td>:</td>
			<td><?php echo ucfirst($listData[0]['nama_pelanggan']); ?></td>
		</tr>
		<tr>
			<td>No. Hp / Email</td>
			<td>:</td>
			<td><?php echo $listData[0]['no_hp'].' / '.$listData[0]['email']; ?></td>
		</tr>
		<tr>
			<td>Tgl. Pindah</td>
			<td>:</td>
			<td><?php echo date("d F Y",strtotime($listData[0]['tanggal_pindahan'])); ?></td>
		</tr>
		<tr> 
			<td>Alamat Penjemputan</td>
			<td>:</td>
			<td><?php echo ucfirst($listData[0]['alamat_penjemputan']); ?></td>
		</tr>
		<tr>
			<td>Alamat Tujuan</td>
			<td>:</td>
			<td><?php echo ucfirst($listData[0]['alamat_tujuan']); ?></td>
		</tr>
	</table>
	<table class="tb1" style="margin-top:20px;">
			<thead>
				<tr>
					<th>No</th>
					<th>Kategori Barang</th>
					<th style="text-align:right;">Volume</th>
					<th style="text-align:right;">Berat</th>
					<th style="text-align:right;">Kuantiti</th>
					<th style="text-align:right;">Jumlah Volume</th>
					<th style="text-align:right;">Jumlah Berat</th>
				</tr>
			</thead> 
			<tbody>
				 <?php
				 $total_tarif = 0;
				 $total_harga = 0;
				 $total_tambahan = 0;
				 $total_volum = 0;
				$no = 0 ;
				foreach($listData as $value){
				$no++;
				$total_tarif 	= $total_tarif+(($value['harga_per_item']+$value['biaya_per_item'])*$value['qty']);
				$total_harga 	= $total_harga+($value['harga_per_item']*$value['qty']);
				$total_tambahan = $total_tambahan+ ($value['biaya_per_item']*$value['qty']);
				$total_volum 	= $total_volum + ($value['total_volum_barang']*$value['qty']);
				$total_berat 	= $total_berat + ($value['berat']*$value['qty']);
				 ?>
				  <tr>
					<td><?php echo $no ?></td>
					<td><?php echo $value['nama_kategori_barang'] ?></td>
					
					<td style="text-align:right;"><?php echo number_format($value['total_volum_barang'],2,'.',',') ?> m<sup>3</sup></td>
					<td style="text-align:right;"><?php echo $value['berat'] ?> Kg</td>
					<td style="text-align:right;"><?php echo number_format($value['qty'],0,'.',',') ?></td>
					<td style="text-align:right;"><?php echo number_format($value['total_volum_barang']*$value['qty'],2,'.',',') ?> m<sup>3</sup></td>
					<td style="text-align:right;"><?php echo number_format(($value['berat']*$value['qty']),2,'.',',') ?> kg</td>
					
				</tr>
				<?php 
				}
				?>   
			</tbody>
			<tr>
				<td colspan="5" style="text-align:right;">Total</td>
				<td style="text-align:right;"><?php echo number_format($total_volum,2,'.',',') ?> m<sup>3</sup></td>
				<td style="text-align:right;"><?php echo number_format($total_berat,2,'.',',') ?> kg</sup></td>
			</tr>
			<tr>
				<td colspan="6" style="text-align:right;">Total Harga</td>
				<td style="text-align:right;">Rp. <?php echo number_format($total_harga,0,'.',',') ?></td>
			</tr>
		</table>
</div>	   

</body>
</html>
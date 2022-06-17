<?php
namespace PHPMaker2019\project1;
?>
<?php if ($tb_kegiatan_sub5->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_tb_kegiatan_sub5master" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($tb_kegiatan_sub5->kode_kegiatan_sub5->Visible) { // kode_kegiatan_sub5 ?>
		<tr id="r_kode_kegiatan_sub5">
			<td class="<?php echo $tb_kegiatan_sub5->TableLeftColumnClass ?>"><?php echo $tb_kegiatan_sub5->kode_kegiatan_sub5->caption() ?></td>
			<td<?php echo $tb_kegiatan_sub5->kode_kegiatan_sub5->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub5_kode_kegiatan_sub5">
<span<?php echo $tb_kegiatan_sub5->kode_kegiatan_sub5->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub5->kode_kegiatan_sub5->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($tb_kegiatan_sub5->nama_kegiatan_sub5->Visible) { // nama_kegiatan_sub5 ?>
		<tr id="r_nama_kegiatan_sub5">
			<td class="<?php echo $tb_kegiatan_sub5->TableLeftColumnClass ?>"><?php echo $tb_kegiatan_sub5->nama_kegiatan_sub5->caption() ?></td>
			<td<?php echo $tb_kegiatan_sub5->nama_kegiatan_sub5->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub5_nama_kegiatan_sub5">
<span<?php echo $tb_kegiatan_sub5->nama_kegiatan_sub5->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub5->nama_kegiatan_sub5->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($tb_kegiatan_sub5->kode_kegiatan_sub6->Visible) { // kode_kegiatan_sub6 ?>
		<tr id="r_kode_kegiatan_sub6">
			<td class="<?php echo $tb_kegiatan_sub5->TableLeftColumnClass ?>"><?php echo $tb_kegiatan_sub5->kode_kegiatan_sub6->caption() ?></td>
			<td<?php echo $tb_kegiatan_sub5->kode_kegiatan_sub6->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub5_kode_kegiatan_sub6">
<span<?php echo $tb_kegiatan_sub5->kode_kegiatan_sub6->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub5->kode_kegiatan_sub6->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>
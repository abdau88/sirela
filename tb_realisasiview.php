<?php
namespace PHPMaker2019\project1;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$tb_realisasi_view = new tb_realisasi_view();

// Run the page
$tb_realisasi_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_realisasi_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_realisasi->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_realisasiview = currentForm = new ew.Form("ftb_realisasiview", "view");

// Form_CustomValidate event
ftb_realisasiview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_realisasiview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_realisasiview.lists["x_kode_unit"] = <?php echo $tb_realisasi_view->kode_unit->Lookup->toClientList() ?>;
ftb_realisasiview.lists["x_kode_unit"].options = <?php echo JsonEncode($tb_realisasi_view->kode_unit->lookupOptions()) ?>;
ftb_realisasiview.autoSuggests["x_kode_unit"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_realisasiview.lists["x_kode_akun"] = <?php echo $tb_realisasi_view->kode_akun->Lookup->toClientList() ?>;
ftb_realisasiview.lists["x_kode_akun"].options = <?php echo JsonEncode($tb_realisasi_view->kode_akun->lookupOptions()) ?>;
ftb_realisasiview.autoSuggests["x_kode_akun"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_realisasiview.lists["x_tahun"] = <?php echo $tb_realisasi_view->tahun->Lookup->toClientList() ?>;
ftb_realisasiview.lists["x_tahun"].options = <?php echo JsonEncode($tb_realisasi_view->tahun->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_realisasi->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_realisasi_view->ExportOptions->render("body") ?>
<?php $tb_realisasi_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_realisasi_view->showPageHeader(); ?>
<?php
$tb_realisasi_view->showMessage();
?>
<form name="ftb_realisasiview" id="ftb_realisasiview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_realisasi_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_realisasi_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_realisasi">
<input type="hidden" name="modal" value="<?php echo (int)$tb_realisasi_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_realisasi->kode_unit->Visible) { // kode_unit ?>
	<tr id="r_kode_unit">
		<td class="<?php echo $tb_realisasi_view->TableLeftColumnClass ?>"><span id="elh_tb_realisasi_kode_unit"><?php echo $tb_realisasi->kode_unit->caption() ?></span></td>
		<td data-name="kode_unit"<?php echo $tb_realisasi->kode_unit->cellAttributes() ?>>
<span id="el_tb_realisasi_kode_unit">
<span<?php echo $tb_realisasi->kode_unit->viewAttributes() ?>>
<?php echo $tb_realisasi->kode_unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_realisasi->kode_akun->Visible) { // kode_akun ?>
	<tr id="r_kode_akun">
		<td class="<?php echo $tb_realisasi_view->TableLeftColumnClass ?>"><span id="elh_tb_realisasi_kode_akun"><?php echo $tb_realisasi->kode_akun->caption() ?></span></td>
		<td data-name="kode_akun"<?php echo $tb_realisasi->kode_akun->cellAttributes() ?>>
<span id="el_tb_realisasi_kode_akun">
<span<?php echo $tb_realisasi->kode_akun->viewAttributes() ?>>
<?php echo $tb_realisasi->kode_akun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_realisasi->tahun->Visible) { // tahun ?>
	<tr id="r_tahun">
		<td class="<?php echo $tb_realisasi_view->TableLeftColumnClass ?>"><span id="elh_tb_realisasi_tahun"><?php echo $tb_realisasi->tahun->caption() ?></span></td>
		<td data-name="tahun"<?php echo $tb_realisasi->tahun->cellAttributes() ?>>
<span id="el_tb_realisasi_tahun">
<span<?php echo $tb_realisasi->tahun->viewAttributes() ?>>
<?php echo $tb_realisasi->tahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_realisasi->pagu->Visible) { // pagu ?>
	<tr id="r_pagu">
		<td class="<?php echo $tb_realisasi_view->TableLeftColumnClass ?>"><span id="elh_tb_realisasi_pagu"><?php echo $tb_realisasi->pagu->caption() ?></span></td>
		<td data-name="pagu"<?php echo $tb_realisasi->pagu->cellAttributes() ?>>
<span id="el_tb_realisasi_pagu">
<span<?php echo $tb_realisasi->pagu->viewAttributes() ?>>
<?php echo $tb_realisasi->pagu->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_realisasi->realisasi->Visible) { // realisasi ?>
	<tr id="r_realisasi">
		<td class="<?php echo $tb_realisasi_view->TableLeftColumnClass ?>"><span id="elh_tb_realisasi_realisasi"><?php echo $tb_realisasi->realisasi->caption() ?></span></td>
		<td data-name="realisasi"<?php echo $tb_realisasi->realisasi->cellAttributes() ?>>
<span id="el_tb_realisasi_realisasi">
<span<?php echo $tb_realisasi->realisasi->viewAttributes() ?>>
<?php echo $tb_realisasi->realisasi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_realisasi->sisa_dana->Visible) { // sisa_dana ?>
	<tr id="r_sisa_dana">
		<td class="<?php echo $tb_realisasi_view->TableLeftColumnClass ?>"><span id="elh_tb_realisasi_sisa_dana"><?php echo $tb_realisasi->sisa_dana->caption() ?></span></td>
		<td data-name="sisa_dana"<?php echo $tb_realisasi->sisa_dana->cellAttributes() ?>>
<span id="el_tb_realisasi_sisa_dana">
<span<?php echo $tb_realisasi->sisa_dana->viewAttributes() ?>>
<?php echo $tb_realisasi->sisa_dana->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tb_realisasi_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_realisasi->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_realisasi_view->terminate();
?>
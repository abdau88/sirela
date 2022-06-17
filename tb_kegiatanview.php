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
$tb_kegiatan_view = new tb_kegiatan_view();

// Run the page
$tb_kegiatan_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_kegiatan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_kegiatanview = currentForm = new ew.Form("ftb_kegiatanview", "view");

// Form_CustomValidate event
ftb_kegiatanview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatanview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatanview.lists["x_kode_kegiatan_sub1"] = <?php echo $tb_kegiatan_view->kode_kegiatan_sub1->Lookup->toClientList() ?>;
ftb_kegiatanview.lists["x_kode_kegiatan_sub1"].options = <?php echo JsonEncode($tb_kegiatan_view->kode_kegiatan_sub1->lookupOptions()) ?>;
ftb_kegiatanview.autoSuggests["x_kode_kegiatan_sub1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_kegiatan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_kegiatan_view->ExportOptions->render("body") ?>
<?php $tb_kegiatan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_kegiatan_view->showPageHeader(); ?>
<?php
$tb_kegiatan_view->showMessage();
?>
<form name="ftb_kegiatanview" id="ftb_kegiatanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan">
<input type="hidden" name="modal" value="<?php echo (int)$tb_kegiatan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_kegiatan->kode_kegiatan->Visible) { // kode_kegiatan ?>
	<tr id="r_kode_kegiatan">
		<td class="<?php echo $tb_kegiatan_view->TableLeftColumnClass ?>"><span id="elh_tb_kegiatan_kode_kegiatan"><?php echo $tb_kegiatan->kode_kegiatan->caption() ?></span></td>
		<td data-name="kode_kegiatan"<?php echo $tb_kegiatan->kode_kegiatan->cellAttributes() ?>>
<span id="el_tb_kegiatan_kode_kegiatan">
<span<?php echo $tb_kegiatan->kode_kegiatan->viewAttributes() ?>>
<?php echo $tb_kegiatan->kode_kegiatan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_kegiatan->nama_kegiatan->Visible) { // nama_kegiatan ?>
	<tr id="r_nama_kegiatan">
		<td class="<?php echo $tb_kegiatan_view->TableLeftColumnClass ?>"><span id="elh_tb_kegiatan_nama_kegiatan"><?php echo $tb_kegiatan->nama_kegiatan->caption() ?></span></td>
		<td data-name="nama_kegiatan"<?php echo $tb_kegiatan->nama_kegiatan->cellAttributes() ?>>
<span id="el_tb_kegiatan_nama_kegiatan">
<span<?php echo $tb_kegiatan->nama_kegiatan->viewAttributes() ?>>
<?php echo $tb_kegiatan->nama_kegiatan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
	<tr id="r_kode_kegiatan_sub1">
		<td class="<?php echo $tb_kegiatan_view->TableLeftColumnClass ?>"><span id="elh_tb_kegiatan_kode_kegiatan_sub1"><?php echo $tb_kegiatan->kode_kegiatan_sub1->caption() ?></span></td>
		<td data-name="kode_kegiatan_sub1"<?php echo $tb_kegiatan->kode_kegiatan_sub1->cellAttributes() ?>>
<span id="el_tb_kegiatan_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan->kode_kegiatan_sub1->viewAttributes() ?>>
<?php echo $tb_kegiatan->kode_kegiatan_sub1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tb_kegiatan_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_kegiatan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_view->terminate();
?>
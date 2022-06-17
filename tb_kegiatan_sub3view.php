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
$tb_kegiatan_sub3_view = new tb_kegiatan_sub3_view();

// Run the page
$tb_kegiatan_sub3_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_sub3_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_kegiatan_sub3->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_kegiatan_sub3view = currentForm = new ew.Form("ftb_kegiatan_sub3view", "view");

// Form_CustomValidate event
ftb_kegiatan_sub3view.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatan_sub3view.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatan_sub3view.lists["x_kode_kegiatan_sub3"] = <?php echo $tb_kegiatan_sub3_view->kode_kegiatan_sub3->Lookup->toClientList() ?>;
ftb_kegiatan_sub3view.lists["x_kode_kegiatan_sub3"].options = <?php echo JsonEncode($tb_kegiatan_sub3_view->kode_kegiatan_sub3->lookupOptions()) ?>;
ftb_kegiatan_sub3view.autoSuggests["x_kode_kegiatan_sub3"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_kegiatan_sub3->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_kegiatan_sub3_view->ExportOptions->render("body") ?>
<?php $tb_kegiatan_sub3_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_kegiatan_sub3_view->showPageHeader(); ?>
<?php
$tb_kegiatan_sub3_view->showMessage();
?>
<form name="ftb_kegiatan_sub3view" id="ftb_kegiatan_sub3view" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_sub3_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_sub3_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan_sub3">
<input type="hidden" name="modal" value="<?php echo (int)$tb_kegiatan_sub3_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_kegiatan_sub3->kode_kegiatan_sub3->Visible) { // kode_kegiatan_sub3 ?>
	<tr id="r_kode_kegiatan_sub3">
		<td class="<?php echo $tb_kegiatan_sub3_view->TableLeftColumnClass ?>"><span id="elh_tb_kegiatan_sub3_kode_kegiatan_sub3"><?php echo $tb_kegiatan_sub3->kode_kegiatan_sub3->caption() ?></span></td>
		<td data-name="kode_kegiatan_sub3"<?php echo $tb_kegiatan_sub3->kode_kegiatan_sub3->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub3_kode_kegiatan_sub3">
<span<?php echo $tb_kegiatan_sub3->kode_kegiatan_sub3->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub3->kode_kegiatan_sub3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_kegiatan_sub3->nama_kegiatan_sub3->Visible) { // nama_kegiatan_sub3 ?>
	<tr id="r_nama_kegiatan_sub3">
		<td class="<?php echo $tb_kegiatan_sub3_view->TableLeftColumnClass ?>"><span id="elh_tb_kegiatan_sub3_nama_kegiatan_sub3"><?php echo $tb_kegiatan_sub3->nama_kegiatan_sub3->caption() ?></span></td>
		<td data-name="nama_kegiatan_sub3"<?php echo $tb_kegiatan_sub3->nama_kegiatan_sub3->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub3_nama_kegiatan_sub3">
<span<?php echo $tb_kegiatan_sub3->nama_kegiatan_sub3->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub3->nama_kegiatan_sub3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_kegiatan_sub3->kode_kegiatan_sub4->Visible) { // kode_kegiatan_sub4 ?>
	<tr id="r_kode_kegiatan_sub4">
		<td class="<?php echo $tb_kegiatan_sub3_view->TableLeftColumnClass ?>"><span id="elh_tb_kegiatan_sub3_kode_kegiatan_sub4"><?php echo $tb_kegiatan_sub3->kode_kegiatan_sub4->caption() ?></span></td>
		<td data-name="kode_kegiatan_sub4"<?php echo $tb_kegiatan_sub3->kode_kegiatan_sub4->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub3_kode_kegiatan_sub4">
<span<?php echo $tb_kegiatan_sub3->kode_kegiatan_sub4->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub3->kode_kegiatan_sub4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("tb_kegiatan_sub2", explode(",", $tb_kegiatan_sub3->getCurrentDetailTable())) && $tb_kegiatan_sub2->DetailView) {
?>
<?php if ($tb_kegiatan_sub3->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("tb_kegiatan_sub2", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "tb_kegiatan_sub2grid.php" ?>
<?php } ?>
</form>
<?php
$tb_kegiatan_sub3_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_kegiatan_sub3->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_sub3_view->terminate();
?>
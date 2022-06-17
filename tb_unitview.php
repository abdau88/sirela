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
$tb_unit_view = new tb_unit_view();

// Run the page
$tb_unit_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_unit_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_unit->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_unitview = currentForm = new ew.Form("ftb_unitview", "view");

// Form_CustomValidate event
ftb_unitview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_unitview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_unit->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_unit_view->ExportOptions->render("body") ?>
<?php $tb_unit_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_unit_view->showPageHeader(); ?>
<?php
$tb_unit_view->showMessage();
?>
<form name="ftb_unitview" id="ftb_unitview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_unit_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_unit_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_unit">
<input type="hidden" name="modal" value="<?php echo (int)$tb_unit_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_unit->kode_unit->Visible) { // kode_unit ?>
	<tr id="r_kode_unit">
		<td class="<?php echo $tb_unit_view->TableLeftColumnClass ?>"><span id="elh_tb_unit_kode_unit"><?php echo $tb_unit->kode_unit->caption() ?></span></td>
		<td data-name="kode_unit"<?php echo $tb_unit->kode_unit->cellAttributes() ?>>
<span id="el_tb_unit_kode_unit">
<span<?php echo $tb_unit->kode_unit->viewAttributes() ?>>
<?php echo $tb_unit->kode_unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_unit->unit_kerja->Visible) { // unit_kerja ?>
	<tr id="r_unit_kerja">
		<td class="<?php echo $tb_unit_view->TableLeftColumnClass ?>"><span id="elh_tb_unit_unit_kerja"><?php echo $tb_unit->unit_kerja->caption() ?></span></td>
		<td data-name="unit_kerja"<?php echo $tb_unit->unit_kerja->cellAttributes() ?>>
<span id="el_tb_unit_unit_kerja">
<span<?php echo $tb_unit->unit_kerja->viewAttributes() ?>>
<?php echo $tb_unit->unit_kerja->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tb_unit_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_unit->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_unit_view->terminate();
?>
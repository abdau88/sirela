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
$tb_unit_delete = new tb_unit_delete();

// Run the page
$tb_unit_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_unit_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_unitdelete = currentForm = new ew.Form("ftb_unitdelete", "delete");

// Form_CustomValidate event
ftb_unitdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_unitdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_unit_delete->showPageHeader(); ?>
<?php
$tb_unit_delete->showMessage();
?>
<form name="ftb_unitdelete" id="ftb_unitdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_unit_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_unit_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_unit">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_unit_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_unit->kode_unit->Visible) { // kode_unit ?>
		<th class="<?php echo $tb_unit->kode_unit->headerCellClass() ?>"><span id="elh_tb_unit_kode_unit" class="tb_unit_kode_unit"><?php echo $tb_unit->kode_unit->caption() ?></span></th>
<?php } ?>
<?php if ($tb_unit->unit_kerja->Visible) { // unit_kerja ?>
		<th class="<?php echo $tb_unit->unit_kerja->headerCellClass() ?>"><span id="elh_tb_unit_unit_kerja" class="tb_unit_unit_kerja"><?php echo $tb_unit->unit_kerja->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_unit_delete->RecCnt = 0;
$i = 0;
while (!$tb_unit_delete->Recordset->EOF) {
	$tb_unit_delete->RecCnt++;
	$tb_unit_delete->RowCnt++;

	// Set row properties
	$tb_unit->resetAttributes();
	$tb_unit->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_unit_delete->loadRowValues($tb_unit_delete->Recordset);

	// Render row
	$tb_unit_delete->renderRow();
?>
	<tr<?php echo $tb_unit->rowAttributes() ?>>
<?php if ($tb_unit->kode_unit->Visible) { // kode_unit ?>
		<td<?php echo $tb_unit->kode_unit->cellAttributes() ?>>
<span id="el<?php echo $tb_unit_delete->RowCnt ?>_tb_unit_kode_unit" class="tb_unit_kode_unit">
<span<?php echo $tb_unit->kode_unit->viewAttributes() ?>>
<?php echo $tb_unit->kode_unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_unit->unit_kerja->Visible) { // unit_kerja ?>
		<td<?php echo $tb_unit->unit_kerja->cellAttributes() ?>>
<span id="el<?php echo $tb_unit_delete->RowCnt ?>_tb_unit_unit_kerja" class="tb_unit_unit_kerja">
<span<?php echo $tb_unit->unit_kerja->viewAttributes() ?>>
<?php echo $tb_unit->unit_kerja->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_unit_delete->Recordset->moveNext();
}
$tb_unit_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_unit_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_unit_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_unit_delete->terminate();
?>
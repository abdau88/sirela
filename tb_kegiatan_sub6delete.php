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
$tb_kegiatan_sub6_delete = new tb_kegiatan_sub6_delete();

// Run the page
$tb_kegiatan_sub6_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_sub6_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_kegiatan_sub6delete = currentForm = new ew.Form("ftb_kegiatan_sub6delete", "delete");

// Form_CustomValidate event
ftb_kegiatan_sub6delete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatan_sub6delete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_kegiatan_sub6_delete->showPageHeader(); ?>
<?php
$tb_kegiatan_sub6_delete->showMessage();
?>
<form name="ftb_kegiatan_sub6delete" id="ftb_kegiatan_sub6delete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_sub6_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_sub6_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan_sub6">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_kegiatan_sub6_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_kegiatan_sub6->kode_kegiatan_sub6->Visible) { // kode_kegiatan_sub6 ?>
		<th class="<?php echo $tb_kegiatan_sub6->kode_kegiatan_sub6->headerCellClass() ?>"><span id="elh_tb_kegiatan_sub6_kode_kegiatan_sub6" class="tb_kegiatan_sub6_kode_kegiatan_sub6"><?php echo $tb_kegiatan_sub6->kode_kegiatan_sub6->caption() ?></span></th>
<?php } ?>
<?php if ($tb_kegiatan_sub6->nama_kegiatan_sub6->Visible) { // nama_kegiatan_sub6 ?>
		<th class="<?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->headerCellClass() ?>"><span id="elh_tb_kegiatan_sub6_nama_kegiatan_sub6" class="tb_kegiatan_sub6_nama_kegiatan_sub6"><?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_kegiatan_sub6_delete->RecCnt = 0;
$i = 0;
while (!$tb_kegiatan_sub6_delete->Recordset->EOF) {
	$tb_kegiatan_sub6_delete->RecCnt++;
	$tb_kegiatan_sub6_delete->RowCnt++;

	// Set row properties
	$tb_kegiatan_sub6->resetAttributes();
	$tb_kegiatan_sub6->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_kegiatan_sub6_delete->loadRowValues($tb_kegiatan_sub6_delete->Recordset);

	// Render row
	$tb_kegiatan_sub6_delete->renderRow();
?>
	<tr<?php echo $tb_kegiatan_sub6->rowAttributes() ?>>
<?php if ($tb_kegiatan_sub6->kode_kegiatan_sub6->Visible) { // kode_kegiatan_sub6 ?>
		<td<?php echo $tb_kegiatan_sub6->kode_kegiatan_sub6->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_sub6_delete->RowCnt ?>_tb_kegiatan_sub6_kode_kegiatan_sub6" class="tb_kegiatan_sub6_kode_kegiatan_sub6">
<span<?php echo $tb_kegiatan_sub6->kode_kegiatan_sub6->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub6->kode_kegiatan_sub6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_kegiatan_sub6->nama_kegiatan_sub6->Visible) { // nama_kegiatan_sub6 ?>
		<td<?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_sub6_delete->RowCnt ?>_tb_kegiatan_sub6_nama_kegiatan_sub6" class="tb_kegiatan_sub6_nama_kegiatan_sub6">
<span<?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_kegiatan_sub6_delete->Recordset->moveNext();
}
$tb_kegiatan_sub6_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_kegiatan_sub6_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_kegiatan_sub6_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_sub6_delete->terminate();
?>
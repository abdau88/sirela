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
$tb_kegiatan_sub1_delete = new tb_kegiatan_sub1_delete();

// Run the page
$tb_kegiatan_sub1_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_sub1_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_kegiatan_sub1delete = currentForm = new ew.Form("ftb_kegiatan_sub1delete", "delete");

// Form_CustomValidate event
ftb_kegiatan_sub1delete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatan_sub1delete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatan_sub1delete.lists["x_kode_kegiatan_sub2"] = <?php echo $tb_kegiatan_sub1_delete->kode_kegiatan_sub2->Lookup->toClientList() ?>;
ftb_kegiatan_sub1delete.lists["x_kode_kegiatan_sub2"].options = <?php echo JsonEncode($tb_kegiatan_sub1_delete->kode_kegiatan_sub2->lookupOptions()) ?>;
ftb_kegiatan_sub1delete.autoSuggests["x_kode_kegiatan_sub2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_kegiatan_sub1_delete->showPageHeader(); ?>
<?php
$tb_kegiatan_sub1_delete->showMessage();
?>
<form name="ftb_kegiatan_sub1delete" id="ftb_kegiatan_sub1delete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_sub1_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_sub1_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan_sub1">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_kegiatan_sub1_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_kegiatan_sub1->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
		<th class="<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub1->headerCellClass() ?>"><span id="elh_tb_kegiatan_sub1_kode_kegiatan_sub1" class="tb_kegiatan_sub1_kode_kegiatan_sub1"><?php echo $tb_kegiatan_sub1->kode_kegiatan_sub1->caption() ?></span></th>
<?php } ?>
<?php if ($tb_kegiatan_sub1->nama_kegiatan_sub1->Visible) { // nama_kegiatan_sub1 ?>
		<th class="<?php echo $tb_kegiatan_sub1->nama_kegiatan_sub1->headerCellClass() ?>"><span id="elh_tb_kegiatan_sub1_nama_kegiatan_sub1" class="tb_kegiatan_sub1_nama_kegiatan_sub1"><?php echo $tb_kegiatan_sub1->nama_kegiatan_sub1->caption() ?></span></th>
<?php } ?>
<?php if ($tb_kegiatan_sub1->kode_kegiatan_sub2->Visible) { // kode_kegiatan_sub2 ?>
		<th class="<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub2->headerCellClass() ?>"><span id="elh_tb_kegiatan_sub1_kode_kegiatan_sub2" class="tb_kegiatan_sub1_kode_kegiatan_sub2"><?php echo $tb_kegiatan_sub1->kode_kegiatan_sub2->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_kegiatan_sub1_delete->RecCnt = 0;
$i = 0;
while (!$tb_kegiatan_sub1_delete->Recordset->EOF) {
	$tb_kegiatan_sub1_delete->RecCnt++;
	$tb_kegiatan_sub1_delete->RowCnt++;

	// Set row properties
	$tb_kegiatan_sub1->resetAttributes();
	$tb_kegiatan_sub1->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_kegiatan_sub1_delete->loadRowValues($tb_kegiatan_sub1_delete->Recordset);

	// Render row
	$tb_kegiatan_sub1_delete->renderRow();
?>
	<tr<?php echo $tb_kegiatan_sub1->rowAttributes() ?>>
<?php if ($tb_kegiatan_sub1->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
		<td<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub1->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_sub1_delete->RowCnt ?>_tb_kegiatan_sub1_kode_kegiatan_sub1" class="tb_kegiatan_sub1_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub1->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_kegiatan_sub1->nama_kegiatan_sub1->Visible) { // nama_kegiatan_sub1 ?>
		<td<?php echo $tb_kegiatan_sub1->nama_kegiatan_sub1->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_sub1_delete->RowCnt ?>_tb_kegiatan_sub1_nama_kegiatan_sub1" class="tb_kegiatan_sub1_nama_kegiatan_sub1">
<span<?php echo $tb_kegiatan_sub1->nama_kegiatan_sub1->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub1->nama_kegiatan_sub1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_kegiatan_sub1->kode_kegiatan_sub2->Visible) { // kode_kegiatan_sub2 ?>
		<td<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub2->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_sub1_delete->RowCnt ?>_tb_kegiatan_sub1_kode_kegiatan_sub2" class="tb_kegiatan_sub1_kode_kegiatan_sub2">
<span<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub2->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_kegiatan_sub1_delete->Recordset->moveNext();
}
$tb_kegiatan_sub1_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_kegiatan_sub1_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_kegiatan_sub1_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_sub1_delete->terminate();
?>
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
$tb_kegiatan_sub4_delete = new tb_kegiatan_sub4_delete();

// Run the page
$tb_kegiatan_sub4_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_sub4_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_kegiatan_sub4delete = currentForm = new ew.Form("ftb_kegiatan_sub4delete", "delete");

// Form_CustomValidate event
ftb_kegiatan_sub4delete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatan_sub4delete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatan_sub4delete.lists["x_kode_kegiatan_sub5"] = <?php echo $tb_kegiatan_sub4_delete->kode_kegiatan_sub5->Lookup->toClientList() ?>;
ftb_kegiatan_sub4delete.lists["x_kode_kegiatan_sub5"].options = <?php echo JsonEncode($tb_kegiatan_sub4_delete->kode_kegiatan_sub5->lookupOptions()) ?>;
ftb_kegiatan_sub4delete.autoSuggests["x_kode_kegiatan_sub5"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_kegiatan_sub4_delete->showPageHeader(); ?>
<?php
$tb_kegiatan_sub4_delete->showMessage();
?>
<form name="ftb_kegiatan_sub4delete" id="ftb_kegiatan_sub4delete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_sub4_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_sub4_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan_sub4">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_kegiatan_sub4_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_kegiatan_sub4->kode_kegiatan_sub4->Visible) { // kode_kegiatan_sub4 ?>
		<th class="<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->headerCellClass() ?>"><span id="elh_tb_kegiatan_sub4_kode_kegiatan_sub4" class="tb_kegiatan_sub4_kode_kegiatan_sub4"><?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->caption() ?></span></th>
<?php } ?>
<?php if ($tb_kegiatan_sub4->nama_kegiatan_sub4->Visible) { // nama_kegiatan_sub4 ?>
		<th class="<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->headerCellClass() ?>"><span id="elh_tb_kegiatan_sub4_nama_kegiatan_sub4" class="tb_kegiatan_sub4_nama_kegiatan_sub4"><?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->caption() ?></span></th>
<?php } ?>
<?php if ($tb_kegiatan_sub4->kode_kegiatan_sub5->Visible) { // kode_kegiatan_sub5 ?>
		<th class="<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->headerCellClass() ?>"><span id="elh_tb_kegiatan_sub4_kode_kegiatan_sub5" class="tb_kegiatan_sub4_kode_kegiatan_sub5"><?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_kegiatan_sub4_delete->RecCnt = 0;
$i = 0;
while (!$tb_kegiatan_sub4_delete->Recordset->EOF) {
	$tb_kegiatan_sub4_delete->RecCnt++;
	$tb_kegiatan_sub4_delete->RowCnt++;

	// Set row properties
	$tb_kegiatan_sub4->resetAttributes();
	$tb_kegiatan_sub4->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_kegiatan_sub4_delete->loadRowValues($tb_kegiatan_sub4_delete->Recordset);

	// Render row
	$tb_kegiatan_sub4_delete->renderRow();
?>
	<tr<?php echo $tb_kegiatan_sub4->rowAttributes() ?>>
<?php if ($tb_kegiatan_sub4->kode_kegiatan_sub4->Visible) { // kode_kegiatan_sub4 ?>
		<td<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_sub4_delete->RowCnt ?>_tb_kegiatan_sub4_kode_kegiatan_sub4" class="tb_kegiatan_sub4_kode_kegiatan_sub4">
<span<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_kegiatan_sub4->nama_kegiatan_sub4->Visible) { // nama_kegiatan_sub4 ?>
		<td<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_sub4_delete->RowCnt ?>_tb_kegiatan_sub4_nama_kegiatan_sub4" class="tb_kegiatan_sub4_nama_kegiatan_sub4">
<span<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_kegiatan_sub4->kode_kegiatan_sub5->Visible) { // kode_kegiatan_sub5 ?>
		<td<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_sub4_delete->RowCnt ?>_tb_kegiatan_sub4_kode_kegiatan_sub5" class="tb_kegiatan_sub4_kode_kegiatan_sub5">
<span<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_kegiatan_sub4_delete->Recordset->moveNext();
}
$tb_kegiatan_sub4_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_kegiatan_sub4_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_kegiatan_sub4_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_sub4_delete->terminate();
?>
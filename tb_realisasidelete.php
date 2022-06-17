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
$tb_realisasi_delete = new tb_realisasi_delete();

// Run the page
$tb_realisasi_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_realisasi_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_realisasidelete = currentForm = new ew.Form("ftb_realisasidelete", "delete");

// Form_CustomValidate event
ftb_realisasidelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_realisasidelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_realisasidelete.lists["x_kode_unit"] = <?php echo $tb_realisasi_delete->kode_unit->Lookup->toClientList() ?>;
ftb_realisasidelete.lists["x_kode_unit"].options = <?php echo JsonEncode($tb_realisasi_delete->kode_unit->lookupOptions()) ?>;
ftb_realisasidelete.autoSuggests["x_kode_unit"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_realisasidelete.lists["x_kode_akun"] = <?php echo $tb_realisasi_delete->kode_akun->Lookup->toClientList() ?>;
ftb_realisasidelete.lists["x_kode_akun"].options = <?php echo JsonEncode($tb_realisasi_delete->kode_akun->lookupOptions()) ?>;
ftb_realisasidelete.autoSuggests["x_kode_akun"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_realisasidelete.lists["x_tahun"] = <?php echo $tb_realisasi_delete->tahun->Lookup->toClientList() ?>;
ftb_realisasidelete.lists["x_tahun"].options = <?php echo JsonEncode($tb_realisasi_delete->tahun->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_realisasi_delete->showPageHeader(); ?>
<?php
$tb_realisasi_delete->showMessage();
?>
<form name="ftb_realisasidelete" id="ftb_realisasidelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_realisasi_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_realisasi_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_realisasi">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_realisasi_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_realisasi->kode_unit->Visible) { // kode_unit ?>
		<th class="<?php echo $tb_realisasi->kode_unit->headerCellClass() ?>"><span id="elh_tb_realisasi_kode_unit" class="tb_realisasi_kode_unit"><?php echo $tb_realisasi->kode_unit->caption() ?></span></th>
<?php } ?>
<?php if ($tb_realisasi->kode_akun->Visible) { // kode_akun ?>
		<th class="<?php echo $tb_realisasi->kode_akun->headerCellClass() ?>"><span id="elh_tb_realisasi_kode_akun" class="tb_realisasi_kode_akun"><?php echo $tb_realisasi->kode_akun->caption() ?></span></th>
<?php } ?>
<?php if ($tb_realisasi->tahun->Visible) { // tahun ?>
		<th class="<?php echo $tb_realisasi->tahun->headerCellClass() ?>"><span id="elh_tb_realisasi_tahun" class="tb_realisasi_tahun"><?php echo $tb_realisasi->tahun->caption() ?></span></th>
<?php } ?>
<?php if ($tb_realisasi->pagu->Visible) { // pagu ?>
		<th class="<?php echo $tb_realisasi->pagu->headerCellClass() ?>"><span id="elh_tb_realisasi_pagu" class="tb_realisasi_pagu"><?php echo $tb_realisasi->pagu->caption() ?></span></th>
<?php } ?>
<?php if ($tb_realisasi->realisasi->Visible) { // realisasi ?>
		<th class="<?php echo $tb_realisasi->realisasi->headerCellClass() ?>"><span id="elh_tb_realisasi_realisasi" class="tb_realisasi_realisasi"><?php echo $tb_realisasi->realisasi->caption() ?></span></th>
<?php } ?>
<?php if ($tb_realisasi->sisa_dana->Visible) { // sisa_dana ?>
		<th class="<?php echo $tb_realisasi->sisa_dana->headerCellClass() ?>"><span id="elh_tb_realisasi_sisa_dana" class="tb_realisasi_sisa_dana"><?php echo $tb_realisasi->sisa_dana->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_realisasi_delete->RecCnt = 0;
$i = 0;
while (!$tb_realisasi_delete->Recordset->EOF) {
	$tb_realisasi_delete->RecCnt++;
	$tb_realisasi_delete->RowCnt++;

	// Set row properties
	$tb_realisasi->resetAttributes();
	$tb_realisasi->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_realisasi_delete->loadRowValues($tb_realisasi_delete->Recordset);

	// Render row
	$tb_realisasi_delete->renderRow();
?>
	<tr<?php echo $tb_realisasi->rowAttributes() ?>>
<?php if ($tb_realisasi->kode_unit->Visible) { // kode_unit ?>
		<td<?php echo $tb_realisasi->kode_unit->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_delete->RowCnt ?>_tb_realisasi_kode_unit" class="tb_realisasi_kode_unit">
<span<?php echo $tb_realisasi->kode_unit->viewAttributes() ?>>
<?php echo $tb_realisasi->kode_unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_realisasi->kode_akun->Visible) { // kode_akun ?>
		<td<?php echo $tb_realisasi->kode_akun->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_delete->RowCnt ?>_tb_realisasi_kode_akun" class="tb_realisasi_kode_akun">
<span<?php echo $tb_realisasi->kode_akun->viewAttributes() ?>>
<?php echo $tb_realisasi->kode_akun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_realisasi->tahun->Visible) { // tahun ?>
		<td<?php echo $tb_realisasi->tahun->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_delete->RowCnt ?>_tb_realisasi_tahun" class="tb_realisasi_tahun">
<span<?php echo $tb_realisasi->tahun->viewAttributes() ?>>
<?php echo $tb_realisasi->tahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_realisasi->pagu->Visible) { // pagu ?>
		<td<?php echo $tb_realisasi->pagu->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_delete->RowCnt ?>_tb_realisasi_pagu" class="tb_realisasi_pagu">
<span<?php echo $tb_realisasi->pagu->viewAttributes() ?>>
<?php echo $tb_realisasi->pagu->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_realisasi->realisasi->Visible) { // realisasi ?>
		<td<?php echo $tb_realisasi->realisasi->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_delete->RowCnt ?>_tb_realisasi_realisasi" class="tb_realisasi_realisasi">
<span<?php echo $tb_realisasi->realisasi->viewAttributes() ?>>
<?php echo $tb_realisasi->realisasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_realisasi->sisa_dana->Visible) { // sisa_dana ?>
		<td<?php echo $tb_realisasi->sisa_dana->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_delete->RowCnt ?>_tb_realisasi_sisa_dana" class="tb_realisasi_sisa_dana">
<span<?php echo $tb_realisasi->sisa_dana->viewAttributes() ?>>
<?php echo $tb_realisasi->sisa_dana->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_realisasi_delete->Recordset->moveNext();
}
$tb_realisasi_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_realisasi_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_realisasi_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_realisasi_delete->terminate();
?>
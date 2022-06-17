<?php
namespace PHPMaker2019\project1;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($tb_kegiatan_grid))
	$tb_kegiatan_grid = new tb_kegiatan_grid();

// Run the page
$tb_kegiatan_grid->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_grid->Page_Render();
?>
<?php if (!$tb_kegiatan->isExport()) { ?>
<script>

// Form object
var ftb_kegiatangrid = new ew.Form("ftb_kegiatangrid", "grid");
ftb_kegiatangrid.formKeyCountName = '<?php echo $tb_kegiatan_grid->FormKeyCountName ?>';

// Validate form
ftb_kegiatangrid.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($tb_kegiatan_grid->kode_kegiatan->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan->kode_kegiatan->caption(), $tb_kegiatan->kode_kegiatan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_grid->nama_kegiatan->Required) { ?>
			elm = this.getElements("x" + infix + "_nama_kegiatan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan->nama_kegiatan->caption(), $tb_kegiatan->nama_kegiatan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_grid->kode_kegiatan_sub1->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan_sub1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan->kode_kegiatan_sub1->caption(), $tb_kegiatan->kode_kegiatan_sub1->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
ftb_kegiatangrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "kode_kegiatan", false)) return false;
	if (ew.valueChanged(fobj, infix, "nama_kegiatan", false)) return false;
	if (ew.valueChanged(fobj, infix, "kode_kegiatan_sub1", false)) return false;
	return true;
}

// Form_CustomValidate event
ftb_kegiatangrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatangrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatangrid.lists["x_kode_kegiatan_sub1"] = <?php echo $tb_kegiatan_grid->kode_kegiatan_sub1->Lookup->toClientList() ?>;
ftb_kegiatangrid.lists["x_kode_kegiatan_sub1"].options = <?php echo JsonEncode($tb_kegiatan_grid->kode_kegiatan_sub1->lookupOptions()) ?>;
ftb_kegiatangrid.autoSuggests["x_kode_kegiatan_sub1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$tb_kegiatan_grid->renderOtherOptions();
?>
<?php $tb_kegiatan_grid->showPageHeader(); ?>
<?php
$tb_kegiatan_grid->showMessage();
?>
<?php if ($tb_kegiatan_grid->TotalRecs > 0 || $tb_kegiatan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_kegiatan_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_kegiatan">
<div id="ftb_kegiatangrid" class="ew-form ew-list-form form-inline">
<div id="gmp_tb_kegiatan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_tb_kegiatangrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_kegiatan_grid->RowType = ROWTYPE_HEADER;

// Render list options
$tb_kegiatan_grid->renderListOptions();

// Render list options (header, left)
$tb_kegiatan_grid->ListOptions->render("header", "left");
?>
<?php if ($tb_kegiatan->kode_kegiatan->Visible) { // kode_kegiatan ?>
	<?php if ($tb_kegiatan->sortUrl($tb_kegiatan->kode_kegiatan) == "") { ?>
		<th data-name="kode_kegiatan" class="<?php echo $tb_kegiatan->kode_kegiatan->headerCellClass() ?>"><div id="elh_tb_kegiatan_kode_kegiatan" class="tb_kegiatan_kode_kegiatan"><div class="ew-table-header-caption"><?php echo $tb_kegiatan->kode_kegiatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_kegiatan" class="<?php echo $tb_kegiatan->kode_kegiatan->headerCellClass() ?>"><div><div id="elh_tb_kegiatan_kode_kegiatan" class="tb_kegiatan_kode_kegiatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_kegiatan->kode_kegiatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_kegiatan->kode_kegiatan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_kegiatan->kode_kegiatan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_kegiatan->nama_kegiatan->Visible) { // nama_kegiatan ?>
	<?php if ($tb_kegiatan->sortUrl($tb_kegiatan->nama_kegiatan) == "") { ?>
		<th data-name="nama_kegiatan" class="<?php echo $tb_kegiatan->nama_kegiatan->headerCellClass() ?>"><div id="elh_tb_kegiatan_nama_kegiatan" class="tb_kegiatan_nama_kegiatan"><div class="ew-table-header-caption"><?php echo $tb_kegiatan->nama_kegiatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama_kegiatan" class="<?php echo $tb_kegiatan->nama_kegiatan->headerCellClass() ?>"><div><div id="elh_tb_kegiatan_nama_kegiatan" class="tb_kegiatan_nama_kegiatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_kegiatan->nama_kegiatan->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_kegiatan->nama_kegiatan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_kegiatan->nama_kegiatan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
	<?php if ($tb_kegiatan->sortUrl($tb_kegiatan->kode_kegiatan_sub1) == "") { ?>
		<th data-name="kode_kegiatan_sub1" class="<?php echo $tb_kegiatan->kode_kegiatan_sub1->headerCellClass() ?>"><div id="elh_tb_kegiatan_kode_kegiatan_sub1" class="tb_kegiatan_kode_kegiatan_sub1"><div class="ew-table-header-caption"><?php echo $tb_kegiatan->kode_kegiatan_sub1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_kegiatan_sub1" class="<?php echo $tb_kegiatan->kode_kegiatan_sub1->headerCellClass() ?>"><div><div id="elh_tb_kegiatan_kode_kegiatan_sub1" class="tb_kegiatan_kode_kegiatan_sub1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_kegiatan->kode_kegiatan_sub1->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_kegiatan->kode_kegiatan_sub1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_kegiatan->kode_kegiatan_sub1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_kegiatan_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$tb_kegiatan_grid->StartRec = 1;
$tb_kegiatan_grid->StopRec = $tb_kegiatan_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $tb_kegiatan_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($tb_kegiatan_grid->FormKeyCountName) && ($tb_kegiatan->isGridAdd() || $tb_kegiatan->isGridEdit() || $tb_kegiatan->isConfirm())) {
		$tb_kegiatan_grid->KeyCount = $CurrentForm->getValue($tb_kegiatan_grid->FormKeyCountName);
		$tb_kegiatan_grid->StopRec = $tb_kegiatan_grid->StartRec + $tb_kegiatan_grid->KeyCount - 1;
	}
}
$tb_kegiatan_grid->RecCnt = $tb_kegiatan_grid->StartRec - 1;
if ($tb_kegiatan_grid->Recordset && !$tb_kegiatan_grid->Recordset->EOF) {
	$tb_kegiatan_grid->Recordset->moveFirst();
	$selectLimit = $tb_kegiatan_grid->UseSelectLimit;
	if (!$selectLimit && $tb_kegiatan_grid->StartRec > 1)
		$tb_kegiatan_grid->Recordset->move($tb_kegiatan_grid->StartRec - 1);
} elseif (!$tb_kegiatan->AllowAddDeleteRow && $tb_kegiatan_grid->StopRec == 0) {
	$tb_kegiatan_grid->StopRec = $tb_kegiatan->GridAddRowCount;
}

// Initialize aggregate
$tb_kegiatan->RowType = ROWTYPE_AGGREGATEINIT;
$tb_kegiatan->resetAttributes();
$tb_kegiatan_grid->renderRow();
if ($tb_kegiatan->isGridAdd())
	$tb_kegiatan_grid->RowIndex = 0;
if ($tb_kegiatan->isGridEdit())
	$tb_kegiatan_grid->RowIndex = 0;
while ($tb_kegiatan_grid->RecCnt < $tb_kegiatan_grid->StopRec) {
	$tb_kegiatan_grid->RecCnt++;
	if ($tb_kegiatan_grid->RecCnt >= $tb_kegiatan_grid->StartRec) {
		$tb_kegiatan_grid->RowCnt++;
		if ($tb_kegiatan->isGridAdd() || $tb_kegiatan->isGridEdit() || $tb_kegiatan->isConfirm()) {
			$tb_kegiatan_grid->RowIndex++;
			$CurrentForm->Index = $tb_kegiatan_grid->RowIndex;
			if ($CurrentForm->hasValue($tb_kegiatan_grid->FormActionName) && $tb_kegiatan_grid->EventCancelled)
				$tb_kegiatan_grid->RowAction = strval($CurrentForm->getValue($tb_kegiatan_grid->FormActionName));
			elseif ($tb_kegiatan->isGridAdd())
				$tb_kegiatan_grid->RowAction = "insert";
			else
				$tb_kegiatan_grid->RowAction = "";
		}

		// Set up key count
		$tb_kegiatan_grid->KeyCount = $tb_kegiatan_grid->RowIndex;

		// Init row class and style
		$tb_kegiatan->resetAttributes();
		$tb_kegiatan->CssClass = "";
		if ($tb_kegiatan->isGridAdd()) {
			if ($tb_kegiatan->CurrentMode == "copy") {
				$tb_kegiatan_grid->loadRowValues($tb_kegiatan_grid->Recordset); // Load row values
				$tb_kegiatan_grid->setRecordKey($tb_kegiatan_grid->RowOldKey, $tb_kegiatan_grid->Recordset); // Set old record key
			} else {
				$tb_kegiatan_grid->loadRowValues(); // Load default values
				$tb_kegiatan_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$tb_kegiatan_grid->loadRowValues($tb_kegiatan_grid->Recordset); // Load row values
		}
		$tb_kegiatan->RowType = ROWTYPE_VIEW; // Render view
		if ($tb_kegiatan->isGridAdd()) // Grid add
			$tb_kegiatan->RowType = ROWTYPE_ADD; // Render add
		if ($tb_kegiatan->isGridAdd() && $tb_kegiatan->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$tb_kegiatan_grid->restoreCurrentRowFormValues($tb_kegiatan_grid->RowIndex); // Restore form values
		if ($tb_kegiatan->isGridEdit()) { // Grid edit
			if ($tb_kegiatan->EventCancelled)
				$tb_kegiatan_grid->restoreCurrentRowFormValues($tb_kegiatan_grid->RowIndex); // Restore form values
			if ($tb_kegiatan_grid->RowAction == "insert")
				$tb_kegiatan->RowType = ROWTYPE_ADD; // Render add
			else
				$tb_kegiatan->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($tb_kegiatan->isGridEdit() && ($tb_kegiatan->RowType == ROWTYPE_EDIT || $tb_kegiatan->RowType == ROWTYPE_ADD) && $tb_kegiatan->EventCancelled) // Update failed
			$tb_kegiatan_grid->restoreCurrentRowFormValues($tb_kegiatan_grid->RowIndex); // Restore form values
		if ($tb_kegiatan->RowType == ROWTYPE_EDIT) // Edit row
			$tb_kegiatan_grid->EditRowCnt++;
		if ($tb_kegiatan->isConfirm()) // Confirm row
			$tb_kegiatan_grid->restoreCurrentRowFormValues($tb_kegiatan_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$tb_kegiatan->RowAttrs = array_merge($tb_kegiatan->RowAttrs, array('data-rowindex'=>$tb_kegiatan_grid->RowCnt, 'id'=>'r' . $tb_kegiatan_grid->RowCnt . '_tb_kegiatan', 'data-rowtype'=>$tb_kegiatan->RowType));

		// Render row
		$tb_kegiatan_grid->renderRow();

		// Render list options
		$tb_kegiatan_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tb_kegiatan_grid->RowAction <> "delete" && $tb_kegiatan_grid->RowAction <> "insertdelete" && !($tb_kegiatan_grid->RowAction == "insert" && $tb_kegiatan->isConfirm() && $tb_kegiatan_grid->emptyRow())) {
?>
	<tr<?php echo $tb_kegiatan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_kegiatan_grid->ListOptions->render("body", "left", $tb_kegiatan_grid->RowCnt);
?>
	<?php if ($tb_kegiatan->kode_kegiatan->Visible) { // kode_kegiatan ?>
		<td data-name="kode_kegiatan"<?php echo $tb_kegiatan->kode_kegiatan->cellAttributes() ?>>
<?php if ($tb_kegiatan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_kode_kegiatan" class="form-group tb_kegiatan_kode_kegiatan">
<input type="text" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan->kode_kegiatan->EditValue ?>"<?php echo $tb_kegiatan->kode_kegiatan->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->OldValue) ?>">
<?php } ?>
<?php if ($tb_kegiatan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_kode_kegiatan" class="form-group tb_kegiatan_kode_kegiatan">
<span<?php echo $tb_kegiatan->kode_kegiatan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->CurrentValue) ?>">
<?php } ?>
<?php if ($tb_kegiatan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_kode_kegiatan" class="tb_kegiatan_kode_kegiatan">
<span<?php echo $tb_kegiatan->kode_kegiatan->viewAttributes() ?>>
<?php echo $tb_kegiatan->kode_kegiatan->getViewValue() ?></span>
</span>
<?php if (!$tb_kegiatan->isConfirm()) { ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="ftb_kegiatangrid$x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="ftb_kegiatangrid$x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="ftb_kegiatangrid$o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="ftb_kegiatangrid$o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tb_kegiatan->nama_kegiatan->Visible) { // nama_kegiatan ?>
		<td data-name="nama_kegiatan"<?php echo $tb_kegiatan->nama_kegiatan->cellAttributes() ?>>
<?php if ($tb_kegiatan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_nama_kegiatan" class="form-group tb_kegiatan_nama_kegiatan">
<input type="text" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan->nama_kegiatan->EditValue ?>"<?php echo $tb_kegiatan->nama_kegiatan->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="o<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="o<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->OldValue) ?>">
<?php } ?>
<?php if ($tb_kegiatan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_nama_kegiatan" class="form-group tb_kegiatan_nama_kegiatan">
<input type="text" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan->nama_kegiatan->EditValue ?>"<?php echo $tb_kegiatan->nama_kegiatan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tb_kegiatan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_nama_kegiatan" class="tb_kegiatan_nama_kegiatan">
<span<?php echo $tb_kegiatan->nama_kegiatan->viewAttributes() ?>>
<?php echo $tb_kegiatan->nama_kegiatan->getViewValue() ?></span>
</span>
<?php if (!$tb_kegiatan->isConfirm()) { ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="o<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="o<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="ftb_kegiatangrid$x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="ftb_kegiatangrid$x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="ftb_kegiatangrid$o<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="ftb_kegiatangrid$o<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tb_kegiatan->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
		<td data-name="kode_kegiatan_sub1"<?php echo $tb_kegiatan->kode_kegiatan_sub1->cellAttributes() ?>>
<?php if ($tb_kegiatan->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->getSessionValue() <> "") { ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_kode_kegiatan_sub1" class="form-group tb_kegiatan_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan->kode_kegiatan_sub1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan_sub1->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_kode_kegiatan_sub1" class="form-group tb_kegiatan_kode_kegiatan_sub1">
<?php
$wrkonchange = "" . trim(@$tb_kegiatan->kode_kegiatan_sub1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_kegiatan->kode_kegiatan_sub1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" class="text-nowrap" style="z-index: <?php echo (9000 - $tb_kegiatan_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="sv_x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan_sub1->EditValue) ?>" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->getPlaceHolder()) ?>"<?php echo $tb_kegiatan->kode_kegiatan_sub1->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" data-value-separator="<?php echo $tb_kegiatan->kode_kegiatan_sub1->displayValueSeparatorAttribute() ?>" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_kegiatangrid.createAutoSuggest({"id":"x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1","forceSelect":false});
</script>
<?php echo $tb_kegiatan->kode_kegiatan_sub1->Lookup->getParamTag("p_x" . $tb_kegiatan_grid->RowIndex . "_kode_kegiatan_sub1") ?>
</span>
<?php } ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" name="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->OldValue) ?>">
<?php } ?>
<?php if ($tb_kegiatan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->getSessionValue() <> "") { ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_kode_kegiatan_sub1" class="form-group tb_kegiatan_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan->kode_kegiatan_sub1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan_sub1->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_kode_kegiatan_sub1" class="form-group tb_kegiatan_kode_kegiatan_sub1">
<?php
$wrkonchange = "" . trim(@$tb_kegiatan->kode_kegiatan_sub1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_kegiatan->kode_kegiatan_sub1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" class="text-nowrap" style="z-index: <?php echo (9000 - $tb_kegiatan_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="sv_x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan_sub1->EditValue) ?>" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->getPlaceHolder()) ?>"<?php echo $tb_kegiatan->kode_kegiatan_sub1->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" data-value-separator="<?php echo $tb_kegiatan->kode_kegiatan_sub1->displayValueSeparatorAttribute() ?>" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_kegiatangrid.createAutoSuggest({"id":"x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1","forceSelect":false});
</script>
<?php echo $tb_kegiatan->kode_kegiatan_sub1->Lookup->getParamTag("p_x" . $tb_kegiatan_grid->RowIndex . "_kode_kegiatan_sub1") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($tb_kegiatan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tb_kegiatan_grid->RowCnt ?>_tb_kegiatan_kode_kegiatan_sub1" class="tb_kegiatan_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan->kode_kegiatan_sub1->viewAttributes() ?>>
<?php echo $tb_kegiatan->kode_kegiatan_sub1->getViewValue() ?></span>
</span>
<?php if (!$tb_kegiatan->isConfirm()) { ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" name="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" name="ftb_kegiatangrid$x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="ftb_kegiatangrid$x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" name="ftb_kegiatangrid$o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="ftb_kegiatangrid$o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_kegiatan_grid->ListOptions->render("body", "right", $tb_kegiatan_grid->RowCnt);
?>
	</tr>
<?php if ($tb_kegiatan->RowType == ROWTYPE_ADD || $tb_kegiatan->RowType == ROWTYPE_EDIT) { ?>
<script>
ftb_kegiatangrid.updateLists(<?php echo $tb_kegiatan_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$tb_kegiatan->isGridAdd() || $tb_kegiatan->CurrentMode == "copy")
		if (!$tb_kegiatan_grid->Recordset->EOF)
			$tb_kegiatan_grid->Recordset->moveNext();
}
?>
<?php
	if ($tb_kegiatan->CurrentMode == "add" || $tb_kegiatan->CurrentMode == "copy" || $tb_kegiatan->CurrentMode == "edit") {
		$tb_kegiatan_grid->RowIndex = '$rowindex$';
		$tb_kegiatan_grid->loadRowValues();

		// Set row properties
		$tb_kegiatan->resetAttributes();
		$tb_kegiatan->RowAttrs = array_merge($tb_kegiatan->RowAttrs, array('data-rowindex'=>$tb_kegiatan_grid->RowIndex, 'id'=>'r0_tb_kegiatan', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($tb_kegiatan->RowAttrs["class"], "ew-template");
		$tb_kegiatan->RowType = ROWTYPE_ADD;

		// Render row
		$tb_kegiatan_grid->renderRow();

		// Render list options
		$tb_kegiatan_grid->renderListOptions();
		$tb_kegiatan_grid->StartRowCnt = 0;
?>
	<tr<?php echo $tb_kegiatan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_kegiatan_grid->ListOptions->render("body", "left", $tb_kegiatan_grid->RowIndex);
?>
	<?php if ($tb_kegiatan->kode_kegiatan->Visible) { // kode_kegiatan ?>
		<td data-name="kode_kegiatan">
<?php if (!$tb_kegiatan->isConfirm()) { ?>
<span id="el$rowindex$_tb_kegiatan_kode_kegiatan" class="form-group tb_kegiatan_kode_kegiatan">
<input type="text" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan->kode_kegiatan->EditValue ?>"<?php echo $tb_kegiatan->kode_kegiatan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_tb_kegiatan_kode_kegiatan" class="form-group tb_kegiatan_kode_kegiatan">
<span<?php echo $tb_kegiatan->kode_kegiatan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" id="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tb_kegiatan->nama_kegiatan->Visible) { // nama_kegiatan ?>
		<td data-name="nama_kegiatan">
<?php if (!$tb_kegiatan->isConfirm()) { ?>
<span id="el$rowindex$_tb_kegiatan_nama_kegiatan" class="form-group tb_kegiatan_nama_kegiatan">
<input type="text" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan->nama_kegiatan->EditValue ?>"<?php echo $tb_kegiatan->nama_kegiatan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_tb_kegiatan_nama_kegiatan" class="form-group tb_kegiatan_nama_kegiatan">
<span<?php echo $tb_kegiatan->nama_kegiatan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan->nama_kegiatan->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="o<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" id="o<?php echo $tb_kegiatan_grid->RowIndex ?>_nama_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tb_kegiatan->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
		<td data-name="kode_kegiatan_sub1">
<?php if (!$tb_kegiatan->isConfirm()) { ?>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->getSessionValue() <> "") { ?>
<span id="el$rowindex$_tb_kegiatan_kode_kegiatan_sub1" class="form-group tb_kegiatan_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan->kode_kegiatan_sub1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan_sub1->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_tb_kegiatan_kode_kegiatan_sub1" class="form-group tb_kegiatan_kode_kegiatan_sub1">
<?php
$wrkonchange = "" . trim(@$tb_kegiatan->kode_kegiatan_sub1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_kegiatan->kode_kegiatan_sub1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" class="text-nowrap" style="z-index: <?php echo (9000 - $tb_kegiatan_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="sv_x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan_sub1->EditValue) ?>" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->getPlaceHolder()) ?>"<?php echo $tb_kegiatan->kode_kegiatan_sub1->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" data-value-separator="<?php echo $tb_kegiatan->kode_kegiatan_sub1->displayValueSeparatorAttribute() ?>" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_kegiatangrid.createAutoSuggest({"id":"x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1","forceSelect":false});
</script>
<?php echo $tb_kegiatan->kode_kegiatan_sub1->Lookup->getParamTag("p_x" . $tb_kegiatan_grid->RowIndex . "_kode_kegiatan_sub1") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_tb_kegiatan_kode_kegiatan_sub1" class="form-group tb_kegiatan_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan->kode_kegiatan_sub1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan_sub1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" name="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="x<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" name="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" id="o<?php echo $tb_kegiatan_grid->RowIndex ?>_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_kegiatan_grid->ListOptions->render("body", "right", $tb_kegiatan_grid->RowIndex);
?>
<script>
ftb_kegiatangrid.updateLists(<?php echo $tb_kegiatan_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($tb_kegiatan->CurrentMode == "add" || $tb_kegiatan->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $tb_kegiatan_grid->FormKeyCountName ?>" id="<?php echo $tb_kegiatan_grid->FormKeyCountName ?>" value="<?php echo $tb_kegiatan_grid->KeyCount ?>">
<?php echo $tb_kegiatan_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tb_kegiatan->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $tb_kegiatan_grid->FormKeyCountName ?>" id="<?php echo $tb_kegiatan_grid->FormKeyCountName ?>" value="<?php echo $tb_kegiatan_grid->KeyCount ?>">
<?php echo $tb_kegiatan_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tb_kegiatan->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ftb_kegiatangrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($tb_kegiatan_grid->Recordset)
	$tb_kegiatan_grid->Recordset->Close();
?>
</div>
<?php if ($tb_kegiatan_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $tb_kegiatan_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_kegiatan_grid->TotalRecs == 0 && !$tb_kegiatan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_kegiatan_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_kegiatan_grid->terminate();
?>
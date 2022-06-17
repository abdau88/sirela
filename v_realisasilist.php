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
$v_realisasi_list = new v_realisasi_list();

// Run the page
$v_realisasi_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_realisasi_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$v_realisasi->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fv_realisasilist = currentForm = new ew.Form("fv_realisasilist", "list");
fv_realisasilist.formKeyCountName = '<?php echo $v_realisasi_list->FormKeyCountName ?>';

// Form_CustomValidate event
fv_realisasilist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fv_realisasilist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fv_realisasilistsrch = currentSearchForm = new ew.Form("fv_realisasilistsrch");

// Validate function for search
fv_realisasilistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_Tahun");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($v_realisasi->Tahun->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fv_realisasilistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fv_realisasilistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fv_realisasilistsrch.filterList = <?php echo $v_realisasi_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$v_realisasi->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v_realisasi_list->TotalRecs > 0 && $v_realisasi_list->ExportOptions->visible()) { ?>
<?php $v_realisasi_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v_realisasi_list->ImportOptions->visible()) { ?>
<?php $v_realisasi_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v_realisasi_list->SearchOptions->visible()) { ?>
<?php $v_realisasi_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v_realisasi_list->FilterOptions->visible()) { ?>
<?php $v_realisasi_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v_realisasi_list->renderOtherOptions();
?>
<?php if (!$v_realisasi->isExport() && !$v_realisasi->CurrentAction) { ?>
<form name="fv_realisasilistsrch" id="fv_realisasilistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($v_realisasi_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fv_realisasilistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v_realisasi">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$v_realisasi_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$v_realisasi->RowType = ROWTYPE_SEARCH;

// Render row
$v_realisasi->resetAttributes();
$v_realisasi_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($v_realisasi->Tahun->Visible) { // Tahun ?>
	<div id="xsc_Tahun" class="ew-cell form-group">
		<label for="x_Tahun" class="ew-search-caption ew-label"><?php echo $v_realisasi->Tahun->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Tahun" id="z_Tahun" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="v_realisasi" data-field="x_Tahun" name="x_Tahun" id="x_Tahun" size="30" placeholder="<?php echo HtmlEncode($v_realisasi->Tahun->getPlaceHolder()) ?>" value="<?php echo $v_realisasi->Tahun->EditValue ?>"<?php echo $v_realisasi->Tahun->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($v_realisasi->Unit_Kerja->Visible) { // Unit Kerja ?>
	<div id="xsc_Unit_Kerja" class="ew-cell form-group">
		<label for="x_Unit_Kerja" class="ew-search-caption ew-label"><?php echo $v_realisasi->Unit_Kerja->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Unit_Kerja" id="z_Unit_Kerja" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="v_realisasi" data-field="x_Unit_Kerja" name="x_Unit_Kerja" id="x_Unit_Kerja" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($v_realisasi->Unit_Kerja->getPlaceHolder()) ?>" value="<?php echo $v_realisasi->Unit_Kerja->EditValue ?>"<?php echo $v_realisasi->Unit_Kerja->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($v_realisasi_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($v_realisasi_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v_realisasi_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v_realisasi_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v_realisasi_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v_realisasi_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v_realisasi_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $v_realisasi_list->showPageHeader(); ?>
<?php
$v_realisasi_list->showMessage();
?>
<?php if ($v_realisasi_list->TotalRecs > 0 || $v_realisasi->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_realisasi_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_realisasi">
<form name="fv_realisasilist" id="fv_realisasilist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($v_realisasi_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $v_realisasi_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_realisasi">
<div id="gmp_v_realisasi" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($v_realisasi_list->TotalRecs > 0 || $v_realisasi->isGridEdit()) { ?>
<table id="tbl_v_realisasilist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_realisasi_list->RowType = ROWTYPE_HEADER;

// Render list options
$v_realisasi_list->renderListOptions();

// Render list options (header, left)
$v_realisasi_list->ListOptions->render("header", "left");
?>
<?php if ($v_realisasi->Tahun->Visible) { // Tahun ?>
	<?php if ($v_realisasi->sortUrl($v_realisasi->Tahun) == "") { ?>
		<th data-name="Tahun" class="<?php echo $v_realisasi->Tahun->headerCellClass() ?>"><div id="elh_v_realisasi_Tahun" class="v_realisasi_Tahun"><div class="ew-table-header-caption"><?php echo $v_realisasi->Tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tahun" class="<?php echo $v_realisasi->Tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_realisasi->SortUrl($v_realisasi->Tahun) ?>',1);"><div id="elh_v_realisasi_Tahun" class="v_realisasi_Tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_realisasi->Tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_realisasi->Tahun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_realisasi->Tahun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_realisasi->Unit_Kerja->Visible) { // Unit Kerja ?>
	<?php if ($v_realisasi->sortUrl($v_realisasi->Unit_Kerja) == "") { ?>
		<th data-name="Unit_Kerja" class="<?php echo $v_realisasi->Unit_Kerja->headerCellClass() ?>"><div id="elh_v_realisasi_Unit_Kerja" class="v_realisasi_Unit_Kerja"><div class="ew-table-header-caption"><?php echo $v_realisasi->Unit_Kerja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit_Kerja" class="<?php echo $v_realisasi->Unit_Kerja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_realisasi->SortUrl($v_realisasi->Unit_Kerja) ?>',1);"><div id="elh_v_realisasi_Unit_Kerja" class="v_realisasi_Unit_Kerja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_realisasi->Unit_Kerja->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_realisasi->Unit_Kerja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_realisasi->Unit_Kerja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_realisasi->Kegiatan2F_Akun->Visible) { // Kegiatan/ Akun ?>
	<?php if ($v_realisasi->sortUrl($v_realisasi->Kegiatan2F_Akun) == "") { ?>
		<th data-name="Kegiatan2F_Akun" class="<?php echo $v_realisasi->Kegiatan2F_Akun->headerCellClass() ?>"><div id="elh_v_realisasi_Kegiatan2F_Akun" class="v_realisasi_Kegiatan2F_Akun"><div class="ew-table-header-caption"><?php echo $v_realisasi->Kegiatan2F_Akun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kegiatan2F_Akun" class="<?php echo $v_realisasi->Kegiatan2F_Akun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_realisasi->SortUrl($v_realisasi->Kegiatan2F_Akun) ?>',1);"><div id="elh_v_realisasi_Kegiatan2F_Akun" class="v_realisasi_Kegiatan2F_Akun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_realisasi->Kegiatan2F_Akun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_realisasi->Kegiatan2F_Akun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_realisasi->Kegiatan2F_Akun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_realisasi->Pagu_28Sub_Total29->Visible) { // Pagu (Sub Total) ?>
	<?php if ($v_realisasi->sortUrl($v_realisasi->Pagu_28Sub_Total29) == "") { ?>
		<th data-name="Pagu_28Sub_Total29" class="<?php echo $v_realisasi->Pagu_28Sub_Total29->headerCellClass() ?>"><div id="elh_v_realisasi_Pagu_28Sub_Total29" class="v_realisasi_Pagu_28Sub_Total29"><div class="ew-table-header-caption"><?php echo $v_realisasi->Pagu_28Sub_Total29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pagu_28Sub_Total29" class="<?php echo $v_realisasi->Pagu_28Sub_Total29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_realisasi->SortUrl($v_realisasi->Pagu_28Sub_Total29) ?>',1);"><div id="elh_v_realisasi_Pagu_28Sub_Total29" class="v_realisasi_Pagu_28Sub_Total29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_realisasi->Pagu_28Sub_Total29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_realisasi->Pagu_28Sub_Total29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_realisasi->Pagu_28Sub_Total29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_realisasi->Realisasi_28Sub_Total29->Visible) { // Realisasi (Sub Total) ?>
	<?php if ($v_realisasi->sortUrl($v_realisasi->Realisasi_28Sub_Total29) == "") { ?>
		<th data-name="Realisasi_28Sub_Total29" class="<?php echo $v_realisasi->Realisasi_28Sub_Total29->headerCellClass() ?>"><div id="elh_v_realisasi_Realisasi_28Sub_Total29" class="v_realisasi_Realisasi_28Sub_Total29"><div class="ew-table-header-caption"><?php echo $v_realisasi->Realisasi_28Sub_Total29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Realisasi_28Sub_Total29" class="<?php echo $v_realisasi->Realisasi_28Sub_Total29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_realisasi->SortUrl($v_realisasi->Realisasi_28Sub_Total29) ?>',1);"><div id="elh_v_realisasi_Realisasi_28Sub_Total29" class="v_realisasi_Realisasi_28Sub_Total29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_realisasi->Realisasi_28Sub_Total29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_realisasi->Realisasi_28Sub_Total29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_realisasi->Realisasi_28Sub_Total29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_realisasi->Sisa_Dana_28Sub_Total29->Visible) { // Sisa Dana (Sub Total) ?>
	<?php if ($v_realisasi->sortUrl($v_realisasi->Sisa_Dana_28Sub_Total29) == "") { ?>
		<th data-name="Sisa_Dana_28Sub_Total29" class="<?php echo $v_realisasi->Sisa_Dana_28Sub_Total29->headerCellClass() ?>"><div id="elh_v_realisasi_Sisa_Dana_28Sub_Total29" class="v_realisasi_Sisa_Dana_28Sub_Total29"><div class="ew-table-header-caption"><?php echo $v_realisasi->Sisa_Dana_28Sub_Total29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sisa_Dana_28Sub_Total29" class="<?php echo $v_realisasi->Sisa_Dana_28Sub_Total29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_realisasi->SortUrl($v_realisasi->Sisa_Dana_28Sub_Total29) ?>',1);"><div id="elh_v_realisasi_Sisa_Dana_28Sub_Total29" class="v_realisasi_Sisa_Dana_28Sub_Total29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_realisasi->Sisa_Dana_28Sub_Total29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_realisasi->Sisa_Dana_28Sub_Total29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_realisasi->Sisa_Dana_28Sub_Total29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_realisasi_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v_realisasi->ExportAll && $v_realisasi->isExport()) {
	$v_realisasi_list->StopRec = $v_realisasi_list->TotalRecs;
} else {

	// Set the last record to display
	if ($v_realisasi_list->TotalRecs > $v_realisasi_list->StartRec + $v_realisasi_list->DisplayRecs - 1)
		$v_realisasi_list->StopRec = $v_realisasi_list->StartRec + $v_realisasi_list->DisplayRecs - 1;
	else
		$v_realisasi_list->StopRec = $v_realisasi_list->TotalRecs;
}
$v_realisasi_list->RecCnt = $v_realisasi_list->StartRec - 1;
if ($v_realisasi_list->Recordset && !$v_realisasi_list->Recordset->EOF) {
	$v_realisasi_list->Recordset->moveFirst();
	$selectLimit = $v_realisasi_list->UseSelectLimit;
	if (!$selectLimit && $v_realisasi_list->StartRec > 1)
		$v_realisasi_list->Recordset->move($v_realisasi_list->StartRec - 1);
} elseif (!$v_realisasi->AllowAddDeleteRow && $v_realisasi_list->StopRec == 0) {
	$v_realisasi_list->StopRec = $v_realisasi->GridAddRowCount;
}

// Initialize aggregate
$v_realisasi->RowType = ROWTYPE_AGGREGATEINIT;
$v_realisasi->resetAttributes();
$v_realisasi_list->renderRow();
while ($v_realisasi_list->RecCnt < $v_realisasi_list->StopRec) {
	$v_realisasi_list->RecCnt++;
	if ($v_realisasi_list->RecCnt >= $v_realisasi_list->StartRec) {
		$v_realisasi_list->RowCnt++;

		// Set up key count
		$v_realisasi_list->KeyCount = $v_realisasi_list->RowIndex;

		// Init row class and style
		$v_realisasi->resetAttributes();
		$v_realisasi->CssClass = "";
		if ($v_realisasi->isGridAdd()) {
		} else {
			$v_realisasi_list->loadRowValues($v_realisasi_list->Recordset); // Load row values
		}
		$v_realisasi->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v_realisasi->RowAttrs = array_merge($v_realisasi->RowAttrs, array('data-rowindex'=>$v_realisasi_list->RowCnt, 'id'=>'r' . $v_realisasi_list->RowCnt . '_v_realisasi', 'data-rowtype'=>$v_realisasi->RowType));

		// Render row
		$v_realisasi_list->renderRow();

		// Render list options
		$v_realisasi_list->renderListOptions();
?>
	<tr<?php echo $v_realisasi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_realisasi_list->ListOptions->render("body", "left", $v_realisasi_list->RowCnt);
?>
	<?php if ($v_realisasi->Tahun->Visible) { // Tahun ?>
		<td data-name="Tahun"<?php echo $v_realisasi->Tahun->cellAttributes() ?>>
<span id="el<?php echo $v_realisasi_list->RowCnt ?>_v_realisasi_Tahun" class="v_realisasi_Tahun">
<span<?php echo $v_realisasi->Tahun->viewAttributes() ?>>
<?php echo $v_realisasi->Tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_realisasi->Unit_Kerja->Visible) { // Unit Kerja ?>
		<td data-name="Unit_Kerja"<?php echo $v_realisasi->Unit_Kerja->cellAttributes() ?>>
<span id="el<?php echo $v_realisasi_list->RowCnt ?>_v_realisasi_Unit_Kerja" class="v_realisasi_Unit_Kerja">
<span<?php echo $v_realisasi->Unit_Kerja->viewAttributes() ?>>
<?php echo $v_realisasi->Unit_Kerja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_realisasi->Kegiatan2F_Akun->Visible) { // Kegiatan/ Akun ?>
		<td data-name="Kegiatan2F_Akun"<?php echo $v_realisasi->Kegiatan2F_Akun->cellAttributes() ?>>
<span id="el<?php echo $v_realisasi_list->RowCnt ?>_v_realisasi_Kegiatan2F_Akun" class="v_realisasi_Kegiatan2F_Akun">
<span<?php echo $v_realisasi->Kegiatan2F_Akun->viewAttributes() ?>>
<?php echo $v_realisasi->Kegiatan2F_Akun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_realisasi->Pagu_28Sub_Total29->Visible) { // Pagu (Sub Total) ?>
		<td data-name="Pagu_28Sub_Total29"<?php echo $v_realisasi->Pagu_28Sub_Total29->cellAttributes() ?>>
<span id="el<?php echo $v_realisasi_list->RowCnt ?>_v_realisasi_Pagu_28Sub_Total29" class="v_realisasi_Pagu_28Sub_Total29">
<span<?php echo $v_realisasi->Pagu_28Sub_Total29->viewAttributes() ?>>
<?php echo $v_realisasi->Pagu_28Sub_Total29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_realisasi->Realisasi_28Sub_Total29->Visible) { // Realisasi (Sub Total) ?>
		<td data-name="Realisasi_28Sub_Total29"<?php echo $v_realisasi->Realisasi_28Sub_Total29->cellAttributes() ?>>
<span id="el<?php echo $v_realisasi_list->RowCnt ?>_v_realisasi_Realisasi_28Sub_Total29" class="v_realisasi_Realisasi_28Sub_Total29">
<span<?php echo $v_realisasi->Realisasi_28Sub_Total29->viewAttributes() ?>>
<?php echo $v_realisasi->Realisasi_28Sub_Total29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_realisasi->Sisa_Dana_28Sub_Total29->Visible) { // Sisa Dana (Sub Total) ?>
		<td data-name="Sisa_Dana_28Sub_Total29"<?php echo $v_realisasi->Sisa_Dana_28Sub_Total29->cellAttributes() ?>>
<span id="el<?php echo $v_realisasi_list->RowCnt ?>_v_realisasi_Sisa_Dana_28Sub_Total29" class="v_realisasi_Sisa_Dana_28Sub_Total29">
<span<?php echo $v_realisasi->Sisa_Dana_28Sub_Total29->viewAttributes() ?>>
<?php echo $v_realisasi->Sisa_Dana_28Sub_Total29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_realisasi_list->ListOptions->render("body", "right", $v_realisasi_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$v_realisasi->isGridAdd())
		$v_realisasi_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$v_realisasi->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_realisasi_list->Recordset)
	$v_realisasi_list->Recordset->Close();
?>
<?php if (!$v_realisasi->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v_realisasi->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($v_realisasi_list->Pager)) $v_realisasi_list->Pager = new PrevNextPager($v_realisasi_list->StartRec, $v_realisasi_list->DisplayRecs, $v_realisasi_list->TotalRecs, $v_realisasi_list->AutoHidePager) ?>
<?php if ($v_realisasi_list->Pager->RecordCount > 0 && $v_realisasi_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($v_realisasi_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $v_realisasi_list->pageUrl() ?>start=<?php echo $v_realisasi_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($v_realisasi_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $v_realisasi_list->pageUrl() ?>start=<?php echo $v_realisasi_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $v_realisasi_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($v_realisasi_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $v_realisasi_list->pageUrl() ?>start=<?php echo $v_realisasi_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($v_realisasi_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $v_realisasi_list->pageUrl() ?>start=<?php echo $v_realisasi_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $v_realisasi_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($v_realisasi_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $v_realisasi_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $v_realisasi_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $v_realisasi_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_realisasi_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_realisasi_list->TotalRecs == 0 && !$v_realisasi->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_realisasi_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v_realisasi_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$v_realisasi->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$v_realisasi_list->terminate();
?>
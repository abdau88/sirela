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
$tb_realisasi_list = new tb_realisasi_list();

// Run the page
$tb_realisasi_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_realisasi_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_realisasi->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_realisasilist = currentForm = new ew.Form("ftb_realisasilist", "list");
ftb_realisasilist.formKeyCountName = '<?php echo $tb_realisasi_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_realisasilist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_realisasilist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_realisasilist.lists["x_kode_unit"] = <?php echo $tb_realisasi_list->kode_unit->Lookup->toClientList() ?>;
ftb_realisasilist.lists["x_kode_unit"].options = <?php echo JsonEncode($tb_realisasi_list->kode_unit->lookupOptions()) ?>;
ftb_realisasilist.autoSuggests["x_kode_unit"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_realisasilist.lists["x_kode_akun"] = <?php echo $tb_realisasi_list->kode_akun->Lookup->toClientList() ?>;
ftb_realisasilist.lists["x_kode_akun"].options = <?php echo JsonEncode($tb_realisasi_list->kode_akun->lookupOptions()) ?>;
ftb_realisasilist.autoSuggests["x_kode_akun"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_realisasilist.lists["x_tahun"] = <?php echo $tb_realisasi_list->tahun->Lookup->toClientList() ?>;
ftb_realisasilist.lists["x_tahun"].options = <?php echo JsonEncode($tb_realisasi_list->tahun->options(FALSE, TRUE)) ?>;

// Form object for search
var ftb_realisasilistsrch = currentSearchForm = new ew.Form("ftb_realisasilistsrch");

// Filters
ftb_realisasilistsrch.filterList = <?php echo $tb_realisasi_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_realisasi->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_realisasi_list->TotalRecs > 0 && $tb_realisasi_list->ExportOptions->visible()) { ?>
<?php $tb_realisasi_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_realisasi_list->ImportOptions->visible()) { ?>
<?php $tb_realisasi_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_realisasi_list->SearchOptions->visible()) { ?>
<?php $tb_realisasi_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_realisasi_list->FilterOptions->visible()) { ?>
<?php $tb_realisasi_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_realisasi_list->renderOtherOptions();
?>
<?php if (!$tb_realisasi->isExport() && !$tb_realisasi->CurrentAction) { ?>
<form name="ftb_realisasilistsrch" id="ftb_realisasilistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_realisasi_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_realisasilistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_realisasi">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_realisasi_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_realisasi_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_realisasi_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_realisasi_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_realisasi_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_realisasi_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_realisasi_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $tb_realisasi_list->showPageHeader(); ?>
<?php
$tb_realisasi_list->showMessage();
?>
<?php if ($tb_realisasi_list->TotalRecs > 0 || $tb_realisasi->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_realisasi_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_realisasi">
<form name="ftb_realisasilist" id="ftb_realisasilist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_realisasi_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_realisasi_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_realisasi">
<div id="gmp_tb_realisasi" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_realisasi_list->TotalRecs > 0 || $tb_realisasi->isGridEdit()) { ?>
<table id="tbl_tb_realisasilist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_realisasi_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_realisasi_list->renderListOptions();

// Render list options (header, left)
$tb_realisasi_list->ListOptions->render("header", "left");
?>
<?php if ($tb_realisasi->kode_unit->Visible) { // kode_unit ?>
	<?php if ($tb_realisasi->sortUrl($tb_realisasi->kode_unit) == "") { ?>
		<th data-name="kode_unit" class="<?php echo $tb_realisasi->kode_unit->headerCellClass() ?>"><div id="elh_tb_realisasi_kode_unit" class="tb_realisasi_kode_unit"><div class="ew-table-header-caption"><?php echo $tb_realisasi->kode_unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_unit" class="<?php echo $tb_realisasi->kode_unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_realisasi->SortUrl($tb_realisasi->kode_unit) ?>',1);"><div id="elh_tb_realisasi_kode_unit" class="tb_realisasi_kode_unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_realisasi->kode_unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_realisasi->kode_unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_realisasi->kode_unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_realisasi->kode_akun->Visible) { // kode_akun ?>
	<?php if ($tb_realisasi->sortUrl($tb_realisasi->kode_akun) == "") { ?>
		<th data-name="kode_akun" class="<?php echo $tb_realisasi->kode_akun->headerCellClass() ?>"><div id="elh_tb_realisasi_kode_akun" class="tb_realisasi_kode_akun"><div class="ew-table-header-caption"><?php echo $tb_realisasi->kode_akun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_akun" class="<?php echo $tb_realisasi->kode_akun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_realisasi->SortUrl($tb_realisasi->kode_akun) ?>',1);"><div id="elh_tb_realisasi_kode_akun" class="tb_realisasi_kode_akun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_realisasi->kode_akun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_realisasi->kode_akun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_realisasi->kode_akun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_realisasi->tahun->Visible) { // tahun ?>
	<?php if ($tb_realisasi->sortUrl($tb_realisasi->tahun) == "") { ?>
		<th data-name="tahun" class="<?php echo $tb_realisasi->tahun->headerCellClass() ?>"><div id="elh_tb_realisasi_tahun" class="tb_realisasi_tahun"><div class="ew-table-header-caption"><?php echo $tb_realisasi->tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahun" class="<?php echo $tb_realisasi->tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_realisasi->SortUrl($tb_realisasi->tahun) ?>',1);"><div id="elh_tb_realisasi_tahun" class="tb_realisasi_tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_realisasi->tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_realisasi->tahun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_realisasi->tahun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_realisasi->pagu->Visible) { // pagu ?>
	<?php if ($tb_realisasi->sortUrl($tb_realisasi->pagu) == "") { ?>
		<th data-name="pagu" class="<?php echo $tb_realisasi->pagu->headerCellClass() ?>"><div id="elh_tb_realisasi_pagu" class="tb_realisasi_pagu"><div class="ew-table-header-caption"><?php echo $tb_realisasi->pagu->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pagu" class="<?php echo $tb_realisasi->pagu->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_realisasi->SortUrl($tb_realisasi->pagu) ?>',1);"><div id="elh_tb_realisasi_pagu" class="tb_realisasi_pagu">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_realisasi->pagu->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_realisasi->pagu->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_realisasi->pagu->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_realisasi->realisasi->Visible) { // realisasi ?>
	<?php if ($tb_realisasi->sortUrl($tb_realisasi->realisasi) == "") { ?>
		<th data-name="realisasi" class="<?php echo $tb_realisasi->realisasi->headerCellClass() ?>"><div id="elh_tb_realisasi_realisasi" class="tb_realisasi_realisasi"><div class="ew-table-header-caption"><?php echo $tb_realisasi->realisasi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="realisasi" class="<?php echo $tb_realisasi->realisasi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_realisasi->SortUrl($tb_realisasi->realisasi) ?>',1);"><div id="elh_tb_realisasi_realisasi" class="tb_realisasi_realisasi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_realisasi->realisasi->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_realisasi->realisasi->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_realisasi->realisasi->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_realisasi->sisa_dana->Visible) { // sisa_dana ?>
	<?php if ($tb_realisasi->sortUrl($tb_realisasi->sisa_dana) == "") { ?>
		<th data-name="sisa_dana" class="<?php echo $tb_realisasi->sisa_dana->headerCellClass() ?>"><div id="elh_tb_realisasi_sisa_dana" class="tb_realisasi_sisa_dana"><div class="ew-table-header-caption"><?php echo $tb_realisasi->sisa_dana->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sisa_dana" class="<?php echo $tb_realisasi->sisa_dana->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_realisasi->SortUrl($tb_realisasi->sisa_dana) ?>',1);"><div id="elh_tb_realisasi_sisa_dana" class="tb_realisasi_sisa_dana">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_realisasi->sisa_dana->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_realisasi->sisa_dana->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_realisasi->sisa_dana->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_realisasi_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_realisasi->ExportAll && $tb_realisasi->isExport()) {
	$tb_realisasi_list->StopRec = $tb_realisasi_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_realisasi_list->TotalRecs > $tb_realisasi_list->StartRec + $tb_realisasi_list->DisplayRecs - 1)
		$tb_realisasi_list->StopRec = $tb_realisasi_list->StartRec + $tb_realisasi_list->DisplayRecs - 1;
	else
		$tb_realisasi_list->StopRec = $tb_realisasi_list->TotalRecs;
}
$tb_realisasi_list->RecCnt = $tb_realisasi_list->StartRec - 1;
if ($tb_realisasi_list->Recordset && !$tb_realisasi_list->Recordset->EOF) {
	$tb_realisasi_list->Recordset->moveFirst();
	$selectLimit = $tb_realisasi_list->UseSelectLimit;
	if (!$selectLimit && $tb_realisasi_list->StartRec > 1)
		$tb_realisasi_list->Recordset->move($tb_realisasi_list->StartRec - 1);
} elseif (!$tb_realisasi->AllowAddDeleteRow && $tb_realisasi_list->StopRec == 0) {
	$tb_realisasi_list->StopRec = $tb_realisasi->GridAddRowCount;
}

// Initialize aggregate
$tb_realisasi->RowType = ROWTYPE_AGGREGATEINIT;
$tb_realisasi->resetAttributes();
$tb_realisasi_list->renderRow();
while ($tb_realisasi_list->RecCnt < $tb_realisasi_list->StopRec) {
	$tb_realisasi_list->RecCnt++;
	if ($tb_realisasi_list->RecCnt >= $tb_realisasi_list->StartRec) {
		$tb_realisasi_list->RowCnt++;

		// Set up key count
		$tb_realisasi_list->KeyCount = $tb_realisasi_list->RowIndex;

		// Init row class and style
		$tb_realisasi->resetAttributes();
		$tb_realisasi->CssClass = "";
		if ($tb_realisasi->isGridAdd()) {
		} else {
			$tb_realisasi_list->loadRowValues($tb_realisasi_list->Recordset); // Load row values
		}
		$tb_realisasi->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_realisasi->RowAttrs = array_merge($tb_realisasi->RowAttrs, array('data-rowindex'=>$tb_realisasi_list->RowCnt, 'id'=>'r' . $tb_realisasi_list->RowCnt . '_tb_realisasi', 'data-rowtype'=>$tb_realisasi->RowType));

		// Render row
		$tb_realisasi_list->renderRow();

		// Render list options
		$tb_realisasi_list->renderListOptions();
?>
	<tr<?php echo $tb_realisasi->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_realisasi_list->ListOptions->render("body", "left", $tb_realisasi_list->RowCnt);
?>
	<?php if ($tb_realisasi->kode_unit->Visible) { // kode_unit ?>
		<td data-name="kode_unit"<?php echo $tb_realisasi->kode_unit->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_list->RowCnt ?>_tb_realisasi_kode_unit" class="tb_realisasi_kode_unit">
<span<?php echo $tb_realisasi->kode_unit->viewAttributes() ?>>
<?php echo $tb_realisasi->kode_unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_realisasi->kode_akun->Visible) { // kode_akun ?>
		<td data-name="kode_akun"<?php echo $tb_realisasi->kode_akun->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_list->RowCnt ?>_tb_realisasi_kode_akun" class="tb_realisasi_kode_akun">
<span<?php echo $tb_realisasi->kode_akun->viewAttributes() ?>>
<?php echo $tb_realisasi->kode_akun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_realisasi->tahun->Visible) { // tahun ?>
		<td data-name="tahun"<?php echo $tb_realisasi->tahun->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_list->RowCnt ?>_tb_realisasi_tahun" class="tb_realisasi_tahun">
<span<?php echo $tb_realisasi->tahun->viewAttributes() ?>>
<?php echo $tb_realisasi->tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_realisasi->pagu->Visible) { // pagu ?>
		<td data-name="pagu"<?php echo $tb_realisasi->pagu->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_list->RowCnt ?>_tb_realisasi_pagu" class="tb_realisasi_pagu">
<span<?php echo $tb_realisasi->pagu->viewAttributes() ?>>
<?php echo $tb_realisasi->pagu->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_realisasi->realisasi->Visible) { // realisasi ?>
		<td data-name="realisasi"<?php echo $tb_realisasi->realisasi->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_list->RowCnt ?>_tb_realisasi_realisasi" class="tb_realisasi_realisasi">
<span<?php echo $tb_realisasi->realisasi->viewAttributes() ?>>
<?php echo $tb_realisasi->realisasi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_realisasi->sisa_dana->Visible) { // sisa_dana ?>
		<td data-name="sisa_dana"<?php echo $tb_realisasi->sisa_dana->cellAttributes() ?>>
<span id="el<?php echo $tb_realisasi_list->RowCnt ?>_tb_realisasi_sisa_dana" class="tb_realisasi_sisa_dana">
<span<?php echo $tb_realisasi->sisa_dana->viewAttributes() ?>>
<?php echo $tb_realisasi->sisa_dana->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_realisasi_list->ListOptions->render("body", "right", $tb_realisasi_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_realisasi->isGridAdd())
		$tb_realisasi_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_realisasi->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_realisasi_list->Recordset)
	$tb_realisasi_list->Recordset->Close();
?>
<?php if (!$tb_realisasi->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_realisasi->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_realisasi_list->Pager)) $tb_realisasi_list->Pager = new PrevNextPager($tb_realisasi_list->StartRec, $tb_realisasi_list->DisplayRecs, $tb_realisasi_list->TotalRecs, $tb_realisasi_list->AutoHidePager) ?>
<?php if ($tb_realisasi_list->Pager->RecordCount > 0 && $tb_realisasi_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_realisasi_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_realisasi_list->pageUrl() ?>start=<?php echo $tb_realisasi_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_realisasi_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_realisasi_list->pageUrl() ?>start=<?php echo $tb_realisasi_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_realisasi_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_realisasi_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_realisasi_list->pageUrl() ?>start=<?php echo $tb_realisasi_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_realisasi_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_realisasi_list->pageUrl() ?>start=<?php echo $tb_realisasi_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_realisasi_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_realisasi_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_realisasi_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_realisasi_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_realisasi_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_realisasi_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_realisasi_list->TotalRecs == 0 && !$tb_realisasi->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_realisasi_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_realisasi_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_realisasi->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_realisasi_list->terminate();
?>
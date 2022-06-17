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
$tb_unit_list = new tb_unit_list();

// Run the page
$tb_unit_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_unit_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_unit->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_unitlist = currentForm = new ew.Form("ftb_unitlist", "list");
ftb_unitlist.formKeyCountName = '<?php echo $tb_unit_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_unitlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_unitlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ftb_unitlistsrch = currentSearchForm = new ew.Form("ftb_unitlistsrch");

// Filters
ftb_unitlistsrch.filterList = <?php echo $tb_unit_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_unit->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_unit_list->TotalRecs > 0 && $tb_unit_list->ExportOptions->visible()) { ?>
<?php $tb_unit_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_unit_list->ImportOptions->visible()) { ?>
<?php $tb_unit_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_unit_list->SearchOptions->visible()) { ?>
<?php $tb_unit_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_unit_list->FilterOptions->visible()) { ?>
<?php $tb_unit_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_unit_list->renderOtherOptions();
?>
<?php if (!$tb_unit->isExport() && !$tb_unit->CurrentAction) { ?>
<form name="ftb_unitlistsrch" id="ftb_unitlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_unit_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_unitlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_unit">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_unit_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_unit_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_unit_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_unit_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_unit_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_unit_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_unit_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $tb_unit_list->showPageHeader(); ?>
<?php
$tb_unit_list->showMessage();
?>
<?php if ($tb_unit_list->TotalRecs > 0 || $tb_unit->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_unit_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_unit">
<form name="ftb_unitlist" id="ftb_unitlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_unit_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_unit_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_unit">
<div id="gmp_tb_unit" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_unit_list->TotalRecs > 0 || $tb_unit->isGridEdit()) { ?>
<table id="tbl_tb_unitlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_unit_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_unit_list->renderListOptions();

// Render list options (header, left)
$tb_unit_list->ListOptions->render("header", "left");
?>
<?php if ($tb_unit->kode_unit->Visible) { // kode_unit ?>
	<?php if ($tb_unit->sortUrl($tb_unit->kode_unit) == "") { ?>
		<th data-name="kode_unit" class="<?php echo $tb_unit->kode_unit->headerCellClass() ?>"><div id="elh_tb_unit_kode_unit" class="tb_unit_kode_unit"><div class="ew-table-header-caption"><?php echo $tb_unit->kode_unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_unit" class="<?php echo $tb_unit->kode_unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_unit->SortUrl($tb_unit->kode_unit) ?>',1);"><div id="elh_tb_unit_kode_unit" class="tb_unit_kode_unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_unit->kode_unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_unit->kode_unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_unit->kode_unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_unit->unit_kerja->Visible) { // unit_kerja ?>
	<?php if ($tb_unit->sortUrl($tb_unit->unit_kerja) == "") { ?>
		<th data-name="unit_kerja" class="<?php echo $tb_unit->unit_kerja->headerCellClass() ?>"><div id="elh_tb_unit_unit_kerja" class="tb_unit_unit_kerja"><div class="ew-table-header-caption"><?php echo $tb_unit->unit_kerja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="unit_kerja" class="<?php echo $tb_unit->unit_kerja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_unit->SortUrl($tb_unit->unit_kerja) ?>',1);"><div id="elh_tb_unit_unit_kerja" class="tb_unit_unit_kerja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_unit->unit_kerja->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_unit->unit_kerja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_unit->unit_kerja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_unit_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_unit->ExportAll && $tb_unit->isExport()) {
	$tb_unit_list->StopRec = $tb_unit_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_unit_list->TotalRecs > $tb_unit_list->StartRec + $tb_unit_list->DisplayRecs - 1)
		$tb_unit_list->StopRec = $tb_unit_list->StartRec + $tb_unit_list->DisplayRecs - 1;
	else
		$tb_unit_list->StopRec = $tb_unit_list->TotalRecs;
}
$tb_unit_list->RecCnt = $tb_unit_list->StartRec - 1;
if ($tb_unit_list->Recordset && !$tb_unit_list->Recordset->EOF) {
	$tb_unit_list->Recordset->moveFirst();
	$selectLimit = $tb_unit_list->UseSelectLimit;
	if (!$selectLimit && $tb_unit_list->StartRec > 1)
		$tb_unit_list->Recordset->move($tb_unit_list->StartRec - 1);
} elseif (!$tb_unit->AllowAddDeleteRow && $tb_unit_list->StopRec == 0) {
	$tb_unit_list->StopRec = $tb_unit->GridAddRowCount;
}

// Initialize aggregate
$tb_unit->RowType = ROWTYPE_AGGREGATEINIT;
$tb_unit->resetAttributes();
$tb_unit_list->renderRow();
while ($tb_unit_list->RecCnt < $tb_unit_list->StopRec) {
	$tb_unit_list->RecCnt++;
	if ($tb_unit_list->RecCnt >= $tb_unit_list->StartRec) {
		$tb_unit_list->RowCnt++;

		// Set up key count
		$tb_unit_list->KeyCount = $tb_unit_list->RowIndex;

		// Init row class and style
		$tb_unit->resetAttributes();
		$tb_unit->CssClass = "";
		if ($tb_unit->isGridAdd()) {
		} else {
			$tb_unit_list->loadRowValues($tb_unit_list->Recordset); // Load row values
		}
		$tb_unit->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_unit->RowAttrs = array_merge($tb_unit->RowAttrs, array('data-rowindex'=>$tb_unit_list->RowCnt, 'id'=>'r' . $tb_unit_list->RowCnt . '_tb_unit', 'data-rowtype'=>$tb_unit->RowType));

		// Render row
		$tb_unit_list->renderRow();

		// Render list options
		$tb_unit_list->renderListOptions();
?>
	<tr<?php echo $tb_unit->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_unit_list->ListOptions->render("body", "left", $tb_unit_list->RowCnt);
?>
	<?php if ($tb_unit->kode_unit->Visible) { // kode_unit ?>
		<td data-name="kode_unit"<?php echo $tb_unit->kode_unit->cellAttributes() ?>>
<span id="el<?php echo $tb_unit_list->RowCnt ?>_tb_unit_kode_unit" class="tb_unit_kode_unit">
<span<?php echo $tb_unit->kode_unit->viewAttributes() ?>>
<?php echo $tb_unit->kode_unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_unit->unit_kerja->Visible) { // unit_kerja ?>
		<td data-name="unit_kerja"<?php echo $tb_unit->unit_kerja->cellAttributes() ?>>
<span id="el<?php echo $tb_unit_list->RowCnt ?>_tb_unit_unit_kerja" class="tb_unit_unit_kerja">
<span<?php echo $tb_unit->unit_kerja->viewAttributes() ?>>
<?php echo $tb_unit->unit_kerja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_unit_list->ListOptions->render("body", "right", $tb_unit_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_unit->isGridAdd())
		$tb_unit_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_unit->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_unit_list->Recordset)
	$tb_unit_list->Recordset->Close();
?>
<?php if (!$tb_unit->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_unit->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_unit_list->Pager)) $tb_unit_list->Pager = new PrevNextPager($tb_unit_list->StartRec, $tb_unit_list->DisplayRecs, $tb_unit_list->TotalRecs, $tb_unit_list->AutoHidePager) ?>
<?php if ($tb_unit_list->Pager->RecordCount > 0 && $tb_unit_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_unit_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_unit_list->pageUrl() ?>start=<?php echo $tb_unit_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_unit_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_unit_list->pageUrl() ?>start=<?php echo $tb_unit_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_unit_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_unit_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_unit_list->pageUrl() ?>start=<?php echo $tb_unit_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_unit_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_unit_list->pageUrl() ?>start=<?php echo $tb_unit_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_unit_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_unit_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_unit_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_unit_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_unit_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_unit_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_unit_list->TotalRecs == 0 && !$tb_unit->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_unit_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_unit_list->showPageFooter();
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
$tb_unit_list->terminate();
?>
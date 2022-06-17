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
$tb_akun_list = new tb_akun_list();

// Run the page
$tb_akun_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_akun_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_akun->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_akunlist = currentForm = new ew.Form("ftb_akunlist", "list");
ftb_akunlist.formKeyCountName = '<?php echo $tb_akun_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_akunlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_akunlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_akunlist.lists["x_kode_kategori"] = <?php echo $tb_akun_list->kode_kategori->Lookup->toClientList() ?>;
ftb_akunlist.lists["x_kode_kategori"].options = <?php echo JsonEncode($tb_akun_list->kode_kategori->lookupOptions()) ?>;
ftb_akunlist.autoSuggests["x_kode_kategori"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var ftb_akunlistsrch = currentSearchForm = new ew.Form("ftb_akunlistsrch");

// Filters
ftb_akunlistsrch.filterList = <?php echo $tb_akun_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_akun->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_akun_list->TotalRecs > 0 && $tb_akun_list->ExportOptions->visible()) { ?>
<?php $tb_akun_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_akun_list->ImportOptions->visible()) { ?>
<?php $tb_akun_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_akun_list->SearchOptions->visible()) { ?>
<?php $tb_akun_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_akun_list->FilterOptions->visible()) { ?>
<?php $tb_akun_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$tb_akun_list->renderOtherOptions();
?>
<?php if (!$tb_akun->isExport() && !$tb_akun->CurrentAction) { ?>
<form name="ftb_akunlistsrch" id="ftb_akunlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_akun_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_akunlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_akun">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_akun_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_akun_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_akun_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_akun_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_akun_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_akun_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_akun_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $tb_akun_list->showPageHeader(); ?>
<?php
$tb_akun_list->showMessage();
?>
<?php if ($tb_akun_list->TotalRecs > 0 || $tb_akun->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_akun_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_akun">
<form name="ftb_akunlist" id="ftb_akunlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_akun_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_akun_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_akun">
<div id="gmp_tb_akun" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_akun_list->TotalRecs > 0 || $tb_akun->isGridEdit()) { ?>
<table id="tbl_tb_akunlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_akun_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_akun_list->renderListOptions();

// Render list options (header, left)
$tb_akun_list->ListOptions->render("header", "left");
?>
<?php if ($tb_akun->kode_akun->Visible) { // kode_akun ?>
	<?php if ($tb_akun->sortUrl($tb_akun->kode_akun) == "") { ?>
		<th data-name="kode_akun" class="<?php echo $tb_akun->kode_akun->headerCellClass() ?>"><div id="elh_tb_akun_kode_akun" class="tb_akun_kode_akun"><div class="ew-table-header-caption"><?php echo $tb_akun->kode_akun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_akun" class="<?php echo $tb_akun->kode_akun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_akun->SortUrl($tb_akun->kode_akun) ?>',1);"><div id="elh_tb_akun_kode_akun" class="tb_akun_kode_akun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_akun->kode_akun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_akun->kode_akun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_akun->kode_akun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_akun->uraian->Visible) { // uraian ?>
	<?php if ($tb_akun->sortUrl($tb_akun->uraian) == "") { ?>
		<th data-name="uraian" class="<?php echo $tb_akun->uraian->headerCellClass() ?>"><div id="elh_tb_akun_uraian" class="tb_akun_uraian"><div class="ew-table-header-caption"><?php echo $tb_akun->uraian->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="uraian" class="<?php echo $tb_akun->uraian->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_akun->SortUrl($tb_akun->uraian) ?>',1);"><div id="elh_tb_akun_uraian" class="tb_akun_uraian">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_akun->uraian->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_akun->uraian->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_akun->uraian->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_akun->kode_kategori->Visible) { // kode_kategori ?>
	<?php if ($tb_akun->sortUrl($tb_akun->kode_kategori) == "") { ?>
		<th data-name="kode_kategori" class="<?php echo $tb_akun->kode_kategori->headerCellClass() ?>"><div id="elh_tb_akun_kode_kategori" class="tb_akun_kode_kategori"><div class="ew-table-header-caption"><?php echo $tb_akun->kode_kategori->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_kategori" class="<?php echo $tb_akun->kode_kategori->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_akun->SortUrl($tb_akun->kode_kategori) ?>',1);"><div id="elh_tb_akun_kode_kategori" class="tb_akun_kode_kategori">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_akun->kode_kategori->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_akun->kode_kategori->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_akun->kode_kategori->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_akun_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_akun->ExportAll && $tb_akun->isExport()) {
	$tb_akun_list->StopRec = $tb_akun_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_akun_list->TotalRecs > $tb_akun_list->StartRec + $tb_akun_list->DisplayRecs - 1)
		$tb_akun_list->StopRec = $tb_akun_list->StartRec + $tb_akun_list->DisplayRecs - 1;
	else
		$tb_akun_list->StopRec = $tb_akun_list->TotalRecs;
}
$tb_akun_list->RecCnt = $tb_akun_list->StartRec - 1;
if ($tb_akun_list->Recordset && !$tb_akun_list->Recordset->EOF) {
	$tb_akun_list->Recordset->moveFirst();
	$selectLimit = $tb_akun_list->UseSelectLimit;
	if (!$selectLimit && $tb_akun_list->StartRec > 1)
		$tb_akun_list->Recordset->move($tb_akun_list->StartRec - 1);
} elseif (!$tb_akun->AllowAddDeleteRow && $tb_akun_list->StopRec == 0) {
	$tb_akun_list->StopRec = $tb_akun->GridAddRowCount;
}

// Initialize aggregate
$tb_akun->RowType = ROWTYPE_AGGREGATEINIT;
$tb_akun->resetAttributes();
$tb_akun_list->renderRow();
while ($tb_akun_list->RecCnt < $tb_akun_list->StopRec) {
	$tb_akun_list->RecCnt++;
	if ($tb_akun_list->RecCnt >= $tb_akun_list->StartRec) {
		$tb_akun_list->RowCnt++;

		// Set up key count
		$tb_akun_list->KeyCount = $tb_akun_list->RowIndex;

		// Init row class and style
		$tb_akun->resetAttributes();
		$tb_akun->CssClass = "";
		if ($tb_akun->isGridAdd()) {
		} else {
			$tb_akun_list->loadRowValues($tb_akun_list->Recordset); // Load row values
		}
		$tb_akun->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_akun->RowAttrs = array_merge($tb_akun->RowAttrs, array('data-rowindex'=>$tb_akun_list->RowCnt, 'id'=>'r' . $tb_akun_list->RowCnt . '_tb_akun', 'data-rowtype'=>$tb_akun->RowType));

		// Render row
		$tb_akun_list->renderRow();

		// Render list options
		$tb_akun_list->renderListOptions();
?>
	<tr<?php echo $tb_akun->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_akun_list->ListOptions->render("body", "left", $tb_akun_list->RowCnt);
?>
	<?php if ($tb_akun->kode_akun->Visible) { // kode_akun ?>
		<td data-name="kode_akun"<?php echo $tb_akun->kode_akun->cellAttributes() ?>>
<span id="el<?php echo $tb_akun_list->RowCnt ?>_tb_akun_kode_akun" class="tb_akun_kode_akun">
<span<?php echo $tb_akun->kode_akun->viewAttributes() ?>>
<?php echo $tb_akun->kode_akun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_akun->uraian->Visible) { // uraian ?>
		<td data-name="uraian"<?php echo $tb_akun->uraian->cellAttributes() ?>>
<span id="el<?php echo $tb_akun_list->RowCnt ?>_tb_akun_uraian" class="tb_akun_uraian">
<span<?php echo $tb_akun->uraian->viewAttributes() ?>>
<?php echo $tb_akun->uraian->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_akun->kode_kategori->Visible) { // kode_kategori ?>
		<td data-name="kode_kategori"<?php echo $tb_akun->kode_kategori->cellAttributes() ?>>
<span id="el<?php echo $tb_akun_list->RowCnt ?>_tb_akun_kode_kategori" class="tb_akun_kode_kategori">
<span<?php echo $tb_akun->kode_kategori->viewAttributes() ?>>
<?php echo $tb_akun->kode_kategori->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_akun_list->ListOptions->render("body", "right", $tb_akun_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_akun->isGridAdd())
		$tb_akun_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_akun->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_akun_list->Recordset)
	$tb_akun_list->Recordset->Close();
?>
<?php if (!$tb_akun->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_akun->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_akun_list->Pager)) $tb_akun_list->Pager = new PrevNextPager($tb_akun_list->StartRec, $tb_akun_list->DisplayRecs, $tb_akun_list->TotalRecs, $tb_akun_list->AutoHidePager) ?>
<?php if ($tb_akun_list->Pager->RecordCount > 0 && $tb_akun_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_akun_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_akun_list->pageUrl() ?>start=<?php echo $tb_akun_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_akun_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_akun_list->pageUrl() ?>start=<?php echo $tb_akun_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_akun_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_akun_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_akun_list->pageUrl() ?>start=<?php echo $tb_akun_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_akun_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_akun_list->pageUrl() ?>start=<?php echo $tb_akun_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_akun_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_akun_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_akun_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_akun_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_akun_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_akun_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_akun_list->TotalRecs == 0 && !$tb_akun->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_akun_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_akun_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_akun->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_akun_list->terminate();
?>
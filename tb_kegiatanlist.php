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
$tb_kegiatan_list = new tb_kegiatan_list();

// Run the page
$tb_kegiatan_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_kegiatan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ftb_kegiatanlist = currentForm = new ew.Form("ftb_kegiatanlist", "list");
ftb_kegiatanlist.formKeyCountName = '<?php echo $tb_kegiatan_list->FormKeyCountName ?>';

// Form_CustomValidate event
ftb_kegiatanlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatanlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatanlist.lists["x_kode_kegiatan_sub1"] = <?php echo $tb_kegiatan_list->kode_kegiatan_sub1->Lookup->toClientList() ?>;
ftb_kegiatanlist.lists["x_kode_kegiatan_sub1"].options = <?php echo JsonEncode($tb_kegiatan_list->kode_kegiatan_sub1->lookupOptions()) ?>;
ftb_kegiatanlist.autoSuggests["x_kode_kegiatan_sub1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var ftb_kegiatanlistsrch = currentSearchForm = new ew.Form("ftb_kegiatanlistsrch");

// Filters
ftb_kegiatanlistsrch.filterList = <?php echo $tb_kegiatan_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_kegiatan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($tb_kegiatan_list->TotalRecs > 0 && $tb_kegiatan_list->ExportOptions->visible()) { ?>
<?php $tb_kegiatan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_kegiatan_list->ImportOptions->visible()) { ?>
<?php $tb_kegiatan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($tb_kegiatan_list->SearchOptions->visible()) { ?>
<?php $tb_kegiatan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($tb_kegiatan_list->FilterOptions->visible()) { ?>
<?php $tb_kegiatan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$tb_kegiatan->isExport() || EXPORT_MASTER_RECORD && $tb_kegiatan->isExport("print")) { ?>
<?php
if ($tb_kegiatan_list->DbMasterFilter <> "" && $tb_kegiatan->getCurrentMasterTable() == "tb_kegiatan_sub1") {
	if ($tb_kegiatan_list->MasterRecordExists) {
		include_once "tb_kegiatan_sub1master.php";
	}
}
?>
<?php } ?>
<?php
$tb_kegiatan_list->renderOtherOptions();
?>
<?php if (!$tb_kegiatan->isExport() && !$tb_kegiatan->CurrentAction) { ?>
<form name="ftb_kegiatanlistsrch" id="ftb_kegiatanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($tb_kegiatan_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ftb_kegiatanlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_kegiatan">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($tb_kegiatan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($tb_kegiatan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $tb_kegiatan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($tb_kegiatan_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($tb_kegiatan_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($tb_kegiatan_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($tb_kegiatan_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $tb_kegiatan_list->showPageHeader(); ?>
<?php
$tb_kegiatan_list->showMessage();
?>
<?php if ($tb_kegiatan_list->TotalRecs > 0 || $tb_kegiatan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_kegiatan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_kegiatan">
<form name="ftb_kegiatanlist" id="ftb_kegiatanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan">
<?php if ($tb_kegiatan->getCurrentMasterTable() == "tb_kegiatan_sub1" && $tb_kegiatan->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="tb_kegiatan_sub1">
<input type="hidden" name="fk_kode_kegiatan_sub1" value="<?php echo $tb_kegiatan->kode_kegiatan_sub1->getSessionValue() ?>">
<?php } ?>
<div id="gmp_tb_kegiatan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($tb_kegiatan_list->TotalRecs > 0 || $tb_kegiatan->isGridEdit()) { ?>
<table id="tbl_tb_kegiatanlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_kegiatan_list->RowType = ROWTYPE_HEADER;

// Render list options
$tb_kegiatan_list->renderListOptions();

// Render list options (header, left)
$tb_kegiatan_list->ListOptions->render("header", "left");
?>
<?php if ($tb_kegiatan->kode_kegiatan->Visible) { // kode_kegiatan ?>
	<?php if ($tb_kegiatan->sortUrl($tb_kegiatan->kode_kegiatan) == "") { ?>
		<th data-name="kode_kegiatan" class="<?php echo $tb_kegiatan->kode_kegiatan->headerCellClass() ?>"><div id="elh_tb_kegiatan_kode_kegiatan" class="tb_kegiatan_kode_kegiatan"><div class="ew-table-header-caption"><?php echo $tb_kegiatan->kode_kegiatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_kegiatan" class="<?php echo $tb_kegiatan->kode_kegiatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_kegiatan->SortUrl($tb_kegiatan->kode_kegiatan) ?>',1);"><div id="elh_tb_kegiatan_kode_kegiatan" class="tb_kegiatan_kode_kegiatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_kegiatan->kode_kegiatan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_kegiatan->kode_kegiatan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_kegiatan->kode_kegiatan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_kegiatan->nama_kegiatan->Visible) { // nama_kegiatan ?>
	<?php if ($tb_kegiatan->sortUrl($tb_kegiatan->nama_kegiatan) == "") { ?>
		<th data-name="nama_kegiatan" class="<?php echo $tb_kegiatan->nama_kegiatan->headerCellClass() ?>"><div id="elh_tb_kegiatan_nama_kegiatan" class="tb_kegiatan_nama_kegiatan"><div class="ew-table-header-caption"><?php echo $tb_kegiatan->nama_kegiatan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama_kegiatan" class="<?php echo $tb_kegiatan->nama_kegiatan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_kegiatan->SortUrl($tb_kegiatan->nama_kegiatan) ?>',1);"><div id="elh_tb_kegiatan_nama_kegiatan" class="tb_kegiatan_nama_kegiatan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_kegiatan->nama_kegiatan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_kegiatan->nama_kegiatan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_kegiatan->nama_kegiatan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
	<?php if ($tb_kegiatan->sortUrl($tb_kegiatan->kode_kegiatan_sub1) == "") { ?>
		<th data-name="kode_kegiatan_sub1" class="<?php echo $tb_kegiatan->kode_kegiatan_sub1->headerCellClass() ?>"><div id="elh_tb_kegiatan_kode_kegiatan_sub1" class="tb_kegiatan_kode_kegiatan_sub1"><div class="ew-table-header-caption"><?php echo $tb_kegiatan->kode_kegiatan_sub1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_kegiatan_sub1" class="<?php echo $tb_kegiatan->kode_kegiatan_sub1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $tb_kegiatan->SortUrl($tb_kegiatan->kode_kegiatan_sub1) ?>',1);"><div id="elh_tb_kegiatan_kode_kegiatan_sub1" class="tb_kegiatan_kode_kegiatan_sub1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_kegiatan->kode_kegiatan_sub1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($tb_kegiatan->kode_kegiatan_sub1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_kegiatan->kode_kegiatan_sub1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_kegiatan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tb_kegiatan->ExportAll && $tb_kegiatan->isExport()) {
	$tb_kegiatan_list->StopRec = $tb_kegiatan_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tb_kegiatan_list->TotalRecs > $tb_kegiatan_list->StartRec + $tb_kegiatan_list->DisplayRecs - 1)
		$tb_kegiatan_list->StopRec = $tb_kegiatan_list->StartRec + $tb_kegiatan_list->DisplayRecs - 1;
	else
		$tb_kegiatan_list->StopRec = $tb_kegiatan_list->TotalRecs;
}
$tb_kegiatan_list->RecCnt = $tb_kegiatan_list->StartRec - 1;
if ($tb_kegiatan_list->Recordset && !$tb_kegiatan_list->Recordset->EOF) {
	$tb_kegiatan_list->Recordset->moveFirst();
	$selectLimit = $tb_kegiatan_list->UseSelectLimit;
	if (!$selectLimit && $tb_kegiatan_list->StartRec > 1)
		$tb_kegiatan_list->Recordset->move($tb_kegiatan_list->StartRec - 1);
} elseif (!$tb_kegiatan->AllowAddDeleteRow && $tb_kegiatan_list->StopRec == 0) {
	$tb_kegiatan_list->StopRec = $tb_kegiatan->GridAddRowCount;
}

// Initialize aggregate
$tb_kegiatan->RowType = ROWTYPE_AGGREGATEINIT;
$tb_kegiatan->resetAttributes();
$tb_kegiatan_list->renderRow();
while ($tb_kegiatan_list->RecCnt < $tb_kegiatan_list->StopRec) {
	$tb_kegiatan_list->RecCnt++;
	if ($tb_kegiatan_list->RecCnt >= $tb_kegiatan_list->StartRec) {
		$tb_kegiatan_list->RowCnt++;

		// Set up key count
		$tb_kegiatan_list->KeyCount = $tb_kegiatan_list->RowIndex;

		// Init row class and style
		$tb_kegiatan->resetAttributes();
		$tb_kegiatan->CssClass = "";
		if ($tb_kegiatan->isGridAdd()) {
		} else {
			$tb_kegiatan_list->loadRowValues($tb_kegiatan_list->Recordset); // Load row values
		}
		$tb_kegiatan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tb_kegiatan->RowAttrs = array_merge($tb_kegiatan->RowAttrs, array('data-rowindex'=>$tb_kegiatan_list->RowCnt, 'id'=>'r' . $tb_kegiatan_list->RowCnt . '_tb_kegiatan', 'data-rowtype'=>$tb_kegiatan->RowType));

		// Render row
		$tb_kegiatan_list->renderRow();

		// Render list options
		$tb_kegiatan_list->renderListOptions();
?>
	<tr<?php echo $tb_kegiatan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_kegiatan_list->ListOptions->render("body", "left", $tb_kegiatan_list->RowCnt);
?>
	<?php if ($tb_kegiatan->kode_kegiatan->Visible) { // kode_kegiatan ?>
		<td data-name="kode_kegiatan"<?php echo $tb_kegiatan->kode_kegiatan->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_list->RowCnt ?>_tb_kegiatan_kode_kegiatan" class="tb_kegiatan_kode_kegiatan">
<span<?php echo $tb_kegiatan->kode_kegiatan->viewAttributes() ?>>
<?php echo $tb_kegiatan->kode_kegiatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_kegiatan->nama_kegiatan->Visible) { // nama_kegiatan ?>
		<td data-name="nama_kegiatan"<?php echo $tb_kegiatan->nama_kegiatan->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_list->RowCnt ?>_tb_kegiatan_nama_kegiatan" class="tb_kegiatan_nama_kegiatan">
<span<?php echo $tb_kegiatan->nama_kegiatan->viewAttributes() ?>>
<?php echo $tb_kegiatan->nama_kegiatan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($tb_kegiatan->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
		<td data-name="kode_kegiatan_sub1"<?php echo $tb_kegiatan->kode_kegiatan_sub1->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_list->RowCnt ?>_tb_kegiatan_kode_kegiatan_sub1" class="tb_kegiatan_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan->kode_kegiatan_sub1->viewAttributes() ?>>
<?php echo $tb_kegiatan->kode_kegiatan_sub1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_kegiatan_list->ListOptions->render("body", "right", $tb_kegiatan_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$tb_kegiatan->isGridAdd())
		$tb_kegiatan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$tb_kegiatan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($tb_kegiatan_list->Recordset)
	$tb_kegiatan_list->Recordset->Close();
?>
<?php if (!$tb_kegiatan->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$tb_kegiatan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($tb_kegiatan_list->Pager)) $tb_kegiatan_list->Pager = new PrevNextPager($tb_kegiatan_list->StartRec, $tb_kegiatan_list->DisplayRecs, $tb_kegiatan_list->TotalRecs, $tb_kegiatan_list->AutoHidePager) ?>
<?php if ($tb_kegiatan_list->Pager->RecordCount > 0 && $tb_kegiatan_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($tb_kegiatan_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $tb_kegiatan_list->pageUrl() ?>start=<?php echo $tb_kegiatan_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($tb_kegiatan_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $tb_kegiatan_list->pageUrl() ?>start=<?php echo $tb_kegiatan_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $tb_kegiatan_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($tb_kegiatan_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $tb_kegiatan_list->pageUrl() ?>start=<?php echo $tb_kegiatan_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($tb_kegiatan_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $tb_kegiatan_list->pageUrl() ?>start=<?php echo $tb_kegiatan_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tb_kegiatan_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($tb_kegiatan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tb_kegiatan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tb_kegiatan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tb_kegiatan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $tb_kegiatan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_kegiatan_list->TotalRecs == 0 && !$tb_kegiatan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_kegiatan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_kegiatan_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_kegiatan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_list->terminate();
?>
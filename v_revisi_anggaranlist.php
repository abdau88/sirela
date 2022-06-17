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
$v_revisi_anggaran_list = new v_revisi_anggaran_list();

// Run the page
$v_revisi_anggaran_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v_revisi_anggaran_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$v_revisi_anggaran->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fv_revisi_anggaranlist = currentForm = new ew.Form("fv_revisi_anggaranlist", "list");
fv_revisi_anggaranlist.formKeyCountName = '<?php echo $v_revisi_anggaran_list->FormKeyCountName ?>';

// Form_CustomValidate event
fv_revisi_anggaranlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fv_revisi_anggaranlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fv_revisi_anggaranlistsrch = currentSearchForm = new ew.Form("fv_revisi_anggaranlistsrch");

// Filters
fv_revisi_anggaranlistsrch.filterList = <?php echo $v_revisi_anggaran_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$v_revisi_anggaran->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v_revisi_anggaran_list->TotalRecs > 0 && $v_revisi_anggaran_list->ExportOptions->visible()) { ?>
<?php $v_revisi_anggaran_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v_revisi_anggaran_list->ImportOptions->visible()) { ?>
<?php $v_revisi_anggaran_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v_revisi_anggaran_list->SearchOptions->visible()) { ?>
<?php $v_revisi_anggaran_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v_revisi_anggaran_list->FilterOptions->visible()) { ?>
<?php $v_revisi_anggaran_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v_revisi_anggaran_list->renderOtherOptions();
?>
<?php if (!$v_revisi_anggaran->isExport() && !$v_revisi_anggaran->CurrentAction) { ?>
<form name="fv_revisi_anggaranlistsrch" id="fv_revisi_anggaranlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($v_revisi_anggaran_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fv_revisi_anggaranlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v_revisi_anggaran">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($v_revisi_anggaran_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($v_revisi_anggaran_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v_revisi_anggaran_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v_revisi_anggaran_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v_revisi_anggaran_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v_revisi_anggaran_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v_revisi_anggaran_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $v_revisi_anggaran_list->showPageHeader(); ?>
<?php
$v_revisi_anggaran_list->showMessage();
?>
<?php if ($v_revisi_anggaran_list->TotalRecs > 0 || $v_revisi_anggaran->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v_revisi_anggaran_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v_revisi_anggaran">
<form name="fv_revisi_anggaranlist" id="fv_revisi_anggaranlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($v_revisi_anggaran_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $v_revisi_anggaran_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v_revisi_anggaran">
<div id="gmp_v_revisi_anggaran" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($v_revisi_anggaran_list->TotalRecs > 0 || $v_revisi_anggaran->isGridEdit()) { ?>
<table id="tbl_v_revisi_anggaranlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v_revisi_anggaran_list->RowType = ROWTYPE_HEADER;

// Render list options
$v_revisi_anggaran_list->renderListOptions();

// Render list options (header, left)
$v_revisi_anggaran_list->ListOptions->render("header", "left");
?>
<?php if ($v_revisi_anggaran->Tanggal_Diubah->Visible) { // Tanggal Diubah ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Tanggal_Diubah) == "") { ?>
		<th data-name="Tanggal_Diubah" class="<?php echo $v_revisi_anggaran->Tanggal_Diubah->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Tanggal_Diubah" class="v_revisi_anggaran_Tanggal_Diubah"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Tanggal_Diubah->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal_Diubah" class="<?php echo $v_revisi_anggaran->Tanggal_Diubah->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Tanggal_Diubah) ?>',1);"><div id="elh_v_revisi_anggaran_Tanggal_Diubah" class="v_revisi_anggaran_Tanggal_Diubah">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Tanggal_Diubah->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Tanggal_Diubah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Tanggal_Diubah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_revisi_anggaran->Unit_Kerja->Visible) { // Unit Kerja ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Unit_Kerja) == "") { ?>
		<th data-name="Unit_Kerja" class="<?php echo $v_revisi_anggaran->Unit_Kerja->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Unit_Kerja" class="v_revisi_anggaran_Unit_Kerja"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Unit_Kerja->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit_Kerja" class="<?php echo $v_revisi_anggaran->Unit_Kerja->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Unit_Kerja) ?>',1);"><div id="elh_v_revisi_anggaran_Unit_Kerja" class="v_revisi_anggaran_Unit_Kerja">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Unit_Kerja->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Unit_Kerja->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Unit_Kerja->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_revisi_anggaran->Akun->Visible) { // Akun ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Akun) == "") { ?>
		<th data-name="Akun" class="<?php echo $v_revisi_anggaran->Akun->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Akun" class="v_revisi_anggaran_Akun"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Akun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Akun" class="<?php echo $v_revisi_anggaran->Akun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Akun) ?>',1);"><div id="elh_v_revisi_anggaran_Akun" class="v_revisi_anggaran_Akun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Akun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Akun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Akun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_revisi_anggaran->Tahun->Visible) { // Tahun ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Tahun) == "") { ?>
		<th data-name="Tahun" class="<?php echo $v_revisi_anggaran->Tahun->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Tahun" class="v_revisi_anggaran_Tahun"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Tahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tahun" class="<?php echo $v_revisi_anggaran->Tahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Tahun) ?>',1);"><div id="elh_v_revisi_anggaran_Tahun" class="v_revisi_anggaran_Tahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Tahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Tahun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Tahun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_revisi_anggaran->Pagu_28Lama29->Visible) { // Pagu (Lama) ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Pagu_28Lama29) == "") { ?>
		<th data-name="Pagu_28Lama29" class="<?php echo $v_revisi_anggaran->Pagu_28Lama29->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Pagu_28Lama29" class="v_revisi_anggaran_Pagu_28Lama29"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Pagu_28Lama29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pagu_28Lama29" class="<?php echo $v_revisi_anggaran->Pagu_28Lama29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Pagu_28Lama29) ?>',1);"><div id="elh_v_revisi_anggaran_Pagu_28Lama29" class="v_revisi_anggaran_Pagu_28Lama29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Pagu_28Lama29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Pagu_28Lama29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Pagu_28Lama29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_revisi_anggaran->Pagu_28Baru29->Visible) { // Pagu (Baru) ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Pagu_28Baru29) == "") { ?>
		<th data-name="Pagu_28Baru29" class="<?php echo $v_revisi_anggaran->Pagu_28Baru29->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Pagu_28Baru29" class="v_revisi_anggaran_Pagu_28Baru29"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Pagu_28Baru29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pagu_28Baru29" class="<?php echo $v_revisi_anggaran->Pagu_28Baru29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Pagu_28Baru29) ?>',1);"><div id="elh_v_revisi_anggaran_Pagu_28Baru29" class="v_revisi_anggaran_Pagu_28Baru29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Pagu_28Baru29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Pagu_28Baru29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Pagu_28Baru29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_revisi_anggaran->Realisasi_28Lama29->Visible) { // Realisasi (Lama) ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Realisasi_28Lama29) == "") { ?>
		<th data-name="Realisasi_28Lama29" class="<?php echo $v_revisi_anggaran->Realisasi_28Lama29->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Realisasi_28Lama29" class="v_revisi_anggaran_Realisasi_28Lama29"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Realisasi_28Lama29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Realisasi_28Lama29" class="<?php echo $v_revisi_anggaran->Realisasi_28Lama29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Realisasi_28Lama29) ?>',1);"><div id="elh_v_revisi_anggaran_Realisasi_28Lama29" class="v_revisi_anggaran_Realisasi_28Lama29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Realisasi_28Lama29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Realisasi_28Lama29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Realisasi_28Lama29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_revisi_anggaran->Realisasi_28Baru29->Visible) { // Realisasi (Baru) ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Realisasi_28Baru29) == "") { ?>
		<th data-name="Realisasi_28Baru29" class="<?php echo $v_revisi_anggaran->Realisasi_28Baru29->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Realisasi_28Baru29" class="v_revisi_anggaran_Realisasi_28Baru29"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Realisasi_28Baru29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Realisasi_28Baru29" class="<?php echo $v_revisi_anggaran->Realisasi_28Baru29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Realisasi_28Baru29) ?>',1);"><div id="elh_v_revisi_anggaran_Realisasi_28Baru29" class="v_revisi_anggaran_Realisasi_28Baru29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Realisasi_28Baru29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Realisasi_28Baru29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Realisasi_28Baru29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_revisi_anggaran->Sisa_Dana_28Lama29->Visible) { // Sisa Dana (Lama) ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Sisa_Dana_28Lama29) == "") { ?>
		<th data-name="Sisa_Dana_28Lama29" class="<?php echo $v_revisi_anggaran->Sisa_Dana_28Lama29->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Sisa_Dana_28Lama29" class="v_revisi_anggaran_Sisa_Dana_28Lama29"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Sisa_Dana_28Lama29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sisa_Dana_28Lama29" class="<?php echo $v_revisi_anggaran->Sisa_Dana_28Lama29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Sisa_Dana_28Lama29) ?>',1);"><div id="elh_v_revisi_anggaran_Sisa_Dana_28Lama29" class="v_revisi_anggaran_Sisa_Dana_28Lama29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Sisa_Dana_28Lama29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Sisa_Dana_28Lama29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Sisa_Dana_28Lama29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v_revisi_anggaran->Sisa_Dana_28Baru29->Visible) { // Sisa Dana (Baru) ?>
	<?php if ($v_revisi_anggaran->sortUrl($v_revisi_anggaran->Sisa_Dana_28Baru29) == "") { ?>
		<th data-name="Sisa_Dana_28Baru29" class="<?php echo $v_revisi_anggaran->Sisa_Dana_28Baru29->headerCellClass() ?>"><div id="elh_v_revisi_anggaran_Sisa_Dana_28Baru29" class="v_revisi_anggaran_Sisa_Dana_28Baru29"><div class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Sisa_Dana_28Baru29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sisa_Dana_28Baru29" class="<?php echo $v_revisi_anggaran->Sisa_Dana_28Baru29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v_revisi_anggaran->SortUrl($v_revisi_anggaran->Sisa_Dana_28Baru29) ?>',1);"><div id="elh_v_revisi_anggaran_Sisa_Dana_28Baru29" class="v_revisi_anggaran_Sisa_Dana_28Baru29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v_revisi_anggaran->Sisa_Dana_28Baru29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v_revisi_anggaran->Sisa_Dana_28Baru29->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v_revisi_anggaran->Sisa_Dana_28Baru29->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v_revisi_anggaran_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v_revisi_anggaran->ExportAll && $v_revisi_anggaran->isExport()) {
	$v_revisi_anggaran_list->StopRec = $v_revisi_anggaran_list->TotalRecs;
} else {

	// Set the last record to display
	if ($v_revisi_anggaran_list->TotalRecs > $v_revisi_anggaran_list->StartRec + $v_revisi_anggaran_list->DisplayRecs - 1)
		$v_revisi_anggaran_list->StopRec = $v_revisi_anggaran_list->StartRec + $v_revisi_anggaran_list->DisplayRecs - 1;
	else
		$v_revisi_anggaran_list->StopRec = $v_revisi_anggaran_list->TotalRecs;
}
$v_revisi_anggaran_list->RecCnt = $v_revisi_anggaran_list->StartRec - 1;
if ($v_revisi_anggaran_list->Recordset && !$v_revisi_anggaran_list->Recordset->EOF) {
	$v_revisi_anggaran_list->Recordset->moveFirst();
	$selectLimit = $v_revisi_anggaran_list->UseSelectLimit;
	if (!$selectLimit && $v_revisi_anggaran_list->StartRec > 1)
		$v_revisi_anggaran_list->Recordset->move($v_revisi_anggaran_list->StartRec - 1);
} elseif (!$v_revisi_anggaran->AllowAddDeleteRow && $v_revisi_anggaran_list->StopRec == 0) {
	$v_revisi_anggaran_list->StopRec = $v_revisi_anggaran->GridAddRowCount;
}

// Initialize aggregate
$v_revisi_anggaran->RowType = ROWTYPE_AGGREGATEINIT;
$v_revisi_anggaran->resetAttributes();
$v_revisi_anggaran_list->renderRow();
while ($v_revisi_anggaran_list->RecCnt < $v_revisi_anggaran_list->StopRec) {
	$v_revisi_anggaran_list->RecCnt++;
	if ($v_revisi_anggaran_list->RecCnt >= $v_revisi_anggaran_list->StartRec) {
		$v_revisi_anggaran_list->RowCnt++;

		// Set up key count
		$v_revisi_anggaran_list->KeyCount = $v_revisi_anggaran_list->RowIndex;

		// Init row class and style
		$v_revisi_anggaran->resetAttributes();
		$v_revisi_anggaran->CssClass = "";
		if ($v_revisi_anggaran->isGridAdd()) {
		} else {
			$v_revisi_anggaran_list->loadRowValues($v_revisi_anggaran_list->Recordset); // Load row values
		}
		$v_revisi_anggaran->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v_revisi_anggaran->RowAttrs = array_merge($v_revisi_anggaran->RowAttrs, array('data-rowindex'=>$v_revisi_anggaran_list->RowCnt, 'id'=>'r' . $v_revisi_anggaran_list->RowCnt . '_v_revisi_anggaran', 'data-rowtype'=>$v_revisi_anggaran->RowType));

		// Render row
		$v_revisi_anggaran_list->renderRow();

		// Render list options
		$v_revisi_anggaran_list->renderListOptions();
?>
	<tr<?php echo $v_revisi_anggaran->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v_revisi_anggaran_list->ListOptions->render("body", "left", $v_revisi_anggaran_list->RowCnt);
?>
	<?php if ($v_revisi_anggaran->Tanggal_Diubah->Visible) { // Tanggal Diubah ?>
		<td data-name="Tanggal_Diubah"<?php echo $v_revisi_anggaran->Tanggal_Diubah->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Tanggal_Diubah" class="v_revisi_anggaran_Tanggal_Diubah">
<span<?php echo $v_revisi_anggaran->Tanggal_Diubah->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Tanggal_Diubah->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_revisi_anggaran->Unit_Kerja->Visible) { // Unit Kerja ?>
		<td data-name="Unit_Kerja"<?php echo $v_revisi_anggaran->Unit_Kerja->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Unit_Kerja" class="v_revisi_anggaran_Unit_Kerja">
<span<?php echo $v_revisi_anggaran->Unit_Kerja->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Unit_Kerja->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_revisi_anggaran->Akun->Visible) { // Akun ?>
		<td data-name="Akun"<?php echo $v_revisi_anggaran->Akun->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Akun" class="v_revisi_anggaran_Akun">
<span<?php echo $v_revisi_anggaran->Akun->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Akun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_revisi_anggaran->Tahun->Visible) { // Tahun ?>
		<td data-name="Tahun"<?php echo $v_revisi_anggaran->Tahun->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Tahun" class="v_revisi_anggaran_Tahun">
<span<?php echo $v_revisi_anggaran->Tahun->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Tahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_revisi_anggaran->Pagu_28Lama29->Visible) { // Pagu (Lama) ?>
		<td data-name="Pagu_28Lama29"<?php echo $v_revisi_anggaran->Pagu_28Lama29->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Pagu_28Lama29" class="v_revisi_anggaran_Pagu_28Lama29">
<span<?php echo $v_revisi_anggaran->Pagu_28Lama29->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Pagu_28Lama29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_revisi_anggaran->Pagu_28Baru29->Visible) { // Pagu (Baru) ?>
		<td data-name="Pagu_28Baru29"<?php echo $v_revisi_anggaran->Pagu_28Baru29->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Pagu_28Baru29" class="v_revisi_anggaran_Pagu_28Baru29">
<span<?php echo $v_revisi_anggaran->Pagu_28Baru29->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Pagu_28Baru29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_revisi_anggaran->Realisasi_28Lama29->Visible) { // Realisasi (Lama) ?>
		<td data-name="Realisasi_28Lama29"<?php echo $v_revisi_anggaran->Realisasi_28Lama29->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Realisasi_28Lama29" class="v_revisi_anggaran_Realisasi_28Lama29">
<span<?php echo $v_revisi_anggaran->Realisasi_28Lama29->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Realisasi_28Lama29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_revisi_anggaran->Realisasi_28Baru29->Visible) { // Realisasi (Baru) ?>
		<td data-name="Realisasi_28Baru29"<?php echo $v_revisi_anggaran->Realisasi_28Baru29->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Realisasi_28Baru29" class="v_revisi_anggaran_Realisasi_28Baru29">
<span<?php echo $v_revisi_anggaran->Realisasi_28Baru29->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Realisasi_28Baru29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_revisi_anggaran->Sisa_Dana_28Lama29->Visible) { // Sisa Dana (Lama) ?>
		<td data-name="Sisa_Dana_28Lama29"<?php echo $v_revisi_anggaran->Sisa_Dana_28Lama29->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Sisa_Dana_28Lama29" class="v_revisi_anggaran_Sisa_Dana_28Lama29">
<span<?php echo $v_revisi_anggaran->Sisa_Dana_28Lama29->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Sisa_Dana_28Lama29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v_revisi_anggaran->Sisa_Dana_28Baru29->Visible) { // Sisa Dana (Baru) ?>
		<td data-name="Sisa_Dana_28Baru29"<?php echo $v_revisi_anggaran->Sisa_Dana_28Baru29->cellAttributes() ?>>
<span id="el<?php echo $v_revisi_anggaran_list->RowCnt ?>_v_revisi_anggaran_Sisa_Dana_28Baru29" class="v_revisi_anggaran_Sisa_Dana_28Baru29">
<span<?php echo $v_revisi_anggaran->Sisa_Dana_28Baru29->viewAttributes() ?>>
<?php echo $v_revisi_anggaran->Sisa_Dana_28Baru29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v_revisi_anggaran_list->ListOptions->render("body", "right", $v_revisi_anggaran_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$v_revisi_anggaran->isGridAdd())
		$v_revisi_anggaran_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$v_revisi_anggaran->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v_revisi_anggaran_list->Recordset)
	$v_revisi_anggaran_list->Recordset->Close();
?>
<?php if (!$v_revisi_anggaran->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v_revisi_anggaran->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($v_revisi_anggaran_list->Pager)) $v_revisi_anggaran_list->Pager = new PrevNextPager($v_revisi_anggaran_list->StartRec, $v_revisi_anggaran_list->DisplayRecs, $v_revisi_anggaran_list->TotalRecs, $v_revisi_anggaran_list->AutoHidePager) ?>
<?php if ($v_revisi_anggaran_list->Pager->RecordCount > 0 && $v_revisi_anggaran_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($v_revisi_anggaran_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $v_revisi_anggaran_list->pageUrl() ?>start=<?php echo $v_revisi_anggaran_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($v_revisi_anggaran_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $v_revisi_anggaran_list->pageUrl() ?>start=<?php echo $v_revisi_anggaran_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $v_revisi_anggaran_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($v_revisi_anggaran_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $v_revisi_anggaran_list->pageUrl() ?>start=<?php echo $v_revisi_anggaran_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($v_revisi_anggaran_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $v_revisi_anggaran_list->pageUrl() ?>start=<?php echo $v_revisi_anggaran_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $v_revisi_anggaran_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($v_revisi_anggaran_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $v_revisi_anggaran_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $v_revisi_anggaran_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $v_revisi_anggaran_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v_revisi_anggaran_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v_revisi_anggaran_list->TotalRecs == 0 && !$v_revisi_anggaran->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v_revisi_anggaran_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v_revisi_anggaran_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$v_revisi_anggaran->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$v_revisi_anggaran_list->terminate();
?>
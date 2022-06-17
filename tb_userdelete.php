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
$tb_user_delete = new tb_user_delete();

// Run the page
$tb_user_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_user_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_userdelete = currentForm = new ew.Form("ftb_userdelete", "delete");

// Form_CustomValidate event
ftb_userdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_userdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_userdelete.lists["x_role"] = <?php echo $tb_user_delete->role->Lookup->toClientList() ?>;
ftb_userdelete.lists["x_role"].options = <?php echo JsonEncode($tb_user_delete->role->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_user_delete->showPageHeader(); ?>
<?php
$tb_user_delete->showMessage();
?>
<form name="ftb_userdelete" id="ftb_userdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_user_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_user_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_user">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_user_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_user->username->Visible) { // username ?>
		<th class="<?php echo $tb_user->username->headerCellClass() ?>"><span id="elh_tb_user_username" class="tb_user_username"><?php echo $tb_user->username->caption() ?></span></th>
<?php } ?>
<?php if ($tb_user->password->Visible) { // password ?>
		<th class="<?php echo $tb_user->password->headerCellClass() ?>"><span id="elh_tb_user_password" class="tb_user_password"><?php echo $tb_user->password->caption() ?></span></th>
<?php } ?>
<?php if ($tb_user->role->Visible) { // role ?>
		<th class="<?php echo $tb_user->role->headerCellClass() ?>"><span id="elh_tb_user_role" class="tb_user_role"><?php echo $tb_user->role->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_user_delete->RecCnt = 0;
$i = 0;
while (!$tb_user_delete->Recordset->EOF) {
	$tb_user_delete->RecCnt++;
	$tb_user_delete->RowCnt++;

	// Set row properties
	$tb_user->resetAttributes();
	$tb_user->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_user_delete->loadRowValues($tb_user_delete->Recordset);

	// Render row
	$tb_user_delete->renderRow();
?>
	<tr<?php echo $tb_user->rowAttributes() ?>>
<?php if ($tb_user->username->Visible) { // username ?>
		<td<?php echo $tb_user->username->cellAttributes() ?>>
<span id="el<?php echo $tb_user_delete->RowCnt ?>_tb_user_username" class="tb_user_username">
<span<?php echo $tb_user->username->viewAttributes() ?>>
<?php echo $tb_user->username->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_user->password->Visible) { // password ?>
		<td<?php echo $tb_user->password->cellAttributes() ?>>
<span id="el<?php echo $tb_user_delete->RowCnt ?>_tb_user_password" class="tb_user_password">
<span<?php echo $tb_user->password->viewAttributes() ?>>
<?php echo $tb_user->password->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_user->role->Visible) { // role ?>
		<td<?php echo $tb_user->role->cellAttributes() ?>>
<span id="el<?php echo $tb_user_delete->RowCnt ?>_tb_user_role" class="tb_user_role">
<span<?php echo $tb_user->role->viewAttributes() ?>>
<?php echo $tb_user->role->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_user_delete->Recordset->moveNext();
}
$tb_user_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_user_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_user_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_user_delete->terminate();
?>
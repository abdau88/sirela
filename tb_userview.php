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
$tb_user_view = new tb_user_view();

// Run the page
$tb_user_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_user_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_user->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_userview = currentForm = new ew.Form("ftb_userview", "view");

// Form_CustomValidate event
ftb_userview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_userview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_userview.lists["x_role"] = <?php echo $tb_user_view->role->Lookup->toClientList() ?>;
ftb_userview.lists["x_role"].options = <?php echo JsonEncode($tb_user_view->role->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_user->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_user_view->ExportOptions->render("body") ?>
<?php $tb_user_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_user_view->showPageHeader(); ?>
<?php
$tb_user_view->showMessage();
?>
<form name="ftb_userview" id="ftb_userview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_user_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_user_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_user">
<input type="hidden" name="modal" value="<?php echo (int)$tb_user_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_user->username->Visible) { // username ?>
	<tr id="r_username">
		<td class="<?php echo $tb_user_view->TableLeftColumnClass ?>"><span id="elh_tb_user_username"><?php echo $tb_user->username->caption() ?></span></td>
		<td data-name="username"<?php echo $tb_user->username->cellAttributes() ?>>
<span id="el_tb_user_username">
<span<?php echo $tb_user->username->viewAttributes() ?>>
<?php echo $tb_user->username->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_user->password->Visible) { // password ?>
	<tr id="r_password">
		<td class="<?php echo $tb_user_view->TableLeftColumnClass ?>"><span id="elh_tb_user_password"><?php echo $tb_user->password->caption() ?></span></td>
		<td data-name="password"<?php echo $tb_user->password->cellAttributes() ?>>
<span id="el_tb_user_password">
<span<?php echo $tb_user->password->viewAttributes() ?>>
<?php echo $tb_user->password->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_user->role->Visible) { // role ?>
	<tr id="r_role">
		<td class="<?php echo $tb_user_view->TableLeftColumnClass ?>"><span id="elh_tb_user_role"><?php echo $tb_user->role->caption() ?></span></td>
		<td data-name="role"<?php echo $tb_user->role->cellAttributes() ?>>
<span id="el_tb_user_role">
<span<?php echo $tb_user->role->viewAttributes() ?>>
<?php echo $tb_user->role->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tb_user_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_user->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_user_view->terminate();
?>
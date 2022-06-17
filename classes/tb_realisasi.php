<?php
namespace PHPMaker2019\project1;

/**
 * Table class for tb_realisasi
 */
class tb_realisasi extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $kode_realisasi;
	public $kode_unit;
	public $kode_akun;
	public $tahun;
	public $pagu;
	public $realisasi;
	public $sisa_dana;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'tb_realisasi';
		$this->TableName = 'tb_realisasi';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`tb_realisasi`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// kode_realisasi
		$this->kode_realisasi = new DbField('tb_realisasi', 'tb_realisasi', 'x_kode_realisasi', 'kode_realisasi', '`kode_realisasi`', '`kode_realisasi`', 3, -1, FALSE, '`kode_realisasi`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->kode_realisasi->IsAutoIncrement = TRUE; // Autoincrement field
		$this->kode_realisasi->IsPrimaryKey = TRUE; // Primary key field
		$this->kode_realisasi->Sortable = TRUE; // Allow sort
		$this->kode_realisasi->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['kode_realisasi'] = &$this->kode_realisasi;

		// kode_unit
		$this->kode_unit = new DbField('tb_realisasi', 'tb_realisasi', 'x_kode_unit', 'kode_unit', '`kode_unit`', '`kode_unit`', 3, -1, FALSE, '`kode_unit`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kode_unit->Sortable = TRUE; // Allow sort
		$this->kode_unit->Lookup = new Lookup('kode_unit', 'tb_unit', FALSE, 'kode_unit', ["unit_kerja","","",""], [], [], [], [], [], [], '', '');
		$this->kode_unit->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['kode_unit'] = &$this->kode_unit;

		// kode_akun
		$this->kode_akun = new DbField('tb_realisasi', 'tb_realisasi', 'x_kode_akun', 'kode_akun', '`kode_akun`', '`kode_akun`', 200, -1, FALSE, '`kode_akun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->kode_akun->Sortable = TRUE; // Allow sort
		$this->kode_akun->Lookup = new Lookup('kode_akun', 'tb_kegiatan', FALSE, 'kode_kegiatan', ["nama_kegiatan","","",""], [], [], [], [], [], [], '', '');
		$this->fields['kode_akun'] = &$this->kode_akun;

		// tahun
		$this->tahun = new DbField('tb_realisasi', 'tb_realisasi', 'x_tahun', 'tahun', '`tahun`', '`tahun`', 200, -1, FALSE, '`tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->tahun->Sortable = TRUE; // Allow sort
		$this->tahun->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->tahun->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->tahun->Lookup = new Lookup('tahun', 'tb_realisasi', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->tahun->OptionCount = 1;
		$this->tahun->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tahun'] = &$this->tahun;

		// pagu
		$this->pagu = new DbField('tb_realisasi', 'tb_realisasi', 'x_pagu', 'pagu', '`pagu`', '`pagu`', 3, -1, FALSE, '`pagu`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->pagu->Sortable = TRUE; // Allow sort
		$this->pagu->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['pagu'] = &$this->pagu;

		// realisasi
		$this->realisasi = new DbField('tb_realisasi', 'tb_realisasi', 'x_realisasi', 'realisasi', '`realisasi`', '`realisasi`', 3, -1, FALSE, '`realisasi`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->realisasi->Sortable = TRUE; // Allow sort
		$this->realisasi->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['realisasi'] = &$this->realisasi;

		// sisa_dana
		$this->sisa_dana = new DbField('tb_realisasi', 'tb_realisasi', 'x_sisa_dana', 'sisa_dana', '`sisa_dana`', '`sisa_dana`', 3, -1, FALSE, '`sisa_dana`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sisa_dana->Sortable = TRUE; // Allow sort
		$this->sisa_dana->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sisa_dana'] = &$this->sisa_dana;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`tb_realisasi`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->kode_realisasi->setDbValue($conn->insert_ID());
			$rs['kode_realisasi'] = $this->kode_realisasi->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('kode_realisasi', $rs))
				AddFilter($where, QuotedName('kode_realisasi', $this->Dbid) . '=' . QuotedValue($rs['kode_realisasi'], $this->kode_realisasi->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->kode_realisasi->DbValue = $row['kode_realisasi'];
		$this->kode_unit->DbValue = $row['kode_unit'];
		$this->kode_akun->DbValue = $row['kode_akun'];
		$this->tahun->DbValue = $row['tahun'];
		$this->pagu->DbValue = $row['pagu'];
		$this->realisasi->DbValue = $row['realisasi'];
		$this->sisa_dana->DbValue = $row['sisa_dana'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`kode_realisasi` = @kode_realisasi@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('kode_realisasi', $row) ? $row['kode_realisasi'] : NULL) : $this->kode_realisasi->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@kode_realisasi@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "tb_realisasilist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "tb_realisasiview.php")
			return $Language->phrase("View");
		elseif ($pageName == "tb_realisasiedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "tb_realisasiadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "tb_realisasilist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("tb_realisasiview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("tb_realisasiview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "tb_realisasiadd.php?" . $this->getUrlParm($parm);
		else
			$url = "tb_realisasiadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("tb_realisasiedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("tb_realisasiadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("tb_realisasidelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "kode_realisasi:" . JsonEncode($this->kode_realisasi->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->kode_realisasi->CurrentValue != NULL) {
			$url .= "kode_realisasi=" . urlencode($this->kode_realisasi->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {
			if (Param("kode_realisasi") !== NULL)
				$arKeys[] = Param("kode_realisasi");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->kode_realisasi->CurrentValue = $key;
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->kode_realisasi->setDbValue($rs->fields('kode_realisasi'));
		$this->kode_unit->setDbValue($rs->fields('kode_unit'));
		$this->kode_akun->setDbValue($rs->fields('kode_akun'));
		$this->tahun->setDbValue($rs->fields('tahun'));
		$this->pagu->setDbValue($rs->fields('pagu'));
		$this->realisasi->setDbValue($rs->fields('realisasi'));
		$this->sisa_dana->setDbValue($rs->fields('sisa_dana'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// kode_realisasi
		// kode_unit
		// kode_akun
		// tahun
		// pagu
		// realisasi
		// sisa_dana
		// kode_realisasi

		$this->kode_realisasi->ViewValue = $this->kode_realisasi->CurrentValue;
		$this->kode_realisasi->ViewCustomAttributes = "";

		// kode_unit
		$this->kode_unit->ViewValue = $this->kode_unit->CurrentValue;
		$curVal = strval($this->kode_unit->CurrentValue);
		if ($curVal <> "") {
			$this->kode_unit->ViewValue = $this->kode_unit->lookupCacheOption($curVal);
			if ($this->kode_unit->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`kode_unit`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->kode_unit->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->kode_unit->ViewValue = $this->kode_unit->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->kode_unit->ViewValue = $this->kode_unit->CurrentValue;
				}
			}
		} else {
			$this->kode_unit->ViewValue = NULL;
		}
		$this->kode_unit->ViewCustomAttributes = "";

		// kode_akun
		$this->kode_akun->ViewValue = $this->kode_akun->CurrentValue;
		$curVal = strval($this->kode_akun->CurrentValue);
		if ($curVal <> "") {
			$this->kode_akun->ViewValue = $this->kode_akun->lookupCacheOption($curVal);
			if ($this->kode_akun->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`kode_kegiatan`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->kode_akun->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->kode_akun->ViewValue = $this->kode_akun->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->kode_akun->ViewValue = $this->kode_akun->CurrentValue;
				}
			}
		} else {
			$this->kode_akun->ViewValue = NULL;
		}
		$this->kode_akun->ViewCustomAttributes = "";

		// tahun
		if (strval($this->tahun->CurrentValue) <> "") {
			$this->tahun->ViewValue = $this->tahun->optionCaption($this->tahun->CurrentValue);
		} else {
			$this->tahun->ViewValue = NULL;
		}
		$this->tahun->ViewCustomAttributes = "";

		// pagu
		$this->pagu->ViewValue = $this->pagu->CurrentValue;
		$this->pagu->ViewValue = FormatNumber($this->pagu->ViewValue, 0, -2, -2, -2);
		$this->pagu->ViewCustomAttributes = "";

		// realisasi
		$this->realisasi->ViewValue = $this->realisasi->CurrentValue;
		$this->realisasi->ViewValue = FormatNumber($this->realisasi->ViewValue, 0, -2, -2, -2);
		$this->realisasi->ViewCustomAttributes = "";

		// sisa_dana
		$this->sisa_dana->ViewValue = $this->sisa_dana->CurrentValue;
		$this->sisa_dana->ViewValue = FormatNumber($this->sisa_dana->ViewValue, 0, -2, -2, -2);
		$this->sisa_dana->ViewCustomAttributes = "";

		// kode_realisasi
		$this->kode_realisasi->LinkCustomAttributes = "";
		$this->kode_realisasi->HrefValue = "";
		$this->kode_realisasi->TooltipValue = "";

		// kode_unit
		$this->kode_unit->LinkCustomAttributes = "";
		$this->kode_unit->HrefValue = "";
		$this->kode_unit->TooltipValue = "";

		// kode_akun
		$this->kode_akun->LinkCustomAttributes = "";
		$this->kode_akun->HrefValue = "";
		$this->kode_akun->TooltipValue = "";

		// tahun
		$this->tahun->LinkCustomAttributes = "";
		$this->tahun->HrefValue = "";
		$this->tahun->TooltipValue = "";

		// pagu
		$this->pagu->LinkCustomAttributes = "";
		$this->pagu->HrefValue = "";
		$this->pagu->TooltipValue = "";

		// realisasi
		$this->realisasi->LinkCustomAttributes = "";
		$this->realisasi->HrefValue = "";
		$this->realisasi->TooltipValue = "";

		// sisa_dana
		$this->sisa_dana->LinkCustomAttributes = "";
		$this->sisa_dana->HrefValue = "";
		$this->sisa_dana->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// kode_realisasi
		$this->kode_realisasi->EditAttrs["class"] = "form-control";
		$this->kode_realisasi->EditCustomAttributes = "";
		$this->kode_realisasi->EditValue = $this->kode_realisasi->CurrentValue;
		$this->kode_realisasi->ViewCustomAttributes = "";

		// kode_unit
		$this->kode_unit->EditAttrs["class"] = "form-control";
		$this->kode_unit->EditCustomAttributes = "";
		$this->kode_unit->EditValue = $this->kode_unit->CurrentValue;
		$this->kode_unit->PlaceHolder = RemoveHtml($this->kode_unit->caption());

		// kode_akun
		$this->kode_akun->EditAttrs["class"] = "form-control";
		$this->kode_akun->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->kode_akun->CurrentValue = HtmlDecode($this->kode_akun->CurrentValue);
		$this->kode_akun->EditValue = $this->kode_akun->CurrentValue;
		$this->kode_akun->PlaceHolder = RemoveHtml($this->kode_akun->caption());

		// tahun
		$this->tahun->EditAttrs["class"] = "form-control";
		$this->tahun->EditCustomAttributes = "";
		$this->tahun->EditValue = $this->tahun->options(TRUE);

		// pagu
		$this->pagu->EditAttrs["class"] = "form-control";
		$this->pagu->EditCustomAttributes = "";
		$this->pagu->EditValue = $this->pagu->CurrentValue;
		$this->pagu->PlaceHolder = RemoveHtml($this->pagu->caption());

		// realisasi
		$this->realisasi->EditAttrs["class"] = "form-control";
		$this->realisasi->EditCustomAttributes = "";
		$this->realisasi->EditValue = $this->realisasi->CurrentValue;
		$this->realisasi->PlaceHolder = RemoveHtml($this->realisasi->caption());

		// sisa_dana
		$this->sisa_dana->EditAttrs["class"] = "form-control";
		$this->sisa_dana->EditCustomAttributes = "";
		$this->sisa_dana->EditValue = $this->sisa_dana->CurrentValue;
		$this->sisa_dana->PlaceHolder = RemoveHtml($this->sisa_dana->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->kode_unit);
					$doc->exportCaption($this->kode_akun);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->pagu);
					$doc->exportCaption($this->realisasi);
					$doc->exportCaption($this->sisa_dana);
				} else {
					$doc->exportCaption($this->kode_realisasi);
					$doc->exportCaption($this->kode_unit);
					$doc->exportCaption($this->kode_akun);
					$doc->exportCaption($this->tahun);
					$doc->exportCaption($this->pagu);
					$doc->exportCaption($this->realisasi);
					$doc->exportCaption($this->sisa_dana);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->kode_unit);
						$doc->exportField($this->kode_akun);
						$doc->exportField($this->tahun);
						$doc->exportField($this->pagu);
						$doc->exportField($this->realisasi);
						$doc->exportField($this->sisa_dana);
					} else {
						$doc->exportField($this->kode_realisasi);
						$doc->exportField($this->kode_unit);
						$doc->exportField($this->kode_akun);
						$doc->exportField($this->tahun);
						$doc->exportField($this->pagu);
						$doc->exportField($this->realisasi);
						$doc->exportField($this->sisa_dana);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
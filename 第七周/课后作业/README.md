### CustomFormatter的使用
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E4%B8%83%E5%91%A8/%E8%AF%BE%E5%90%8E%E4%BD%9C%E4%B8%9A/cm%E7%BB%83%E4%B9%A0.png)

### Jqgrid 练习 inline editing
```
<!DOCTYPE html>

<html lang="en">
<head>
    <!-- The jQuery library is a prerequisite for all jqSuite products -->
    <script type="text/ecmascript" src="js/jquery.min.js"></script> 
    <!-- We support more than 40 localizations -->
    <script type="text/ecmascript" src="js/i18n/grid.locale-en.js"></script>
    <!-- This is the Javascript file of jqGrid -->   
    <script type="text/ecmascript" src="js/jquery.jqGrid.min.js"></script>
    <!-- A link to a Boostrap  and jqGrid Bootstrap CSS siles-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid-bootstrap.css" />
	<script>
		$.jgrid.defaults.width = 780;
		$.jgrid.defaults.responsive = true;
		$.jgrid.defaults.styleUI = 'Bootstrap';
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta charset="utf-8" />
    <title>jqGrid Loading Data - Inline Editing with on Row Click</title>
</head>
<body>
<div style="margin-left:20px">
    <table id="jqGrid"></table>
    <div id="jqGridPager"></div>
</div>
    <script type="text/javascript">

        $(document).ready(function () {
            $("#jqGrid").jqGrid({
                url: 'data.json',
                editurl: 'clientArray',
                datatype: "json",
                colModel: [
                    {
						label: "Employee ID",
                        name: 'EmployeeID',
                        width: 75
                    },
                    {
						label: "First Name",
                        name: 'FirstName',
                        width: 140,
                        editable: true // must set editable to true if you want to make the field editable
                    },
                    {
						label: "Last Name",
                        name: 'LastName',
                        width: 100,
                        editable: true
                    },
                    {
						label : "City",
                        name: 'City',
                        width: 120,
                        editable: true
                    }
                ],
				sortname: 'EmployeeID',
				loadonce : true,
				viewrecords: true,
                onSelectRow: editRow, // the javascript function to call on row click. will ues to to put the row in edit mode
                width: 780,
                height: 200,
                rowNum: 10,
                pager: "#jqGridPager"
            });
            var lastSelection;

            function editRow(id) {
                if (id && id !== lastSelection) {
                    var grid = $("#jqGrid");
                    grid.jqGrid('restoreRow',lastSelection);
                    grid.jqGrid('editRow',id, {keys: true} );
                    lastSelection = id;
                }
            } 
        });

    </script>  
</body>
</html>
```
![image]()

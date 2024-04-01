<script src="js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

<!-- Flot Charts JavaScript -->
<!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
<script src="js/plugins/flot/jquery.flot.js"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/plugins/flot/jquery.flot.resize.js"></script>
<script src="js/plugins/flot/jquery.flot.pie.js"></script>
<script src="js/plugins/flot/flot-data.js"></script>

<!-- Page-Level Plugin Scripts - Tables -->
<script src="datatables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="../datatables/datatables.min.js"></script>
<!-- tooltip -->
<script>
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
</script>

<!-- generate datatable on our table -->
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

</body>

</html>


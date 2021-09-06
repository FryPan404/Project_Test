
            <main>

<div class="cards">
  
    <table id="table" width="100%" border="1">
        <thead>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            
        </thead>
        <tbody>
            
        </tbody>
        <tfoot>                            
        </tfoot>
    </table>
</div>
</div>
</main>
<footer class="footer text-center"> 2021 © FryPan Admin brought to you by 
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets/plugins/bower_components/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?= base_url('assets/js/app-style-switcher.js')?>"></script>
    <script src="<?= base_url('assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/js/sidebarmenu.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/js/custom.js')?>"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?= base_url('assets/plugins/bower_components/chartist/dist/chartist.min.js')?>"></script>
    <script src="<?= base_url('assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')?>"></script>
    <script src="<?= base_url('assets/js/pages/dashboards/dashboard1.js')?>"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


<script type="text/javascript">

var table;

$(document).ready(function() {
LoadData();


});

function LoadData(){
$('#table').DataTable({
"pageLength": 25,

"processing": true, //Feature control the processing indicator.
"serverSide": true, //Feature control DataTables' server-side processing mode.
"destroy": true,
"order": [], //Initial no order.

// Load data for the table's content from an Ajax source
"ajax": {
"url": "<?php echo base_url('siswa/ajax_list')?>",
"type": "POST"
}, 
//Set column definition initialisation properties.
"columnDefs": [
{ 
"targets": [ 0 ], //first column / numbering column
"orderable": false, //set not orderable
},
], 
});
}

</script>
</body>

</html>


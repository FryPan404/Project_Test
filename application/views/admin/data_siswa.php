
            <main>

                <div class="cards">
                  <div>
                    <Button class="btn btn-primary btn-add">Add</Button>
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a href="<?= base_url('admin/excel') ?>" class="dropdown-item">EXCEL</a>
                       <a class="dropdown-item" href="<?= base_url('admin/pdf') ?>">PDF</a>
                      </div>
                    
                  </div>
                    <table id="table" width="100%" border="1">
                        <thead>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Option</th>
                            
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <tfoot>                            
                        </tfoot>
                    </table>
            </div>

            
                </div>
            </main>
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="edit-form" id="form"> 
      <div class="modal-body">
            <div class="form-group">
              <label>NIM</label>
              <input type="number" id="reg_number" name="reg_number" class="form-control" required="true">
              <input type="hidden" id="id" name="id">
            </div>
            <div class="form-group">
              <label>NAMA</label>
              <input type="text" id="name" name="name" class="form-control" required="true">
            </div>
            <div class="form-group">
              <label>KELAS</label>
              <input type="text" id="class" name="class" class="form-control" required="true">
            </div>
            <div class="form-group">
              <label>JURUSAN</label>
              <input type="text" id="major" name="major" class="form-control" required="true">
            </div>
            
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="add-form" id="form-add"> 
      <div class="modal-body">
            <div class="form-group">
              <label>NIM</label>
              <input type="number" id="reg_number" name="reg_number" class="form-control" required="true">
              
            </div>
            <div class="form-group">
              <label>NAMA</label>
              <input type="text" id="name" name="name" class="form-control" required="true">
            </div>
            <div class="form-group">
              <label>KELAS</label>
              <input type="text" id="class" name="class" class="form-control" required="true">
            </div>
            <div class="form-group">
              <label>JURUSAN</label>
              <input type="text" id="major" name="major" class="form-control" required="true">
            </div>
            
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-add" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="edit-form" id="form-delete"> 
      <div class="modal-body">
            <div class="form-group">
             Yakin Ingin Menghapus?
              <input type="hidden" id="id_mhs" name="id_mhs" class="form-control" required="true">
              <input type="hidden" id="nim" name="nim">
            </div>
            
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete-btn" data-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
</div>



        
      </div>
    </div>
  </div>
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
            "url": "<?php echo base_url('admin/ajax_list')?>",
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

$('#table').delegate('.btn-edit','click', function(){
    var id = $(this).attr('data-id');
    var reg_number = $(this).attr('data-reg_number');
    var name = $(this).attr('data-name');
    var kelas = $(this).attr('data-class');
    var major = $(this).attr('data-major');
    // alert(id);
    $('#staticBackdrop').modal();
    $('#id').val(id);
    $('#reg_number').val(reg_number);
    $('#name').val(name);
    $('#class').val(kelas);
    $('#major').val(major);
   
});
$('#save').click(function(){
    var data = $('#form').serialize();
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url('admin/edit') ?>",
        data: data,
        success: function(){
            LoadData();
        }
    });
});

$('.btn-add').on('click',function(){
  $('#modal-add').modal();
});

$('#save-add').click(function(){
  var data = $('#form-add').serialize();
  $.ajax({
    type: 'POST',
    url: "<?php echo base_url('admin/add') ?>",
    data: data,
    success: function(data){
            // LoadData();
            console.log(data);
            if(data == '1'){
              LoadData();
              alert('sukses');
            }else{
              alert('gagal');
            }
        }
  });
});

$('#table').delegate('.btn-delete','click', function(){
    var id = $(this).attr('data-id');
    var nim = $(this).attr('data-reg_number')
    $('#modal-delete').modal();
    $('#id_mhs').val(id);
    $('#nim').val(nim)
 
   
});

$('#delete-btn').click(function(){
  var data = $('#form-delete').serialize();
  $.ajax({
    
    type: 'POST',
    url: "<?php echo base_url('admin/delete') ?>",
    data: data,
    success: function(data){

            LoadData();
        }
  });
});





</script>
</body>

</html>
        

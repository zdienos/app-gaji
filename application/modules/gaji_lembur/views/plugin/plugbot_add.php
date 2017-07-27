<!-- Selecet2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
<script type="text/javascript">
  $(function(){
    //Initialize Select2 Elements
    $(".select2").select2();

    $("#jabatan").change(function(){
    var jabatan = $("#jabatan").val();
      $.ajax({
         type : "POST",
         url  : "<?php echo site_url('Gaji_lembur/get_ajax_nik'); ?>",
         data : "jabatan=" + jabatan,
         success: function(data){
           $("#nik").html(data);
         }
      });
    });

    $("#jenis_lembur").change(function(){
    var jenis_lembur = $("#jenis_lembur").val();
      $.ajax({
         type : "POST",
         url  : "<?php echo site_url('Gaji_lembur/get_ajax_jamlembur'); ?>",
         data : "jenis_lembur=" + jenis_lembur,
         success: function(data){
           $("#jam_lembur").html(data);
         }
      });
    });
  });

  //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  format: 'dd/mm/yyyy',
	  language: 'id'
    });
</script>

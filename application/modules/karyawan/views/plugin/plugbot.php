<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
<script type="text/javascript">
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true,
  format: 'dd/mm/yyyy',
  language: 'id'
  });

  function kurang() {
    var firstValue = document.getElementById('berat_mobil').value;
    var secondValue = document.getElementById('total_berat').value;
    var result = parseInt(secondValue) - parseInt(firstValue);
    if (!isNaN(result)) {
      $('#berat_bersih').text(result);
    }
  }
</script>

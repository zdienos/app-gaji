<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#gaji').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
});
</script>

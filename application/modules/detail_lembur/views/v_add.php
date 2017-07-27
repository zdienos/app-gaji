<!-- Main content -->
<section class="content" style="margin:10% 0 13% 0">
  <h2 style="text-align:center;"><i class="fa fa-plus-square text-yellow"></i> Input Data Detail Lembur</h2>
  <br>
  <div class="box box-default">
    <div class="box-body">
      <!-- form start -->
      <form role="form" method="post" action="<?php echo site_url("Detail_lembur/add"); ?>" >
          <div class="box-body">
              <div class="container-fuild">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3 col-sm-12">
                          <?php if(!empty($error)) : echo error_alert($error); endif;?>
                          <br>
                          <div class="form-group <?php if(form_error('kode_lembur')){echo "has-error";} ?>">
                              <label for="kode_lembur">Kode Lembur</label>
                              <input type="text" name="kode_lembur" min="1" class="form-control" id="kode_lembur" value="<?php echo set_value('kode_lembur') ?>" placeholder="Kode Lembur">
                              <?php if(form_error('kode_lembur')){echo '<span class="control-label" for="kode_lembur">'.form_error('kode_lembur').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('keterangan_lembur')){echo "has-error";} ?>">
                              <label for="keterangan_lembur">keterangan Lembur</label>
                              <textarea name="keterangan_lembur" class="form-control" rows="8" cols="80" placeholder="keterangan Lembur"><?php echo set_value("keterangan_lembur"); ?></textarea>
                              <?php if(form_error('keterangan_lembur')){echo '<span class="control-label" for="keterangan_lembur">'.form_error('keterangan_lembur').'</span>';} ?>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
          <!-- /.box-body -->

          <div class="box-header">
            <div class="container-fuild">
              <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12" style="padding-bottom:30px; text-align:right;">
                  <input type="submit" name="btn_add" class="btn btn-primary" value="Simpan">
                  &nbsp;
                  <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Detail_lembur");?>'"><span class="fa fa-times"></span> Batal</button>
                </div>
              </div>
            </div>
          </div>
      </form>
      <!-- /.box -->
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->

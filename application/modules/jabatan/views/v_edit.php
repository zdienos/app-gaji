<!-- Main content -->
<section class="content" style="margin:10% 0 13% 0">
  <h2 style="text-align:center;"><i class="fa fa-edit text-yellow"></i> Detail Data jabatan</h2>
  <br>
  <div class="box box-default">
    <div class="box-body">
      <!-- form start -->
      <form role="form" method="post" action="<?php echo site_url("Jabatan/detail/".md5(sha1($detail->id_jabatan))); ?>" >
          <div class="box-body">
              <div class="container-fuild">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3 col-sm-12">
                          <?php if(!empty($error)) : echo error_alert($error); endif;?>
                          <br>
                          <div class="form-group <?php if(form_error('nama_jabatan')){echo "has-error";} ?>">
                              <label for="nama_jabatan">Nama Jabatan</label>
                              <input type="text" name="nama_jabatan" min="1" class="form-control" id="nama_jabatan" value="<?php if($act == "0") echo $detail->nama_jabatan; if($act == "1") echo set_value('nama_jabatan') ?>" placeholder="Nama Jabatan">
                              <?php if(form_error('nama_jabatan')){echo '<span class="control-label" for="nama_jabatan">'.form_error('nama_jabatan').'</span>';} ?>
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
                  <input type="submit" name="btn_edit" class="btn btn-primary" value="Ubah">
                  &nbsp;
                  <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Jabatan");?>'"><span class="fa fa-times"></span> Batal</button>
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

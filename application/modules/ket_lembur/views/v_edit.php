<!-- Main content -->
<section class="content" style="margin:10% 0 13% 0">
  <h2 style="text-align:center;"><i class="fa fa-edit text-yellow"></i> Detail Data Keterangan Lembur</h2>
  <br>
  <div class="box box-default">
    <div class="box-body">
      <!-- form start -->
      <form role="form" method="post" action="<?php echo site_url("Ket_lembur/detail/".md5(sha1($detail->id_ket_lembur))); ?>" >
          <div class="box-body">
              <div class="container-fuild">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3 col-sm-12">
                          <?php if(!empty($error)) : echo error_alert($error); endif;?>

                          <div class="form-group <?php if(form_error('jenis_lembur')){echo "has-error";} ?>">
                              <label for="jenis_lembur">Jenis Lembur</label><br>
                              <select class="form-control select2" name="jenis_lembur" id="jenis_lembur" style="width: 100%;">
                                  <option value="" >- Pilih -</option>
                                  <?php
                                    foreach($detail_lembur as $masters_jenis_lembur)
                                      {
                                  ?>
                                  <option <?php if (!(strcmp($detail->jenis_lembur_id,"$masters_jenis_lembur->id_detail_lembur"))) {echo "selected=\"selected\"";} ?> value="<?php echo $masters_jenis_lembur->id_detail_lembur;?>"<?php echo $detail->jenis_lembur_id ?>><?php echo $masters_jenis_lembur->kode_lembur;?></option>
                                  <?php
                                      }
                                  ?>
                              </select>
                              <?php if(form_error('jenis_lembur')){echo '<span class="control-label" for="jenis_lembur">'.form_error('jenis_lembur').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('jam_lembur')){echo "has-error";} ?>">
                              <label for="jam_lembur">Jam lembur</label>
                              <input type="text" name="jam_lembur" class="form-control" id="jam_lembur" value="<?php if($act == "0") echo $detail->jam_lembur; if($act == "1") echo set_value('jam_lembur') ?>" placeholder="Jam Lembur">
                              <?php if(form_error('jam_lembur')){echo '<span class="control-label" for="jam_lembur">'.form_error('jam_lembur').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('upah_lembur')){echo "has-error";} ?>">
                              <label for="upah_lembur">Upah Lembur</label>
                              <input type="text" name="upah_lembur" class="form-control" id="upah_lembur" value="<?php if($act == "0") echo $detail->upah_lembur; if($act == "1") echo set_value('upah_lembur') ?>" placeholder="Upah Lembur">
                              <?php if(form_error('upah_lembur')){echo '<span class="control-label" for="upah_lembur">'.form_error('upah_lembur').'</span>';} ?>
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
                  <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Ket_lembur");?>'"><span class="fa fa-times"></span> Batal</button>
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

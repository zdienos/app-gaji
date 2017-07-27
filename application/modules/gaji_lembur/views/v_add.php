<!-- Main content -->
<section class="content" style="margin:10% 0 13% 0">
  <h2 style="text-align:center;"><i class="fa fa-plus-square text-yellow"></i> Input Data Lembur</h2>
  <br>
  <div class="box box-default">
    <div class="box-body">
      <!-- form start -->
      <form role="form" method="post" action="<?php echo site_url("Gaji_lembur/add"); ?>" >
          <div class="box-body">
              <div class="container-fuild">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3 col-sm-12">
                          <?php if(!empty($error)) : echo error_alert($error); endif;?>
                          <div class="form-group <?php if(form_error('jabatan')){echo "has-error";} ?>">
                              <label for="jabatan">Jabatan</label><br>
                              <select class="form-control" name="jabatan" id="jabatan" style="width: 100%;">
                                  <option value="" >- Pilih -</option>
                                  <?php
                                    foreach($master_jabatan as $masters_jabatan)
                                      {
                                  ?>
                                  <option <?php if (!(strcmp(set_value("jabatan"),"$masters_jabatan->id_jabatan"))) {echo "selected=\"selected\"";} ?> value="<?php echo $masters_jabatan->id_jabatan;?>" ><?php echo $masters_jabatan->nama_jabatan;?></option>
                                  <?php
                                      }
                                  ?>
                              </select>
                              <?php if(form_error('jabatan')){echo '<span class="control-label" for="jabatan">'.form_error('jabatan').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('nik')){echo "has-error";} ?>">
                            <label for="nik">Nik</label><br>
                            <select class="form-control select2" name="nik" id="nik" style="width: 100%;">
                              <option value="" >- Pilih -</option>
                            </select>
                            <?php if(form_error('nik')){echo '<span class="control-label" for="nik">'.form_error('nik').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('jenis_lembur')){echo "has-error";} ?>">
                              <label for="jenis_lembur">Jenis lembur</label><br>
                              <select class="form-control" name="jenis_lembur" id="jenis_lembur" style="width: 100%;">
                                  <option value="" >- Pilih -</option>
                                  <?php
                                    foreach($master_jenis_lembur as $masters_jenis_lembur)
                                      {
                                  ?>
                                  <option <?php if (!(strcmp(set_value("jenis_lembur"),"$masters_jenis_lembur->id_detail_lembur"))) {echo "selected=\"selected\"";} ?> value="<?php echo $masters_jenis_lembur->id_detail_lembur;?>" ><?php echo $masters_jenis_lembur->kode_lembur;?></option>
                                  <?php
                                      }
                                  ?>
                              </select>
                              <?php if(form_error('jenis_lembur')){echo '<span class="control-label" for="jenis_lembur">'.form_error('jenis_lembur').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('jam_lembur')){echo "has-error";} ?>">
                            <label for="jam_lembur">Jam Lembur</label><br>
                            <select class="form-control select2" name="jam_lembur" id="jam_lembur" style="width: 100%;">
                              <option value="" >- Pilih -</option>
                            </select>
                            <?php if(form_error('jam_lembur')){echo '<span class="control-label" for="jam_lembur">'.form_error('jam_lembur').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('tanggal_lembur')){echo "has-error";} ?>">
                            <label>Tanggal Lembur</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tanggal_lembur" class="form-control pull-right" id="datepicker" value="<?php echo set_value('tanggal_lembur') ?>">
                            </div>
                            <?php if(form_error('tanggal_lembur')){echo '<span class="control-label" for="tanggal_lembur">'.form_error('tanggal_lembur').'</span>';} ?>
                            <!-- /.input group -->
                          </div>

                          <div class="form-group <?php if(form_error('keterangan')){echo "has-error";} ?>">
                              <label for="keterangan">keterangan</label>
                              <textarea name="keterangan" class="form-control" rows="8" cols="80" placeholder="keterangan Lembur"><?php echo set_value("keterangan"); ?></textarea>
                              <?php if(form_error('keterangan')){echo '<span class="control-label" for="keterangan">'.form_error('keterangan').'</span>';} ?>
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
                  <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Gaji_lembur");?>'"><span class="fa fa-times"></span> Batal</button>
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

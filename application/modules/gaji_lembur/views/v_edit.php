<!-- Main content -->
<section class="content" style="margin:10% 0 13% 0">
  <h2 style="text-align:center;"><i class="fa fa-edit text-yellow"></i> Detail Data Lembur</h2>
  <br>
  <div class="box box-default">
    <div class="box-body">
      <!-- form start -->
      <form role="form" method="post" action="<?php echo site_url("Gaji_lembur/detail/".md5(sha1($detail->id_gaji_lembur))); ?>" >
          <div class="box-body">
              <div class="container-fuild">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3 col-sm-12">
                          <?php if(!empty($error)) : echo error_alert($error); endif;?>
                          <div class="form-group <?php if(form_error('tanggal_lembur')){echo "has-error";} ?>">
                            <label>Tanggal Lembur</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                              </div>
                              <?php
                              $tgl = explode('-',$detail->tanggal_lembur);
                              $tanggal = $tgl[2].'/'.$tgl[1].'/'.$tgl[0];
                              ?>
                              <input type="text" name="tanggal_lembur" class="form-control pull-right" id="datepicker" value="<?php if($act == "0") echo $tanggal; if($act == "1") echo set_value('tanggal_lembur'); ?>">
                            </div>
                            <?php if(form_error('tanggal_lembur')){echo '<span class="control-label" for="tanggal_lembur">'.form_error('tanggal_lembur').'</span>';} ?>
                            <!-- /.input group -->
                          </div>

                          <fieldset disabled>
                          <div class="form-group">
                              <label for="level_jabatan">Nik</label>
                              <input type="text" class="form-control" id="nik_karyawan" value="<?php echo $detail->nik_karyawan; ?>" >
                          </div>
                          </fieldset>
                          <input type="hidden" name="nik" value="<?php echo $detail->nik_karyawan; ?>">
                          <fieldset disabled>
                          <div class="form-group">
                              <label for="level_jabatan">Nama Karyawan</label>
                              <input type="text" class="form-control" id="nama_karyawan" value="<?php echo $detail->nama_karyawan; ?>" >
                          </div>
                          </fieldset>

                          <fieldset disabled>
                          <div class="form-group">
                              <label for="level_jabatan">Jabatan</label>
                              <input type="text" class="form-control" id="nama_jabatan" value="<?php echo $detail->nama_jabatan; ?>" >
                          </div>
                          </fieldset>

                          <div class="form-group <?php if(form_error('jenis_lembur')){echo "has-error";} ?>">
                              <label for="jenis_lembur">Jenis Lembur</label><br>
                              <select class="form-control select2" name="jenis_lembur" id="jenis_lembur" style="width: 100%;">
                                  <option value="" >- Pilih -</option>
                                  <?php
                                    foreach($master_jenis_lembur as $masters_jenis_lembur)
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
                            <label for="jam_lembur">Jam Lembur</label><br>
                            <select class="form-control select2" name="jam_lembur" id="jam_lembur" style="width: 100%;">
                              <option value="" >- Pilih -</option>
                              <?php
                                foreach($master_ket_lembur as $masters_ket_lembur)
                                  {
                              ?>
                              <option <?php if (!(strcmp($detail->ket_lembur_id,"$masters_ket_lembur->id_ket_lembur"))) {echo "selected=\"selected\"";} ?> value="<?php echo $masters_ket_lembur->id_ket_lembur;?>"<?php echo $detail->ket_lembur_id ?>><?php echo $masters_ket_lembur->jam_lembur;?></option>
                              <?php
                                  }
                              ?>
                            </select>
                            <?php if(form_error('jam_lembur')){echo '<span class="control-label" for="jam_lembur">'.form_error('jam_lembur').'</span>';} ?>
                          </div>
                          <div class="form-group <?php if(form_error('keterangan')){echo "has-error";} ?>">
                              <label for="keterangan">keterangan</label>
                              <textarea name="keterangan" class="form-control" rows="8" cols="80" placeholder="keterangan lembur"><?php if($act == "0") echo $detail->keterangan; if($act == "1") echo set_value("keterangan"); ?></textarea>
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
                  <input type="submit" name="btn_edit" class="btn btn-primary" value="Ubah">
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

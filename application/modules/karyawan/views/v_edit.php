<!-- Main content -->
<section class="content" style="margin:10% 0 13% 0">
  <h2 style="text-align:center;"><i class="fa fa-edit text-yellow"></i> Detail Data Karyawan</h2>
  <br>
  <div class="box box-default">
    <div class="box-body">
      <!-- form start -->
      <form role="form" method="post" action="<?php echo site_url("Karyawan/detail/".md5(sha1($detail->nik))); ?>" >
          <div class="box-body">
              <div class="container-fuild">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3 col-sm-12">
                          <?php if(!empty($error)) : echo error_alert($error); endif;?>

                          <fieldset disabled>
                          <div class="form-group">
                              <label for="level_jabatan">Nik</label>
                              <input type="text" class="form-control" id="nik" value="<?php echo $detail->nik; ?>" >
                          </div>
                          </fieldset>

                          <div class="form-group <?php if(form_error('nama_karyawan')){echo "has-error";} ?>">
                              <label for="nama_karyawan">Nama Karayawan</label>
                              <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" value="<?php if($act == "0") echo $detail->nama_karyawan; if($act == "1") echo set_value('nama_karyawan') ?>" placeholder="Nama Karayawan">
                              <?php if(form_error('nama_karyawan')){echo '<span class="control-label" for="nama_karyawan">'.form_error('nama_karyawan').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('departemen')){echo "has-error";} ?>">
                              <label for="departemen">Departemen</label><br>
                              <select class="form-control select2" name="departemen" id="departemen" style="width: 100%;">
                                  <option value="" selected="selected">- Pilih -</option>
                                  <option <?php if (!(strcmp($detail->departemen,"1"))) {echo "selected=\"selected\"";} ?> value="1"<?php echo $detail->departemen; ?>>FA</option>
                                  <option <?php if (!(strcmp($detail->departemen,"2"))) {echo "selected=\"selected\"";} ?> value="2"<?php echo $detail->departemen; ?>>IT</option>
                                  <option <?php if (!(strcmp($detail->departemen,"3"))) {echo "selected=\"selected\"";} ?> value="3"<?php echo $detail->departemen; ?>>PDCA</option>
                                  <option <?php if (!(strcmp($detail->departemen,"4"))) {echo "selected=\"selected\"";} ?> value="4"<?php echo $detail->departemen; ?>>HCS</option>
                                  <option <?php if (!(strcmp($detail->departemen,"5"))) {echo "selected=\"selected\"";} ?> value="5"<?php echo $detail->departemen; ?>>PPI</option>
                                  <option <?php if (!(strcmp($detail->departemen,"6"))) {echo "selected=\"selected\"";} ?> value="6"<?php echo $detail->departemen; ?>>QAQC</option>
                                  <option <?php if (!(strcmp($detail->departemen,"7"))) {echo "selected=\"selected\"";} ?> value="7"<?php echo $detail->departemen; ?>>WAREHOUSE</option>
                                  <option <?php if (!(strcmp($detail->departemen,"8"))) {echo "selected=\"selected\"";} ?> value="8"<?php echo $detail->departemen; ?>>BOF</option>
                              </select>
                              <?php if(form_error('departemen')){echo '<span class="control-label" for="departemen">'.form_error('departemen').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('jabatan')){echo "has-error";} ?>">
                              <label for="jabatan">Jabatan</label><br>
                              <select class="form-control select2" name="jabatan" id="jabatan" style="width: 100%;">
                                  <option value="" selected="selected">- Pilih -</option>
                                  <?php
                                    foreach($master_jabatan as $masters_jabatan)
                                      {
                                  ?>
                                  <option <?php if (!(strcmp($detail->jabatan_id,"$masters_jabatan->id_jabatan"))) {echo "selected=\"selected\"";} ?> value="<?php echo $masters_jabatan->id_jabatan;?>"<?php echo $detail->jabatan_id ?>><?php echo $masters_jabatan->nama_jabatan;?></option>
                                  <?php
                                      }
                                  ?>
                              </select>
                              <?php if(form_error('jabatan')){echo '<span class="control-label" for="jabatan">'.form_error('jabatan').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('grid')){echo "has-error";} ?>">
                              <label for="grid">Grid</label>
                              <input type="number" name="grid" min="1" class="form-control" id="grid" value="<?php if ($act == "0") echo $detail->grid; if ($act == "1") echo set_value('grid'); ?>" placeholder="grid" onkeypress="return hanyaAngka(event, false)">
                              <?php if(form_error('grid')){echo '<span class="control-label" for="grid">'.form_error('grid').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('gaji')){echo "has-error";} ?>">
                              <label for="gaji">gaji</label>
                              <input type="text" name="gaji" class="form-control" id="gaji" value="<?php if($act == "0") echo $detail->gaji; if($act == "1") echo set_value('gaji'); ?>" onKeyPress="return hanyaAngka(event, false)" placeholder="gaji">
                              <?php if(form_error('gaji')){echo '<span class="control-label" for="gaji">'.form_error('gaji').'</span>';} ?>
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
                  <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Karyawan");?>'"><span class="fa fa-times"></span> Batal</button>
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

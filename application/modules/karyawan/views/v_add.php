<!-- Main content -->
<section class="content" style="margin:10% 0 13% 0">
  <h2 style="text-align:center;"><i class="fa fa-plus-square text-yellow"></i> Input Data Karyawan</h2>
  <br>
  <div class="box box-default">
    <div class="box-body">
      <!-- form start -->
      <form role="form" method="post" action="<?php echo site_url("Karyawan/add"); ?>" >
          <div class="box-body">
              <div class="container-fuild">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3 col-sm-12">
                          <?php if(!empty($error)) : echo error_alert($error); endif;?>
                          <div class="form-group <?php if(form_error('nik')){echo "has-error";} ?>">
                              <label for="nik">Nik</label>
                              <input type="text" name="nik" min="1" maxlength="10" class="form-control" id="nik" value="<?php echo set_value('nik') ?>" placeholder="Nik" onkeypress="return hanyaAngka(event, false)">
                              <?php if(form_error('nik')){echo '<span class="control-label" for="nik">'.form_error('nik').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('nama_karyawan')){echo "has-error";} ?>">
                              <label for="nama_karyawan">Nama Karyawan</label>
                              <input type="text" name="nama_karyawan" class="form-control" id="nama_karyawan" value="<?php echo set_value('nama_karyawan') ?>" placeholder="Nama Karyawan">
                              <?php if(form_error('nama_karyawan')){echo '<span class="control-label" for="nama_karyawan">'.form_error('nama_karyawan').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('departemen')){echo "has-error";} ?>">
                              <label for="departemen">Departemen</label><br>
                              <select class="form-control select2" name="departemen" id="departemen" style="width: 100%;">
                                  <option value="" >- Pilih -</option>
                                  <option <?php if (!(strcmp(set_value("departemen"),"1"))) {echo "selected=\"selected\"";} ?> value="1" >FA</option>
                                  <option <?php if (!(strcmp(set_value("departemen"),"2"))) {echo "selected=\"selected\"";} ?> value="2" >IT</option>
                                  <option <?php if (!(strcmp(set_value("departemen"),"3"))) {echo "selected=\"selected\"";} ?> value="3" >PDCA</option>
                                  <option <?php if (!(strcmp(set_value("departemen"),"4"))) {echo "selected=\"selected\"";} ?> value="4" >HCS</option>
                                  <option <?php if (!(strcmp(set_value("departemen"),"5"))) {echo "selected=\"selected\"";} ?> value="5" >PPI</option>
                                  <option <?php if (!(strcmp(set_value("departemen"),"6"))) {echo "selected=\"selected\"";} ?> value="6" >QAQC</option>
                                  <option <?php if (!(strcmp(set_value("departemen"),"7"))) {echo "selected=\"selected\"";} ?> value="7" >WAREHOUSE</option>
                                  <option <?php if (!(strcmp(set_value("departemen"),"8"))) {echo "selected=\"selected\"";} ?> value="8" >BOF</option>
                              </select>
                              <?php if(form_error('departemen')){echo '<span class="control-label" for="departemen">'.form_error('departemen').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('jabatan')){echo "has-error";} ?>">
                              <label for="jabatan">Jabatan</label><br>
                              <select class="form-control select2" name="jabatan" id="jabatan" style="width: 100%;">
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
                          <div class="form-group <?php if(form_error('grid')){echo "has-error";} ?>">
                              <label for="grid">Grid</label>
                              <input type="number" name="grid" min="1" class="form-control" id="grid" value="<?php echo set_value('grid') ?>" placeholder="grid" onkeypress="return hanyaAngka(event, false)">
                              <?php if(form_error('grid')){echo '<span class="control-label" for="grid">'.form_error('grid').'</span>';} ?>
                          </div>
                          <div class="form-group <?php if(form_error('gaji')){echo "has-error";} ?>">
                              <label for="gaji">Gaji</label>
                              <input type="text" name="gaji" class="form-control" id="gaji" value="<?php echo set_value('gaji') ?>" onKeyPress="return hanyaAngka(event, false)" placeholder="gaji">
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
                  <input type="submit" name="btn_add" class="btn btn-primary" value="Simpan">
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

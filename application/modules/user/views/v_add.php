<!-- Main content -->
<section class="content" style="margin:10% 0 13% 0">
  <h2 style="text-align:center;"><i class="fa fa-plus-square text-yellow"></i> Input Data User</h2>
  <br>
  <div class="box box-default">
    <div class="box-body">
      <!-- form start -->
      <form role="form" method="post" action="<?php echo site_url("User/add"); ?>" >
          <div class="box-body">
              <div class="container-fuild">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3 col-sm-12">
                          <?php if(!empty($error)) : echo error_alert($error); endif;?>
                          <br>
                          <div class="form-group <?php if(form_error('username')){echo "has-error";} ?>">
                              <label for="username">Username</label>
                              <input type="text" name="username" min="1" class="form-control" id="username" value="<?php echo set_value('username') ?>" placeholder="Username">
                              <?php if(form_error('username')){echo '<span class="control-label" for="username">'.form_error('username').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('password')){echo "has-error";} ?>">
                              <label for="password">Password</label>
                              <input type="password" name="password" min="1" class="form-control" id="password" value="<?php echo set_value('password') ?>" placeholder="Password">
                              <?php if(form_error('password')){echo '<span class="control-label" for="password">'.form_error('password').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('passconf')){echo "has-error";} ?>">
                              <label for="passconf">Confrim Password</label>
                              <input type="password" name="passconf" min="1" class="form-control" id="passconf" value="<?php echo set_value('passconf') ?>" placeholder="Ulangi Password">
                              <?php if(form_error('passconf')){echo '<span class="control-label" for="passconf">'.form_error('passconf').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('jabatan')){echo "has-error";} ?>">
                              <label for="jabatan">Jabatan</label><br>
                              <select class="form-control select2" name="jabatan" id="jabatan" style="width: 100%;">
                                  <option value="" >- Pilih -</option>
                                  <option <?php if (!(strcmp(set_value("jabatan"),"1"))) {echo "selected=\"selected\"";} ?> value="1" >Admin</option>
                                  <option <?php if (!(strcmp(set_value("jabatan"),"2"))) {echo "selected=\"selected\"";} ?> value="2" >User</option>
                              </select>
                              <?php if(form_error('jabatan')){echo '<span class="control-label" for="jabatan">'.form_error('jabatan').'</span>';} ?>
                          </div>

                          <div class="form-group <?php if(form_error('status')){echo "has-error";} ?>">
                              <label for="status">Status User</label><br>
                              <input <?php if (!(strcmp(set_value("status"),"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="status" id="radio" value="1" <?php echo set_radio('status', '1'); ?>/>
                              &nbsp; Aktif
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input <?php if (!(strcmp(set_value("status"),"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="status" id="radio2" value="0" <?php echo set_radio('status', '0'); ?>/>
                              &nbsp; Tidak Aktif
                              <?php if(form_error('status')){echo '<span class="control-label" for="status">'.form_error('status').'</span>';} ?>
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
                  <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("user");?>'"><span class="fa fa-times"></span> Batal</button>
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

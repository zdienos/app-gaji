      <!-- Main content -->
      <section class="content" style="margin:10% 0 13% 0">
        <h2 style="text-align:center;"><i class="fa fa-list text-yellow"></i> Daftar Data Karyawan</h2>
        <br>
        <div class="box box-default">
          <div class="box-header with-border">
            <?php if($this->session->flashdata('message')) :  ?>
              <div class="col-md-6 col-md-offset-3 col-sm-12">
                <br>
                <?php echo success_alert($this->session->flashdata('message')); ?>
              </div>
              <div style="clear:both;"></div>
            <?php endif; ?>
            <div class="col-lg-2 col-sm-12">
                <div class="row" style="margin-bottom:5px;">
                    <button type="button" onClick="location.href=('<?php echo site_url("Karyawan/add");?>');" class="wow bounceIn btn btn-sm btn-default"
                    data-toggle="tooltip" data-placement="top" title="Input Data"
                    data-wow-delay="0.2s"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="col-lg-6 col-lg-offset-4 col-md-8 col-md-offset-5">
              <div class="row">
                  <form action="<?php echo site_url('Karyawan')?>" class="form-inline" method="post">
                    <div class="form-group">
                      <select class="form-control" name="cari_jabatan" id="cari_jabatan" onChange="this.form.submit()">
                      <option value="">- Pilih Jabatan -</option>
                      <?php
                        foreach($jabatan as $baris)
                        {
                      ?>
                      <option <?php if (!(strcmp(set_value("cari_jabatan"),"$baris->id_jabatan"))) {echo "selected=\"selected\"";} ?> value="<?php echo $baris->id_jabatan;?>" ><?php echo $baris->nama_jabatan;?></option>
                      <?php

                        }
                      ?>
                      </select>
                    </div>
                      <div class="form-group">
              					  <input type="text" size="45" name="cari_nik" class="form-control" placeholder="Cari NIK Karyawan ...">
            					</div>
                      <button type="submit" class="btn btn-default" ><i class="fa fa-search"></i></button>
                  </form>
              </div>
				  </div>
          </div>
          <?php
            if($tampil)
            {
          ?>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                  <tr>
                      <th width="10px">No</th>
                      <th>NIK</th>
                      <th>Nama Karyawan</th>
                      <th>Departemen</th>
                      <th>Jabatan</th>
                      <th>Grid</th>
                      <th>Gaji</th>
                      <th></th>
                  </tr>
                  <?php
                  $no = $no+1;
                  foreach($tampil as $baris)
                  {
                  ?>
                  <tr>
                      <td align="center"><?php echo $no;?></td>
                      <td><?php echo $baris->nik; ?></td>
                      <td><?php echo $baris->nama_karyawan; ?></td>
                      <td>
                      <?php if($baris->departemen == 1) echo 'FA'; ?>
                      <?php if($baris->departemen == 2) echo 'IT'; ?>
                      <?php if($baris->departemen == 3) echo 'PDCA'; ?>
                      <?php if($baris->departemen == 4) echo 'HCS'; ?>
                      <?php if($baris->departemen == 5) echo 'PPI'; ?>
                      <?php if($baris->departemen == 6) echo 'QAQC'; ?>
                      <?php if($baris->departemen == 7) echo 'WAREHOUSE'; ?>
                      <?php if($baris->departemen == 8) echo 'BOF'; ?>
                      </td>
                      <td><?php echo $baris->nama_jabatan; ?></td>
                      <td><?php echo $baris->grid; ?></td>
                      <td>Rp. <?php echo number_format($baris->gaji,0,',','.') ?></td>
                      <td align="center">
                        <button type="button" name="btn_ubah" class="wow bounceIn btn btn-sm btn-primary" onClick="location.href=('<?php echo site_url("Karyawan/detail/".md5(sha1($baris->nik)));?>');"
                          data-toggle="tooltip" data-placement="top" title="Detail Data" data-wow-delay="0.2s"><span class="glyphicon glyphicon-eye-open"></span></button>
                        <button type="button" name="btn_hapus" class="wow bounceIn btn btn-sm btn-primary" onclick="return hapus('<?php echo $baris->nama_karyawan; ?>','<?php echo site_url("Karyawan/delete/".md5(sha1($baris->nik))); ?>');"
                         data-toggle="tooltip" data-placement="top" title="Hapus Data" data-wow-delay="0.2s"><span class="glyphicon glyphicon-trash"></span></button>
                      </td>
                  </tr>
                  <?php
                  $no++;
                  }
                  ?>
              </table>
          </div>
          <div class="box-footer clearfix">
              <?php
                if(set_value('cari_jabatan') == "" && set_value('cari_nik') == "")
                {
                  echo $halaman;
                }
                else
                {
              ?>
              <a href="<?php echo site_url("Karyawan"); ?>">
                  <span class="glyphicon glyphicon-list-alt"></span> Tampilkan Seluruh Data
              </a>
              <?php
                }
              ?>
          </div>
          <!-- /.box-body -->
          <!-- tutup if($tampil) -->
          <?php
            }
            else
            {
          ?>
          <div class="box-body">
              <br>
              <br>
              <br>
              <br>
              <center>
                  <h1><span class="glyphicon glyphicon-floppy-remove"></span> Data Tidak Ditemukan</h1>
              </center>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <div class="box-footer clearfix">
                  <a href="<?php echo site_url("Karyawan"); ?>">
                      <span class="glyphicon glyphicon-list-alt"></span> Tampilkan Seluruh Data
                  </a>
              </div>
          </div>
          <?php
            }
          ?>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->

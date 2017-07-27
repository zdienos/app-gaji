      <!-- Main content -->
      <section class="content" style="margin:10% 0 13% 0">
        <h2 style="text-align:center;"><i class="fa fa-list text-yellow"></i> Daftar Data Ket Lembur</h2>
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
            <div class="col-lg-2 col-md-2 col-sm-12">
                <div class="row" style="margin-bottom:5px;">
                    <button type="button" onClick="location.href=('<?php echo site_url("Ket_lembur/add");?>');" class="wow bounceIn btn btn-sm btn-default"
                    data-toggle="tooltip" data-placement="top" title="Input Data"
                    data-wow-delay="0.2s"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="col-lg-2 col-lg-offset-8 col-md-2 col-md-offset-7">
              <div class="row">
                  <form action="<?php echo site_url('ket_lembur')?>" class="form-inline" method="post">
                    <div class="form-group">
                      <select class="form-control" name="cari_jenis_lembur" id="cari_jenis_lembur" onChange="this.form.submit()">
                      <option value="">- Pilih Jenis Lembur -</option>
                      <?php
                        foreach($detail_lembur as $baris)
                        {
                      ?>
                      <option <?php if (!(strcmp(set_value("cari_jenis_lembur"),"$baris->id_detail_lembur"))) {echo "selected=\"selected\"";} ?> value="<?php echo $baris->id_detail_lembur;?>" ><?php echo $baris->kode_lembur;?></option>
                      <?php

                        }
                      ?>
                      </select>
                    </div>
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
                      <th>Jenis Lembur</th>
                      <th>Jam Lembur</th>
                      <th>Upah Lembur</th>
                      <th></th>
                  </tr>
                  <?php
                  $no = $no+1;
                  foreach($tampil as $baris)
                  {
                  ?>
                  <tr>
                      <td align="center"><?php echo $no;?></td>
                      <td><?php echo $baris->kode_lembur; ?></td>
                      <td><?php echo $baris->jam_lembur; ?></td>
                      <td><?php echo $baris->upah_lembur; ?></td>
                      <td align="center">
                        <button type="button" name="btn_ubah" class="wow bounceIn btn btn-sm btn-primary" onClick="location.href=('<?php echo site_url("Ket_lembur/detail/".md5(sha1($baris->id_ket_lembur)));?>');"
                          data-toggle="tooltip" data-placement="top" title="Detail Data" data-wow-delay="0.2s"><span class="glyphicon glyphicon-eye-open"></span></button>
                        <button type="button" name="btn_hapus" class="wow bounceIn btn btn-sm btn-primary" onclick="return hapus('<?php echo $baris->kode_lembur; ?>','<?php echo site_url("Ket_lembur/delete/".md5(sha1($baris->id_ket_lembur))); ?>');"
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
                if(set_value('cari_jenis_lembur') == "")
                {
                  echo $halaman;
                }
                else
                {
              ?>
              <a href="<?php echo site_url("Ket_lembur"); ?>">
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
                  <a href="<?php echo site_url("Ket_lembur"); ?>">
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

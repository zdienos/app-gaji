      <!-- Main content -->
      <section class="content" style="margin:10% 0 13% 0">
        <h2 style="text-align:center;"><i class="fa fa-list text-yellow"></i> Daftar Data Gaji Lembur</h2>
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
                    <button type="button" onClick="location.href=('<?php echo site_url("Gaji_lembur/add");?>');" class="wow bounceIn btn btn-sm btn-default"
                    data-toggle="tooltip" data-placement="top" title="Input Data"
                    data-wow-delay="0.2s"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="col-lg-6 col-lg-offset-4 col-md-8 col-md-offset-5">
              <div class="row">
                  <form action="<?php echo site_url('Gaji_lembur')?>" class="form-inline" method="post">
                    <div class="form-group">
                      <select class="form-control" name="cari_tahun" id="cari_tahun">
                      <option value="">- Pilih Tahun -</option>
                      <?php
                        $thn_skr = date('Y');
                        for ($x=$thn_skr; $x>=2009; $x--)
                        {
                        ?>
                        <option <?php if (!(strcmp(set_value("cari_tahun"),"$x"))) {echo "selected=\"selected\"";} ?> value="<?php echo $x;?>" ><?php echo $x;?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control" name="cari_bulan" id="cari_bulan" onChange="this.form.submit()">
                      <option value="">- Pilih Bulan -</option>
                      <?php
                          $namaBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                          $noBulan = 1;
                          for($index=0; $index<12; $index++){
                      ?>
                      <option <?php if (!(strcmp(set_value("cari_bulan"),"$noBulan"))) {echo "selected=\"selected\"";} ?> value="<?php echo $noBulan;?>" ><?php echo $namaBulan[$index];?></option>
                      <?php
                              $noBulan++;
                          }
                      ?>
                      </select>
                    </div>
                      <div class="form-group">
              					  <input type="text" size="28" name="cari_nik" class="form-control" placeholder="Cari NIK Karyawan ...">
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
                      <th>Tanggal Lembur</th>
                      <th>Nik</th>
                      <th>Nama Karyawan</th>
                      <th>Jabatan</th>
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
                      <td>
                      <?php
                        $tanggal = explode('-',$baris->tanggal_lembur);
                        if(count($tanggal) == 3)
                        {
                          $tgl_jadi = $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];
                          echo $tgl_jadi;
                        }
                      ?>
                    </td>
                      <td><?php echo $baris->nik_karyawan; ?></td>
                      <td><?php echo $baris->nama_karyawan; ?></td>
                      <td><?php echo $baris->nama_jabatan; ?></td>
                      <td><?php echo $baris->kode_lembur; ?></td>
                      <td><?php echo $baris->jam_lembur; ?></td>
                      <td>Rp. <?php echo number_format($baris->total_upah_lembur,0,',','.'); ?></td>
                      <td align="center">
                        <button type="button" name="btn_ubah" class="wow bounceIn btn btn-sm btn-primary" onClick="location.href=('<?php echo site_url("Gaji_lembur/detail/".md5(sha1($baris->id_gaji_lembur)));?>');"
                          data-toggle="tooltip" data-placement="top" title="Detail Data" data-wow-delay="0.2s"><span class="glyphicon glyphicon-eye-open"></span></button>
                        <button type="button" name="btn_hapus" class="wow bounceIn btn btn-sm btn-primary" onclick="return hapus('<?php echo $baris->nik_karyawan; ?>','<?php echo site_url("Gaji_lembur/delete/".md5(sha1($baris->id_gaji_lembur))); ?>');"
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
                if(set_value('cari_tahun') == "" && set_value('cari_bulan') == "" && set_value('cari_nik') == "")
                {
                  echo $halaman;
                }
                else
                {
              ?>
              <a href="<?php echo site_url("Gaji_lembur"); ?>">
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
                  <a href="<?php echo site_url("Gaji_lembur"); ?>">
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

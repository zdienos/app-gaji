<!-- Main content -->
<section class="content" style="margin:10% 0 13% 0">
  <h2 style="text-align:center;"><i class="fa fa-list text-yellow"></i> Daftar Data User</h2>
  <br>
  <div class="box box-default">
    <div class="box-header with-border">
      <?php if($this->session->flashdata('message')) :  ?>
        <div class="col-md-6 col-md-offset-3 col-sm-12">
          <br>
          <?php echo success_alert($this->session->flashdata('message')); ?>
        </div>
      <?php endif; ?>
      <div class="col-sm-12">
          <div class="row" style="margin-bottom:5px;">
              <button type="button" onClick="location.href=('<?php echo site_url("User/add");?>');" class="wow bounceIn btn btn-sm btn-default"
              data-toggle="tooltip" data-placement="top" title="Input Data"
              data-wow-delay="0.2s"><i class="fa fa-plus"></i></button>
          </div>
      </div>
    </div>
    <div class="box-body table-responsive no-padding">
      <table class="table table-bordered table-hover">
        <tr style="background-color:#dffeff;">
          <th width="5%">No</th>
          <th>Username</th>
          <th>Jabatan</th>
          <th>Status</th>
          <th></th>
        </tr>
        <?php
        $no = 1;
        foreach($shows as $show)
        {
        ?>
        <tr>
          <td align="center"><?php echo $no; ?></td>
          <td><?php echo $show->username; ?></td>
          <td><?php echo ($show->jabatan == '1') ? 'Admin' : 'User'; ?></td>
          <td><?php echo ($show->status == '1') ? 'Aktif' : 'Tidak Aktif'; ?></td>
          <td align="center">
            <button type="button" name="btn_ubah" class="wow bounceIn btn btn-sm btn-primary" onClick="location.href=('<?php echo site_url("user/detail/".md5(sha1($show->id_user)));?>');"
              data-toggle="tooltip" data-placement="top" title="Detail Data" data-wow-delay="0.2s"><span class="glyphicon glyphicon-eye-open"></span></button>
            <button type="button" name="btn_hapus" class="wow bounceIn btn btn-sm btn-primary" onclick="return hapus('<?php echo $show->username; ?>','<?php echo site_url("user/delete/".md5(sha1($show->id_user))); ?>');"
             data-toggle="tooltip" data-placement="top" title="Hapus Data" data-wow-delay="0.2s"><span class="glyphicon glyphicon-trash"></span></button>
          </td>
        </tr>
        <?php
        $no++;
        }
        ?>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->

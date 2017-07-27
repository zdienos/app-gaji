<section class="content" style="margin:10% 0 13% 0">  
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-print"></i>

                <h3 class="box-title">Report Lembur Keseluruhan</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" method="post" action="<?php echo site_url("Report_lembur/report_keseluruhan"); ?>">
                <div class="box-body">
                    <div class="container-fuild">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-2">
                                <select class="form-control select2" name="tahun" id="tahun" style="width: 100%;" required>
                                    <?php $thn_skr = date('Y'); ?>
                                    <option value="">- Tahun -</option>
                                    <?php
                                    $thn_skr = date('Y');
                                    for ($x=$thn_skr; $x>=2009; $x--) 
                                    {
                                    ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control select2" name="bulan" id="bulan" style="width: 100%;" required>
                                    <option value="" >- Bulan -</option>
                                    <option value="01" >Januari</option>
                                    <option value="02" >Febuari</option>
                                    <option value="03" >Maret</option>
                                    <option value="04" >April</option>
                                    <option value="05" >Mei</option>
                                    <option value="06" >Juni</option>
                                    <option value="07" >Juli</option>
                                    <option value="08" >Agustus</option>
                                    <option value="09" >September</option>
                                    <option value="10" >Oktober</option>
                                    <option value="11" >November</option>
                                    <option value="12" >Desember</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-download"></i> Unduh</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <i class="fa fa-print"></i>

                <h3 class="box-title">Report Lembur Perorangan</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" method="post" action="<?php echo site_url("Report_lembur/report_perorangan"); ?>">
                <div class="box-body">
                    <div class="container-fuild">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control select2" name="tahun" id="tahun" style="width: 100%;" required>
                                    <?php $thn_skr = date('Y'); ?>
                                    <option value="">- Tahun -</option>
                                    <?php
                                    $thn_skr = date('Y');
                                    for ($x=$thn_skr; $x>=2009; $x--) 
                                    {
                                    ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control select2" name="bulan" id="bulan" style="width: 100%;" required>
                                    <option value="" >- Bulan -</option>
                                    <option value="01" >Januari</option>
                                    <option value="02" >Febuari</option>
                                    <option value="03" >Maret</option>
                                    <option value="04" >April</option>
                                    <option value="05" >Mei</option>
                                    <option value="06" >Juni</option>
                                    <option value="07" >Juli</option>
                                    <option value="08" >Agustus</option>
                                    <option value="09" >September</option>
                                    <option value="10" >Oktober</option>
                                    <option value="11" >November</option>
                                    <option value="12" >Desember</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="nik" min="1" maxlength="7" class="form-control" id="nik" value="<?php echo set_value('nik') ?>" placeholder="Nik" onkeypress="return hanyaAngka(event, false)" required>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-download"></i> Unduh</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <i class="fa fa-print"></i>

                <h3 class="box-title">Report Lembur Berdasarkan Departemen</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" method="post" action="<?php echo site_url("Report_lembur/report_departemen"); ?>">
                <div class="box-body">
                    <div class="container-fuild">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control select2" name="tahun" id="tahun" style="width: 100%;" required>
                                    <?php $thn_skr = date('Y'); ?>
                                    <option value="">- Tahun -</option>
                                    <?php
                                    $thn_skr = date('Y');
                                    for ($x=$thn_skr; $x>=2009; $x--) 
                                    {
                                    ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control select2" name="bulan" id="bulan" style="width: 100%;" required>
                                    <option value="" >- Bulan -</option>
                                    <option value="01" >Januari</option>
                                    <option value="02" >Febuari</option>
                                    <option value="03" >Maret</option>
                                    <option value="04" >April</option>
                                    <option value="05" >Mei</option>
                                    <option value="06" >Juni</option>
                                    <option value="07" >Juli</option>
                                    <option value="08" >Agustus</option>
                                    <option value="09" >September</option>
                                    <option value="10" >Oktober</option>
                                    <option value="11" >November</option>
                                    <option value="12" >Desember</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control select2" name="departemen" id="departemen" style="width: 100%;" required>
                                    <option value="" >- Departemen -</option>
                                    <option <?php if (!(strcmp(set_value("departemen"),"1"))) {echo "selected=\"selected\"";} ?> value="1" >FA</option>
                                    <option <?php if (!(strcmp(set_value("departemen"),"2"))) {echo "selected=\"selected\"";} ?> value="2" >IT</option>
                                    <option <?php if (!(strcmp(set_value("departemen"),"3"))) {echo "selected=\"selected\"";} ?> value="3" >PDCA</option>
                                    <option <?php if (!(strcmp(set_value("departemen"),"4"))) {echo "selected=\"selected\"";} ?> value="4" >HCS</option>
                                    <option <?php if (!(strcmp(set_value("departemen"),"5"))) {echo "selected=\"selected\"";} ?> value="5" >PPI</option>
                                    <option <?php if (!(strcmp(set_value("departemen"),"6"))) {echo "selected=\"selected\"";} ?> value="6" >QAQC</option>
                                    <option <?php if (!(strcmp(set_value("departemen"),"7"))) {echo "selected=\"selected\"";} ?> value="7" >WAREHOUSE</option>
                                    <option <?php if (!(strcmp(set_value("departemen"),"8"))) {echo "selected=\"selected\"";} ?> value="8" >BOF</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-download"></i> Unduh</button>
                </div>
            </form>
        </div>
    <!-- /.box -->
    </div>

    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <i class="fa fa-print"></i>

                <h3 class="box-title">Report Lembur Berdasarkan Grade</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" method="post" action="<?php echo site_url("Report_lembur/report_grade"); ?>">
                <div class="box-body">
                    <div class="container-fuild">
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control select2" name="tahun" id="tahun" style="width: 100%;" required>
                                    <?php $thn_skr = date('Y'); ?>
                                    <option value="">- Tahun -</option>
                                    <?php
                                    $thn_skr = date('Y');
                                    for ($x=$thn_skr; $x>=2009; $x--) 
                                    {
                                    ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control select2" name="bulan" id="bulan" style="width: 100%;" required>
                                    <option value="" >- Bulan -</option>
                                    <option value="01" >Januari</option>
                                    <option value="02" >Febuari</option>
                                    <option value="03" >Maret</option>
                                    <option value="04" >April</option>
                                    <option value="05" >Mei</option>
                                    <option value="06" >Juni</option>
                                    <option value="07" >Juli</option>
                                    <option value="08" >Agustus</option>
                                    <option value="09" >September</option>
                                    <option value="10" >Oktober</option>
                                    <option value="11" >November</option>
                                    <option value="12" >Desember</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control select2" name="grade" id="grade" style="width: 100%;" required>
                                    <option value="" >- Grade -</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3" >3</option>
                                    <option value="4" >4</option>
                                    <option value="5" >5</option>
                                    <option value="6" >6</option>
                                    <option value="7" >7</option>
                                    <option value="8" >8</option>
                                    <option value="7" >9</option>
                                    <option value="8" >10</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-download"></i> Unduh</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</section>

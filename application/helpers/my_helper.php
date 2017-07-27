<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User: Nurul Furqon
 * Company: Mascode
 * Date: 03/03/2017
 * Time: 9:57 AM
 */

 /* ini adalah helper nama bulan di indonesia */
 if (!function_exists('nama_bulan')) {
   # function nama bulan
   function nama_bulan($bulan)
   {
     $nama_bulan = array(
       '01' => 'Januari',
       '02' => 'Febuari',
       '03' => 'Maret',
       '04' => 'April',
       '05' => 'Mei',
       '06' => 'Juni',
       '07' => 'Juli',
       '08' => 'Agustus',
       '09' => 'September',
       '10' => 'Oktober',
       '11' => 'November',
       '12' => 'Desember',
     );
     return $nama_bulan[$bulan];
   }
 }

 /* ini adalah helper untuk pop up pemberitahuan sukses */
 if (!function_exists('success_alert')) {
     function success_alert($pesan)
     {
       $success_alert = '
       <div class="col-sm-12">
         <div class="row">
           <div class="wow bounceIn alert alert-success alert-dismissible" data-wow-delay="0.2s">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
             <h4 style="text-align:center"><i class="icon fa fa-check"></i>Success!</h4><p style="text-align:center">' . $pesan . '</p>
           </div>
         </div>
       </div>';
       return $success_alert;
     }
 }

 /* ini adalah helper untuk pop up pemberitahuan error */
 if (!function_exists('error_alert')) {
   function error_alert($pesan)
   {
     $error_alert = '
     <div class="col-sm-12">
       <div class="row">
         <div class="wow bounceIn alert alert-error alert-dismissible" data-wow-delay="0.2s">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
           <h4 style="text-align:center"><i class="icon fa fa-exclamation-circle"></i>Error!</h4><p style="text-align:center">' . $pesan . '</p>
         </div>
       </div>
     </div>';
     return $error_alert;
   }
 }

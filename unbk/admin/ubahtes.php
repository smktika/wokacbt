							  <? 
							  	include "cbt_con.php";
							  	$sqlujian = mysql_query("select * from cbt_ujian where XKodeSoal = '$_REQUEST[txt_ujian]'");
								$am = mysql_fetch_array($sqlujian);
								$jamujiane = str_replace(" ","",$am['XJamUjian']);
																
							  $tgl = substr($_REQUEST['txt_waktu'],0,10);
							  $jam = substr($_REQUEST['txt_waktu'],11,5);
							  $jam = "$jam:00";


//=========================
// Tentukan Durasi Ujian
//=========================

$minutes = $_REQUEST['txt_durasi'];
$d = floor ($minutes / 1440);
$h = floor (($minutes - $d * 1440) / 60);
$m = $minutes - ($d * 1440) - ($h * 60);

$hi = strlen($h);
$mi = strlen($m);
if($hi<2){$hi = "0".$h;}else{$hi=$h;}
if($mi<2){$mi = "0".$m;}else{$mi=$m;}
$jame = "$hi:$mi:00";
//

//=========================
// Tentukan Batas Keterlambatan Masuk Ujian
//=========================
$minutest = $_REQUEST['txt_telat'];
$dt = floor ($minutest / 1440);
$ht = floor (($minutest - $dt * 1440) / 60);
$mt = $minutest - ($dt * 1440) - ($ht * 60);

$hit = strlen($ht);
$mit = strlen($mt);
if($hit<2){$hit = "0".$ht;}else{$hit=$ht;}
if($mit<2){$mit = "0".$mt;}else{$mit=$mt;}
$jamet = "$hit:$mit:00";

//$telatujian = date('H:i:s',strtotime('+$hit hour +$mit minutes +00 seconds',strtotime($jamujiane)));
  $xjumlahjam = $jamet;
  $xjam = substr($xjumlahjam,0,2);
  $xmnt = substr($xjumlahjam,3,2);
  $xdtk = substr($xjumlahjam,6,2);
  
$jatahjam = $xjam;
$jatahmnt = $xmnt;
$menit = $jatahmnt+($jatahjam*60);
$timestamp = strtotime($jam) + $menit*60;
$tjam = date('H', $timestamp);
$tmnt = date('i', $timestamp);
$tdtk = date('s', $timestamp);
$telatujian = "$tjam:$tmnt:$tdtk";

//=========================
// Ambil Bank Soal
//=========================

$jumsoal = mysql_num_rows(mysql_query("select * from cbt_soal where  XKodeSoal = '$_REQUEST[txt_ujian]'"));
$val_banksoal =  "$jumsoal"; 
$val_jumsoal = str_replace(" ","",$_REQUEST['txt_soal']);

if($val_jumsoal>$val_banksoal){$ambilsoal = $val_banksoal;} else {$ambilsoal = $val_jumsoal;}

							  
							//  $sqlubah = mysql_query("insert into cbt_sampah (anu) values ('$_REQUEST[txt_ujian]')");
							  $sqlinsert = mysql_query("insert into cbt_ujian 
							  (XKodeKelas,XKodeMapel,XTokenUjian,XTglUjian,XJamUjian,XLamaUjian,XBatasMasuk,XJumSoal,XKodeSoal,XStatusUjian)
							  values 
							  ('$_REQUEST[txt_level]','$_REQUEST[txt_mapel]','$_REQUEST[txt_token]','$tgl','$jam','$jame','$telatujian','$ambilsoal',
							  '$_REQUEST[txt_ujian]','1')");
							  
							  /*$sqlubah2 = mysql_query("update cbt_ujian set XStatusUjian = '1',XTokenUjian = '$_REQUEST[txt_token]',
							  XTglUjian = '$tgl',XJamUjian = '$jam',XLamaUjian = '$jame',XBatasMasuk = '$telatujian',XJumSoal = '$ambilsoal' where XKodeSoal = 
							  '$_REQUEST[txt_ujian]'");	
							  */
							  ?>
                              

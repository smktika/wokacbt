 <?                    
include "cbt_con.php";
$sql = mysql_query("update cbt_siswa_ujian set XStatusUjian = '9' where XNomerUjian = '$_REQUEST[nompes]'"); 
?>

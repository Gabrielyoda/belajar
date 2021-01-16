<?php
require_once 'koneksi.php';

if($_SERVER['REQUEST_METHOD']=='POST') {

  $search = $_POST['search'];
  $sql = "SELECT * FROM tb_biodata where nama LIKE '%$search%' ORDER BY nama ASC";
  $res = mysqli_query($konek,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('npm'=>$row[0], 'nama'=>$row[1], 'usia'=>$row[2], 'domisili'=>$row[3]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($konek);
}
<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'dataPAL');

$input = filter_input_array(INPUT_POST);

$kategori = mysqli_real_escape_string($connect, $input["kategori"]);
$no_extension = mysqli_real_escape_string($connect, $input["no_extension"]);
$keterangan = mysqli_real_escape_string($connect, $input["keterangan"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE laporan 
 SET kategori = '".$kategori."', 
 no_extension = '".$no_extension."',
 keterangan = '".$keterangan."' 
 WHERE id = '".$input["id_karyawan"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM laporan 
 WHERE id = '".$input["id_karyawan"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>

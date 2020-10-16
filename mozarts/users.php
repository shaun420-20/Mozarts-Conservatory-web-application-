<?php

$connect = mysqli_connect("localhost","id7295435_mozartsconservatory","lijinjoy","id7295435_mozarts");
$output = '';
if(isset($_POST["query"])){
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM user
	WHERE username LIKE '%".$search."%'
	OR Name LIKE '%".$search."%'
	OR Address LIKE '%".$search."%'
	OR mobno LIKE '%".$search."%'
	OR instrument LIKE '%".$search."%'"; }
else{
	$query = "SELECT * FROM user ORDER BY id;";
	}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0){
	$output .= '
	<div class="table-responsive">
	<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">id</th>
			<th scope="col">Name</th>
			<th scope="col">Username</th>
			<th scope="col">Address</th>
			<th scope="col">mobile no.</th>
			<th scope="col">DateofBirth</th>
			<th scope="col">Instrument</th>
			<th scope="col">Gender</th>
			<th scope="col">image</th>
		</tr>
	</thead>
	<tbody>';
	while($row = mysqli_fetch_array($result)){
		$output .= '
		<tr>
			<th scope="row">'.$row["id"].'</th>
			<td>'.$row["Name"].'</td>
			<td>'.$row["username"].'</td>
			<td>'.$row["Address"].'</td>
			<td>'.$row["mobno"].'</td>
			<td>'.$row["dob"].'</td>
			<td>'.$row["instrument"].'</td>
			<td>'.$row["Gender"].'</td>
			<td>'.$row["image"].'</td>
		</tr>';
	}
	$output .= '</tbody></table>';
	echo $output;
}
else{
	echo 'No such users found';
}

?>

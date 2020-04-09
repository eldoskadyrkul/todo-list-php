<?php

include_once ('dbconnection.php');

$output = '';
$order = $_POST["order"];
if ($order == 'desc') {
	$order = 'asc';
} else {
	$order = 'desc';
}

$offset = $_POST["offset"];
$total_records_page = $_POST["total_records_page"];

$query = "SELECT * FROM `task` ORDER BY ".$_POST["column_name"]." " .$_POST["order"]. " LIMIT $offset, $total_records_page";
$result = mysqli_query($con, $query);
$output .= '
<table id="tt_1" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th><a class="column-sort" id="username" data-order="'.$order.'" href="#">Username</a></th>
			<th><a class="column-sort" id="email" data-order="'.$order.'" href="#">Email</a></th>
			<th><a class="column-sort" id="text" data-order="'.$order.'" href="#">Text</a></th>
			<th><a class="column-sort" id="status" data-order="'.$order.'" href="#">Status</a></th>
		</tr>
	</thead>
<tbody>
';
while ($row = mysqli_fetch_array($result)) {
	$output .= '
	<tr>
		<td>'. $row["username"] .'</td>
		<td>'. $row["email"] .'</td>
		<td>'. $row["text"] .'</td>
		<td>'. $row["status"] .'</td>
	</tr>
</tbody>
';
}

$output .= '</table>';
echo $output;
?>

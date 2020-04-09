<?php
session_start();
include_once ("../includes/dbconnection.php");
if(isset($_SESSION['ID_USER']))    {
    print "пользователь авторизован";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TODO LIST</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fonts.css">
</head>
<body>
	<div class="site">
		<div class="container">
			<div class="header">
				<div class="logo pull-left">
					<span>TODO Task</span>
				</div>	
				<div class="admin">
					<div class="user">
						<i class="fas fa-user"></i>
						<span><a href="logout.php">Logout</a></span>
					</div>
				</div>
			</div>
			<div class="site-content">
				<div class="col-lg-12 col-sm-12 todo-con">		
					<table id="tt_1" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><a class="column-sort" id="username" data-order="desc" href="#">Username</a></th>
								<th><a class="column-sort" id="email" data-order="desc" href="#">Email</a></th>
								<th><a class="column-sort" id="text" data-order="desc" href="#">Text</a></th>
								<th><a class="column-sort" id="status" data-order="desc" href="#">Status</a></th>
								<th><a class="column-sort" id="" data-order="desc" href="#">Edit</a></th>
							</tr>
						</thead>
						<tbody>
							<?php

							if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
								$page_no = $_GET['page_no'];
							} else {
								$page_no = 1;
							}

							$total_records_page = 5;
							

							$offset = ($page_no - 1) * $total_records_page;
							$prevPage = $page_no - 1;
							$nextPage = $page_no + 1;
							$adjacents = "2";

							$result_count = mysqli_query($con, "SELECT COUNT(*) AS total_records FROM `task` WHERE 1");
							$total_records = mysqli_fetch_array($result_count);
							$total_records = $total_records['total_records'];
							$total_no_of_pages = ceil($total_records / $total_records_page);
							$second_page = $total_no_of_pages - 1;
							
							$sql = "SELECT * FROM `task` LIMIT $offset, $total_records_page";
							$consql = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_assoc($consql))
							{
							 	echo "<tr>";
									echo "<td>".$row['username']."</td>";
									echo "<td>".$row['email']."</td>";
									echo "<td>".$row['text']."</td>";
									if ($row['status'] == 'Active') {
										echo "<td><span class='text-primary'>".$row['status']."</span></td>";
									} else if ($row['status'] == 'Completed') {
										echo "<td><span class='text-success'>".$row['status']."</span></td>";										
									} else if ($row['status'] == 'Uncompleted') {
										echo "<td><span class='text-danger'>".$row['status']."</span></td>";
									} else if ($row['status'] == "Edited by admin") {
										echo "<td><span class='text-primary'>".$row['status']."</span></td>";
									}
									echo "<td><a href='edit.php?task_id=".$row['id']."'><span class='fas fa-edit'></span></a></td>";								
								echo "</tr>";
							 }
							?>							
						</tbody>
					</table>
					<ul id="pagination" class="pagination">
						<?php if ($page_no > 1) { echo "<li class='page-item'><a class='page-link' href='?page_no=1'>First Page</a></li>"; } ?>
						<li class='page-item' <?php if ($page_no <= 1) { echo "class='disabled'";	} ?>>
							<a class='page-link' <?php if($page_no > 1) { echo "href='?page_no = $prevPage'"; }?>>Previous</a>
						</li>
						<?php
						if ($total_no_of_pages <= 10){   
						 	for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
						 		if ($counter == $page_no) {
						 			echo "<li class='page-item active'><a class='page-link'>$counter</a></li>"; 
						        } else {
						        	echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
						        }
						    }
						}
						?>
						<li class='page-item' <?php if ($page_no >= $total_no_of_pages) { echo "class='disabled'"; }?>>
							<a class='page-link' <?php if ($page_no < $total_no_of_pages) { echo "href='?page_no=$nextPage'"; } ?>>Next</a>
						</li>
						<?php if ($page_no < $total_no_of_pages) {
							echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
						} ?>
					</ul>
				</div>
			</div>	
		</div>	
	</div>	
</body>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
<script>
	$(document).ready(function() {
		$(document).on('click', '.column-sort', function() {
			var column_name = $(this).attr("id");
			var order = $(this).data("order");
			var arrow = '';
			if (order == 'desc') {
				arrow = '&nbsp;<span class="fas fa-angle-down"></span>';
			} else {
				arrow = '&nbsp;<span class="fas fa-angle-up"></span>';
			}
			$.ajax({
				url: "includes/sort.php",
				method: "POST",
				data: {
					column_name: column_name, 
					order: order, 
					offset: offset, 
					total_records_page: total_records_page
				},
				success: function(data) {
					$('#tt_1').html(data);
					$('#' + column_name + '').append(arrow);
				}
			})
		});
	});
</script>
</html>
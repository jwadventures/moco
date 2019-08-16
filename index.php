<?php
// index.php


	include 'includes/dbh.inc.php';
	include 'includes/user.inc.php';
	include 'includes/viewuser.inc.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

  <link rel="stylesheet" href="https://drvic10k.github.io/bootstrap-sortable/Contents/bootstrap-sortable.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.js"></script>

  <script src="https://drvic10k.github.io/bootstrap-sortable/Scripts/bootstrap-sortable.js"></script>

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">





		<meta charset="utf-8">
		<title></title>
		
<script>
$(document).ready(function () {
$('#dtSortable').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
	</head>
	<body>
	<!--<div class="container">-->
	<?php
	
include "MenuLogic.php";

	//$users = new ViewUser();
	//$users-> showAllUsers();
	?>
	<tr><td></td>
	</tr>
<div class="card card-cascade narrower">

  <!--Card image-->
  <div
    class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

   <!-- <div>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="fas fa-th-large mt-0"></i>
      </button>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="fas fa-columns mt-0"></i>
      </button>
    </div> -->

    <a href="" class="white-text mx-3">Users</a>
<!--
    <div>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="fas fa-pencil-alt mt-0"></i>
      </button>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="far fa-trash-alt mt-0"></i>
      </button>
      <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
        <i class="fas fa-info-circle mt-0"></i>
      </button>
    </div> -->

  </div>	
<table id="dtSortable" class="table table-striped sortable table-hover table-bordered table-sm"  cellspacing="0" width="100%">
  <thead>
    <tr>
    <!--
      <th class="th-sm" scope="col">#</th>
      <th class="th-sm" scope="col">Company</th>
      <th class="th-sm" scope="col">RID</th>
      <th class="th-sm" scope="col">Code</th>
      <th class="th-sm" scope="col">Name</th>
      -->
      <th class="th-sm" >#</th>
      <th class="th-sm" >Company</th>
      <th class="th-sm" >RID</th>
      <th class="th-sm" >Code</th>
      <th class="th-sm" >Name</th>
    </tr>
  </thead>
  <tbody>
  <?php
  	$users = new ViewUser();
	$users-> showAllUsers();
	?>
	<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>John</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>John</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>John</td>
    </tr>
	
	
   </tbody>
</table>

<div>

	</div>
	<!--</div>-->	
	</body>
</html>
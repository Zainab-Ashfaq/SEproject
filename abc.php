seassignment
no1 
<?php
session_start();
$campusID=$_SESSION['campusID'];
$classid=$_GET['id'];
$month=$_GET['month'];
$year=$_GET['year'];
include "connection.php";
include 'barcode128.php';
$q1="select * from feemaster where feemaster.campus_id='$campusID' and feemaster.for_month='$month' and feemaster.for_year='$year' and feemaster.class_id='$classid'";
$r1=$con->query($q1);
$totalfee=0;
?>
<html>
<head>
<style>
h3{
	font-family: Agency FB;
}
h4{
	font-family: Agency FB;
}
/*table{
	border: 1px solid black;

}*/
/*tr{
	border: 1px solid black;

}
td{
	border: 1px solid black;
	padding: 1px;
}
th{
	border: 1px solid black;
	padding: 1px;
}*/
h2{
	font-family: Old English Text MT;
}
/*table{
	border-style: groove;
	padding:1px;
	border-width:2px;

}
th{
border-style: groove;
	padding:1px;
	border-width:2px;
}*/


p.inline {display: inline-block;}
span { font-size: 13px;}


</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
    body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
    @media print {
  footer {page-break-inside: always;}


}
</style>


<!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Required Stylesheets -->
  <link href="bootstrap.css" rel="stylesheet">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <link href="scss/bootstrap.scss" rel="stylesheet" id="bootstrap-css">
  <script src="js/boostrap.js"></script>

  <link rel="stylesheet" href="chartist.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



  <!-- Required Javascript -->
  <script src="jquery.js"></script>
  <script src="bootstrap-treeview.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist-plugin-legend/0.6.2/chartist-plugin-legend.js"></script>

</head>
<script type="text/javascript">
	window.onload=function()
	{
		window.print();
	}
</script>
<body >
	<page size="A4" layout="landscape">
		<kbd>Parents Copy</kbd>

	<?php 
while($row1=mysqli_fetch_array($r1))
{ $totalfee=0;
	?>
	
	<div class="row">
	<div class="col-md-3">
<img style="height:75px; width:75px;" src="Image/masoomeen.png">
	</div>
	
	<div class="col-md-6">
		<center>
		<h2><?php $q="select * from campus where campus_id='$campusID'"; $r=$con->query($q); $campusname; while($row=mysqli_fetch_array($r))
			{
				$campusname=$row['campus_name'];
				$campusaddr=$row['campus_address'];
			} echo $campusname; ?> </h2><small><?php echo $campusaddr; ?> &nbspPh No: 047-6332953</small>
			</center>
	</div>
	<div class="col-md-3">
		<div style="">
		<?php
		$feeid=$row1['id'];
						

					echo "<p class='inline'><span ><b>Item: $feeid</b></span>".bar128(stripcslashes($feeid))."<span ><b>Price: ".$row1['remaining_amt']." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
		

		?>



	</div>
	</div>


</div>
	
	<center>
<!--for LOGO OF SCHOOL AND SESSION OF STUDENT-->

</center>
<?php  
$sid=$row1['s_id'];
$q2="SELECT student.fname as fname, student.lname as lname, student.father_guardian_name as fgname, class.class_name as cname, section.section_name as sname FROM student, classdetail, class, enrollment, section where student.s_id='$sid' and enrollment.s_id='$sid' and enrollment.classdetail_id=classdetail.id and classdetail.class_id=class.class_id and classdetail.section_id=section.section_id and student.s_id=enrollment.s_id and enrollment.passstatus='studying'";
$r2=$con->query($q2);
$fname;
$lname;
$fgname;
$fgname;
$cname;
$sname;
$month=$row1['for_month'];
while($row2=mysqli_fetch_array($r2))
{
	$fname=$row2['fname'];
	$lname=$row2['lname'];
	$fgname=$row2['fgname'];
	$cname=$row2['cname'];
	$sname=$row2['sname'];
}
echo $fname;
?>
<h3>Student Detail</h3>
<!-- For student Details -->
<div class="row">
<div class="col-md-12">
	<table class="table">
		<thead>
		<tr>
			<th>Student ID</th>
			<th>Student Name</th>
			<th>Father Name</th>
			<th>Class</th>
			<th>Section</th>
			<th>Month</th>

			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td> <?php echo $sid; ?> </td>
			<td> <?php echo $fname." ".$lname; ?> </td>
			<td> <?php echo $fgname; ?> </td>
			<td> <?php echo $cname; ?> </td>
			<td> <?php echo $sname; ?> </td>
			<td> <?php echo $month; ?> </td>
		</tr>

</tbody>
	</table>

</div>
</div>


<!-- Fee Detail  -->

<div class="row">

<div class="col-md-6">
<h4>Fee Detail</h4>	
<table class="table">
	<tr>
		<th>Month Name</th>
		<th>Total Amount</th>
		<th>Paid Amount</th>
		<th>Balance Amount</th>
	</tr>

<!-- PHP CODE HERE TO PRINT HISTORY OF A SPECIFIC STUDENT-->
<?php
$rcvble=$row1['recievable'];
$rcvd=$row1['recieved'];
$rem=$row1['remaining_amt'];
$totalfee+=$rem;
?>
<tr>
<td><?php echo $month; ?></td>
<td><?php echo $rcvble; ?></td>
<td><?php echo $rcvd; ?></td>
<td><?php echo $rem; ?></td>
</tr>
<!--------------------------------------------------------->

</table>

</div>

<div class="col-md-6">
	
</div>
</div>

<div class="row">
<div class=" col-md-6">

<h4>Fee History</h4>	
<table class="table">
	<tr>
	<th>Month</th>
	<th>Year</th>
	<th>Total Amount</th>
	<th>Paid Amount</th>
	<th>Remaining Amount</th>
</tr>

<!-- PHP CODE HERE TO PRINT ACTIVE FUNDS-->
<?php
$q3="SELECT * FROM feemaster where s_id='$sid' limit 11";
$r3=$con->query($q3);
$hiscount1=0;
while($row3=mysqli_fetch_array($r3))
{
	$hiscount1+=1;
?>


<tr>
<td><?php echo $row3['for_month']; ?></td>
<td><?php echo $row3['for_year']; ?></td>
<td><?php echo $row3['recievable']; ?></td>
<td><?php echo $row3['recieved']; ?></td>
<td><?php echo $row3['remaining_amt']; ?></td>
</tr>

<?php } ?>
<!--------------------------------------------------------->
<?php
while($hiscount1<11)
{
	echo "<tr><td></td><td></td><td></td><td></td><td></td></tr>";
	$hiscount1+=1;
}
?>
</table>


<!--Use this region to calculate fee of this specific student after showing fund on top of this
region -->





<!--------------------------------------------------------------------->


</div>
    <div class="col-md-6">
    	<h4>Funds</h4>
	<table class="table">
		<tr>
			
			<th>Fund Name</th>
			<th>Amount</th>
			<th>Fund Month</th>
			<th>Fund Year</th>
		</tr>
		<?php
		$fundq="SELECT funds.name as name, funds.amount as amt, fundmaster.month as month, fundmaster.year as year FROM `fundmaster`, `funds` where fundmaster.s_id='$sid' and fundmaster.status<>'Paid' and funds.campus_id='$campusID'";
		
		$fundr=$con->query($fundq);
		while($fundrow=mysqli_fetch_array($fundr))
		{
			$totalfee+=$fundrow['amt'];
		?>
		<tr>
			<td><?php echo $fundrow['name']; ?></td>
			<td><?php echo $fundrow['amt']; ?></td>
			<td><?php echo $fundrow['month']; ?></td>
			<td><?php echo $fundrow['year']; ?></td>
		</tr>
	<?php } ?>
	</table>
	</div>
</div>
<h3>Total Fee: <?php echo $totalfee; ?></h3>
<hr>

<br><br><br><br><br>
<kbd>School Copy</kbd>
<div class="row">
	<div class="col-md-3">
<img style="height:75px; width:75px;" src="Image/masoomeen.png">
	</div>
	
	<div class="col-md-6">
		<center>
		<h2><?php $q="select * from campus where campus_id='$campusID'"; $r=$con->query($q); $campusname; while($row=mysqli_fetch_array($r))
			{
				$campusname=$row['campus_name'];
			} echo $campusname; ?> </h2><small>Ph No: 047-6332953</small>
			</center>
	</div>
	<div class="col-md-3">
		<div style="">
		<?php
		$feeid=$row1['id'];
						

					echo "<p class='inline'><span ><b>Item: $feeid</b></span>".bar128(stripcslashes($feeid))."<span ><b>Price: ".$row1['remaining_amt']." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
		

		?>



	</div>
	</div>


</div>
	
	
	<center>
<!--for LOGO OF SCHOOL AND SESSION OF STUDENT-->

</center>
<?php  
$sid=$row1['s_id'];
$q2="SELECT student.fname as fname, student.lname as lname, student.father_guardian_name as fgname, class.class_name as cname, section.section_name as sname FROM student, classdetail, class, enrollment, section where student.s_id='$sid' and enrollment.s_id='$sid' and enrollment.classdetail_id=classdetail.id and classdetail.class_id=class.class_id and classdetail.section_id=section.section_id and student.s_id=enrollment.s_id and enrollment.passstatus='studying'";
$r2=$con->query($q2);
$fname;
$lname;
$fgname;
$fgname;
$cname;
$sname;
$month=$row1['for_month'];
while($row2=mysqli_fetch_array($r2))
{
	$fname=$row2['fname'];
	$lname=$row2['lname'];
	$fgname=$row2['fgname'];
	$cname=$row2['cname'];
	$sname=$row2['sname'];
}
?>
<h3>Student Detail</h3>
<!-- For student Details -->
<div class="row">
<div class="col-lg-12">
	<table class="table">
		<tr>
			<th>Student ID</th>
			<th>Student Name</th>
			<th>Father Name</th>
			<th>Class</th>
			<th>Section</th>
			<th>Month</th>

			
		</tr>

		<tr>
			<td> <?php echo $sid; ?> </td>
			<td> <?php echo $fname." ".$lname; ?> </td>
			<td> <?php echo $fgname; ?> </td>
			<td> <?php echo $cname; ?> </td>
			<td> <?php echo $sname; ?> </td>
			<td> <?php echo $month; ?> </td>
		</tr>


	</table>

</div>
</div>


<h3>Total Fee: <?php echo $totalfee; ?></h3>
<!--Use this region to calculate fee of this specific student after showing fund on top of this
region -->

    

<hr>
<br><br><br><br><br>
<?php }
?>
<footer></footer>
</page>
</body>

</html>
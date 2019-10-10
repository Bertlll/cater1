<?php

//fetch.php

include '../config/database.php';

$query = "SELECT * FROM info_cater WHERE active=1 AND price BETWEEN '".$_POST["minimum_range"]."' AND '".$_POST["maximum_range"]."' ORDER BY comp_name ASC";


$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)>0)
{
	 $output='<div class="table-responsive">';
	 while($row = mysqli_fetch_array($result)) {
        $output .='
        <table class="table" style="background-color: #F5F5F5">
        	<thead>
        		<tr>
        			<th style="border-style: hidden;">'.$row['comp_name'].'<br>
        				<button class="btn btn-secondary btn-sm" style="text-decoration: none;display: inline-block;width:50%" data-toggle="modal" data-target="#view'.$row['id_number'].'">View</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUpto: ₱'.$row['price'].'
        			</th>
        		</tr>

				<div class="modal fade" role="dialog" id="view'.$row['id_number'].'" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">'.$row['comp_name'].'</h4>
                            </div>
                            <div class="modal-body">
                            	<p>cater profile</p>
                            </div>
                            <div class="modal-footer">
                                <a href="cater-profile.php?view='.$row['id_number'].'"><button class="btn btn-dark" type="button" style="color: orange;">View Profile</button></a>
                                 <a href=""><button class="btn btn-light" type="button" data-dismiss="modal" >Close</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </thead>';}
        		$output .="</table>";
                    echo $output;}
                    else{
    echo "<h5><b>No Record Found</b></h5>";
  }              
?>
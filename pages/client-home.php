<!-- FILTER SLIDER PER PRICING OF CATERS-->
<?php
$minimum_range = 1000;
$maximum_range = 10000;
?>
<div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>For Negotiations</h2>
                </div>
                <div class="col-md-4">
                    <h2>Caterers</h2>
                </div>
                <div class="col-md-4">
                    <h2>Filter by:</h2>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <!-- FOR NEGOTIATIONS -->
                <div class="col-md-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Column 1</th>
                                    <th>Column 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Cell 1</td>
                                    <td>Cell 2</td>
                                </tr>
                                <tr>
                                    <td>Cell 3</td>
                                    <td>Cell 4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- CATER LIST -->
                <div class="col-md-4" id="load_product">
                    <div class="table-responsive">
                        <?php
                            $get = "SELECT * FROM info_cater WHERE active=1";
                            $result=mysqli_query($conn, $get);
                            while($row=mysqli_fetch_array($result)) {
                                $id_number = $row['id_number'];
                                $comp_name = $row['comp_name'];
                        ?>
                        <table class="table" style="background-color: #F5F5F5">
                            <thead>
                                <tr>
                                    <th style="border-style: hidden;"><?php echo $comp_name ?>
                                        <br>
                                        <button class='btn btn-secondary btn-sm' style="text-decoration: none;display: inline-block;" data-toggle="modal" data-target="#view<?php echo $id_number ?>">View</button>
                                    </th>
                                </tr>

                                <div class="modal fade" role="dialog" id="view<?php echo $id_number?>" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo $comp_name ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Caterer's Profile</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="view-profile.php?view=<?=$id_number;?>"><button class="btn btn-dark" type="button" style="color: orange;">View Profile</button></a>
                                                <a href=""><button class="btn btn-light" type="button" data-dismiss="modal" >Close</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </thead>
                        </table>
                        <?php } ?>
                    </div>
                </div>

                <!-- FILTER SLIDER PER PRICING OF CATERS-->
                <div class="col-md-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="border-style: hidden;">
                                <tr>
                                    <th width="25%"><input type="text" name="minimum_range" id="minimum_range" value="<?php echo $minimum_range; ?>" /></th>
                                    <th><div id="price_range"></div></th>
                                    <th width="25%"><input type="text" name="maximum_range" id="maximum_range" value="<?php echo $maximum_range; ?>" /></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $( "#price_range" ).slider({
        range: true,
        min: 1000,
        max: 10000,
        values: [ <?php echo $minimum_range; ?>, <?php echo $maximum_range; ?> ],
        slide:function(event, ui){
            $("#minimum_range").val(ui.values[0]);
            $("#maximum_range").val(ui.values[1]);
            load_product(ui.values[0], ui.values[1]);
        }
    });
        $("#price_range").children("div").css("background","orange");
    
    load_product(<?php echo $minimum_range; ?>, <?php echo $maximum_range; ?>);
    
    function load_product(minimum_range, maximum_range)
    {
        $.ajax({
            url:"../controllers/fetch_cater.php",
            method:"POST",
            data:{minimum_range:minimum_range, maximum_range:maximum_range},
            success:function(data)
            {
                $('#load_product').fadeIn('slow').html(data);
            }
        });
    }

    </script>
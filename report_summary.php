 <?php include('header.php'); ?>
<?php include('session.php'); ?>

    <body >
		<?php include('navbar.php') ?>
        <div class="container-fluid" id="">
            <div class="row-fluid">
					<?php include('report_sidebar_summary.php'); ?>
                <!--/span-->
                <div class="span9" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid">
            
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">PAYMENTS SUMMARY</div>
                            </div>
							<div class="block-content collapse in">
							        <div class="span12">
						
									<?php 
								
							 $result = mysql_query('SELECT SUM(fee) AS janmarsum FROM janmar'); 
								$row = mysql_fetch_assoc($result); 
								$sum = $row['janmarsum'];
								
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $sum; ?>"><?php echo $sum; ?></div>
                                    <div class="chart-bottom-heading"><strong>JAN-MAR COLLECTION</strong>

                                    </div>
                                </div>
								
								<?php 
								$result1 = mysql_query('SELECT SUM(fee) AS aprjunsum FROM aprjun'); 
								$row1 = mysql_fetch_assoc($result1); 
								$sum1 = $row1['aprjunsum'];
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $sum1; ?>"><?php echo $sum1; ?></div>
                                    <div class="chart-bottom-heading"><strong>APR-JUN COLLECTION</strong>

                                    </div>
                                </div>
								<?php 
								$result2 = mysql_query('SELECT SUM(fee) AS julsepsum FROM julsep'); 
								$row2 = mysql_fetch_assoc($result2); 
								$sum2 = $row2['julsepsum'];
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $sum2; ?>"><?php echo $sum2; ?></div>
                                    <div class="chart-bottom-heading"><strong>JUL-SEP COLLECTION</strong>

                                    </div>
                                </div>
								
								<?php 
								$result3 = mysql_query('SELECT SUM(fee) AS octdecsum FROM octdec'); 
								$row3 = mysql_fetch_assoc($result3); 
								$sum3 = $row3['octdecsum'];
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo$sum3; ?>"><?php echo $sum3; ?></div>
                                    <div class="chart-bottom-heading"><strong>OCT-DEC COLLECTION</strong>

                                    </div>
                                </div>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $sum+$sum1+$sum2+$sum3; ?>"><?php echo $sum+$sum1+$sum2+$sum3; ?></div>
                                    <div class="chart-bottom-heading"><strong>TOTAL MONEY</strong>

                                    </div>
                                </div>
								
							</div>
                        </div>
						
						
                    </div>
                    </div>
                
                </div>
            </div>
    
         <?php include('footer.php'); ?>
		 
        </div>
	<?php include('script.php'); ?>
    </body>
</html>
<?php include('header.php'); ?>
<?php include('session.php'); ?>

    <body >
		<?php include('navbar.php') ?>
        <div class="container-fluid" id="">
            <div class="row-fluid">
					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->
                <div class="span9" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid">
            
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">STATISTICS</div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">
						
									<?php 
								$query_students = mysql_query("select * from students  ")or die(mysql_error());
								$count_students = mysql_num_rows($query_students);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_students; ?>"><?php echo $count_students; ?></div>
                                    <div class="chart-bottom-heading"><strong>STUDENTS</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_class = mysql_query("select * from class")or die(mysql_error());
								$count_class = mysql_num_rows($query_class);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_class; ?>"><?php echo $count_class; ?></div>
                                    <div class="chart-bottom-heading"><strong>CLASSES</strong>

                                    </div>
                                </div>
								<?php 
																
								$query_nursery = mysql_query(" select * from students, class where students.class = class.class_name AND class.category ='Nursery'")or die(mysql_error());
								
								$count_nursery = mysql_num_rows($query_nursery);
								
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_nursery; ?>"><?php echo $count_nursery; ?></div>
                                    <div class="chart-bottom-heading"><strong>NURSERY STUDENTS</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_primary = mysql_query(" select * from students, class where students.class = class.class_name AND class.category ='Primary'")or die(mysql_error());
								$count_primary = mysql_num_rows($query_primary);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_primary; ?>"><?php echo $count_primary; ?></div>
                                    <div class="chart-bottom-heading"><strong>PRIMARY STUDENTS</strong>

                                    </div>
                                </div>
								
								
										<?php 
								$query_secondary = mysql_query(" select * from students, class where students.class = class.class_name AND class.category ='Secondary'")or die(mysql_error());
								$count_secondary = mysql_num_rows($query_secondary);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_secondary ?>"><?php echo $count_secondary ?></div>
                                    <div class="chart-bottom-heading"><strong>SECONDARY STUDENTS</strong>

                                    </div>
                                </div>
								
								
										<?php 
								$query_admin = mysql_query(" select * from users where status='administrator' ")or die(mysql_error());
								$count_admin = mysql_num_rows($query_admin);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_admin ?>"><?php echo $count_admin ?></div>
                                    <div class="chart-bottom-heading"><strong>ADMIN USERS</strong>

                                    </div>
                                </div>
								
										<?php 
								$query_normal = mysql_query(" select * from users where status='normal'")or die(mysql_error());
								$count_normal = mysql_num_rows($query_normal);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_normal; ?>"><?php echo $count_normal; ?></div>
                                    <div class="chart-bottom-heading"><strong>NORMAL USERS</strong>

                                    </div>
                                </div>
								
                            </div>
                        </div>
                        <!-- /block -->
						
                    </div>
                    </div>
                
                </div>
            </div>
    
         <?php include('footer.php'); ?>
		 
        </div>
	<?php include('script.php'); ?>
    </body>
</html>
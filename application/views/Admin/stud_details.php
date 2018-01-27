	<div class="col-md-8">
					<div class="main-col">
						<div class="block">
							<h1 class="pull-left">Welcome Home Admin</h1>
							<h4 class="pull-right">Full Access Here</h4>
							<div class="clearfix"></div>
							<hr>
                            <section>
                            <div class="row">
                            <div class="col-md-4"> <i class="fa fa-user fa-5x fa-border active"></i>
                                <h4>Total Number of Users</h4>
                                </div>
                                
                            <div class="col-md-4"> <i class="fa fa-file-text-o fa-5x fa-border"></i>
                                <h4>Total Number Of Active Discussion</h4>
                                </div>
                                
                            <div class="col-md-4"> <i class="fa fa-file-word-o fa-5x fa-border"></i>
                                <h4>Total Number of Active Reply</h4>
                                </div>
                            </div>
                            </section>

                            <section>
                                <?php if($stud_details) :?>
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                              <div class="panel-heading">Student Full Details</div>
                              <div class="panel-body">
                                    <label><h4>First Name:</h3></label> <?php echo $stud_details->first_name; ?>
                                        
                                        <br>
                                        <label><h4>Last Name:</h4></label> 
                                        <?php echo $stud_details->last_name; ?>
                                        <br>
                                    
                                    <label><h4>Department:</h4></label> <?php echo $stud_details->department; ?>
                                    <br>
                                    <label><h4>Level:</h4></label> <?php echo $stud_details->level; ?>

                              </div>
                            </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                              <div class="panel-heading">Position Available for Contest</div>
                              <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/pre_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="president">

                                        <input type="submit" class="btn btn-primary" name="president" value="President">
                                    </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/vicepre_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="vice president">

                                        <input type="submit" class="btn btn-primary" name="vice_president" value=" Vice President">
                                    </form>
                                    </div>
                                    <div class="col-md-6">
                                         <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/sec_gen_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="sec general">

                                        <input type="submit" class="btn btn-primary" name="sec_gen" value="Sec Gen">
                                    </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/fin_sec_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="financial Sec">

                                        <input type="submit" class="btn btn-primary" name="fin_sec" value="Fin Sec">
                                    </form>
                                    </div>

                                    <div class="col-md-6">
                                         <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/social_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="Social Director">

                                        <input type="submit" class="btn btn-primary" name="social_dir" value="Social Director">
                                    </form>
                                    </div>

                                    <div class="col-md-6">
                                         <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/sport_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="Sport Director">

                                        <input type="submit" class="btn btn-primary" name="sport_dir" value="Sport Director">
                                    </form>
                                    </div>

                                    <div class="col-md-6">
                                        <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/trea_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="treasurer">

                                        <input type="submit" class="btn btn-primary" name="treasurer" value="Treasurer">
                                    </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/pro_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="PRO">

                                        <input type="submit" class="btn btn-primary" name="pro" value="PRO">
                                    </form>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/welf_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="welfare">

                                        <input type="submit" class="btn btn-primary" name="welfare" value="Welfare">
                                    </form>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    <form method="post" class="form-group" action="<?php echo base_url(); ?>Admin/asis_sec_candidate">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_details->id ?>">
                                        <input type="hidden" name="full_name" value="<?php echo $stud_details->first_name; ?> <?php echo $stud_details->last_name; ?>">
                                        <input type="hidden" name="position" value="Asistance secretary general">

                                        <input type="submit" class="btn btn-primary" name="asis_sec_gen" value="Asistance Sec Gen">
                                    </form>
                                    </div>
                                </div>
                                    

                              </div>
                            </div>
                                </div>   
                                <?php endif; ?>  
                            </section>
                            
                           
                            
                                      
							
						</div>
					</div>
				</div>

        </div>
        
      </div><!-- /.container -->
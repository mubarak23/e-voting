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

                             <div class="panel panel-default">
                              <div class="panel-heading">Add Candidate</div>
                              <div class="panel-body">
                                    <form role="form" enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>admin/add_candidate">
                                    <div class="form-group">
                                        <label>Student ID</label><input type="text" name="student_id" class="form-control" placeholder="Enter Your Name"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Full Name</label><input type="text" name="full_name" class="form-control" placeholder="Enter Your Email"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <select name="position" class="form-control">
                                            <option value="">Select Position</option>
                                            <option value="president">President</option>
                                            <option value="vice president">Vice President</option>
                                            <option value="fin sec">Financial Sectertary</option>
                                            <option class="social_director"> Social Director</option>
                                            <option value="sport_director">Sport Director</option>
                                        </select>
                                    </div>
                                    
                                    <input type="submit" name="add_candidate" class="btn btn-primary" value="Add Candidate"/>
                                </form>
                              </div>
                            </div>
                                
                                 
                            </section>
                            
                           
                            
                                      
							
						</div>
					</div>
				</div>

        </div>
        
      </div><!-- /.container -->
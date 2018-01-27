<div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-2">
                        
              <div class="panel panel-default ">
              <div class="panel-heading">Select Voting Category</div>
              <div class="panel-body column">
                
                  <a href="<?php echo base_url(); ?>Evoting/pre_candidate"><button class="btn btn-primary section">Presential column</button></a> 
                  <a href="<?php echo base_url(); ?>Evoting/vp_candidate"><button class="btn btn-primary section">Vp Column</button></a>
                   <a href="<?php echo base_url(); ?>Evoting/sec_gen_candidate"><button class="btn btn-primary section">Secetery General column</button></a>
                   <a href="<?php echo base_url(); ?>Evoting/fin_sec_candidate"><button class="btn btn-primary section">Financial Secetery column</button></a>
                   <a href="<?php echo base_url(); ?>Evoting/sport_dir_candidate"><button class="btn btn-primary section">Sport Director column</button></a>
                   <a href="<?php echo base_url(); ?>Evoting/social_dir_candidate"><button class="btn btn-primary section">Social Director column</button></a>
                    
                   <a href="<?php echo base_url(); ?>Evoting/treasurer_candidate"><button class="btn btn-primary section">Treasurer column</button></a>

                   <a href="<?php echo base_url(); ?>Evoting/pro_candidate"><button class="btn btn-primary section">PRO column</button></a>

                   <a href="<?php echo base_url(); ?>Evoting/welf_candidate"><button class="btn btn-primary section">Welfare column</button></a>

                   <a href="<?php echo base_url(); ?>Evoting/welf_candidate"><button class="btn btn-primary section">Asistant Sec column</button></a>
                  
                
              </div>
            </div>

            <?php foreach($vp_president as $canditate) :?>

            <div class="panel panel-default">
                      <div class="panel-heading">Asistant Secetary General Column</div>
                      <div class="panel-body">
                        
                          <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">Canditate Picture</div>
                      <div class="panel-body">
                        
                        <div class="media">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object img-circle" src="<?php echo base_url(); ?>assets/images/game2.jpg" alt="...">
                                </a>
                              </div>
                              <div class="media-body">
                                <h4 class="media-heading"> </h4>
                            
                              </div>
                            </div>
                          
                      </div>
                    </div>
            </div>

              <div class="col-md-5">
                
                    <div class="panel panel-default">
                      <div class="panel-heading">Candidate Details</div>
                      <div class="panel-body">
                          <label>Name</label>: <?php echo $canditate['full_name']; ?>
                          <br>
                          <label>Department</label>: <?php echo $canditate['department']; ?><br>
                          <label>Level</label>:<?php echo $canditate['level']; ?><br>
                          <label>Post Contesting For</label>:<?php echo $canditate['position']; ?>
                      </div>
                    </div>
        
          </div>

              <div class="col-md-3">
                
                    <div class="panel panel-default">
                      <div class="panel-heading">Cast Your Vote</div>
                      <div class="panel-body">
                        
                      <div class="input-group">
                        <span class="input-group-addon">
                          <form method="post" action="<?php echo base_url(); ?>Evoting/asis_sec_gen_vote">
                            <input type="hidden" name="candidate_id" value="<?php echo $canditate['id']; ?>" >
                            <input type="hidden" name="candidate_name" value="<?php echo $canditate['full_name']; ?>" >
                            <input type="hidden" name="vote_count" value="<?php echo $canditate['vote_count']; ?>" >
                            <input type="submit" name="asis_sec_gen_vote" class="btn btn-lg btn-primary" value="Vote">
                          </form>
                        </span>
                      </div>
                      </div>
                    </div>
        
          </div>


                        
                          
                      </div>
                    </div>

                  <?php endforeach; ?>


        
          

           

        </div>
           
          
   
          
         
      </div>

      </div> 

<!DOCTYPE html>
<html>
    <head>
        <title>Generate PDF</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <link href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
            <style type="text/css">
      body{font-family:"Times New Roman",Georgia,Serif}
       body{font-family:SimSun}
       body{font-family: 黑体}
      body{font-family: KaiTi}
      body{font-family: Microsoft YaHei}
    </style>
    </head>
    <body>
        <?php
        include 'connection.php';
        ?>
        <div class="container">
            <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">PDF Generation Form</a>


            </nav>

            <div class="row" style="margin-top:50px">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-8">


                    <form class="" action="pdf.php" method="post">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Client Name</label>
                            <div class="col-sm-10">
                                <input type="text" required="required"  class="form-control col-md-6" id="clientname" name="clientname" placeholder="Client Name" value="">
                            </div>
                            
<!--
                                <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
-->
                         
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control col-md-6" id="Email" name="Email" placeholder="Email">
                            </div>
                        </div>

<!--
                          <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" required="required" class="form-control col-md-6" id="image" name="image" placeholder="image">
                            </div>
                        </div>
-->
                    
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select required="required" class="form-control col-md-6" name="category" id="category" >
                                <option value="">Select Category</option>
                                    <?php
                                     $sql = "SELECT * from hd_category order by category_id asc";
                                     $category = $conn->query($sql);
                                    while ($row = $category->fetch_object()) {
                                        echo "<option value='".$row->category_id."'>" . $row->category_name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="authority" class="col-sm-2 col-form-label">Authority</label>
                            <div class="col-sm-10">
                                <select required="required" class="form-control col-md-6" name="authority" id="authority" >
                                    <option value="">Select Authority</option>
                                      <?php
                                     $sql = "SELECT * from  hd_authority order by authority_id asc";
                                     $authority = $conn->query($sql);
                                    while ($row = $authority->fetch_object()) {
                                        echo "<option value='".$row->authority_id."'>" . $row->authority_name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Definition" class="col-sm-2 col-form-label">Definition</label>
                            <div class="col-sm-10">
                                <select required="required" class="form-control col-md-6" name="definition" id="definition" >
                                   <option value="">Select Definition</option>
                                      <?php
                                     $sql = "SELECT * from  hd_definition order by definition_id asc";
                                     $definition = $conn->query($sql);
                                    while ($row = $definition->fetch_object()) {
                                        echo "<option value='".$row->definition_id."'>" . $row->definition_name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Profile" class="col-sm-2 col-form-label">Profile</label>
                            <div class="col-sm-10">
                                <select required="required" class="form-control col-md-6" name="profile" id="profile" >
                                   <option value="">Select Profile</option>
                                      <?php
                                     $sql = "SELECT * from  hd_profile order by profile_id asc";
                                     $profile = $conn->query($sql);
                                    while ($row = $profile->fetch_object()) {
                                        echo "<option value='".$row->profile_id."'>" . $row->profile_name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="background" class="col-sm-2 col-form-label">Background</label>
                            <div class="col-sm-10">
                                <select required="required" class="form-control col-md-6" name="background" id="background" >
                                   <option value="">Select Background</option>
                                      <?php
                                     $sql = "SELECT * from  hd_background order by background_id asc"; 
                                     $background = $conn->query($sql);
                                    while ($row = $background->fetch_object()) {
                                        echo "<option value='".$row->background_id."'>" . $row->background_name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label">Center</label>
                            <div class="col-sm-3">
                                  <?php
                                     $sql = "SELECT * from  hd_center order by center_id asc";
                                     $center = $conn->query($sql);
                                    while ($row = $center->fetch_object()) { ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" value="<?php echo $row->center_id ?>" name="center[]" type="checkbox" >
                                        <?php  echo  $row->center_name; ?>
                                    </label>
                                </div>
                               <?php    } ?>
                                
                            </div>
                        
                        </div>
                      
                        
                        
                         <div class="form-group row">
                            <label for="gate" class="col-sm-2 col-form-label">Channel</label>
                            <div class="col-sm-10">
                                  <?php
                                 $sql = "SELECT * from  hd_channel order by channel_id asc";
                                    $channel = $conn->query($sql);
                                   while ($row = $channel->fetch_object()) { ?>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" value="<?php echo $row->channel_id ?>" name="channel[]" type="checkbox" >
                                        <?php  echo  $row->channel_name; ?>
                                    </label>
                                </div>
                               <?php    } ?>
                                
                            </div>
                        
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="cross" class="col-sm-2 col-form-label">Cross</label>
                            <div class="col-sm-10">
                                <select required="required" class="form-control col-md-6" name="cross" id="cross">
                                    <option value="" >Select Cross</option>
                                      <?php
                                     $sql = "SELECT * from  hd_cross order by cross_id asc";
                                     $cross = $conn->query($sql);
                                    while ($row = $cross->fetch_object()) {
                                        echo "<option value='".$row->cross_id."'>" . $row->cross_name . "</option>";
                                    }
                                    ?>
                                </select>
                                </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="gate" class="col-sm-2 col-form-label">Gate</label>
                            <div class="col-sm-10">
                                  <?php
                                     $sql = "SELECT * from  hd_gates order by gate_name asc";
                                     $gate = $conn->query($sql);
                                    while ($row = $gate->fetch_object()) { ?>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" value="<?php echo $row->gate_id ?>" name="gate[]" type="checkbox" >
                                        <?php  echo  $row->gate_name; ?>
                                    </label>
                                </div>
                               <?php    } ?>
                                
                            </div>
                        
                        </div>

                         <div class="form-group row">
                            <label for="money" class="col-sm-2 col-form-label">Money</label>
                            <div class="col-sm-10">
                                  <?php
                                     $sql = "SELECT * from  hd_money  order by money_name asc";
                                     $money = $conn->query($sql);
                                    while ($row = $money->fetch_object()) { ?>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" value="<?php echo $row->money_id ?>" name="money[]" type="checkbox" >
                                        <?php  echo  $row->money_name; ?>
                                    </label>
                                </div>
                               <?php    } ?>
                                
                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Generate</button>
                          <div class="form-group" style="margin-bottom:50px">
                        </div>
                    </form>
                </div>
                <div class="col-sm-2">&nbsp;</div>

            </div>
        </div>
    </body>
</html>

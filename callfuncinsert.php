<?php
include('header.php');
include('insert.php');
if(isset($_POST['submit'])){

// $d=['data','names','phone_number','emails','articles',$name,$phone,$email,$article];


 $name=$_POST["name"];
  $phone=$_POST["phone"];
  $article=$_FILES["upload"];
  $email=$_POST["email"];
  
  $d=['data','names','phone_number','emails','articles',$name,$phone,$article,$email];

  uni_insert($pdo,$d);
  $c=[$pdo,'data'];
  $ret->retriving($c);
}

  ?>
      <div class="container">
      
      <!-- form row -->
      <div class="row">
      
        <div class="col-6 ">
 
        
              <form action="" method="POST"  enctype="multipart/form-data">
              
                      <div class="form-group mb-3 ">
                        <label for="name" class="text_secondary">Name</label>
                        <input type="text" name="name" autocomplete="on" class="form-control" placeholder="Enter Your Name">

                      </div> 
                      <div class="form-group mb-3 ">
                        <label for="phone" class="text_secondary">Phone</label>
                        <input type="number" name="phone" autocomplete="on" class="form-control" placeholder="Enter Your Phone Number">

                      </div> 

                      <div class="form-group mb-3">
                      <div>
                        <label for="article" class="text_secondary">Upload file</label>
                        </div>
                        <!-- <input type="textarea" name="txtarea" autocomplete="on" class="form-control" placeholder="Enter Your Email"> -->
                        <!-- <textarea name="article" id="" cols="85" rows="10"></textarea> -->
                        <input class="form-control" type="file" name="upload">
                      </div> 

                      <div class="form-group mb-3 ">
                        <label for="email" class="text_secondary">Email</label>
                        <input type="text" name="email" autocomplete="on" class="form-control" placeholder="Enter Your Email">

                      </div> 


                                      <!-- button row -->
                    <div class="py-5">
                    <!-- <div class="col"> -->
                      <div class=" btn-group col-12">
                        <button type="submit" class="btn btn-success" name="submit">save</button>

                      </div>
                      <!-- </div> -->
                   </div>

                    
                </form>

              <!-- end form -->



<!-- <input type="submit" value="upload image" name=""> -->

<?php

include('footer.php');
?>
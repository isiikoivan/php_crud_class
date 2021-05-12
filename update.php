<?php 

require ('header.php');
// include ('updatecode.php');

$id=$_GET['id'];
$up = new Update();
$up->locate($pdo,$id,'data');
$dataling=$up->locate($pdo,$id,'data');
// $up->updating($pdo,$id,'test.php');
//$access->dbconnect('localhost','registering','root',"")
// $name=$_POST['name'];
// $phone=$_POST['phone'];
// $email=$_POST['email'];
// $article=$_POST['article'];
$d=['data','names','phone_number','emails','articles',$name=$_POST['name'],$phone=$_POST['phone'],$email=$_POST['email'],$article=$_POST['article']];
$up->updating($pdo,$d,$id,'update','test.php');
?>

      <div class="container">
      
      <!-- form row -->
      <div class="row mt-3">
         <div class="card col-8 ">
            <div class="col-9 align-center">
           
        
              <form action="" method="POST">
              
                      <div class="form-group mb-3 ">
                        <label for="name" class="text_secondary">Name</label>
                        <input value="<?= $dataling->names;?>" type="text" name="name" autocomplete="on" class="form-control" placeholder="Enter Your Name">

                      </div> 
                      <div class="form-group mb-3 ">
                        <label for="phone" class="text_secondary">Phone</label>
                        <input value="<?= $dataling->phone_number;?>" type="number" name="phone" autocomplete="on" class="form-control" placeholder="Enter Your Phone Number">

                      </div> 
                      <div class="form-group mb-3 ">
                        <label for="email" class="text_secondary">Email</label>
                        <input value="<?= $dataling->emails;?>" type="text" name="email" autocomplete="on" class="form-control" placeholder="Enter Your Email">

                      </div> 
                      <div class="form-group mb-3">
                      <div>
                        <label for="article" class="text_secondary">Article</label>
                        </div>
                       
                        <textarea  name="article"  cols="65" rows="10"><?= $dataling->articles;?></textarea>
                      </div> 

                                     
                    <div class="py-5">
                
                      <div class=" btn-group col-12">
                        <button type="submit" class="btn btn-success" name='update'>update</button>

                      </div>
                      <!-- </div> -->
                   </div>

                    
                </form>

              <!-- end form -->
            </div>
              
         </div>   
                <!-- button row end -->
  </div>
                <!-- test/display row -->
</div>
<?php
include('footer.php');
?>
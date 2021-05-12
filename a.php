//test.php_check_syntax  <?php
  include('header.php');
  
  $ins=new Insert();
  $ins->inserting($access->dbconnect('localhost','registering','root',""));

  ?>
      <div class="container">
      
      <!-- form row -->
      <div class="row">
      
        <div class="col-6 ">

        
              <form action="" method="POST">
              
                      <div class="form-group mb-3 ">
                        <label for="name" class="text_secondary">Name</label>
                        <input type="text" name="name" autocomplete="on" class="form-control" placeholder="Enter Your Name">

                      </div> 
                      <div class="form-group mb-3 ">
                        <label for="phone" class="text_secondary">Phone</label>
                        <input type="number" name="phone" autocomplete="on" class="form-control" placeholder="Enter Your Phone Number">

                      </div> 
                      <div class="form-group mb-3 ">
                        <label for="email" class="text_secondary">Email</label>
                        <input type="text" name="email" autocomplete="on" class="form-control" placeholder="Enter Your Email">

                      </div> 
                      <div class="form-group mb-3">
                      <div>
                        <label for="article" class="text_secondary">Article</label>
                        </div>
                        <!-- <input type="textarea" name="txtarea" autocomplete="on" class="form-control" placeholder="Enter Your Email"> -->
                        <textarea name="article" id="" cols="85" rows="10"></textarea>
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


                  
                <!-- button row end -->
  </div>
                <!-- test/display row -->
                <?php
                        
                        $ret =new Retrive();
                        $ret->retriving($access->dbconnect('localhost','registering','root',""));
                ?>
  <div class="col-6 mt-4">
                      <div class="card ">
                          <div class=" card-header">
                             <h2>DATA</h2>
                          </div>
                          <div class="card-body">
                              <table class="table tabordered">
                                <tr>
                                   <th>Names</th>
                                   <th>Phone numbers</th>
                                   <th>Emails</th>
                                   <th>Operations</th>
                                </tr>
                                <?php foreach($ret->retriving($access->dbconnect('localhost','registering','root',"")) as $dat):?>
                                <tr>
                                    <td><?=$dat->names?></td>
                                    <td><?=$dat->phone_number?></td>
                                    <td><?=$dat->emails?></td>
                                    <td> 
                                        <a href="update.php?id=<?=$dat->id?>" class="btn btn-primary"> Edit</a>
                                        <a href="<?php $del->deleting($access->dbconnect('localhost','registering','root',""),$dat->id);?>" class="btn btn-danger"> Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                              </table>
                              
                          </div>
                      </div>
          </div>
        <!-- end test/displa row -->
 </div>
</div>
  <?php
  include('footer.php');
  ?>


//crud.php

<?php
class Crud
    {

            function dbconnect($host,$dbname,$user,$password)
            {
                try{
                $dns="mysql:host=$host; dbname=$dbname";
                $pdo= new PDO($dns,$user,$password);
                
               // echo 'connected';
                }
                catch(PDOException $e)
                {
                echo $e;

                }
                
                return $pdo;
            }
    }
class Insert extends Crud
    {
                
           function inserting($pdo)
           {
            // if($_SERVER["REQUEST_METHOD"]=="POST")
            if(isset($_POST['submit']))
                {
                    $message='';
                    $name=$_POST['name'];
                    $phone=$_POST['phone'];
                    $email=$_POST['email'];
                    $article=$_POST['article'];
                    $sql='INSERT INTO data(names,phone_number,emails,articles) VALUES (:name,:phone,:email,:article)';
                    $stmt=$pdo->prepare($sql);
                    $sub=$stmt->execute([':name'=>$name,':phone'=>$phone,'email'=>$email,':article'=>$article]);
                    if($sub)
                    {
                      
                        $message='data inserted successfully';
                        echo $message;
                    }
                    else
                    {
                        $message='failed to submit';
                     
                }

            }
           }

    }
 class Retrive extends Crud
    {
        function retriving($pdo)
        {
            $sql = 'SELECT * FROM data';
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $data;

        }

    }
 class Update extends Crud
    {
        function locate($pdo,$id)
        {
               
                $sql= 'SELECT * FROM data WHERE id=:id';
                $stmt=$pdo->prepare($sql);
                $stmt->execute([':id'=>$id]);
                $data=$stmt->fetch(PDO::FETCH_OBJ);
                return $data;
        }

        function updating($pdo,$id)
        {

                if(isset($_POST['update']))
                {
                $name=$_POST['name'];
                $phone=$_POST['phone'];
                $email=$_POST['email'];
                $article=$_POST['article'];
                $sql='UPDATE data SET names=:name,phone_number=:phone,emails=:email,articles=:article WHERE id=:id';
                $stmt=$pdo->prepare($sql);
                $sub=$stmt->execute([':name'=>$name,':phone'=>$phone,':email'=>$email,':article'=>$article,':id'=>$id]);

                
               }

        }

    }
 class Delete extends Crud
    {
        function deleting($pdo,$id)
        {
           $sql='DELETE FROM data WHERE id=:id';
           $stmt=$pdo->prepare($sql);
           $exe=$stmt->execute([':id'=>$id]);



        }
        
    } 
    //update.php
    <?php 

require('header.php');

$id=$_GET['id'];
$ret =new Retrive();
$ret->retriving($access->dbconnect('localhost','registering','root',""));
$up = new Update();
$up->locate($access->dbconnect('localhost','registering','root',""),$id);
//$dataling=$up->locate($access->dbconnect('localhost','registering','root',""),$id);
//$up->updating($access->dbconnect('localhost','registering','root',""),$id);
?>

      <div class="container">
      
      <!-- form row -->
      <div class="row mt-3">
         <div class="card col-8 ">
            <div class="col-9 align-center">
           
        
              <form action="" method="POST">
              
                      <div class="form-group mb-3 ">
                        <label for="name" class="text_secondary">Name</label>
                        <input value="<?php $up->locate($access->dbconnect('localhost','registering','root',""),$id);?>" type="text" name="name" autocomplete="on" class="form-control" >

                      </div> 
                      <div class="form-group mb-3 ">
                        <label for="phone" class="text_secondary">Phone</label>
                        <input value="<?php $up->locate($access->dbconnect('localhost','registering','root',""),$id);?>" type="number" name="phone" autocomplete="on" class="form-control" >

                      </div> 
                      <div class="form-group mb-3 ">
                        <label for="email" class="text_secondary">Email</label>
                        <input value="<?= $dataling->emails;?>" type="text" name="email" autocomplete="on" class="form-control" >

                      </div> 
                      <div class="form-group mb-3">
                      <div>
                        <label for="article" class="text_secondary">Article</label>
                        </div>
                       
                        <textarea  name="article" id="" cols="65" rows="10"><?= $dataling->articles;?></textarea>
                      </div> 

                                     
                    <div class="py-5">
                
                      <div class=" btn-group col-12">
                        <button type="submit" class="btn btn-success" name="update">update</button>

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
//
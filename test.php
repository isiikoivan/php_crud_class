  <?php
  include('header.php');
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $email=$_FILES['email'];
  $article=$_POST['article'];
  $d=['data','names','phone_number','emails','articles',$name,$phone,$email,$article];
  $ins=new Insert();
  $ins->universal_insert($pdo,$d,'submit');
  $c=[$pdo,'data'];
  $ret->retriving($c);
  

  ?>
      <div class="container">
      
      <!-- form row -->
      <div class="row">
      
        <div class="col-6 ">
 
        
              <form action="" method="POST" enctype="multipart/form-data">
              
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
                        <input type="file" name="email" class="form-control" placeholder="Enter Your Email">

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
                                <?php foreach($GLOBALS['dat'] as $dat):?>
                                <tr>
                                    <td><?=$dat->names?></td>
                                    <td><?=$dat->phone_number?></td>
                                    <td><?=$dat->emails?></td>
                                    <td> 
                                        <a href="update.php?id=<?=$dat->id?>" class="btn btn-primary"> Edit</a>
                                        <a href="deleting.php?id=<?=$dat->id?>" class="btn btn-danger" name="delete"> Delete</a>
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

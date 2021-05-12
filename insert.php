<?php
            /*THIS INSERT API ISIIKO -> DESTINY  gen1*/

              /*create an array first
               it takes odd number of parameters
               index at[0]=> table to be inserted in
               half of the index remaining takes in the column names
               and the remaining half takes in the values from the post or form or to be inserted 
               this api is organised in line on how its to function */
            $c=array();
                function uni_insert($pdo,$c)
                {
                    //index 1 holds the table name
                    $tables=$c[0];
                    echo "\n\t\ttable name\n\t\t";
                    echo $tables;

                    //index >1 and <length($c/2) hold the columns in the table
                    $columns=array();
                    for($n=1; $n<=((count($c)-1)/2); $n++)
                    {
                        //echo $c[$n];
                        array_push($columns,$c[$n]);

                    }
                    echo "\n\t\tcolumns in the db\t\t \n";
                     print_r($columns);

                    // echo $columns;

                     //index >length($c/2) and <length($c) hold the values in the table //loops thru the values
                     $values=array();//array is created once
                     for($n=((count($c)+1)/2);$n<=(count($c)-1);$n++)
                     {
                          $check_type=is_array($c[$n]);
                         if($check_type){
                          //$t_dir=mkdir("assests\files");
                        $target_dir="files/";
                        $target_file=$target_dir.basename($_FILES['upload']['name']);
                        //     $target_dir="files/";
                           move_uploaded_file($_FILES['upload']['tmp_name'],$target_file);
                         // $target_file=$target_dir.basename ($_FILES['upload']['name']);
                        //  $filetype=strtolower(pathinfo($target_dir,PATHINFO_EXTENSION));
                          $c[$n]=$target_file;
                             
                        //   } 
                         
                         }
                         array_push($values,$c[$n]);

                    }
                     echo "\n\t\tvalues to be input to db \t\t\n";
                     print_r($values);


                     //derivation of placeholders eg :name from column names concatination keys with :
                     $placeholders=array();
                     for($v=1; $v<=((count($c)-1)/2); $v++)
                     {
                       $concatenate=':'.$c[$v];
                        array_push($placeholders,$concatenate);

                     }   
                     echo "\n\t\tplace holders\t\t\n";
                     print_r($placeholders);   


                     //converting keys into strings
                     $keys=array();
                     for($v=1; $v<=((count($c)-1)/2); $v++)
                     { //establishing a single array that is to be converted to strings the excute function
                         $singlearr=array();
                         $conc_keys=':'.$c[$v];
                         array_push($singlearr,$conc_keys);
                        //  print_r($singlearr);
                         $string_keys=implode($singlearr);

                        array_push($keys,$string_keys);

                     }   
                     echo "\n\t\tkeys\n\t\t\t";
                     // echo $keys[0];
                     print_r($keys);  

                     //pairing up keys and values for the excute function
                     //dealing with $keys array and $values array 
                     $exc_array=array();
                     for($n=0;$n<=(count($values)-1);$n++)
                     {
                        $exc_array[$keys[$n]]=$values[$n];
                        // array_push($exc_array,$assign);

                     }
                     echo "\n \t excute implode";
                     //converting into a stirng
                    //  print_r($exc_array[':emails']);

                     echo "\n \t\t\t excute array\t\t\t";
                     print_r($exc_array);

                     //feeds  to the sql
                     $ins_columns=implode(",",$columns);
                     $ins_values=implode(",",$placeholders);


                    $sql="INSERT INTO $tables ($ins_columns) VALUES ($ins_values)";
                    $stmt=$pdo->prepare($sql);
                    $sub=$stmt->execute($exc_array);
                    if($sub)
                    {
                      
                       echo $message='data inserted successfully';
                    }
                    else
                    {
                       echo $message='failed to submit';
                    }
                }
                /* THIS INSERT API ISIIKO -> DESTINY  gen2*/
                
                /* This takes is expected to check throug the array for a file 
                able to check and create folder to insert the file path
                */
                      
?>

<?php
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
                    }
                    else
                    {
                        $message='failed to submit';
                     
                }

            }
           }
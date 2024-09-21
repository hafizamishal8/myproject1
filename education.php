    <?php
    include("connect.php");
    extract($_GET);

    if(isset($id) && $id > 0 && ($mode)&& $mode =='edit'){
        $sql ="SELECT * FROM users WHERE id ='".$id."'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count>0){
            $row1 = mysqli_fetch_assoc($result);
            $highest_degree = $row1['highest_degree'];
            $university = $row1['university'];
            $graduation_year = $row1['graduation_year'];
            $major = $row1['major'];
            $gpa = $row1['gpa'];
        }
    }

    
    extract($_POST);
    if(isset($is_submit)){
        if(isset($highest_degree) && $highest_degree==""){
            $error['highest_degree'] = "Required";
        }
        // else{
        // $sql = "SELECT * FROM users WHERE id = '".$id."'";
        // if(isset($mode) && $mode == 'edit'){
        //     $sql .= "AND id != '".$id."'";
        // }
     
        // $result = mysqli_query($conn,$ql);
        // $count = mysqli_num_rows($result);
        //  if($count>0){
        //         $error['higest_degree'] ="Already Exist";
        // }
        // }
        if(isset($university) && $university == ""){
            $error['university'] = "Required";
        }
        if(isset($graduation_year) && $graduation_year == ""){
            $error['graduation_year'] = "Required";
        }
        if(isset($major) && $major == ""){
            $error['major'] = "Required";
        }
        if(isset($gpa) && $gpa == ""){
            $error['gpa'] = "Required";
        }


        if(empty($error)){


            if(isset($mode) && $mode =='edit'){
               $sql = " UPDATE users SET highest_degree  ='".$highest_degree."',
                                        university ='".$university."',
                                        graduation_year ='".$graduation_year."',
                                        major ='".$major."',
                                        gpa ='".$gpa."'
                        WHERE id ='".$id."'";
                $ok = mysqli_query($conn,$sql);
                if($ok){
                    echo "<br><br><span class='success'>  Record Updated Suceesfully </span><br><br>";
                }
                else{
                    echo "<br><br><span class='error'>Error</span><br><br>";
                }  
            } 
            else{
                $sql = "INSERT INTO users (highest_degree ,university ,graduation_year, major ,gpa)
                        VALUES ('".$highest_degree."', '".$university."','".$graduation_year."', '".$major."', '".$gpa."')";
                $ok =mysqli_query($conn, $sql);
                if($ok){
                    echo "<br><br><span class='success'>  Added Record Successfully </span><br><br>";

                    $highest_degree ="";
                    $university ="";
                    $graduation_year ="";
                    $major ="";
                    $gpa ="";
                }
                else{
                    echo "<br><br><span class='error'>Error</span><br><br>";
                }
            }
      }
    }
    ?>
        
    <link rel="stylesheet" href="style.css">
     <h1>Education info</h1>

    <form method="post" action="">
        <input type="hidden" name="is_submit" value="y">
        
        <div class="col-12">
            <label for="highest_degree"><b>Highest Degree: 
                <span class="color_red">*<?php
                if(isset($error['highest_degree'])){
                    echo $error['highest_degree'];
                }
                ?></span></b></label>
            
            <input  class= "inputtype" type="text" id="highest_degree" name="highest_degree" value="<?php
            if(isset($highest_degree)){
                echo $highest_degree;
            }
            ?>"/>
        </div>
        
        <div  class="col-12">
            <label for="university"><b>University:  
            <span class="color_red">*<?php
            if(isset($error['university'])){
                echo $error['university'];
            }
                

            ?></span></b></label>
            <input  class= "inputtype" type="text" id="university" name="university" value="<?php
            if(isset($university)){
                echo $university;
            }
            ?>"/>
        </div>
        
        <div class="col-12">
            
            <label for="graduation_year"><b>Year of Graduation: 
            <span class="color_red">*<?php
            if(isset($error['graduation_year'])){
                echo $error['graduation_year'];
            }
            ?></span></b></label>
            
            <input class= "inputtype" type="number" id="graduation_year" name="graduation_year" min="1900" max="2100" value="<?php
            if(isset($graduation_year)){
                echo $graduation_year;
            }
            ?>"/>
        </div>
        
        <div class="col-12">
            
            <label for="major" ><b>Major: 
            <span class="color_red">*<?php
            if(isset($error['major'])){
                echo $error['major'];
            }
            ?></span></b></label>
            
            <input class= "inputtype" type="text" id="major" name="major" value="<?php
            if(isset($major)){
                echo $major;
            }
            ?>"/>
        </div>
        <div class="col-12">
            
            <label for="gpa" ><b>GPA: 
            <span class="color_red">*<?php
              if(isset($error['gpa'])){
                echo $error['gpa'];
              } 
            ?></span></b></label>
            
            <input class= "inputtype" type="text" id="gpa" name="gpa" value="<?php
            if(isset ($gpa)){
                echo $gpa;
            }
            ?>"/>
        </div>
        
        <div  class="col-12">
            
            <label for="additional_courses"><b>Additional Courses:</b></label>
            <textarea class= "inputtype" id="additional_courses" name="additional_courses" rows="4"></textarea>
        </div>
        
        <div class= "col-12">            
            <input class="submit" type="submit" value="submit">
        </div>
        <div class="table">
            <?php
            $sql ="SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            $count= mysqli_num_rows($result);
            if($count>0){ ?>
      <h3>Educational information</h3>
   <table>
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>highest_degree</th>
                    <th>university</th>
                    <th>graduation_year</th>
                    <th>major</th>
                    <th>gpa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i =0;
                while($row =mysqli_fetch_assoc($result)){
                  $id =$row['id'];?>
                  <tr>
                    <td><?php echo $i+1; ?></td>
                    <td><?php echo $row ['highest_degree']?></td>
                    <td><?php echo $row ['university']?></td>
                    <td><?php echo $row ['graduation_year']?> </td>
                    <td><?php echo $row ['major']?></td>
                    <td><?php echo $row ['gpa']?></td>
                    <td>
                        <a href="education.php?id=<?php echo $row ['id'];?>&mode=edit">Edit</a>
                    </td>
                </tr>
                <?php
                $i++;
                
                }?>     
            </tbody>
         </table>
           <?php }?>
            
         
        </div>
    </form>




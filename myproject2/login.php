<?php
include('connection.php');

extract($_GET);
 if(isset($id)&& $id >0 && isset($mode) && $mode =='edit'){
   $sql ="SELECT * FROM users WHERE id ='".$id."'";
   $result =mysqli_query($conn,$sql);
   $count= mysqli_num_rows($result);
    
   if($count >0){
    $row1 =mysqli_fetch_assoc($result);
    $username = $row1['username'];
    $email = $row1['email'];
    $password = $row1['password'];
   } 
 }
extract($_POST);
    if(isset($is_submit)){
        if(isset($username) && $username ==""){
            $error['username'] ="Required";
        }
        if(isset($email) && $email ==""){
            $error['email'] ="Required";
        }
       else {
            $sql = " SELECT * FROM users WHERE email = '".$email."' ";
            if(isset($mode) && $mode == 'edit'){
                $sql .= "AND id != '".$id."' ";
            }
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if($count > 0){
                $error['email'] = "This phone_no is already exist";
            }
        }
        if(isset($password) && $password ==""){
            $error['password'] ="Required";
        }
       else {
            $sql = " SELECT * FROM users WHERE password = '".$password."' ";
            if(isset($mode) && $mode == 'edit'){
                $sql .= " AND id != '".$id."' ";
            }
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if($count > 0){
                $error['password'] = "This phone_no is already exist";
            }
        }

        if(empty($error)){
            if(isset($mode) && $mode =='edit'){
                $sql= "UPDATE users SET username = '".$username."',
                                        email ='".$email."',
                                        password ='".$password."'
                                        WHERE id = '".$id."'";
                $ok = mysqli_query($conn,$sql);
                if($ok){
                    echo "<br><br><span class ='success'>updated</span><br><br>";
                }
                else{
                    echo "<br><br><span class ='error'>error</span><br><br>";
                }
            }
            else{
                $sql ="INSERT INTO users (username, email,`password`)
                        VALUES ('".$username."','".$email."','".$password."')";
                $ok = mysqli_query($conn,$sql);
                if($ok){
                    echo "<br><br><span class='success'>Record Added Successfully</span><br><br>";
                    
                    $username = "";
                    $email = "";
                    $password = "";  
                }
                else{
                    echo "<br><br><span class='error'>Error</span><br><br>";
                }
            }
        } 
    }

    ?>
        
    <link rel="stylesheet" href="style.css">
     <h1>Login form</h1>

    <form method="post" action="">
        <input type="hidden" name="is_submit" value="y">
        
        <div class="col-12">
            <label for="username"><b>User_name: 
                <span class="color_red">*<?php
                if(isset($error['username'])){
                    echo $error['username'];
                }
                ?></span></b></label>
            
            <input  class= "inputtype" type="text" id="username" name="username" value="<?php
            if(isset($username)){
                echo $username;
            }
            ?>"/>
        </div>
        
        <div  class="col-12">
            <label for="email"><b>Email:  
            <span class="color_red">*<?php
            if(isset($error['email'])){
                echo $error['email'];
            }
                

            ?></span></b></label>
            <input  class= "inputtype" type="text" id="email" name="email" value="<?php
            if(isset($email)){
                echo $email;
            }
            ?>"/>
        </div>
        
        <div class="col-12">
            
            <label for="password"><b>Password: 
            <span class="color_red">*<?php
            if(isset($error['password'])){
                echo $error['password'];
            }
            ?></span></b></label>
            
            <input class= "inputtype" type="password" id="password" name="password"  value="<?php
            if(isset($password)){
                echo $password;
            }
            ?>"/>
        </div>
        
        <div class= "col-12">            
            <input class="submit" type="submit" value="submit">
        </div>
        <!-- table -->
<div class="table">
<?php
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0){ ?>
    <table>
        <thead>
            <tr>
                <th>Sno.</th>
                <th>username</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
        <?php
             $i = 0;
             while($row = mysqli_fetch_assoc($result)){
             $id = $row['id']; ?>
            <tr>
                <td><?php echo $i+1;?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['password']?></td>
                <td>
                    <a href="login.php?id=<?php echo $id; ?>&mode=edit"?>Edit</a>
                </td>
            </tr>
            <?php
             $i++;
          } ?>
        </tbody>
    </table>
    <?php
   }?>
</div>
</form>
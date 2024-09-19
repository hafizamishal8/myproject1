    <?php
    include("connect.php");

    extract($_POST);
    if(isset($is_submit)){
        if(isset($full_name) && $full_name ==""){
            $error ['full_name'] = "Please fill this feild";
        }
        if(isset($email) && $email == ""){
             $error ['email'] = "Please fill this feild";
        }
        else{
            $sql="SELECT * FROM users WHERE email = '".$email."'";
            $result= mysqli_query($conn, $sql);
            $count= mysqli_num_rows($result);
            if($count > 0){
                $error ['email'] = "This email is already exist";
            }
        }
        if(isset($phone) && $phone == ""){
             $error['phone'] = "Required";
        }
        else{
            $sql = "SELECT * FROM users WHERE phone = '".$phone."'";
            $result= mysqli_query($conn,$sql);
            $count= mysqli_num_rows($result);
            if(count > 0){
                $error['phone'] = "This phone no. is already exist";
            }
        }
        if(isset($address) && $address == ""){
              $error ['address'] = "Required";
        }
        if(isset($city) && $city == ""){
            $error ['city'] = "Required";
        }
    }
    ?>
    
    <link rel="stylesheet" href="style.css">
    <h1>Form Info</h1>

    <form method="post" action="">
        
    <input type="hidden" name="is_submit" value="y"/>
        <div class= "col-12">
            <label for="full_name" ><b>Full Name: 
            <span class= "color_red">*
            <?php
           if(isset($error['full_name'])){
                echo $error['full_name'];
            }
            ?></span></b></label>

            <input class="inputtype" type="text" id="full_name" name="full_name" value="<?php
            if(isset($full_name)){
                echo $full_name;
            }
            ?>"/>
        </div>

        <div class= "col-12">
            <label for="email"><b>Email:     
           <span class="color_red">*<?php
           if(isset($error['email'])){
            echo $error['email'];
           }
           ?></span>
           </b></label>

            <input class="inputtype" type="email" id="email" name="email" value="<?php
            if(isset($email)){
                echo $email;
            }
            ?>"/>
        </div>
       
        <div class= "col-12">
            <label for="phone"><b>Phone: 
            <span class="color_red">*<?php
            if(isset($error['phone'])){
                echo $error['phone'];
            }
            ?></span>
            </b></label>

            <input class="inputtype" type="text" id="phone" name="phone" value="<?php
            if(isset($phone)){
                echo $phone;
            }
            ?>"/>
        </div>

        <div class= "col-12">            
            <label for="address" ><b>Address: 
                <span class="color_red">*<?php
                if(isset($error['address'])){
                    echo($error['address']);
                }
                 ?></span>
                 </b></label>
            
                 <input class="inputtype" type="text" id="address" name="address" value="<?php
                 if(isset($address)){
                    echo $address;
                 }
                 ?>"/>
        </div>

        <div class= "col-12">
            <label for="city"><b>City:    
            <span class="color_red">*<?php
            if(isset($error['city'])){
                echo $error['city'];
            }
            ?></span>
            </b></label>
            
            <input class="inputtype" type="text" id="city" name="city" value="<?php
            if(isset($city)){
                echo $city;
            }
            ?>"/>
        </div>

        <div class= "col-12">            
            <label for="message" ><b>Message:</b></label>
            <textarea class="inputtype" id="message" name="message" rows="4" ></textarea>
        </div>

        <div class= "col-12">            
            <input class="submit" type="submit" value="submit">
        </div>

    </form>
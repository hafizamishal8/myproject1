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
        </form>
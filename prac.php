<?php

include("connection4.php");

// extract($_POST);
// extract($_GET);

extract($_GET);

if(isset($id) && $id > 0 && isset($mode) && $mode =='edit'){
    $sql = "SELECT * FROM users WHERE id = '".$id."' ";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        // echo date('YmdHis')."test";die;
        $row1 = mysqli_fetch_assoc($result);
        $full_name = $row1['full_name'];
        $parent_name = $row1['parent_name'];
    }
}
extract($_POST);
if(isset($is_submit)){
    if(isset($position) && $position == ""){
        $error['position'] = "Required";
    }
    if(isset($full_name) && $full_name == ""){
       $error['full_name'] = "Required";
    }
    if(isset($parent_name) && $parent_name == ""){
        $error['parent_name'] = "Required";
    }
    if(isset($address) && $address == ""){
        $error['address'] = "Required";
    }
    if(isset($phone_no) && $phone_no == ""){
        $error['phone_no'] = "Required";
    }
    else{
        $sql = "SELECT * FROM users WHERE phone_no = '".$phone_no."'";
        if(isset($mode) && $mode == 'edit'){
            $sql .= " id != '".$id."' ";
        }
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $error['phone_no'] = "This phone no. is already exist";
        }
    }
    if(isset($email) && $email == ""){
        $error['email'] = "Required";
    }
    else{
        $sql = "SELECT * FROM users WHERE email = '".$email."'";
        if(isset($mode) && $mode == 'edit'){
            $sql .= " id != '".$id."' ";
        }
        $result = mysqli_query($conn, $sql);
        $count2 = mysqli_num_rows($result);
        if($count2 > 0){
            $error['email'] = "This email is already exist";
        }
    }
    if(isset($join_date) && $join_date == ""){
        $error['join_date'] = "Required";
    }
    if(isset($cnic_no) && $cnic_no == ""){
        $error['cnic_no'] = "Required";
    }
    else{
        $sql = "SELECT * FROM users WHERE cnic_no = '".$cnic_no."'";
        if(isset($mode) && $mode == 'edit'){
            $sql .= " id != '".$id."' ";
        }
        $result = mysqli_query($conn, $sql);
        $count3 = mysqli_num_rows($result);
        if($count3 > 0){
            $error['cnic_no'] = "This CNIC is already exist";
        }
    }
    if(isset($des_salary) && $des_salary == ""){
        $error['des_salary'] = "Required";
    }
    if(isset($DOB) && $DOB == ""){
        $error['DOB'] = "Required";
    }
    if(!isset($grad) || (isset($grad) && $grad == "")){
        $error['grad'] = "Required";
    }
    if(!isset($certified) || (isset ($certified) && $certified == "")){
        $error['certified'] = "Required";
    }


    
    if(empty($error)){
        if(isset($mode) && $mode == 'edit'){
            $sql = "UPDATE  users SET   full_name = '".$full_name."', 
                                        parent_name = '".$parent_name."', 
                                        parent_name = '".$parent_name."'
                    WHERE id = '".$id."' ";
            $ok = mysqli_query($conn, $sql);
            if($ok){
                echo "<br><br><span class='success'> Record Updated Successfully </span><br><br>";
            }
            else{
                echo "<br><br><span class='error'> Error </span><br><br>";
            }
        }
        else{
            $sql = "INSERT INTO users (full_name, parent_name, `address`, phone_no, email, gender, join_date, cnic_no, des_salary,`status`, no_of_child, DOB, detail_of_med_issue, inter_board, inter_group, inter_from, inter_to, uni, city, `from`, `to`, grad, company, company_phone, company_address, supervisor_name_phn, job_title, start_salary, last_salary, responsibilities, comp_from, comp_to, reason_for_leave, sup_contact, certified)
                    VALUES('".$full_name."', '".$parent_name."', '".$address."', '".$phone_no."', '".$email."', '".$gender."', '".$join_date."', '".$cnic_no."', '".$des_salary."', '".$status."', '".$no_of_child."', '".$DOB."', '".$detail_of_med_issue."' ,'".$inter_board."', '".$inter_group."', '".$inter_from."', '".$inter_to."', '".$uni."', '".$city."', '".$from."', '".$to."', '".$grad."', '".$company."', '".$company_phone."', '".$company_address."', '".$supervisor_name_phn."', '".$job_title."', '".$start_salary."', '".$last_salary."', '".$responsibilities."', '".$comp_from."',  '".$comp_to."',  '".$reason_for_leave."',  '".$sup_contact."',  '".$certified."')";
            $ok = mysqli_query($conn, $sql);

            if($ok){
                echo "<br><br><span class='success'> Record Added Successfully </span><br><br>";
            }
            else{
                echo "<br><br><span class='error'> Error </span><br><br>";
            } 
        }
    }
}
?>
<link rel="stylesheet" href="style.css" />

<form method="post" action="">
    <input type="hidden" name="is_submit" value="Y" />
    <h1>Application Information</h1>
    <div class="row">
        <div class="col12">
            <label for="postion">
                <h3>Position Applied for <span class="req"> * <?php
        if(isset($error['position'])){
            echo $error['position'];
        }
        ?></span></h3>
            </label>
            <input type="text" name="position" id="position" value="<?php
        if(isset($position)){
            echo $position;
        }
        ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col4">
            <label for="f_name">
                <h3>Full Name <span class="req"> * <?php
                    if(isset($error['full_name'])){
                        echo $error['full_name'];
                    }?></span></h3>
            </label>
            <input type="text" id="f_name" name="full_name" value="<?php if(isset($full_name)){ echo $full_name; }?>" />
        </div>

        <div class="col4">
            <label for="p_name">
                <h3>Parent Name <span class="req"> * <?php
            if(isset($error['parent_name'])){
                echo $error['parent_name'];
            }
            ?></span></h3>
            </label>
            <input type="text" name="parent_name" id="p_name" value="<?php
            if(isset($parent_name)){
                echo $parent_name;
            }
            ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col12">
            <label for="address">
                <h3>Address <span class="req"> * <?php
            if(isset($error['address'])){
                echo $error['address'];
            }?></span></h3>
            </label>
            <input type="text" id="address" name="address" value="<?php
            if(isset($address)){
                echo $address;
            }
            ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col4">
            <label for="phone">
                <h3>Phone<span class="req"> * <?php
            if(isset($error['phone_no'])){
                echo $error['phone_no'];
            }
            ?> </span></h3>
            </label>
            <input type="text" id="phone" name="phone_no" value="<?php
            if(isset($phone_no)){
                echo $phone_no;
            }
            ?>" />
        </div>
        <div class="col4">
            <label for="email">
                <h3>Email<span class="req"> * <?php
            if(isset($error['email'])){
                echo $error['email'];
            }
            ?></span></h3>
            </label>
            <input type="email" id="email" name="email" value="<?php
            if(isset($email)){
                echo $email;
            }
            ?>" />
        </div>
        <div class="col4">
            <h3>Gender</h3>
            <label for="male">
                <h3>Male </h3>
            </label>
            <input type="radio" id="male" name="gender" value="male"<?php
    if(isset($gender) && $gender == "male"){
        echo "checked";
    }
    ?>/>
            <label for="female">
                <h3 id="fem">Female </h3>
            </label>
            <input type="radio" id="female" name="gender" value="female"<?php
    if(isset($gender) && $gender == "female"){
        echo "checked";
    }
    ?> />
        </div>
    </div>
    <div class="row">
        <div class="col4">
            <label for="join_date">
                <h3>Joining Date <span class="req"> *<?php
            if(isset($error['join_date'])){
                echo $error['join_date'];
            }
            ?></span></h3>
            </label>
            <input type="date" name="join_date" id="join_date" value="<?php
            if(isset($join_date)){
                echo $join_date;
            }
            ?>" />
        </div>
        <div class="col4">
            <label for="cnic_no">
                <h3>CNIC NO <span class="req"> * <?php
            if(isset($error['cnic_no'])){
                echo $error['cnic_no'];
            }
            ?></span></h3>
            </label>
            <input type="text" name="cnic_no" id="cnic_no" value="<?php
            if(isset($cnic_no)){
                echo $cnic_no;
            }
            ?>" />
        </div>
        <div class="col4">
            <label for="des_salary">
                <h3>Desired Salary <span class="req"> * <?php
            if(isset($error['des_salary'])){
                echo $error['des_salary'];
            }
            ?></span></h3>
            </label>
            <input type="text" name="des_salary" id="des_salary" value="<?php
            if(isset($des_salary)){
                echo $des_salary;
            }
            ?>" />
        </div>
    </div>

    <div class="row">
        <div class="col4">
            <h3>Marital Status </h3>
            <select name="status">
                <option value="">Select your marital status</option>
                <option value="single"<?php
                if(isset($status) && $status == 'single'){
                    echo "selected";
                }
                ?>>Single </option>
                <option value="married" <?php
                if(isset($status) && $status == 'married'){
                    echo "selected";
                }
                ?>>Married</option>
            </select>
        </div>
        <div class="col4">
            <label for="no_of_child">
                <h3>No of Children </h3>
            </label>
            <input type="number" id="no_of_child" name="no_of_child" value="<?php
            if(isset($no_of_child)){
                echo $no_of_child;
            }
            ?>" />
        </div>
        <div class="col4">
            <label for="DOB">
                <h3>Date of Birth <span class="req"> * <?php
            if(isset($error['DOB'])){
                echo $error['DOB'];
            }
            ?></span></h3>
            </label>
            <input type="date" name="DOB" id="DOB" value="<?php
            if(isset($DOB)){
                echo $DOB;
            }
            ?>" />
        </div>
    </div>

    <div class="row">
        <div class="col12">
            <label for="detail">
                <h3>Detail if you have any medical issue: </h3>
            </label>
            <input type="textarea" id="detail" name="detail_of_med_issue" value="<?php
                if(isset($detail_of_med_issue)){
                    echo $detail_of_med_issue;
                }
                ?>" />
        </div>
    </div> 

    <div class="row">
        <div class="col12">
        <h2 >Education</h2>
    </div> 
    </div> 
    <div class="row">
        <div class="col6">
            <label for="inter_board">
                <h3>Intermediate Board</h3>
            </label>
            <input type="text" id="inter_board" name="inter_board" value="
                <?php
                if(isset($inter_board)){
                    echo $inter_board;
                }
                ?>" />
        </div>
        <div class="col6">
            <label for="inter_group">
                <h3>Intermediate Group</h3>
            </label>
            <input type="text" id="inter_group" name="inter_group" value="<?php
            if(isset($inter_group)){
                echo $inter_group;
            }
            ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col6"> 
                    <label class="inter_from">
                        <h3>Inter From</h3>
                    </label>
                    <input type="text" name="inter_from" id="inter_from" value="<?php
                    if(isset($inter_from)){
                        echo $inter_from;
                    }
                    ?>" />
                            </div>
                            <div class="col6"> 
                                <label class="inter_to">
                                    <h3>Inter To</h3>
                                </label>
                                <input type="text" name="inter_to" id="inter_to" value="<?php
                    if(isset($inter_to)){
                        echo $inter_to;
                    }
                    ?>" />
            </div>
        </div>
        <div class="row">
        <div class="col6"> 
                <span class="uni">
                    <label for="uni">
                        <h3>University</h3>
                    </label>
                    <input type="text" id="uni" name="uni" value="<?php
            if(isset($uni)){
                echo $uni;
            }
            ?>" />
               </div>
               <div class="col6"> 
                    <label for="city">
                        <h3>City</h3>
                    </label>
                    <input type="text" id="city" name="city" value="<?php
            if(isset($city)){
                echo $city;
            }
            ?>" />
            </div>
            </div>

            <div class="row">
               <div class="col4">
                    <label for="from">
                        <h3>From</h3>
                    </label>
                    <input type="text" id="from" name="from" value="<?php
            if(isset($from)){
                echo $from;
            }
            ?>" />
            </div>
                <div class="col4">
                    <label for="to">
                        <h3>To</h3>
                    </label>
                    <input type="text" id="to" name="to" value="<?php
            if(isset($to)){
                echo $to;
            }
            ?>" />
            </div>
            <div class="col4">
                 <h3>Have you done your graduate? <span class="req"> * <?php
            if(isset($error['grad'])){
                echo $error['grad'];
            }
            ?></span></h3>
                    <label for="yes">
                        <h3>Yes</h3>
                    </label>
                    <input type="radio" name="grad" id="yes" value="yes"<?php
            if(isset($grad) && $grad == "yes"){
                echo "checked";
            }
            ?>/>

                    <label for="no">
                        <h3 id="noo">No</h3>
                    </label>
                    <input type="radio" name="grad" id="no" value="no"<?php
            if(isset($grad) && $grad == "no"){
                echo  "checked";
            }
            ?>/>
            </div>
            </div>

            <div class="row">
        <div class="col12">
        <h2 >Last/ Current Employment</h2>
    </div> 
    </div> 
    <div class="row">
        <div class="col6">
            <label for="company"><h3>Company</h3></label>
            <input type="text" id="company" name="company" value="<?php
            if(isset($company)){
                echo $company;
            }
            ?>"/>
        </div>
        <div class="col6">
            <label for="company_phone"><h3>Company Phone</h3></label>
            <input type="text" id="company_phone" name="company_phone" value="<?php
            if(isset($company_phone)){
                echo $company_phone;
            }
            ?>"/>
        </div>
    </div>

    <div class="row">
        <div class="col12">
            <label for="company_address"><h3>Company Address</h3></label>
            <input type="text" id="company_address" name="company_address" value="<?php
            if(isset($company_address)){
                echo $company_address;
            }
            ?>"/>
        </div>
        </div>

        <div class="row">
        <div class="col12">
            <label for="supervisor_name_phn"><h3>Supervisor / Coworker Name & Phone</h3></label>
            <input type="textarea" id="supervisor_name_phn" name="supervisor_name_phn" value="<?php
            if(isset($supervisor_name_phn)){
                echo $supervisor_name_phn;
            }
            ?>"/>
        </div>
        </div>

        <div class="row">
        <div class="col4">
            <label for="job_title">
                <h3>Job Title</h3>
            </label>
            <input type="text" name="job_title" id="job_title" value="<?php
            if(isset($job_title)){
                echo $job_title;
            }
            ?>" />
        </div>
        <div class="col4">
            <label for="start_salary">
                <h3>Starting Salary</h3>
            </label>
            <input type="text" name="start_salary" id="start_salary" value="<?php
            if(isset($start_salary)){
                echo $start_salary;
            }
            ?>" />
        </div>
        <div class="col4">
            <label for="last_salary">
                <h3>Last Salary</h3>
            </label>
            <input type="text" name="last_salary" id="last_salary" value="<?php
            if(isset($last_salary)){
                echo $last_salary;
            }
            ?>" />
        </div>
    </div>

    <div class="row">
        <div class="col12">
            <label for="responsibilities"><h3>Responsibilities</h3></label>
            <input type="text" id="responsibilities" name="responsibilities" value="<?php
            if(isset($responsibilities)){
                echo $responsibilities;
            }
            ?>"/>
        </div>
        </div>

        <div class="row">
        <div class="col4">
            <label for="comp_from">
                <h3>From</h3>
            </label>
            <input type="text" name="comp_from" id="comp_from" value="<?php
            if(isset($comp_from)){
                echo $comp_from;
            }
            ?>" />
        </div>
        <div class="col4">
            <label for="comp_to">
                <h3>To</h3>
            </label>
            <input type="text" name="comp_to" id="comp_to" value="<?php
            if(isset($comp_to)){
                echo $comp_to;
            }
            ?>" />
        </div>
        <div class="col4">
            <label for="reason_for_leave">
                <h3>Reason For Leaving</h3>
            </label>
            <input type="text" name="reason_for_leave" id="reason_for_leave" value="<?php
            if(isset($reason_for_leave)){
                echo $reason_for_leave;
            }
            ?>" />
        </div>
    </div>

    <div class="row">
        <div class="col12">
            <h3>May we contact your previous supervisor for a reference?</h3>
        <label for="sup_yes"><h3 id="label_yes">Yes</h3></label>
        <input type="radio" id="sup_yes" name="sup_contact" value="yes"<?php
        if(isset($sup_contact) && $sup_contact == "yes"){
            echo "checked";
        }
        ?>/>
        <label for="sup_no"><h3 id="label_no">No</h3></label>
        <input type="radio" id="sup_no" name="sup_contact" value="no"<?php
        if(isset($sup_contact) && $sup_contact == "no"){
            echo "checked";
        }
        ?>/>
        </div>
    </div>

    <div class="row">
        <div class="col12">
            <h2>Disclaimer and Signature</h2>
        </div>
    </div>
    <div class="row">
        <div class="col12">
            <input type="checkbox" id="certified" name="certified" value="certified" <?php
            if(isset($certified)){
                echo "checked";
            }
            ?>/>
            <label for="certified"><h3 class="certified">I certify that my answers are true and complete to the best of my knowledge<span class="req"> *  <?php
            if(isset($error['certified'])){
                echo $error['certified'];
            }
            ?></span></h3></label>
        </div>
    </div>

    <div class="row">
           <button class="submit_btn" name="submit" id="submit"> Submit</button>
    </div>
    
    <div class="table">
        <?php
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){ ?>
            <h2>Application Information</h2>
            <table>
                <thead>
                    <tr>
                        <th>S. No</th>
                        <th>Full Name</th>
                        <th>Parent Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>CNIC</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id']; ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $row['full_name']?></td>
                            <td><?php echo $row['parent_name']?></td>
                            <td><?php echo $row['phone_no']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['cnic_no']?></td>
                            <td>
                                <a href="amizcontactform.php?id=<?php echo $id; ?>&mode=edit">Edit</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    } ?>
                </tbody>
            </table>
        <?php } ?>

    </div>
</form>
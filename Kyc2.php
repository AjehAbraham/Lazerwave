<?php 
/*
if($_SERVER["REQUEST_METHOD"] == "POST"){


    header("Location: Warning");
    exit;


}else{

header("Location: Warning");
exit;

}*/



        ?>



        <div class="form-container">

<h2><i class="fa fa-user-plus"></i> KYC2 upgrade(More information)</h2>

<p>Please make sure you fill in the appropraite information.</p>


            <form   id="FormData">

<label ><b>Date of birth:</b></label>
<br>
<input type="date" name = "DOB" value="<?php echo isset($_POST["DOB"]) ? $_POST["DOB"] : '' ?>">

<br>


<label><b>State of origin:</b></label>
<br>
<input type="text" placeholder="State.." name="state" value="<?php echo isset($_POST["state"]) ? $_POST["state"] : '' ?>">

<br>
            
<label><b>Local goverment:</b></label>
<br>
<input type="text" placeholder="LGA...." name="LGA" value="<?php echo isset($_POST["LGA"]) ? $_POST["LGA"] : '' ?>">

<br>
     
<label><b>Mother's name:</b></label>
<br>
<input type="text" placeholder="Mother's first name..." name="M_name" value="<?php echo isset($_POST["M_name"]) ? $_POST["M_name"] : '' ?>">
<br>


   
<label><b>Next of kin(Full name):</b></label>
<br>
<input type="text" placeholder="Full name..." name ="N_kin" value="<?php echo isset($_POST["N_kin"]) ? $_POST["N_kin"] : '' ?>">

<br>
   
<label><b>Relationship(Next of kin):</b></label>
<br>
<input type="text" placeholder="Siblings,parent,relative...." name="status" value="<?php echo isset($_POST["status"]) ? $_POST["status"] : '' ?>">

<br>


                 
<label><b>Occupation</b></label>
<br>
<select name="Occupation" value="<?php echo isset($_POST["Occupation"]) ? $_POST["Occupation"] : '' ?>">
    <option></option>
    <option>Student</option>
    <option>Self employed</option>
    <option>Employed</option>
 <option>Retired</option>
</select>

<p class="error_message"> </p>
<input type="submit" value="Upgrade">

</form>

</div>


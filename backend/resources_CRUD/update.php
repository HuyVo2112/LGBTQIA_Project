<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
  header("location: ../../src/admin-login.php");
  exit;
} 
?>

<?php
// Include config file
require_once "../shared/config.php";
 
// Define variables and initialize with empty values
// Tom: changed iniaial variables and error
$ResourceName = $Phone = $Email = $Website = $Advocacy = $Outreach = $CommunityCare = $Text = $Description = $SectionID = "";
$ResourceName_err = $PhoneNumber_err = $Email_err = $Website_err = $Advocacy_err = $Outreach_err = $CommunityCare_err = $TextLine_err = $Description_err = $SectionID_err = "";

 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    
    // Get hidden input value
    $id = $_POST["id"];
    
    // Tom: Validate name
    $input_name = trim($_POST["ResourceName"]);
    if (empty($input_name)) {
        $ResourceName_err = "Please enter the resources name.";
    } elseif (! filter_var($input_name, FILTER_VALIDATE_REGEXP, array(
        "options" => array(
            "regexp" => "/^[a-zA-Z\s]+$/"
        )
    ))) {
        $ResourceName_err = "Please enter a valid name.";
    } else {
        $ResourceName = $input_name;
    }
    
    // Tom: Validate phone
    $input_phone = trim($_POST["Phone"]);
    if (empty($input_phone)) {
        $Phone = NULL;
    } elseif (! ctype_digit($input_phone)) {
        $PhoneNumber_err = "Please enter a valid phone number.";
    } else {
        $Phone = $input_phone;
    }
    
    // Tom: Validate email
    $input_email = trim($_POST["Email"]);
    if (empty($input_email)) {
        // $Email_err = "Please enter an email.";
        $Email = NULL;
    } else {
        $Email = $input_email;
    }
    
    // Tom: Validate name
    $input_web = trim($_POST["Website"]);
    if (empty($input_name)) {
        $Website_err = NULL;
    } else {
        $Website = $input_web;
    }
    
    // Tom: Validate Advocacy
    $input_advocacy = trim($_POST["Advocacy"]);
    if (empty($input_advocacy)) {
        // $Advocacy_err = "Please enter an Advocacy.";
        $Advocacy = NULL;
    } else {
        $Advocacy = $input_advocacy;
    }
    
    // Tom: Validate Outreach
    $input_outreach = trim($_POST["Outreach"]);
    if (empty($input_outreach)) {
        // $Outreach_err = "Please enter an Outreach.";
        $Outreach = NULL;
    } else {
        $Outreach = $input_outreach;
    }
    
    // Tom: Validate CommunityCare
    $input_communitycare = trim($_POST["CommunityCare"]);
    if (empty($input_communitycare)) {
        // $CommunityCare_err = "Please enter CommunityCare.";
        $CommunityCare = NULL;
    } else {
        $CommunityCare = $input_communitycare;
    }
    
    // Tom: Validate TextLine
    $input_textline = trim($_POST["Text"]);
    if (empty($input_textline)) {
        // $TextLine_err = "Please enter TextLine or NULL if there is not";
        $Text = NULL;
    } else {
        $Text = $input_textline;
    }
    
    // Tom: Validate Description
    $input_description = trim($_POST["Description"]);
    if (empty($input_description)) {
        $Description_err = "Please enter some Description.";
        // $Description = NULL;
    } else {
        $Description = $input_description;
    }
    
    // Tom: Validate SectionID
    $input_sectionID = trim($_POST["SectionID"]);
    if (empty($input_sectionID)) {
        $SectionID_err = "Please enter the sectionID.";
    } elseif (! ctype_digit($input_sectionID)) {
        $SectionID_err = "Please enter a valid sectionID.";
    } else {
        $SectionID = $input_sectionID;
    }
    
    // Check input errors before inserting in database
    if (empty($ResourceName_err) && empty($SectionID_err)) {
        // Prepare an update statement
        $sql = "UPDATE resources SET ResourceName=?, Phone=?, Email=?, Website=?, Advocacy=?, Outreach=?, CommunityCare=?, Text=?, Description=?, SectionID=? WHERE ResourceID=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Set parameters
            $param_name = $ResourceName;
            $param_phone = $Phone;
            $param_email = $Email;
            $param_web = $Website;
            $param_adv = $Advocacy;
            $param_out = $Outreach;
            $param_cc = $CommunityCare;
            $param_tl = $Text;
            $param_des = $Description;
            $param_sId = $SectionID;
            $param_id = $id;
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssi", $param_name, $param_phone, $param_email, $param_web, $param_adv, $param_out, $param_cc, $param_tl, $param_des, $param_sId, $param_id);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
         
        
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM resources WHERE ResourceID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            // Set parameters
            $param_id = $id;        
            mysqli_stmt_bind_param($stmt, "i", $param_id);
                  
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $ResourceName = $row["ResourceName"];
                    $Phone = $row["Phone"];
                    $Email = $row["Email"];
                    $Website = $row["Website"];
                    $Advocacy = $row["Advocacy"];
                    $Outreach = $row["Outreach"];
                    $CommunityCare = $row["CommunityCare"];
                    $Text = $row["Text"];
                    $Description = $row["Description"];
                    $SectionID = $row["SectionID"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: ../shared/error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: ../shared/error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
<<<<<<< HEAD
                    <p>Please edit the input values and submit to update the resource record.</p>
=======
                    <p>Please edit the input values and submit to update the employee record.</p>
>>>>>>> cab9cff2a1a7a968049d19c01485fecc0a08e2d4
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
							<label>ResourceName</label> <input type="text"
								name="ResourceName"
								class="form-control <?php echo (!empty($ResourceName_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $ResourceName; ?>"> <span
								class="invalid-feedback"><?php echo $ResourceName_err;?></span>
						</div>
						<div class="form-group">
							<label>Phone</label> <input type="text" name="Phone"
								class="form-control <?php echo (!empty($PhoneNumber_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $Phone; ?>"> <span class="invalid-feedback"><?php echo $PhoneNumber_err;?></span>
						</div>
						<div class="form-group">
							<label>Email</label> <input type="text" name="Email"
								class="form-control <?php echo (!empty($Email_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $Email; ?>"> <span class="invalid-feedback"><?php echo $Email_err;?></span>
						</div>
						<div class="form-group">
							<label>Website</label> <input type="text" name="Website"
								class="form-control <?php echo (!empty($Website_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $Website; ?>"> <span class="invalid-feedback"><?php echo $Website_err;?></span>
						</div>
						<div class="form-group">
							<label>Advocacy</label> <input type="text" name="Advocacy"
								class="form-control <?php echo (!empty($Advocacy_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $Advocacy; ?>"> <span class="invalid-feedback"><?php echo $Advocacy_err;?></span>
						</div>
						<div class="form-group">
							<label>Outreach</label> <input type="text" name="Outreach"
								class="form-control <?php echo (!empty($Outreach_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $Outreach; ?>"> <span class="invalid-feedback"><?php echo $Outreach_err;?></span>
						</div>
						<div class="form-group">
							<label>CommunityCare</label> <input type="text"
								name="CommunityCare"
								class="form-control <?php echo (!empty($CommunityCare_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $CommunityCare; ?>"> <span
								class="invalid-feedback"><?php echo $CommunityCare_err;?></span>
						</div>
						<div class="form-group">
							<label>Text</label> <input type="text" name="Text"
								class="form-control <?php echo (!empty($TextLine_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $Text; ?>"> <span class="invalid-feedback"><?php echo $TextLine_err;?></span>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="Description"
								class="form-control <?php echo (!empty($Description_err)) ? 'is-invalid' : ''; ?>"><?php echo $Description; ?></textarea>
							<span class="invalid-feedback"><?php echo $Description_err;?></span>
						</div>
						<div class="form-group">
							<label>SectionID</label> <input type="text" name="SectionID"
								class="form-control <?php echo (!empty($SectionID_err)) ? 'is-invalid' : ''; ?>"
								value="<?php echo $SectionID; ?>"> <span
								class="invalid-feedback"><?php echo $SectionID_err;?></span>
						</div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
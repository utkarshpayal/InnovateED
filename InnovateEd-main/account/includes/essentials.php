<?php
/*
 * This file contains all the essential variables for ProfileHunt
 * 
 * It needs to be included in all php files
 * 
 */

###
# This is the path for root of the site
###
function ph_path(){
	return $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR;
}


###
# Use this function to access files in includes folder
###
function ph_include($includePath){
	return dirname(realpath(__FILE__)).DIRECTORY_SEPARATOR.$includePath;
}


###
# This function checks if user email exists
###

function ph_userEmailVerify($userEmailToVerify){
    include_once(ph_include("sql.php"));
    // prepare and bind
    $stmt = $conn->prepare("SELECT userEmail from ph_BigPP WHERE userEmail = ?");
    $stmt->bind_param("s", $userEmailToVerify);
    $stmt->execute();
    //fetch the results
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();

    //check if the Email is already registered in database or not
    $fetchedArray= $result->fetch_assoc();
    if (is_countable($fetchedArray) && sizeof($fetchedArray) === 1) {
        return True;
    }else{
        return False;
    }
}

###
# This function returns all the data related to an email in the user table
###
function ph_userData($userEmail){
    include(ph_include("sql.php"));
    // prepare and bind
    $stmt = $conn->prepare("SELECT * from ph_BigPP WHERE userEmail = ?");
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    //fetch the results
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();

    //Return the output of the function
    $fetchedArray= $result->fetch_assoc();
    return $fetchedArray;
  }


###
# Create user account if it does not exist
###
  function ph_userCreate($userEmail,$userPassword){
    include(ph_include("sql.php"));
    // prepare and bind
    //create user account
    $stmt = $conn->prepare(
        "INSERT INTO ph_BigPP(userName,userEmail,userPassword,joinDate) VALUES(NULL,?,?,sysdate())"
    );
    //Bind useremail and hashed password
    $stmt->bind_param("ss", $userEmail,password_hash($userPassword, PASSWORD_BCRYPT));
    $stmt->execute();
    $stmt->close();
    $conn->close();
  }

###
# Verify if user is logged in
###

  function user(){
    if (isset($_SESSION['userID']) && $_SESSION['loggedIN']) {
        // return true if the user is logged in
        return True;
    }
  }


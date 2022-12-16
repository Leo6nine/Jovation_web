<?php
    // show error for debuging, remove file for production
    ini_set("display_errors", "1");
    error_reporting(E_ALL);

    //require config file
    require_once('config.php');

    //process the form data
    function process_form($post){
        //validate the email
        if(!validate_email($post['email'])){
            return array('status' => 0, 'massage' => 'This is not a valid email address');
        }

        //validate data
        $validation = validate_data($post);

        if(!$validation['status']){
            return array('status'=> 0, 'errors' => $validation['data']);
        }

        //use validated data
        $data = $validation['data'];

        //process database actions
        if(!process_database($data)){
            return array('status' => 0, 'massage' => 'Unable to process database request');
        }

        //process email
        if(!process_email($data)){
            return array('status' => 0, 'massage' => 'Unable to send email');
        }

        return array('status' => 1);
    }
    
    //validate email address
    function validate_email($email){
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    //validate field data
    function validate_data($post){
        //globalised the whitelist
        global $whitelist;

        //whitelist data
        foreach ($whitelist as $key){
            $fields[$key] = $post[$key];
        }

        //validate data
        $errors = array();

        foreach($fields as $field => $data) {
            if (empty($data)){
                $errors[] = 'please enter your '. $field;
            }
        }

        //check for errors
        if(empty('errors')){
            return array('status'=> 1, 'data' => $fields);
        }else{
            return array('status'=> 0, 'data' => $errors);
        }
    }

    //process database actions
    function process_database($post){
        global $contact_info;

        $host = "localhost";  
        $user = "root";  
        $password = 'root@';  //'PEkIex4)!tW!qygb';  
        $db_name = "contact_info";

        //connect to database 
        $con = new mysqli ($host, $user, $password, $db_name);
        // $con = mysqli_connect($host, $user, $password, $db_name); 

        //check database connection
        if($con->connect_error){
            die("Connection failed: " . mysqli_connect_error());
            // return false;
            
        }else{
            if($stmt = $con->prepare ("INSERT INTO $contact_info (name, email, message) VALUES (?,?,?)")){
                $stmt->bind_param("sss", $name, $email, $message);

               //$name = $_POST['name'];//$post
                //$email = $_POST['email'];//$post
                //$message = $_POST['message'];//$post
                $name = "Bobson";
                $email = "leonineobiku@gmail.com";
                $message = "Please work";
                $stmt->execute();
                
                echo $con. '<br>';

                if(!$stmt->execute()){
                    return false;
                }
                

            }else{
                var_dump($errors);
                exit;
                return false;
            }
        }
        return true;
    }

    //checks and process
    function process_email($post){
        global $from, $email_address, $subject;
        //set headers
        $headers = 'MIME-Verion:1.0' . "\r\n";
        $headers .= 'content-type:text/html, charset = Iso-8859-1' . "\r\n";
        $headers .= sprintf('from : %s <%s>', $from, $email_address);

        //send the email
        return mail($email_address, $subject, $post['message'], $headers);
        
    }

    //validate input
    function validate_input($input_name){
        global $sent;

        if(empty($_POST)){
            return '';
        }

        if($sent){
            return '';
        }

        return _e($_POST[$input_name]);
    }

    //Escape output
    function _e($string){
        return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
    }





?>
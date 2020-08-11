<html>
<?php
    // the shared secret, used to sign the POST data (using HMAC with SHA1)
    $secret = 'serbansorinreshiftdigital';

    // receive POST data for signature calculation, don't change!
    $post_data = file_get_contents('php://input');
    $signature = "sha1=" . hash_hmac('sha1', $post_data, $secret);
    
    if(isset($_SERVER['HTTP_X_HUB_SIGNATURE']) == true){
    if( $signature == $_SERVER['HTTP_X_HUB_SIGNATURE']){
        echo "Succes";
        $comand = `startupdate.bat`;
        system($comand." > NUL");
         echo "Completed.";
        
    }else{
       
        http_response_code(404);
        die("Forbidden");
    }
    }else{
        http_response_code(404);
        die("Forbidden");
    }
    
    
   
?>
</html>

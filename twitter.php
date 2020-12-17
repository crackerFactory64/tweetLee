<?php

   require "twitteroauth/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

    $consumer_key = "KZlMl8zXGspbmZ5URskgmBKEs";

    $consumer_secret = "IyG1OhEusQn3Wllqsl74zQPOCSAcuwUIDhciM2XcwOYovVD9Hk";

    $access_token = "18539238-hWRGL0zf3dkipafS4RroN68worpkX0z1CWZ5H01cB";

    $access_token_secret = "JJvlvZmcg0JE7MKXjaBmxvxdCENDl4U3dpZzy7nLzEDd9";

    $connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

    $statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);
    
    $text = [];

    $users = [];

    $pics = [];
    
    $handle = [];
    
    
   
    
?>


<html>

    <head>
    
        <title>TweetLee</title>
            
        <link rel = "stylesheet"  type = "text/css" href = "twitter.css"> 

        
    </head>
    
    <body>
    
        <h1 style="text-align: center; margin-bottom: -20px;">TweetLee</h1>
        
        <h2 style="text-align: center;">Showing only the good tweets</h2>
        
        <div id="tweetContainer" >
            
            <?php
        
                foreach ($statuses as $tweet){        

                    if ($tweet->favorite_count >= 2){

                        $status = $connection->get("statuses/oembed", ["id" => $tweet->id]);

                        echo $status->html;

                        array_push($text, $tweet->text);
                        array_push($users, $tweet->user->name);
                        array_push($pics, $tweet->user->profile_image_url);
                        array_push($handle, $tweet->user->screen_name);


                    }
                }   
            ?>
                            
          
        
        </div>
        
        <p style="text-align: center;"><a href="http://leemander-com.stackstaging.com/content/8-apis/twitter.php"><button type="submit">Reload</button></a></p> 
        
    </body>

</html>
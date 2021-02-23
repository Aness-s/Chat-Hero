<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
 
        <title>Chat Hero Chatroom</title>
        <meta name="description" content="Tuts+ Chat Application" />
        <link rel="stylesheet" href="test.css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Hi, <b><?php echo $_GET['fname']; ?></b> Welcome to Chat Room <b><?php echo $_GET['room']; ?></b> </p>

            </div>
 
            <div id="chatbox">
                <?php
                    $mysqli = new mysqli('35.203.54.110', 'root', '1234', 'rm1');

                    if ($mysqli -> connect_errno){
                        echo "Connection Fail: " . $mysqli -> connect_errno;
                        exit();
                    }

                    $commandText = "SELECT userid, message FROM chat";
                    $result = $mysqli->query($commandText);

                    if ($result){

                        print("<br/>");
                        
                        while ($row = mysqli_fetch_assoc($result)){
                            printf("%s : %s", $row['userid'], $row['message']);
                            print("<br/>");
                        }
                        $result->close();
                    }

                    $mysqli->close();
                ?>

            </div>
 
            <form name="message" action="insert.php" method="POST">
                <input name="userid" type="text" id="userid" value="<?php echo $_GET['fname']; ?> "/>   
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document
            $(document).ready(function () {});
        </script>

        
    </body>
</html>






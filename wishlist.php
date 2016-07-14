<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Wish list of <?php echo htmlentities($_GET["user"])."<br>"; ?>
        <?php
        
        $con = mysqli_connect("localhost", "phpuser","phpuserpw");
        
        if(!$con){
            exit('Connect Error ('.mysqli_connect_errno().')'
                    .mysqli_connect_error());
        }
        
        //Colocamos el set de carateres del cliente por default:
        mysqli_set_charset($con, 'utf-8');
        
        mysqli_select_db($con, "wishlist");
                       
        $user = mysqli_real_escape_string($con,htmlentities($_GET["user"]) );
        
        $wisher = mysqli_query($con, "select id from wishers where name = '$user'");                
                     
        if(mysqli_num_rows($wisher) <1){
            exit("The person $user is not found. Please try the spelling and try again");

        }
            
        $row = mysqli_fetch_row($wisher);
        $wisherID = $row[0];
        mysqli_free_result($wisher);
        
        ?>
        <table border="black">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($con, "SELECT description, due_date FROM wishes WHERE wisher_id=" . $wisherID);
                while ($row = mysqli_fetch_array($result)){
                    echo "<tr><td>".  htmlentities($row["description"])."</td>";
                    echo "<td>".  htmlentities($row["due_Date"])."</td></tr>\n";
                }
                
                mysqli_free_result($result);
                mysqli_close($con);                
                ?>
            </tbody>
        </table>
      
               
    </body>
</html>

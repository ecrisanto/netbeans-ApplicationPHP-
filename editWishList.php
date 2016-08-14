<?php
session_start();
if(array_key_exists("user", $_SESSION))
        echo "Hello ".$_SESSION['user'];
else
{
    header('Location:index.php');
    exit;
}
?>
<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html charset=UTF-8">
    </head>
    <table border="black">
        <thead>
            <tr>
                <th>Item</th>
                <th>Due date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php
        require_once 'Includes/db.php';
        $wisherID = WishDB::getInstance()->get_wisher_id_by_name($_SESSION["user"]);
        $result = WishDB::getInstance()->get_wishes_by_wisher_id($wisherID);
        while($row = mysqli_fetch_array($result)):
            echo "<tr><td>".htmlentities($row["description"])."</td>";
            echo "<td>".  htmlentities($row["due_date"])."</td>";
            $wishId = $row["id"];           
        ?>
        <td>
            <form name="editWish" action="editWish.php">
                <input type="hidden" value="<?php echo $wishId; ?>" name="wishID" />
                <input type="submit" value="Edit" name="editWish" />
            </form>
        </td>
        <td>
            <form name="deleteWish" action="deleteWish.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $wishId; ?>" name="wishID" />
                <input type="submit" value="Delete" name="deleteWish" />
            </form>                   
        </td>
        <?php
        echo "</tr>\n";
        endwhile;
        mysqli_free_result($result);        
        ?>
    </table>
    <body>
        <form name="editWishList" action="editWish.php">
            <input type="submit" value="Add Wish" name="" />            
        </form>
        <form name="backToMainPage" action="index.php">
            <input type="submit" value="Back To Main Page" />
        </form>        
    </body>
</html>


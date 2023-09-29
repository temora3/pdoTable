<?php
  require_once "includes/databaseConn.php";
  if(isset($_GET["userID"])){
    $userId = $_GET["userID"];
    $spot_user = "SELECT * FROM userdetails LEFT JOIN roles USING (roleId) WHERE userdetails.userId=$userId";
    $res = $pdo->query($spot_user);
    $row_spot_user = $res->fetch(PDO::FETCH_ASSOC);
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
        <meta charset="utf-8">
        <title>Blog create section</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body id="contactStyling" style="background-image: url(../Images/glassEffect.png);">
        <div class="editContainer">
            <div class="item">
            <div class="submitForm">
                    <h4 class="thirdText">Edit <?php print $row_spot_user["userName"];?>'s Data</h4>
                <form action="includes/update.php" class="formStyling" enctype="multipart/form-data" method="post">
                    <div class="input-box">
                        <input type="text" class="input" name="userName" value="<?php print $row_spot_user["userName"];?>" required>
                        <label for="">userName</label>
                    </div>

                    <div class="input-box">
                        <input type="text" class="input" name="userEmail" value="<?php print $row_spot_user["userEmail"];?>"required>
                        <label for="">userEmail</label>
                    </div>

                    <div class="input-box">
                        <input type="text" class="input" name="userID" value="<?php print $row_spot_user["userID"];?>" required readonly>
                        <label for="">userID</label>
                    </div>

                    <div class="input-box">
                        <input type="text" class="input" name="role" value="<?php print $row_spot_user["role"];?>" required readonly>
                        <label for="">role</label>
                    </div>

                    <input type="submit" class="btnSubmit" value="Confirm Edit" style="font-family: Poppins;" name="update" id="update">
                </form>
                </div>
            </div>
            <div>
                <nav id="navbar" class="navbar" style="justify-content: right;">
                            <ul style="font-family: Montserrat; top: -250px; " >
                                <li><a href="index.php"><strong>User Table</strong></a></li>
                                <li><a href="form.php"><strong>Blog</strong></a></li>
                            </ul>
                        </li>
                    </ul>
                <div class="dropdown mobile-nav-toggle" style="top: 40px;"><img src="Images/menu.svg" alt="Menu"/> 
                    <ul style="font-family: Poppins;">
                        <li><a href="index.php">User Table</a></li>
                        <li><a href="form.php">Entry Form</a></li>
                    </ul>
                  </div>
                </nav>
            </div>
        </div>
    </body>
</html>
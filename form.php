<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
        <meta charset="utf-8">
        <title>Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class = "sign">
            <header id="header" class="fixed-top ">
                <div class="container d-flex align-items-center justify-content-between">
                    <nav id="navbar" class="navbar" style="justify-content: right;">
                        <ul style="font-family: Poppins; top: 25px;">
                            <li><a href="index.php"><strong>User Table</strong></a></li>
                            <li><a href="form.php"><strong>Entry Form</strong></a></li>
                        </ul>
                    <div class="dropdown mobile-nav-toggle" style="top: 40px;"><img src="Images/menu.svg" alt="Menu"/> 
                        <ul style="font-family: Poppins;">
                            <li><a href="index.php">User Table</a></li>
                            <li><a href="form.php">Entry Form</a></li>
                      </div>
                    </nav>
                </div>
            </header>

            <div class="form-box" style="height: 490px; top: 20px;">
                <div class="button-box">
                    <div class ="btn>">
                        <a href="form.php" class="toggled-button">Registration form</a>
                    </div>
                </div>
              <form action="includes/call.php" class="input-group" method="post" style="top: 120px;">
                <input type="text" class="input-field" placeholder="Name" name="userName" required>
                <input type="email" class="input-field" placeholder="Email" name="userEmail" required>
                <input type="password" class="input-field" placeholder="Password" name="userPassword" required>
                <input type="password" class="input-field" placeholder="Confirm Password" name ="confirmPass" required><br>
                <div class="dropdown-container">
                    <select name="role" class="input-field">
                        <option>--Select Role--</option>
                        <?php
                        require_once "includes/databaseConn.php";

                        $sql = "SELECT * FROM roles";
                        $result = $pdo->query($sql);

                        if ($result->rowCount() > 0) {
                            // output data of each row
                            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?php print $row["roleId"]; ?>"><?php print $row["role"]; ?></option>
                            <?php
                             }
                        } else { print '<option> No results </option>'; }
                        ?>
                    </select><br>
                </div>
                <button type="submit" class="submit-btn" id="submit-btn" name="submit-btn"> Register</button>
              </form>
            </div>
        </div>
    </body>
</html>
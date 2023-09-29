<?php
  require_once "includes/databaseConn.php";           
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to Style HTML Tables with CSS</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
</head>
<body class="bodyStyle">
<div class="container d-flex align-items-center justify-content-between">
                <nav id="navbar" class="navbar">
                    <ul style="right: -20px; font-family: Poppins;">
                        <li><a href="index.php"><strong>User Table</strong></a></li>
                        <li><a href="form.php"><strong>Entry Form</strong></a></li>
                    </ul>   
                
                </nav>
                
                <nav id="navbar" class="navbar"> 
                    <div class="dropdown mobile-nav-toggle" style="top: 40px;"><img src="Images/menu.svg" alt="Menu" />
                            <ul style="font-family: Poppins;">
                                <li><a href="index.php">User Table</a></li>
                                <li><a href="form.php">Entry Form</a></li>
                            </ul>
                    </div>
                </nav>
            </div>
            <div class="tablePos">
                <table class="content-table">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Role</th>
                        <th>Date Registered</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $spot_users = "SELECT * FROM `userdetails` LEFT JOIN `roles` USING (`roleId`) ORDER BY userdetails.userName ASC";
                        $users_res = $pdo->query($spot_users);

                        $sn=1;
                        if ($users_res->rowCount() > 0) {
                          // output data of each row
                          while($user_row = $users_res->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr class="active-row">
                                      <td><?php print $sn; $sn++; ?>.</td>
                                      <td><?php print $user_row["userName"]; ?></td>
                                      <td><?php print $user_row["userEmail"]; ?></td>
                                      <td><?php print $user_row["role"]; ?></td>
                                      <td><?php print $user_row["regDate"]; ?></td>
                                      <td>[ <a href="edit.php?userID=<?php print $user_row["userID"]; ?>" style="text-decoration: none; color:crimson" title="Edit <?php print $user_row["userName"]; ?>">Edit</a> ] [ <a href="includes/del.php?userID=<?php print $user_row["userID"]; ?>" OnClick="return confirm('Are you sure you want to delete <?php print $user_row["userName"]; ?> from the database?')" style="text-decoration: none; color:crimson" title="Delete <?php print $user_row["userName"]; ?>">Del</a> ]</td>
                                  </tr>
                        <?php
                              }
                        } else {
                          echo "0 results";
                        }
                        ?>
                    </tbody>
                  </table>
            </div>
</body>
</html>
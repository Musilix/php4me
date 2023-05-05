<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New User</title>
</head>

<body>
  <h1>On this page, you are able to add new users to the test.users table! Cool!</h1>
  <p>Use the form below to do so:</p>

  <form action="insertuser.php" method="POST">
    <input type="text" name="username" placeholder="Enter the username of the new user" />
    <input type="text" name="age" placeholder="Enter the age of the new user" />
    <input type="submit" name="submit" value="Create New User" />
  </form>
</body>

</html>
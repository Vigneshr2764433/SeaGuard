

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeaGuard</title>
</head>
<body>
    
    <form action="./functions/auth.php" method="post">
<label for="username">Username</label>
        <input type="text" name="username" id="password" require>
        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone" require>
        <label for="password">Password </label>
        <input type="password" name="pasword" id="password" require>
        <label for="aadhaar">Enter Aadhaar Id</label>
        <input type="text" name="adhar" required>
        <button name="register" type="submit">Submit</button>
       
</form>

<form action="./functions/auth.php" method="post">
   
<label for="username">Username</label>
      
        <label for="phone">Phone Number</label>
        <input type="text" name="phone" id="phone" require>
        <label for="password">Password </label>
        <input type="password" name="pasword" id="password" require>
        <button name="login" type="submit">Submit</button>
       
</form>
</body>
</html>
<?php include_once("encrypIt.php");?>
<html>
<head>
  <title>Random4</title>
</head>
<body>
  <hr>
    <h2>Random4: An Application Specific Randomized Encryption Algorithm to prevent SQL injection</h2>
  <hr>
  <form action = "index.php" method="post" name="Encry">
    <table>
      <tr>
        <th>Unique Key :</th>
        <td><input type = "text" id = "username" name = "ukey" value ="<?php echo htmlentities($ukey);?>"></td></tr>
    <tr>
      <th>User Text :</th>
      <td><input type = "text" id = "usertext" name = "usertext" value ="<?php echo htmlentities($String);?>"></td></tr>
    <tr><th>Encrypted: </th><td><?php echo $New_String;?></td></p>
    <tr><td></td><td><input type = "submit" id = "submit" value = "Generate"></td></tr>
    </table>
  </form>
  <hr>
</body>
</html>
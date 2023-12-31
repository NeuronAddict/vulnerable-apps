<?php


  for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 32; $x = rand(0,$z), $s .= $a{$x}, $i++); 
  
  $token = $s;

?>
<html>
  <head>
  </head>
  <body>

    <?php if(!isset($_GET["noheader"])) include '../header.php'; ?>

    <form name="addUserToAdmins" action="javascript:alert('User added.')" method="POST">
      <input type="hidden" name="userId" value"1234">
      <input type="hidden" name="isAdmin" value"true">
      <input type="hidden" name="token" value"<?php echo $token; ?>">
      <input type="submit" value="Add to admin" style="height: 60px; width: 150px; font-size:1em">
    </form>
  </body>
</html>

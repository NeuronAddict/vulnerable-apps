<html>
<head>
    <title>Reflected XSS</title>
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>

</head>
<body>
    <div>
        <li><a href="reflected.php?param=VALUE">Try here</a></li>
    </div>
    <p>value : <?php echo $_GET['param']; ?></p>
    
    
    <div>
        <p>Some content</p>
        <img src="" />
    </div>
</body>

</html>

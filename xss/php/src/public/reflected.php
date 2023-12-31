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
        <li><a href="index.php?page=reflected&param=VALUE">Simple value</a></li>
        <li><a href="index.php?page=reflected&param=<script>alert(1)</script>">alert</a></li>
    </div>
    <p>This value is présent on GET[param] : <?php
        if (isset($_GET['param']))
            echo $_GET['param'];

        ?></p>
    
    
    <div>
        <p>There is some content here</p>
        <img src="" />
    </div>
</body>

</html>

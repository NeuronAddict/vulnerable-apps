<html>
    <head>
        <title>Windows name display</title>
    </head>
    <body>
    <p id="display"></p>
        <script type="text/javascript" >

            p = document.getElementById('display');
            p.innerHTML = 'name : ' + window.name;

        </script>

    </body>
</html>
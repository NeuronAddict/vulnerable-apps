<?php

if (!isset($_SESSION)) {
    session_start();
}

?>

<table>
    <thead>
        <tr>
            <th>username</th>
            <th>mail</th>
        </tr>
    </thead>
    <tbody id="content">

    </tbody>
</table>

<script>

    function change_password(user) {
        var password = prompt("Enter new password");
        fetch('/api/user/change_password.php', {
                method: 'POST',
                credentials: 'include',
                body: JSON.stringify({
                    "login": user,
                    "password": password,
                    "confirm": password
                })
            }
        )
            .then(function () {
                alert("password changed !")
            })
            .catch(function () {
                alert("erreur, see logs...");
            })
    }

    fetch('/api/user/', {
        credentials: 'include'
    })
        .then(response => response.json())
        .then(json => {
            html = '';
            for (let i = 0; i < json.length; i++) {
                html += '<tr><td>' + json[i].login + '</td><td>' + json[i].mail + '</td><td><a onclick="change_password(\'' + json[i].login + '\')" class="btn">Change password</a></td></tr>';
            }
            $('#content').html(html);
        })
        .catch(error => console.log(error));

</script>




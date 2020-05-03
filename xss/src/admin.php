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

    function change_mail(user) {
        var mail = prompt("Enter new mail");
        fetch('/api/user/change_mail.php', {
                method: 'POST',
                credentials: 'include',
                headers: {
                        'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    "login": user,
                    "mail": mail
                })
            }
        )
            .then(function () {
                alert("mail changed !")
                location.href = location.href
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
                html += '<tr><td>' + json[i].login + '</td><td>' + json[i].mail + '</td><td><a onclick="change_mail(\'' + json[i].login + '\')" class="btn">Change mail</a></td></tr>';
            }
            $('#content').html(html);
        })
        .catch(error => console.log(error));

</script>




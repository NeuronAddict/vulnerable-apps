<?php


class user {
    private $_username;
    private $_admin;

    function __construct($username)
    {
        $conn = new mysqli('mysql', 'mysql', 'mysql', 'db');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT admin FROM user WHERE login = ?");
        $stmt->bind_param("s", $new_user);
        $new_user = $username;

        $stmt->execute();

        $result = $stmt->get_result(); // get the mysqli result
        $fetch = $result->fetch_assoc();

        $this->_admin = $fetch['admin'];

        $this->_username = $username;

        $stmt->close();
        $conn->close();
    }


    function isAdmin() {
        return $this->_admin;
    }
}


?>
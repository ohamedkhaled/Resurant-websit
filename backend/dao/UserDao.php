<?php

require_once "backend/models/User.php";


class UserDao
{
    public function getAll()
    {
        include 'server.php';

        $query = "SELECT * FROM users";
        $result = $connection->query($query);
        if (!$result) die($connection->error);

        $arr_user = array();
        $rows = $result->num_rows;

        for ($j = 0; $j < $rows; ++$j) {
            $user = new User();
            $result->data_seek($j);
            $user->setUserId($result->fetch_assoc()['id']);
            $result->data_seek($j);
            $user->setFirstName($result->fetch_assoc()['first_name']);
            $result->data_seek($j);
            $user->setLastName($result->fetch_assoc()['last_name']);
            $result->data_seek($j);
            $user->setEmail($result->fetch_assoc()['email']);
            $result->data_seek($j);
            $user->setPassword($result->fetch_assoc()['password']);
            $result->data_seek($j);
            $user->setPhoneNumber($result->fetch_assoc()['phone_number']);
            $arr_user[] = $user;
        }

        $result->close();
        $connection->close();
        return $arr_user;
    }

    public function create($user)
    {
        include 'server.php';

        $u_f = $user->getFirstName();
        $u_l = $user->getLastName();
        $u_e = $user->getEmail();
        $u_p = $user->getPassword();
        $u_pn = $user->getPhoneNumber();

        $query = "INSERT INTO users (first_name, last_name, email, password, phone_number) VALUES ('$u_f', '$u_l', '$u_e', '$u_p', '$u_pn')";
        $result = $connection->query($query);

        if (!$result) die($connection->error);

        $connection->close();
    }

    public function update($user)
    {
        include 'server.php';

        $u_i = $user->getUserId();
        $u_f = $user->getFirstName();
        $u_l = $user->getLastName();
        $u_e = $user->getEmail();
        $u_p = $user->getPassword();
        $u_pn = $user->getPhoneNumber();
        $query = "UPDATE users SET first_name = '$u_f', last_name = '$u_l', email = '$u_e', password = '$u_p', $u_ph = '$u_pn' WHERE id = $u_i";
        $result = $connection->query($query);

        if (!$result) die($connection->error);

        $connection->close();
    }

    public function delete($e_n)
    {
        include 'server.php';

        $query = "DELETE FROM users WHERE id = $u_i";
        $result = $connection->query($query);

        if (!$result) die($connection->error);

        $connection->close();
    }
}

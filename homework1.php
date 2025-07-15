<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label>ID: </label><input type="text" name="id" required><br>
        <label>Username: </label><input type="text" name="username" required><br>
        <label>Password: </label><input type="password" name="password" required><br>
        <label>Fullname: </label><input type="text" name="fullname" required><br>
        <label>Address: </label><input type="text" name="address" required><br>
        <label>Phone: </label><input type="text" name="phone" required><br>
        <label>Gender: </label><input type="text" name="gender" required><br>
        <label>Birthday: </label><input type="date" name="birthday" required><br>
        <input type="submit" value="Add Customer">
    </form>

    <?php
    class Customer {
        public $id;
        public $username;
        public $password;
        public $fullname;
        public $address;
        public $phone;
        public $gender;
        public $birthday;

        public function __construct($id, $username, $password, $fullname, $address, $phone, $gender, $birthday) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->fullname = $fullname;
            $this->address = $address;
            $this->phone = $phone;
            $this->gender = $gender;
            $this->birthday = $birthday;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_customer = new Customer($_POST['id'], $_POST['username'], $_POST['password'], $_POST['fullname'], $_POST['address'], $_POST['phone'], $_POST['gender'], $_POST['birthday']);

        if (!isset($_SESSION['customers'])) {
            $_SESSION['customers'] = array();
        }
        $_SESSION['customers'][] = $new_customer;
    }

    if (isset($_SESSION['customers'])) {
        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Birthday</th>
            </tr>";

        foreach ($_SESSION['customers'] as $customer) {
            echo "<tr>
                <td>{$customer->id}</td>
                <td>{$customer->username}</td>
                <td>{$customer->password}</td>
                <td>{$customer->fullname}</td>
                <td>{$customer->address}</td>
                <td>{$customer->phone}</td>
                <td>{$customer->gender}</td>
                <td>{$customer->birthday}</td>
            </tr>";
        }

        echo "</table>";
    }
    ?>
</body>
</html>

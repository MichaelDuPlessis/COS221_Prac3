<?php
    include_once "./php/database.php";

    $db = Database::instance();
    $people = $db->getUnverified();

    $i = 0;
    foreach ($people as $person) {
        echo "<tr>";
        $id = $person["id"];
        $fname = $person["fname"];
        $mname = $person["mname"];
        $lname = $person["lname"];
        $cell = $person["cell"];
        $email = $person["email"];
        $addr = $person["addr"];
        echo '
            <td>' . $id . '</td>
            <td>' . $fname . '</td>
            <td>' . $mname . '</td>
            <td>' . $lname . '</td>
            <td>' . $cell . '</td>
            <td>' . $email . '</td>
            <td>' . $addr . '</td>
            <td><input type="checkbox" name="approve' . $i . '" value="' . $i . '"></td>
        ';
        echo "</tr>";

        $i++;
    }
?>
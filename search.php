<?php
header('Content-Type: application/json; charset=utf-8');
error_reporting(0);

include __DIR__ . '/db.php';

$data = [];

if (
    isset($_GET['search']) &&
    (
        $_GET['firstname'] !== '' ||
        $_GET['middlename'] !== '' ||
        $_GET['lastname'] !== ''
    )
) {

    $firstname  = $conn->real_escape_string($_GET['firstname']);
    $middlename = $conn->real_escape_string($_GET['middlename']);
    $lastname   = $conn->real_escape_string($_GET['lastname']);

    $sql = "
        SELECT
            reference_code,
            firstname,
            middlename,
            lastname,
            ext_name,
            birthdate,
            age,
            sex,
            province,
            city_municipal,
            barangay,
            remarks
        FROM person_records
        WHERE
            ('$firstname' = '' OR LOWER(firstname) LIKE LOWER('%$firstname%'))
        AND ('$middlename' = '' OR LOWER(middlename) LIKE LOWER('%$middlename%'))
        AND ('$lastname' = '' OR LOWER(lastname) LIKE LOWER('%$lastname%'))
        LIMIT 25
    ";

    $result = $conn->query($sql);

    if ($result !== false) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
exit;
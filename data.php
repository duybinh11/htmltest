<?php
include 'connection.php';
$query = "SELECT * FROM shop";
$result = mysqli_query($connection, $query);

// Kiểm tra xem truy vấn có thành công không
if (!$result) {
    die("Truy vấn thất bại: " . mysqli_error($connection));
}

$data = [];
// Lặp qua kết quả và in ra
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'id' => $row["id"],
        'title' => $row["title"],
        'id_parent' => $row["id_parent"]
    );
}

// $data = [
//     1 => array(
//         'id' => 1,
//         'title' => 'danh sach item',
//         'id_parent' => 0
//     ),
//     2 => array(
//         'id' => 2,
//         'title' => 'ao quan',
//         'id_parent' => 1
//     ),
//     3 => array(
//         'id' => 3,
//         'title' => 'giay',
//         'id_parent' => 1
//     ),
//     4 => array(
//         'id' => 4,
//         'title' => 'teelab',
//         'id_parent' => 2
//     ),
//     5 => array(
//         'id' => 5,
//         'title' => 'hoodie',
//         'id_parent' => 2
//     ),
//     6 => array(
//         'id' => 6,
//         'title' => 'giay dep',
//         'id_parent' => 3
//     ),
//     7 => array(
//         'id' => 7,
//         'title' => 'giay xau',
//         'id_parent' => 3
//     ),
//     8 => array(
//         'id' => 8,
//         'title' => 'giay joden',
//         'id_parent' => 3
//     ),
//     9 => array(
//         'id' => 9,
//         'title' => 'quan jean',
//         'id_parent' => 2
//     ),
// ];

function dacap($data, $id_parent, $level = 0)
{
    $result = [];
    foreach ($data as $item) {
        if ($item['id_parent'] == $id_parent) {
            $item['level'] = $level;
            $result[] = $item;
            $child = dacap($data, $item['id'], $level + 1);
            $result = array_merge($result, $child);
        }
    }
    return $result;
}
$dc = dacap($data, 0);

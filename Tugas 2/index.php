<?php
include('koneksi.php');
$db = new lecturers();
$lecturers = $db->tampil_data();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; 
            color: #333;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333333; 
            overflow: hidden;
            padding: 10px 0;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ff69b4; 
            color: black;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #ff69b4; 
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }
        tr:nth-child(odd) {
            background-color: #ffffff; 
        }
        tr:hover {
            background-color: #333333; 
            color: white;
        }
        h1 {
            color: #333333; 
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        footer {
            background-color: #333333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }
        @media only screen and (max-width: 600px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
            table {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<header class="navbar">
    <a href="">Home</a>
    <a href="index.php">Lecturers</a>
    <a href="course_lecturers.php">Courses</a>
    <a href="">About</a>
</header>

<div class="container">
    <h1>Lecturers</h1>

    <?php if (!empty($lecturers)) : ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Name</th>
                <th>Number_phone</th>
                <th>Address</th>
                <th>Nidn</th>
                <th>Nip</th>
                <th>User_id</th>
                <th>Deleted_at</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach($lecturers as $row) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['number_phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['nidn']; ?></td>
                <td><?php echo $row['nip']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['deleted_at']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><?php echo $row['updated_at']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Data tidak ditemukan.</p>
    <?php endif; ?>
</div>

</body>
</html>

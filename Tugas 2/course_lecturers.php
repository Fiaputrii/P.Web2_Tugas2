<?php
include('koneksi.php');
$db = new course_lecturers();
$database = $db->tampil_data();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Lecturers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d3d3d3;
            color: #000000;
        }
        .navbar {
            background-color: #333333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2; 
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ff69b4;
            color: black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
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
        
        body {
            padding: 20px;
        }
    </style>
</head>
<body>


<div class="navbar">
    <a href="">Home</a> 
    <a href="index.php">Lecturers</a>
    <a href="course_lecturers.php">Courses</a>
    <a href="">About</a>
</div>

<h1>Course Lecturers</h1>

<?php if (!empty($database)) : ?>
<table>
    <tr>
        <th>No</th>
        <th>Id</th>
        <th>Lecturers_id</th>
        <th>Course_id</th>
        <th>Deleted_at</th>
        <th>Created_at</th>
        <th>Updated_at</th>
    </tr>
    <?php 
    $no = 1;
    foreach($database as $row) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['lecturer_id']; ?></td>
            <td><?php echo $row['course_id']; ?></td>
            <td><?php echo $row['deleted_at']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
        </tr>
    <?php } ?>
</table>
<?php else: ?>
    <p>Data tidak ditemukan.</p>
<?php endif; ?>

</body>
</html>

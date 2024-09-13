# Penjelasan 

## Koneksi

- Membuat Class Database

```php
class Database {
```

- Menyimpan alamat host dari database (localhost)

```php
private $host = "localhost";
```

- Menyimpan nama pengguna database (root)

```php
private $username = "root";
```

- Menyimpan kata sandi untuk database (koosng atau "")

```php
private $password = "";
```

- Menyimpan nama database yang akan digunakan (jkb)

```php
private $database = "jkb";
```

- Gunakan protected untuk menyimpan koneksi database yang dapat diakses oleh kelas turunan (Lecturers dan Course_lecturers)

```php
 protected $koneksi;
```

- Metode constructor yang otomatis dipanggil saat objek dari kelas database dibuat.

```php
 function __construct() {
```

- Gunakan mysqli_connect untuk membuat koneksi ke database untuk terhubung ke parameter (host, username, password, database

```php
$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
```

- Jika terjadi kesalahan koneksi maka akan eror

```php
if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
```

- Menutup database menggunakan fungsi close

```php
function close() {
        mysqli_close($this->koneksi);
    }
```

- Membuat kelas Lecturers yang mewarisi kelas Database sehingga dapat terkoneksi

```php
class Lecturers extends Database {
```

- Gunakan tampil_data untuk menampilkan data table Lecturers dari database

```php
public function tampil_data() {
        $query = "SELECT * FROM lecturers";
```

- Kirim query SQL untuk mengambil data data yang ada di table Lecturers.

```php
$result = mysqli_query($this->koneksi, $query);
```

- Mengambil data dalam bentuk array asosiatif

```php
while ($row = mysqli_fetch_assoc($result)) {
            $lecturers[] = $row; 
        }
```

- Hasilnya akan disimpan di dalam array

```php
return $lecturers;
```

- Hal yang sama juga di lakukan di dalam Class Course_lecturers

```php
class Course_lecturers extends Database {
   
    public function tampil_data() {
        $query = "SELECT * FROM course_lecturers";
        $result = mysqli_query($this->koneksi, $query);
        $courseLecturers = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $courseLecturers[] = $row; 
        }
        
        return $courseLecturers; 
    }
```

## Index atau Lecturers

- Koneksi ke database (koneksi ke database ini berfungsi untuk mengambil tabel Lecturers yang ada di database jkb)

```php
include('koneksi.php');
$db = new lecturers();
$lecturers = $db->tampil_data();
```
- Membuat desian tampilan web untuk tabel Lecturers (desain ini bisa di temukan di internet)

```php
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
```

- Gunakan navbar (navigasi bar) untuk mengisi link atau tautan

```php
body>

<header class="navbar">
    <a href="">Home</a>
    <a href="index.php">Lecturers</a>
    <a href="course_lecturers.php">Courses</a>
    <a href="">About</a>
</header>
```

- Bungkus seluruh konten agar lebih rapi menggunakan div dengan class=container

```php
<div class="container">
```

- Tabel Lecturers

```php
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
```

- Menampilkan data dalam tabel Lecturers. Data ini akan di ambil dalam array Lecturers dan setiap baris akan dihasilkan dalam loop foreach

```php
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
```

- Kondisi untuk mengecek ketersediaan data

```php
<?php if (!empty($lecturers)) : ?>
<?php else: ?>
        <p>Data tidak ditemukan.</p>
    <?php endif; ?>
```

## Course_lecturers

- Koneksi ke database (koneksi ke database ini berfungsi untuk mengambil tabel Course_Lecturers yang ada di database jkb)

```php
include('koneksi.php');
$db = new course_lecturers();
$database = $db->tampil_data();
```

- Membuat desian tampilan web untuk tabel Course_Lecturers (desain ini bisa di temukan di internet)

```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Lecturers</title>
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
            text-align: center; /* Menjadikan teks di tengah */
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
```

- Gunakan navbar (navigasi bar) untuk mengisi link atau tautan

```php
<header class="navbar">
    <a href="">Home</a> 
    <a href="index.php">Lecturers</a>
    <a href="course_lecturers.php">Courses</a>
    <a href="">About</a>
</header>
```

- Bungkus seluruh konten agar lebih rapi menggunakan div dengan class=container

```php
<div class="container">
```

- Tabel Course_Lecturers

```php
<thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Lecturers_id</th>
                <th>Course_id</th>
                <th>Deleted_at</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
        </thead>
```

-  Menampilkan data dalam tabel Course_Lecturers. Data ini akan di ambil dalam array Course_Lecturers dan setiap baris akan dihasilkan dalam loop foreach.

```php
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
```

- Kondisi untuk mengecek ketersediaan data

```php
<?php else: ?>
        <?php if (!empty($database)) : ?>
        <p>Data tidak ditemukan.</p>
    <?php endif; ?>
```

## Output Lecturers

![Cuplikan layar 2024-09-14 062227](https://github.com/user-attachments/assets/6104485e-a775-44f2-90e7-73af180b8ca0)

## Output Course lecturers

![Cuplikan layar 2024-09-14 062244](https://github.com/user-attachments/assets/20c6b44f-23fe-44a4-a57d-686c6627297d)

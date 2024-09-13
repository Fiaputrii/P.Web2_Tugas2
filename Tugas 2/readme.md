# Penjelasan 

# Koneksi

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

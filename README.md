# INOVAMEDIKA CODING TEST
![enter image description here](https://raw.githubusercontent.com/security007/inovamedika/master/screenshot/dashboard.png)

## **Ubah file .env terlebih dahulu , ganti bagian**
>database.default.username = root **( ganti dengan username mysql anda )**

>database.default.password = security007 **( ganti dengan pasword mysql anda )**

## INSTALLATION
- download repositori https://github.com/security007/inovamedika
- masuk ke directory inovamedika
- buka terminal atau cmd
- jalankan perintah **"composer install"** pada terminal atau cmd
- setelah proses install selesai, jalankan server dengan perintah **"php spark serve"**
- server berjalan pada http://localhost:8080/
## Technology

 - PHP Codeigniter4
 - Mysql
 - Jquery 
 - Bootstrap5

## Folder Structure
- Url Route
	- app\Config\Routes.php
- Controllers
	- app\Controllers
- Middleware Filter
	- app\Config\Filters.php
	- app\Filters\RoleFilter.php
- Database|Models
	- app\Models
- Views
	- app\Views
	- app\Views\pegawai
	- app\Views\user
- Assets Folder
	- public\assets
	 

## features

- Login (Role Base Access Control )
- Auth Middleware
- XSS Clean
- Input validation and filter
- CRUD Master (Role Pegawai)
- Menu pendaftaran pasien
- Menu tindakan terhadap pasien
- Laporan dengan grafik
- Informasi pembayaran

## Login
**Email** : admin@admin | **Password** : admin | **Role** : Pegawai

**Email** : alfian2@gmail.com | **Password** : alfian | **Role** : User

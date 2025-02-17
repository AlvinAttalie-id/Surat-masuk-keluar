<h1 align="center">Sistem Arsip Surat | Framework Laravel </h1>

## Demo Akun Project :

<h4>Administrator</h4>
<p>Email : anisa@gmail.com</p>
<p>Password : anisa123</p>

<h4>Pimpinan</h4>
<p>Email : bambang@gmail.com</p>
<p>Password : bambang123</p>

<h4>Pegawai</h4>
<p>Email : tito@gmail.com</p>
<p>Password : tito123</p>

## Cara Install

1. **Clone Repository**

```bash
git clone https://github.com/AlvinAttalie-id/Surat-masuk-keluar.git
cd Surat-masuk-keluar
composer install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi Aplikasi**

```bash
php artisan key:generate
php artisan migrate --seed
```

4. **Jalankan Aplikasi**

```bash
php artisan serve
```

<!-- ## Preview

![4](https://user-images.githubusercontent.com/61069138/197397134-47790039-e806-41e7-9b89-34da5a61e695.png)
![Screenshot 2022-10-23 210908](https://user-images.githubusercontent.com/61069138/197397140-0cb2cef9-4e47-4589-b90d-2d6c0adc399e.png)
![2](https://user-images.githubusercontent.com/61069138/197397142-72a309b1-3068-4ed0-9f60-c0b446a5170c.png)
![3](https://user-images.githubusercontent.com/61069138/197397144-51715b31-3fe7-4e6d-ac7c-6048a36698f2.png) -->

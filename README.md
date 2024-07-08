<div dir="rtl">
این پروژه صرفا برای افزایش مهارت نوشته شده است مسئولیت و عواقب استفاده از پروژه با خود توسعه دهنده می باشد.

## درباره پروژه

این پروژه برای ارتباط با api مرزبان به وسیله php ساخته شده و جهت توسعه سریع دوستان در گیتهاب قرار گرفته شده است 

## نصب
برای نصب دستور زیر را در cmd اجرا کنید (نکته : باید از قبل composer را نصب کرده باشید.)
</div>

```
composer require alirezax5/marzbanapiphp
```
<div dir="rtl">

## اجرا
برای راه اندازی اطلاعات اولیه را مانند کد زیر بنویسید :
</div>

```php
<?php
include 'vendor/autoload.php';

$mb = new Marzban('http://ip:port');
$mb->setUsername('username');
$mb->setPassword('password');
$mb->setToken('token');
```

<div dir="rtl">

## توکن
اکثر متد های api مرزبان با توکن باید احراز هویت شوند برای همین نیاز می باشد که حتما توکن خودتون رو به setToken پاس دهید.
نام کاربری و رمز فقط به هنگام دریافت توکن استفاده می شود و شما باید توکن را برای استفاده های بعدی در یکجا ذخیره کنید.

پیشنهاد میکنم در تنظیمات مرزبان زمان انقضای توکن را نامحدود بگذارید.

نمونه کد جهت ساخت توکن :
</div>

```php
<?php
include 'vendor/autoload.php';

$mb = new Marzban('http://ip:port');
$mb->setUsername('username');
$mb->setPassword('password');
$token = $mb->getAdminToken();
$mb->setToken($token);
```

<div dir="rtl">

## حمایت
جهت حمایت از بنده میتوانید به پروژه ستاره بدهید و یا بنده را دونیت نمایید , آدرس های ولت های بنده :
</div>

TRX & USDT
```
TQk6AHMREwER9EyGzhUsVv2hUQygGMyCeT
```
TON
```
UQBnlnOGefCkwgtO7IZdOBFuoojkpKgK3mI1GmH3MH_gG0A9
```
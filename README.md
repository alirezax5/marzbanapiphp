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
</div>

```php
<?php
include 'vendor/autoload.php';
use alirezax5\MarzbanApi\Marzban;
$mb = new Marzban('url', '/getConfig/');
$an = $mb->admin->adminToken('username', 'password');
$mb->setToken($an->access_token);
$a = $mb->user->all();
```



<div dir="rtl">

## حمایت
جهت حمایت از بنده میتوانید به پروژه ستاره بدهید و یا بنده را دونیت نمایید , آدرس های ولت های بنده :
</div>


TON
```
UQBnlnOGefCkwgtO7IZdOBFuoojkpKgK3mI1GmH3MH_gG0A9
```

<?php
namespace core;
class Field {
    public const cssPath = "http://localhost/FPT_Shop_MVC/assets/css/main.css";
    public const cssAdminPath = "http://localhost/khantn_php2/mvc-full/assets/admin/css/style.css";
    public static function cartAllTotal()
	{
		$total = 0;
		foreach ($_SESSION['cart'] as $product) {
			$total += $product['price'] * $product['number'];
		}
		return $total;
	}
    public static function cartdelTotal()
	{
		$deltotal = 0;
		foreach ($_SESSION['cart'] as $product) {
			$deltotal += (($product['price'] * $product['cout'])/100)*$product['number'];
		}
		return $deltotal;
	}
    public static function cartTotal()
	{
		$alltotal = 0;
		foreach ($_SESSION['cart'] as $product) {
			$alltotal += $product['delprice'] *$product['number'];
		}
		return $alltotal;
	}
    public static function cartNumber()
	{
		$number = 0;
		foreach ($_SESSION['cart'] as $product) {
			$number += $product['number'];
		}
		return $number;
	}
}

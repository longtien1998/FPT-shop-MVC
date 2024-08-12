<?php

namespace src\models;

spl_autoload_register(function ($class) {
    require_once $class . ".php";
});

use core\Database;

class cartModel
{
    
    // private $Id;
    public function __construct()
    {
        // $this->Id = $id;
    }
    // public function setId($id)
    // {
    //     $this->Id = $id;
    // }
    // public function getId()
    // {
    //     return $this->Id;
    // }
	public static function cartAdd($id)
	{
		
		if (isset($_SESSION['cart'][$id])) {
			//nếu đã có sp trong giỏ hàng thì số lượng lên 1
			$_SESSION['cart'][$id]['number']++;
			return true;
		} else {
			// echo $id;
			$db = new Database();
            $sanpham = $db->pdo->query("select * from sanpham where MaSanPham ='$id'")->fetch();
			//  var_dump($sanpham['TenSanPham']);

			$sku = $db->pdo->query("select * from sanphamchitiet where MaSKU = '$sanpham[MaSKU]'")->fetch();
			$thongso = $db->pdo->query("select * from thongsosanpham where MaThongSo = '$sku[MaThongSo]'")->fetch();
			$xuly = $db->pdo->query("select * from boxuly where MaBoXuLy = '$thongso[MaBoXuLy]'")->fetch();
			$ram = $db->pdo->query("select * from ram where MaRam = '$thongso[MaRAM]'")->fetch();
			$manhinh = $db->pdo->query("select * from manhinh where MaManHinh = '$thongso[MaManHinh]'")->fetch();
			$dohoa = $db->pdo->query("select * from dohoa where MaDoHoa = '$thongso[MaDoHoa]'")->fetch();
			$luutru = $db->pdo->query("select * from luutru where MaLuuTru = '$thongso[MaLuuTru]'")->fetch();
			$hinhanh = $db->pdo->query("select * from hinhanh where MaSanPham= '$id'")->fetchAll();
			// $ram = $db->pdo->query("select * from ram where MaRam= '$thongso->MaRam'")->fetch();
			// $ram = $db->pdo->query("select * from ram where MaRam= '$thongso->MaRam'")->fetch();

			//---
			// var_dump($sku[MaThongSo]);
			$_SESSION['cart'][$id] = array(
				'id' => $id,
				'name' => $sanpham['TenSanPham']."/".$xuly['CongNgheCPU']."-".$ram['DungLuongRAM']."GB/".$luutru['DungLuong']."GB/".$manhinh['KichThuocManHinh']."/".$dohoa['Model']."_".$dohoa['BoNho']."GB/Win11",
				'photo' => isset($hinhanh[0]['URL']) ? $hinhanh[0]['URL'] : "",
				'number' => 1,
				'delprice' => ($sku['GiamGia'] >0) ? ($sku['GiaTien'] - ($sku['GiaTien'])*($sku['GiamGia'])/100) : $sku['GiaTien'],
				'price'=> $sku['GiaTien'],
				'cout' => $sku['GiamGia']

			);
			return true;
			
		}
		
	}
	/**
	 * Cập nhật số lượng sản phẩm
	 * @param int
	 * @param int
	 */
	public static function cartUpdate($id, $number)
	{
		if ($number == 0) {
			//xóa sp ra khỏi giỏ hàng
			unset($_SESSION['cart'][$id]);
		} else {
			$_SESSION['cart'][$id]['number'] = $number;
		}
		
	}
	/**
	 * Xóa sản phẩm ra khỏi giỏ hàng
	 * @param int
	 */
	public static function cartDelete($id)
	{
		unset($_SESSION['cart'][$id]);
		return true;
	}
	
	public function cartList()
	{
		return $_SESSION['cart'];
	}
	/**
	 * Xóa giỏ hàng
	 */
	public static function cartDestroy()
	{
		$_SESSION['cart'] = array();
		return true;
	}
	//=============
	//checkout
	public function cartCheckOut($student)
	{
		//---
		$db = new Database();
		//lay id vua moi insert
		$customer_id = $_SESSION["customer_id"];
		//echo $_SESSION["customer_id"];
		//---
		//---
		//insert ban ghi vao orders, lay order_id vua moi insert
		$query = $db->pdo->prepare("insert into giohang VALUES (?, ?, ?) set customer_id=:customer_id, create_at=now()");
        try {
            $query->execute([$student->getId(), $student->getName(), $student->getPoint()]); // Trả về boolean
            
        } catch (\Exception $ex) {
            throw new \Exception("Create Fail!");
        }
		$order_id = 0; // = $query->lastInsertId();
		// $query->execute(array("customer_id" => $customer_id));
		//lay id vua moi insert
		
		//---
		//duyet cac ban ghi trong session array de insert vao orderdetails
		foreach ($_SESSION["cart"] as $product) {
			$id = $product["id"];
			$query =  $db->pdo->query("insert into orderdetails set order_id=:order_id, product_id=:product_id, price=:price, number=:number");
			$query->execute(array("order_id" => $order_id, "product_id" => $product["id"], "price" => $product["price"], "number" => $product["number"]));

			$query1 =  $db->pdo->query("select * from products where id = $id");
			//tra ve mot ban ghi
			$query1 = $query1->fetch();
			if (intval($product["number"])) {
				$count = intval($query1->quantity) - intval($product["number"]);
				$query2 =  $db->pdo->query("update products set quantity = $count where id = $id");
			}
		}
        
		//xoa gio hang
		unset($_SESSION["cart"]);
		return $order_id;
	}

	public function modelListOrderDetails()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$db = new Database();
		$query =  $db->pdo->query("select * from orderdetails where order_id = $id");
		//tra ve mot ban ghi
		return $query->fetchAll();
	}


	public function modelGetProducts($id)
	{
		//---
		$db = new Database();
		$query = $db->pdo->query("select * from products where id = $id");
		//tra ve mot ban ghi
		return $query->fetch();
		//---
	}
	//=============
}
?>
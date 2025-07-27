<?php
session_start(); 

require_once 'Customer.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    
    $id = htmlspecialchars($_POST['id']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']); 
    $fullname = htmlspecialchars($_POST['fullname']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $gender = htmlspecialchars($_POST['gender']);
    $birthday = htmlspecialchars($_POST['birthday']);

   
    $idExists = false;
    if (isset($_SESSION['customers'])) {
        foreach ($_SESSION['customers'] as $customerData) {
            if ($customerData['id'] === $id) {
                $idExists = true;
                break;
            }
        }
    }

    if ($idExists) {
        $_SESSION['message'] = "ID khách hàng đã tồn tại. Vui lòng chọn ID khác.";
        $_SESSION['message_type'] = "error";
    } else {
        
        $newCustomer = new Customer($id, $username, $password, $fullname, $address, $phone, $gender, $birthday);

        
        if (!isset($_SESSION['customers'])) {
            $_SESSION['customers'] = [];
        }

        
        $_SESSION['customers'][] = $newCustomer->toArray();

        $_SESSION['message'] = "Thêm khách hàng thành công!";
        $_SESSION['message_type'] = "success";
    }

    
    header("Location: index.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_session'])) {
    unset($_SESSION['customers']); 
    $_SESSION['message'] = "Đã xóa tất cả dữ liệu khách hàng trong session!";
    $_SESSION['message_type'] = "success";
    header("Location: index.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_customer'])) {
    $idToDelete = htmlspecialchars($_POST['id_to_delete']);
    
    if (isset($_SESSION['customers'])) {
        foreach ($_SESSION['customers'] as $key => $customerData) {
            if ($customerData['id'] === $idToDelete) {
                unset($_SESSION['customers'][$key]);
                $_SESSION['message'] = "Đã xóa khách hàng với ID: $idToDelete";
                $_SESSION['message_type'] = "success";
                break;
            }
        }
    }
}
header("Location: index.php");
exit;
?>
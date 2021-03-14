<?php


namespace App\classes;

use App\classes\database;
use mysqli;

class Category
{
  public function add_category($data)
  {
    // print_r($data);
    // exit();
    $category = $data['category_name'];
    $status = $data['status'];

    $query = "INSERT INTO `catagory`(`category_name`, `status`) VALUES ('$category','$status')";

    $result = mysqli_query(database::dbcon(), $query);
    if ($result) {
      $insert_msg = $_SESSION['massage']= "category save successfully";
      return $insert_msg;
    } else {
      $insert_msg_err =$_SESSION['massage']= "category not save";
      return $insert_msg_err;
    }
  }

  public function all_category()
  {
    $query = "SELECT * FROM catagory";
    $result = mysqli_query(database::dbcon(), $query);

    return $result;
  }
  public function all_active_category()
  {
    $query = "SELECT * FROM catagory WHERE status = 1";
    $result = mysqli_query(database::dbcon(), $query);

    return $result;
  }

  public function active($id)
  {
    $query = "UPDATE `catagory` SET status ='1'  WHERE id = '$id'";
    mysqli_query(database::dbcon(), $query);
  }

  public function inactive($id)
  {
    $query = "UPDATE `catagory` SET status ='0'  WHERE id = '$id'";
    mysqli_query(database::dbcon(), $query);
  }

  public function delete($id)
  {
    $query = "DELETE FROM `catagory` WHERE id = '$id'";
    mysqli_query(database::dbcon(), $query);
  }

  public function select_row($id=''){
    $query = "SELECT * FROM catagory WHERE id='$id'";
    $result = mysqli_query(database::dbcon(),$query);
    return $result;
  }

  public function update_category($data)
  {
    // print_r($data);
    // exit();
    $category_name = $data['category_name'];
    $status = $data['status'];
    $id = $data['id'];

    $query = "UPDATE `catagory` SET category_name = '$category_name', status = '$status' WHERE id = '$id'";

    $result = mysqli_query(database::dbcon(), $query);

    if ($result) {
      $update_msg = $_SESSION['status']="category update successfully";
      return $update_msg;

      header('location:manage_category.php');
    } else {
      $update_msg_errr = $_SESSION['status']= "category not updated";
      return $update_msg_errr;

      header('location:edit_category.php?id='.$id);
    }
  }
}

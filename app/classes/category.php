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
      $insert_msg = "category save successfully";
      return $insert_msg;
    } else {
      $insert_msg = "category not save";
      return $insert_msg;
    }
  }

  public function all_category()
  {
    $query = "SELECT * FROM catagory";
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
      header('location:edit_category.php?id='.$id);
      $update_msg = "category update successfully";
      return $update_msg;
    } else {
      header('location:edit_category.php?id='.$id);
      $update_msg = "category not updated";
      return $update_msg;
    }
  }
}

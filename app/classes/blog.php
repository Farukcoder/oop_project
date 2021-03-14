<?php


namespace App\classes;

use App\classes\database;

use mysqli;
class blog
{
    public function add_blog($data)
  {
    $file_name = $_FILES['photo']['name'];
    $file_ext = explode('.',$file_name);
    $file_ext = end($file_ext);
    $file_name = date('Ymdhis.').$file_ext;
    $title = $data['title'];
    $content = $data['content'];
    $category_id = $data['category_id'];
    $status = $data['status'];
    $name = $_SESSION['name'];



    $query = "INSERT INTO `blog`(`category_id`, `title`, `content`, `photo`, `name`, `status`) VALUES ('$category_id','$title','$content','$file_name','$name','$status')";

    $result = mysqli_query(database::dbcon(), $query);
    if ($result) {
        move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/blog/'.$file_name);
      $insert_msg = $_SESSION['massage']= "Blog save successfully";
      return $insert_msg;
    } else {
      $insert_msg_err =$_SESSION['massage']= "Blog not save";
      return $insert_msg_err;
    }
  }

  public function all_blog(){
    $query = "SELECT `blog`.*,`catagory`.`category_name`
    FROM `blog`
    INNER JOIN `catagory` ON `blog`.`category_id` = `catagory`.`id` ORDER BY `id` DESC";
    $result = mysqli_query(database::dbcon(),$query);
    return $result;
  }

  public function active($id)
  {
    $query = "UPDATE `blog` SET status ='1'  WHERE id = '$id'";
    mysqli_query(database::dbcon(), $query);
  }

  public function inactive($id)
  {
    $query = "UPDATE `blog` SET status ='0'  WHERE id = '$id'";
    mysqli_query(database::dbcon(), $query);
  }

  public function delete($id)
  {
    $query = "DELETE FROM `blog` WHERE id = '$id'";
    mysqli_query(database::dbcon(), $query);
  }
}
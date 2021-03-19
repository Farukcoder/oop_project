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
  public function all_active_blog(){
    $query = "SELECT * FROM blog WHERE status='1'";
    $result = mysqli_query(database::dbcon(),$query);
    return $result;
  }
  public function single_post($id){
    $query = "SELECT * FROM blog WHERE id='$id'";
    $result = mysqli_query(database::dbcon(),$query);
    return $result;
  }
  public function select_row($id=''){
    $query = "SELECT * FROM blog WHERE id='$id'";
    $result = mysqli_query(database::dbcon(),$query);
    return $result;
  }
  
  public function update_blog($data)
  {
    // print_r($data);
    // exit();
    
    $title = $data['title'];
    $content = $data['content'];
    $category_id = $data['category_id'];
    $status = $data['status'];
    $name = $_SESSION['name'];
    $id = $_POST['id'];

    if($file_name = $_FILES['photo']['name']== NULL){
      $query = "UPDATE `blog` SET `category_id`='$category_id', `title`='$title', `content`='$content', `name`='$name', `status`='$status' WHERE id ='$id'";
    }else{
      $file_name = $_FILES['photo']['name'];
      $file_ext = explode('.',$file_name);
      $file_ext = end($file_ext);
      $file_name = date('Ymdhis.').$file_ext;
      $query = "UPDATE `blog` SET category_id='$category_id', `title`='$title', `content`='$content', `photo`='$file_name', `name`='$name', `status`='$status' WHERE id ='$id'";
      move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/blog/'.$file_name);
    }
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
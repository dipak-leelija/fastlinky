<?php

class GuestPostpackage extends DatabaseConnection{


  ######################################################################################################
  #                                                                                                    #
  #                                       gp_pagkage_category                                          #
  #                                                                                                    #
  ######################################################################################################

  function addNewPackageCat($packageName, $addedBy){

    $sql ="INSERT INTO  `gp_package_category`( `category_name`, `added_by`, `added_on`)
                          VALUES ('$packageName','$addedBy', now())";
    $res= $this->conn->query($sql);
    if ($res) {
      return true;
    }else {
      return false;
    }
  }



  public function allPackagesCat(){
    $data   = array();
    $query  = "SELECT * FROM `gp_package_category` ORDER BY `id`";
    $res    = $this->conn->query($query);
    while($row = $res->fetch_assoc()) {
          $data[] =$row;

      }
      return $data;
  }


  function packCatById($id){

    $myArr = array();
    $sql = "SELECT * FROM `gp_package_category`  where `id`= '$id'";
    $data = $this->conn->query($sql);
    while($res = $data->fetch_assoc()){
      $myArr = $res;
    }
    return $myArr;

  }


  function updatePackCat($id, $category, $modifiedBy){
    $response = false;
    $sql = "UPDATE `gp_package_category` 
            SET
            `category_name`   = '$category',
            `modified_by`     = '$modifiedBy',
            `modified_on`     = now()
            WHERE
            `id`              = '$id'";
    $data = $this->conn->query($sql);
    if ($data) {
        $response = true;
    }
    return $response;
    
  }

  function delPackCat($id){
    $data = false;
    $sql = "DELETE FROM `gp_package_category` WHERE `id`='$id'";
    $res = $this->conn->query($sql);
    if ($res) {
      $data = true;
    }
    return $data;
  }





  ######################################################################################################
  #                                                                                                    #
  #                                           gp_pagkage                                               #
  #                                                                                                    #
  ######################################################################################################
    
  function insertNewPackage($packageName, $categoryId, $price, $blogPosts, $addedBy){
      $sql ="INSERT INTO `gp_package`( `package_name`, `category_id`, `price`, `blog_post`, `added_by`, `added_on`)
                            VALUES ('$packageName', '$categoryId', '$price', '$blogPosts', '$addedBy', now())";
      $res = $this->conn->query($sql);
      if ($res) {
        return $this->conn->insert_id;
      }else {
        return false;
      }
      //echo $sql.mysql_error();
    }
  

   
  public function allPackages(){
    $data   = array();
    $query  = "SELECT * FROM `gp_package` ORDER BY `category_id` ASC";
    $res    = $this->conn->query($query);
    while($row = $res->fetch_assoc()) {
          $data[] =$row;

      }
      return $data;
  }
  
  
  function packDetailsById($id){
    $data = array();
    $sql  = "SELECT * FROM `gp_package`  where `id`= '$id'";
    $res  = $this->conn->query($sql);
    while($result = $res->fetch_assoc()){
      $data = $result;
    }
    return $data;
  }



  function packDetailsByCat($packCatId){
    $data = array();
    $sql  = "SELECT * FROM `gp_package`  where `category_id`= '$packCatId' ORDER BY `price` ASC";
    $res  = $this->conn->query($sql);
    while($result = $res->fetch_assoc()){
      $data[] = $result;
    }
    return $data;
  }
   
  
  
  
  
  function updatePack($id, $categoryId, $packageName, $blogPost, $price, $modifiedBy){
    $response = false;
    $sql = "UPDATE `gp_package` 
            SET
            `category_id`   = '$categoryId',
            `package_name`  = '$packageName',
            `blog_post`     = '$blogPost',
            `price`         = '$price',
            `modified_by`   = '$modifiedBy',
            `modified_on`   = now()
            WHERE
            `id`            = '$id'";
    $data = $this->conn->query($sql);
    if ($data) {
        $response = true;
    }
    return $response;

  }
  
    

  function delPack($id){
    $resp =  false;
    $sql = "DELETE FROM `gp_package` WHERE `id`='$id'";
    $data = $this->conn->query($sql);
    if ($data) {
      $resp =  true;
    }
    return $resp;
  }
  





    ######################################################################################################
    #                                                                                                    #
    #                                           gp_package_features                                      #
    #                                                                                                    #
    ######################################################################################################
     




  function addPackageFeature($packageId, $features, $addedBy){

    $resp = false;
    $sql ="INSERT INTO `gp_package_features`
                      (`package_id`, `features`, `added_by`, `added_on`)
                      VALUES
                      ('$packageId', '$features', '$addedBy', now() )";
    $res = $this->conn->query($sql);
    if ($res) {
      $resp = true;
    }
    
    return $resp;
  }
  

   
  function featureById($gppackageId){
    $res = "SELECT * FROM `gp_package_features` WHERE `id` = '$gppackageId' ORDER BY `id`";
    $query = $this->conn->query($res);
    while($row = $query->fetch_assoc()) {
      $myArr[] =$row;
    }
    return $myArr;
  }
    
  
  
  function featureByPackageId($package_id){
    $myArr  = array();
    $res = "SELECT * FROM `gp_package_features` WHERE `package_id` = '$package_id' ORDER BY `id`";
    $query = $this->conn->query($res);
    while($row = $query->fetch_assoc()) {
        $myArr[] =$row;
    }
    return $myArr;
  }



  function delfeature($id){

    $data = false;
    $sql = "DELETE FROM `gp_package_features` WHERE `package_id` = '$id'";
    $res = $this->conn->query($sql);
    if ($res) {
      $data = true;
    }
    return $data;
  }


}

?>
<?php

        require 'database.php';
        $id = null;
        if ( !empty($_GET['id'])) {
                $id = $_REQUEST['id'];
        }

        if ( null==$id ) {
                header("Location: index.php");
        }

        if ( !empty($_POST)) {
                // keep track validation errors
                $nameError = null;
                $emailError = null;
                $urlError = null;

                // keep track post values
                $name = $_POST['name'];
                $email = $_POST['email'];
                $url = $_POST['url'];

                // validate input
                $valid = true;
                if (empty($name)) {
                        $nameError = 'Please enter Name';
                        $valid = false;
                }

                if (empty($email)) {
                        $emailError = 'Please enter Email Address';
                        $valid = false;
                }

                if (empty($url)) {
                        $urlError = 'Please enter Mobile Number';
                        $valid = false;
                }

                // update data
                if ($valid) {
                        $pdo = Database::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "UPDATE product set productName = ?, descript = ?, url= ? WHERE id = ?";
                        $q = $pdo->prepare($sql);
                        $q->execute(array($name,$email,$url,$id));
                        Database::disconnect();
                        header("Location: manage.php");
                }
        } else {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM product where id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $name = $data['productName'];
                $email = $data['descript'];
                $url = $data['url'];
                $pic = $data['fileName'];
                Database::disconnect();
        }
?>

<html lang="zh-tw">
<?php include '_head.php';?>

<body>
    <div class="container">
                <div class="col-lg-6 col-lg-offset-2">
                        <div class="row">
                                <h3>Update a Customer</h3>
                        </div>
                        <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                          <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                            <label class="control-label">商品名稱</label>
                                    <div class="controls">
                                        <input name="name" type="text"  class="form-control" placeholder="請輸入商品名稱" value="<?php echo !empty($name)?$name:'';?>">
                                        <?php if (!empty($nameError)): ?>
                                                <span class="help-inline"><?php echo $nameError;?></span>
                                        <?php endif; ?>
                                   </div>
                                 </div>
                                 <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                                    <label class="control-label">介紹</label>
                                    <div class="controls">
                                        <input name="email" type="text" class="form-control" placeholder="請輸入介紹" value="<?php echo !empty($email)?$email:'';?>">
                                        <?php if (!empty($emailError)): ?>
                                                <span class="help-inline"><?php echo $emailError;?></span>
                                        <?php endif;?>
                                    </div>
                                  </div>
                                  <div class="control-group <?php echo !empty($urlError)?'error':'';?>">
                                    <label class="control-label">網址</label>
                                    <div class="controls">
                                        <input name="url" type="text" class="form-control" placeholder="請輸入電商導購網址" value="<?php echo !empty($url)?$url:'';?>">
                                        <?php if (!empty($urlError)): ?>
                                                <span class="help-inline"><?php echo $urlError;?></span>
                                        <?php endif;?>
                                    </div>
                                  </div>
				  <hr>
                                  <div class="form-actions">
                                       <button type="submit" class="btn btn-success">更新</button>
                                       <a class="btn btn-default" href="manage.php">取消</a>
                                  </div>
                         </form>
              </div>

              <div class="col-lg-4">
		<img src="<?php echo !empty($pic)?$pic:'';?>" style="max-height:300px;"></img>
              </div>
   </div> <!-- /container -->
  </body>
</html>


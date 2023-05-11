<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>Đây là trang quản trị</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                <form action="dashboard.php" method="POST" role="form">
                    <legend>Tìm Kiếm User</legend>
                
                    <div class="form-group">
                        <label for="">Nhập user cần tìm</label>
                        <input type="text" class="form-control" id="" placeholder="Input Username" name="timkiem">
                    </div>                  
                
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>               
        
            </div>
        </div>
    </div>
    <?php 
        if(isset ($_POST["timkiem"])){
        //lay du lieu tu form gui len
        $u = $_POST['timkiem'];
        //ket noi den csdl
        $db = mysqli_connect("localhost", "root", "", "csdldemo");
        //truy van du lieu - tim user va password nhan duoc co trong csdl ko?
        $sql = "select * from users where username='$u'";
        //thuc thi truy van
        $rs = mysqli_query($db, $sql);
        $count = mysqli_num_rows($rs);
        if (mysqli_num_rows($rs)>0){
            //echo  "Tim thay";
            echo  "<h1>Tim thay " . $count ." ket qua voi username la: ". $u ."</h1>" ;
        // header("Location: dashboard.php");
        }else{
            echo "<h2>Khong tim thay username " . $_POST["timkiem"] . "</h2>" ;
    
    
        }
    }
    ?>
</body>
</html>
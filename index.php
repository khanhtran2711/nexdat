<?php
require_once('header.php');
require_once('connect.php');
$c = new Connect();
$dbLink2 = $c->connectToMySQL();
$sql2 = 'SELECT `path` FROM products';
$re2=$dbLink2->query($sql2);
$pathArry = array();
if($re2->num_rows>0){
    while($row=$re2->fetch_assoc()){
        $pathArry[] = $row['path'];
    }
}


if(isset($_POST['Add'])){
    
    $dbLink = $c->connectToPDO();
    // $id =  $_POST['product_id'];
    $path =  $_POST['ppath'];
    $name =  $_POST['pname'];
    $desc =  $_POST['pdesc'];
    $sets = $_POST['pset'];
    $scope =  $_POST['pscope'];
    $tech =  $_POST['ptech'];
    $down =  $_POST['pdown'];
    $tags =  $_POST['ptags'];
    
    $url = $_POST['pimage'];
    $flag = false;
    if($url!=""){
        $pattern = "/([\w\-]*\.jpg)|([\w\-]*\.png)|([\w\-]*\.jpeg)/";
        preg_match_all($pattern, $url, $m);
        $files = explode(",",$url);
        $i=0;
        $ln = count($files);
        foreach ($files as $f) {
            $data = file_get_contents($f);
            $new = "image/".$m[0][$i];
            $flag = file_put_contents($new, $data);    
            $i++;
        }
    }
    
    
    if($flag){
        
        $v = [
            $path,$name,$desc,$sets,$tech,$scope,$down,implode(",",$m[0]),$tags
        ];
    }else{
        $v = [
            $path,$name,$desc,$sets,$tech,$scope,$down,"",$tags
        ];
    }
    
    $sql = "INSERT INTO `products`(`path`, `name`, `description`, `sets`, `data`, `scope`, `download`, `image`, `tags`) VALUES (?,?,?,?,?,?,?,?,?)";
    $re = $dbLink->prepare($sql);
    $stmt = $re->execute($v);
    if($stmt){
        echo "<div class='alert alert-success' role='alert'>
        $name is added successfully </div>";
    }else{
        echo "<div class='alert alert-danger' role='alert'>
        $name is added failed </div>";
    }
    

}
if(isset($_POST['json'])){
    header("Location: test.php");
}
?>

<div class="container">
            <form class="form form-vertical" method="POST" action="#"
            enctype="multipart/form-data"
            >
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Product Path</label>
                                <input type="text" id="ppath" class="form-control"
                                    name="ppath" placeholder="Product Path"
                                    value ="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Product Name</label>
                                <input type="text" id="pname" class="form-control"
                                    name="pname" placeholder="Product Name"
                                    value ="">
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Product Description</label>
                                <input type="text" id="pdesc" class="form-control"
                                    name="pdesc" placeholder="Product Description"
                                    value ="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Product Sets</label>
                                <input type="text" id="pset" class="form-control"
                                    name="pset" placeholder="Product Sets"
                                    value ="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Product Technical Data</label>
                                <input type="text" id="ptech" class="form-control"
                                    name="ptech" placeholder="Product Technical Data"
                                    value ="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Product Scope</label>
                                <input type="text" id="pscope" class="form-control"
                                    name="pscope" placeholder="Product Scope"
                                    value ="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Product Download</label>
                                <input type="text" id="pdown" class="form-control"
                                    name="pdown" placeholder="Product Download"
                                    value ="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Product tags</label>
                                <input type="text" id="ptags" class="form-control"
                                    name="ptags" placeholder="mỗi tags cách nhau dấu /"
                                    value ="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="image-vertical">Image</label>
                                <input type="text" id="pimage" class="form-control"
                                    name="pimage" placeholder="lấy url của img để vào"
                                    value ="">
                                <!--<input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">-->
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" name="Add">Submit</button>
                            <button type="reset"
                                class="btn btn-light-secondary me-1 mb-1 rounded-pill">Reset</button>
                            <button type="submit"
                                class="btn btn-light-secondary me-1 mb-1 rounded-pill" name="json">Create a Json File</button>
                        </div>
                    </div>
                </div>
            </form>
                    
            </div> <!--container-->
            <script>
                $(document).ready(function(){
                    
                    let path = <?php echo json_encode($pathArry); ?>; 
                    $("#ppath").autocomplete({
                        source: path
                    });
                    
                })
    </script>
<?php
require_once('footer.php');
?>
<?php
require_once('header.php');

$c = new Connect();
$dbLink = $c->connectToMySQL();
$sql = 'SELECT * FROM products';
$re = $dbLink->query($sql);

if ($re->num_rows > 0) {
?>
  <!-- Put banner here -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <?php
      while ($row = $re->fetch_assoc()) {
        if($row['image']!="") $picture = $row['image']; 
        else $picture = "cat3.jpeg";
      ?>
        <!-- html div col -->
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <a href="#">
              <img src="./image/<?=$picture?>" class="card-img" alt="product.title" height="500px" />
            </a>

            <div class="label-top shadow-sm">
              <a class="text-white" href="#"><?= $row['id'] ?></a>
            </div>
            <div class="card-body">
              <div class="clearfix mb-3">
                <span class="float-end"><a href="#" class="small text-muted text-uppercase aff-link"><?= $row['path'] ?></a></span>

              </div>
              <h5 class="card-title">
                <a target="_blank" href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a>
              </h5>
              <div class="clearfix mb-1">

                <span class="float-start"><a href="#"><i class="fas fa-question-circle"></i></a></span>

                <span class="float-end">
                  <i class="far fa-heart" style="cursor: pointer"></i>

                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-4 pb-3">
            <div class="card">
                <img
                src="https://www.purina.co.uk/sites/default/files/styles/square_medium_440x440/public/2022-06/Persian%20Long%20Hair.2.jpg?h=00e3f93f&itok=kQYvwP0Z" width="300px"/>
                <div class="card-body">
                
                <span><h5><?= $row['pname'] ?></h5></span>

                
                <h6 class="card-subtitle mb-2 text-muted"><span></span><?= $row['pprice'] ?></h6>
                </div>
            </div>
        </div> -->
    <?php
      } //while
    } //if
    ?>
    </div>
  </div>



  <!-- Body -->

  </body>

  <script src="./scripts/register.js"></script>
  <?php
  require_once('footer.php');
  ?>
<?php
require './class/getproducts.php';
$products = new GetProducts();
$products_lists = $products->productsList();



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products List</title>
    <!-- <link rel="stylesheet" href="./assets/css/index.css" /> -->
    <style>
      @import url('./assets/css/index.css');
    </style>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="top-box">
        <!-- top row title + buttons -->
        <div class="top-bar">
          <div class="">
            <h2 class="title">Product List</h2>
          </div>
          <div class="button-div">
            <button id="add">Add</button>
            <button id="mass-delete">Mass Delete</button>
          </div>
        </div>
        <!--**************** top row title + buttons******************* -->
      </div>

      <!-- all products lists -->
        <div class="product-main">
            <?php while($roots = mysqli_fetch_assoc($products_lists)){ ?>
              
              <!-- <div class=""> -->
                <div class="products-cards">
                  <input
                    type="checkbox"
                    name="product[]"
                    data-product="<?= $roots['id']?>"
                    id="check"
                    class='marker'
                  />
                  <div class="product-details">
                    <p id="sku"><?= $roots['sku'] ?></p>
                    <p id="name"><?= $roots['name'] ?></p>
                    <p id="price"><?= $roots['price'] ?> $</p>
                    <p id="measurements"> <?= $roots['title'] ?> : <?= $roots['measurements'] ?></p>
                  </div>
                </div>
              <!-- </div> -->
            <?php }?>
        </div>

    </div>
    <script src="./assets/js/delete-products.js"></script>
  </body>
</html>

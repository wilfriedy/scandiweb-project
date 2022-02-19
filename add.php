<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Product</title>
    <style>
      @import url("./assets/css/add.css");
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
      <!-- top row title + buttons -->
      <div class="top-box">
        <div class="top-bar">
          <div class="">
            <h2 class="title">Product List</h2>
          </div>
          <div class="button-div">
            <button class='button' id="save">Save</button>
            <button id="cancel">Cancel</button>
          </div>
        </div>
      </div>

      <!--**************** Form box ******************* -->

      <form action="" id="product_form">
        <p class="error"></p>
        <div class="details-wrapper">
          <label for="sku">SKU</label>
          <input type="text" name="sku" id="sku" />
        </div>
        <p class="error"></p>
        <div class="details-wrapper">
          <label for="name">Name</label>
          <input type="text" name="product-name" id="name" />
        </div>
        <p class="error"></p>
        <div class="details-wrapper">
          <label for="price">Price</label>
          <input type="text" name="price" id="price" />
        </div>
        <!-- <div class="types-box"> -->
        <p class="error"></p>
        <div class="details-wrapper">
          <label for="productType">Type Switcher</label>
          <select name="productType" id="productType">
            <option value=""></option>
            <option value="book">Book</option>
            <option value="dvd">DVD</option>
            <option value="furniture">Furniture</option>
          </select>
        </div>
        <div class="product-inputs"></div> 
      </form>
    </div>
    <script src="./assets/js/add-product.js"></script>
  </body>
</html>

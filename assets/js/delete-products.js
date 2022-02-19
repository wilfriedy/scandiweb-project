let mass__delete = document.querySelector("#mass-delete");
let check__boxes = document.querySelectorAll("#check");
let product__container = document.querySelector(".products-container");
let add_btn = document.querySelector("#add");

// events
mass__delete.addEventListener("click", deleteProduct);
add_btn.addEventListener("click", add_products);

// events callbacks
function add_products() {
  // redirect to add product page
  window.location = "./add.php";
}

function deleteProduct() {
  let data__to__delete = []; // this array stores IDs of products when selected
  check__boxes.forEach((box) => {
    if (box.checked === true) {
      data__to__delete.push(+box.dataset.product);
    }
  });

  $.ajax({
    type: "POST",
    url: "./class/delete-products.php",
    data: { products: data__to__delete },
    success: function () {
      location.reload();
    },
  });
}

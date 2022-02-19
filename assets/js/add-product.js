// selections
let save_btn = document.querySelector("#save");
let cancel_btn = document.querySelector("#cancel");
let form = document.querySelector("#product_form");
let type_switcher = document.querySelector("#productType");
let dynamic_input_box = document.querySelector(".product-inputs");
let sku_input = document.querySelector("#sku");
let price = document.querySelector("#price");
let product_name = document.querySelector("#name");
let option_selected = false; // this is set to false for validation purposes
let price_input = document.querySelector("#price");

// dynamic input fields
// this is an object that get feeds what input fields should show up when a product type is selected
let templates = {
  furniture: `
   <p class="error"></p>
  <div class="details-wrapper">
            <label for="height">Height</label>
            <input type="text" name="height" id="height" />
          </div>
           <p class="error"></p>
          <div class="details-wrapper">
            <label for="width">Width</label>
            <input type="text" name="width" id="width" />
          </div>
           <p class="error"></p>
          <div class="details-wrapper">
            <label for="length">length</label>
            <input type="text" name="length" id="length" />
          </div>`,

  book: `
   <p class="error"></p>
  <div class="details-wrapper">
            <label for="height">Weight</label>
            <input type="text" name="weight" id="weight" />
          </div>`,

  dvd: ` <p class="error"></p>        
  <div class="details-wrapper">
            <label for="height">Size</label>
            <input type="text" name="size" id="size" />
          </div>
  `,
};

// utility functions
const is__required = (value) => (value === "" ? true : false); // for checking empty values

//validation functions

// validates letter or alphanumeric input values
const check__letter_values = (input, error_msg = "") => {
  let error_el = input.parentElement.previousElementSibling;
  error_el.textContent = error_msg;
  if (is__required(input.value)) {
    error_msg = "Please enter a value";
    error_el.textContent = error_msg;
    return false;
  } else if (!isNaN(input.value)) {
    error_msg = "Please only alphanumeric or letters are required";
    error_el.textContent = error_msg;
    return false;
  }
  return true; // return true is all validation has been passed
};

// validates number input values
const check__numeric__values = (input, error_msg = "") => {
  let error_el = input.parentElement.previousElementSibling;
  error_el.textContent = error_msg;
  if (is__required(input.value)) {
    error_msg = "Please enter a value";
    error_el.textContent = error_msg;
    return false; //returns flase for any errors
  } else if (isNaN(input.value)) {
    error_msg = "Please enter numbers only";
    error_el.textContent = error_msg;
    return false; //returns flase for any errors
  }
  return true; // return true is all validation has been passed
};

// validation for only dynamic inputs
function product__selected() {
  // let hold;
  let arr = [];
  // since the dynamic values are only numbers the  check__numeric__values function validates the values and displays errors for each input fielddepending on how many there are.
  if (option_selected && type_switcher.value.toLowerCase() !== "") {
    dynamic_input_box.querySelectorAll("input").forEach((inputs) => {
      if (check__numeric__values(inputs)) {
        arr.push(true);
      } else {
        arr.push(false);
      }
    });
  }
  return arr.indexOf(false) == -1 ? true : false; // thid returns true or false depending on what value was not properly validated from the dynaic values
}

// save data depending on product type
function save__product__data(location_to_save) {
  // ajax submission
  $.ajax({
    type: "POST",
    url: `${location_to_save}`,
    data: $("form").serialize(),
    success: function () {
      redirect__to__home(); // redirect to products page after adding
    },
  });
}

// the function below takes a parameter which is the path to which the data get submitted
function send__product__to__file() {
  let product_chosen = type_switcher.value.toLowerCase();
  // this submits the dvd data
  if (product_chosen == "dvd") {
    save__product__data("./class/save-dvd.php");
  }
  // this submits the furniture data
  if (product_chosen == "furniture") {
    save__product__data("./class/save-furniture.php");
  }
  // this submits the book data
  if (product_chosen == "book") {
    save__product__data("./class/save-book.php");
  }
}

// events
cancel_btn.addEventListener("click", redirect__to__home); //canceling and redirects to home
type_switcher.addEventListener("change", type__switching); // to switch between the product types
save_btn.addEventListener("click", save__product); // submits data to server and get ito the databse

// events callbacks

function redirect__to__home() {
  window.location = "./"; //redirect to index page when canceled
}

// this function checks if a product type has been selected before displaying the dynamic input fields
function type__switching() {
  let current_option = type_switcher.value.toLowerCase(); //get the selected option value
  if (current_option && type_switcher.value !== "") {
    dynamic_input_box.innerHTML = templates[current_option]; //inserts inpt field into the option box depending on what input is selected
    option_selected = true;
  } else {
    dynamic_input_box.innerHTML = ""; // empty daynamic input box if no value is selected
  }
}

function save__product() {
  // validate sku
  if (type_switcher.value == "") {
    console.dir(type_switcher);
    type_switcher.parentElement.previousElementSibling.textContent =
      "Please select a product type";
  } else {
    type_switcher.parentElement.previousElementSibling.textContent = "";
  }
  let is_valid; // this variable stores all the boolean values across all input fields to before passing them to be saved
  if (option_selected && type_switcher.value !== "") {
    // if a product type is selected and the select box is not empty
    let sku_valid = check__letter_values(sku_input);
    let letter_valid = check__letter_values(product_name);
    let num_valid = check__numeric__values(price_input);
    // call on all inpputs fields of dynamic inputs
    let other_valid = product__selected();
    // check if no errors befor saving data
    is_valid = sku_valid && letter_valid && num_valid && other_valid;

    if (is_valid) {
      send__product__to__file(); //sends data to the respective file and get saved
    }
  }
}

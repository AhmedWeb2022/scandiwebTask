<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .input {
      display: none;
    }
  </style>
  <title>Adding a product</title>
</head>

<body>

  <section>
    <div class="container">

      <div class="row justify-content-between">
        <form action="./includes/add_products.php" method="post" id="product_form" class=" row col-md-12 g-3">
          <div class="d-flex justify-content-between mt-4">
            <div class="container">
              <div class="row">
                <div class="title col-md-6">
                  <h1>Product Add</h1>
                </div>
                <div class="button col-md-6 d-flex justify-content-end">
                  <button class="btn btn-primary mx-2 my-2 text-uppercase" type="submit" id="save" name="save">Save</button>
                  <button class="btn btn-danger mx-2 my-2 text-uppercase" name="cancel" onclick="location.href='index.php'" id="cancel">Cancel</button></a>
                </div>
                <hr class="border border-2 border-dark">
              </div>
            </div>
          </div>
          <div class="row justify-content-between">
            <div class=" row col-md-6 g-3 ">
              <div class="col-md-12">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku">
              </div>
              <div class="col-md-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="col-md-12">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price">
              </div>
              <div class="col-md-12">
                <label for="Type" class="form-label">Product Type</label>
                <select name="productType" class="form-select" id="productType">
                  <option disabled selected>Choose...</option>
                  <option value="Dvd">DVD</option>
                  <option value="Book">Book</option>
                  <option value="Furniture">Furniture</option>
                </select>
              </div>

            </div>
            <div class=" row col-md-6 g-3 justify-content-center align-items-center">
              <div class="col-md-12 input" id="Dvd">
                <label for="size" class="form-label">Size(MB)</label>
                <input type="number" class="form-control" name="size" id="size">
                <p>Please, provide Size</p>
              </div>

              <div class="col-md-12 input" id="Furniture">
                <label for="height" class="form-label">Height(CM)</label>
                <input type="number" name="height" class="form-control" id="height">
                <label for="width" class="form-label">Width(CM)</label>
                <input type="number" name="width" class="form-control" id="width">
                <label for="length" class="form-label">Length(CM)</label>
                <input type="number" name="length" class="form-control" id="length">
                <p>Please, provide dimensions</p>
              </div>
              <div class="col-md-12 input" id="Book">
                <label for="weight" class="form-label">Weight(KG)</label>
                <input type="number" name="weight" class="form-control" id="weight">
                <p>Please, provide Weight</p>
              </div>
            </div>
          </div>
        </form>
        <div class='error-message'>
        </div>
      </div>
    </div>
    <hr class="border border-2 border-dark">
    </div>
  </section>
  <footer>
    <div class="container">
      <p>Scandiweb Test assignment</p>
    </div>
  </footer>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/jquery-3.6.3.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#productType').on('change', function() {
        $(".input").hide();
        $("#" + $(this).val()).fadeIn(700);
      }).change();
    });

    $(document).ready(function() {
      $('form').submit(function(event) {
        event.preventDefault();
        var sku = $("#sku").val();
        var name = $('#name').val();
        var price = $('#price').val();
        var productType = $('#productType').val();
        var size = $('#size').val();
        var height = $('#height').val();
        var width = $('#width').val();
        var length = $('#length').val();
        var weight = $('#weight').val();
        var save = $('#save').val();
        var cancel = $('#cancel').val();
        $('.error-message').load("./includes/add_products.php", {
          sku: sku,
          name: name,
          price: price,
          productType: productType,
          size: size,
          height: height,
          width: width,
          length: length,
          weight: weight,
          save: save,
          cancel: cancel,
        });
      });
    });
  </script>
</body>

</html>
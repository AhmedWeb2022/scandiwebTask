// function to show/hide inputs depend on its type
$(document).ready(function() {
  $('#productType').on('change', function() {
    $(".input").hide();
    $("#" + $(this).val()).fadeIn(700);
  }).change();
});

// Validation handel ajax


$(document).ready(function() {
  $('#product_form').submit(function(e) {
    e.preventDefault();
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
    $.ajax({
      type: 'POST',
      url: 'includes/add_products.php',
      data: {
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
      },

      success: function(response) {
        result = $.parseJSON(response)
        console.log(result.message);
        if (result.message.all) {
          $("#input-error").html(result.message.all).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#sku-exist-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.message.SKU) {
          $("#sku-error").html(result.message.SKU).css("display", "block");
          $("#sku-exist-error").css("display", "none");
          $("#input-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.status == 2) {
          $("#sku-exist-error").html(result.message).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#input-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.message.name) {
          $("#name-error").html(result.message.name).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#sku-exist-error").css("display", "none");
          $("#input-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.message.price) {
          $("#price-error").html(result.message.price).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#sku-exist-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#input-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.message.type) {
          $("#type-error").html(result.message.type).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#input-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.message.size) {
          $("#size-error").html(result.message.size).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#sku-exist-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#input-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.message.height) {
          $("#height-error").html(result.message.height).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#sku-exist-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#input-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.message.width) {
          $("#width-error").html(result.message.width).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#sku-exist-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#input-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.message.length) {
          $("#length-error").html(result.message.length).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#sku-exist-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#input-error").css("display", "none");
          $("#weight-error").css("display", "none");
        } else if (result.message.weight) {
          $("#weight-error").html(result.message.weight).css("display", "block");
          $("#sku-error").css("display", "none");
          $("#sku-exist-error").css("display", "none");
          $("#name-error").css("display", "none");
          $("#price-error").css("display", "none");
          $("#type-error").css("display", "none");
          $("#size-error").css("display", "none");
          $("#height-error").css("display", "none");
          $("#width-error").css("display", "none");
          $("#length-error").css("display", "none");
          $("#input-error").css("display", "none");
        }

        if (result.status == 1) {
          location.assign("./index.php");
        }
      },
      error: function(error) {
        // console.log(error);
      }
    })
  });
});
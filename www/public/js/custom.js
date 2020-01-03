$(document).ready(function() {
  $("#input-sort-size").change(function() {
    $("span#size-qty").html($("#input-sort-size").val());
    // console.log($('#input-sort-size').val());
  });
});

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

var productId = getCookie("productId");
if (productId != "") {
  var arr = productId.split(",");
  $("#cart-count").html(arr.length);
}

$(".add-to-cart").click(function() {
  var id = $(this).attr("id");

  var productId = getCookie("productId");
  if (productId != "") {
    productId = productId + "," + id;
  } else {
    productId = id;
  }

  var arr = productId.split(",");
  $("#cart-count").html(arr.length);

  setCookie("productId", productId, 7);
});

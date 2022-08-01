<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
  const inputSize = document.getElementsByName("size");
  const getName = document.querySelectorAll("#value_name");
  const getPrice = document.querySelectorAll("#value_price");
  const getImage = document.querySelectorAll("#value_image");
  const setName = document.getElementById("set_name");
  const setPrice = document.getElementById("set_price");
  const setImage = document.getElementById("set_image");
  const btnCart = document.querySelectorAll("#btn_cart");
  const setTotal = document.getElementById("total");
  const topping = document.getElementsByName("topping");
  const reduce = document.getElementById("reduce");
  const augment = document.getElementById("augment");
  const quantity = document.getElementById("quantity");
  const btnSubmit = document.getElementById("btnSubmit");
  const setId = document.getElementById("productId");
  const setNameIP = document.getElementById("productName");
  const setPriceIP = document.getElementById("productPrice");
  const setImageIP = document.getElementById("productImage");
  const priceProOpt = document.getElementById("priceProOpt");
  const toppingIP = document.getElementById("toppingIP");
  const getId = document.getElementsByClassName("product_id");
  //

  // chon size
  function click_size() {
    for (var i = 0; i < inputSize.length; i++) {
      if (inputSize[i].checked == true) {
        price_increase = inputSize[i].getAttribute("data");
        setPrice.innerText =
          parseInt(localStorage.getItem("initial")) + Number(price_increase);
        toTal();
        priceProOpt.value =
          Number(document.getElementById("set_price").innerText) + topPing();
      }
    }
  }

  // lay data cho option
  for (var i = 0; i < btnCart.length; i++) {
    btnCart[i].onclick = function() {
      inputSize[0].checked = true;
      for (var i = 0; i < topping.length; i++) {
        topping[i].checked = false;
      }
      toppingIP.value = "";
      index = this.getAttribute("data");
      setImage.src = getImage[index].getAttribute("data");
      setPrice.innerText = getPrice[index].getAttribute("data");
      localStorage.setItem("initial", getPrice[index].getAttribute("data"));
      setTotal.innerText =
        getPrice[index]
        .getAttribute("data")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
      setName.innerText = getName[index].innerText;
      setId.value = getId[index].innerText;
      setNameIP.value = "getName[index].innerText";
      setImageIP.value = getImage[index].getAttribute("data");
      priceProOpt.value = getPrice[index].getAttribute("data");
      quantity.value = 1;
    };
  }
  // tao nut tang giam so luong
  reduce.onclick = function() {
    if (quantity.value >= 2) {
      quantity.value = quantity.value - 1;
      toTal();
    }
  };
  augment.onclick = function() {
    quantity.value = Number(quantity.value) + 1;
    toTal();
  };

  function toTal() {
    valide();
    priceProOpt.value =
      Number(document.getElementById("set_price").innerText) + topPing();
    var total = quantity.value * setPrice.innerText;
    setTotal.innerText = topPing() + total + "đ";
    setTotal.innerText = setTotal.innerText.replace(
      /\B(?=(\d{3})+(?!\d))/g,
      ","
    );
  }

  //chon topping
  function topPing() {
    var count = 0;
    var initial;
    for (var i = 0; i < topping.length; i++) {
      if (topping[i].checked == true) {
        initial = topping[i].getAttribute("data");
        count += Number(initial);
      }
    }
    return count;
  }

  function topPingText() {

    var result = "";
    var initial;
    for (var i = 0; i < topping.length; i++) {
      if (topping[i].checked == true) {
        initial = topping[i].getAttribute('data_id');
        result += ' ' + initial;
      }
    }
    toppingIP.value = result;
  }

  function valide() {
    if (quantity.value > 49) {
      quantity.value = 49;
    }
  }
  // du lieu tu form
  $(document).ready(function() {
    var submit = $("button[type='submit']");

    submit.click(function() {
      //Lấy toàn bộ dữ liệu trong Form
      var data = $("form#form_option").serialize();

      //Sử dụng phương thức Ajax.
      $.ajax({
        type: "GET", //Sử dụng kiểu gửi dữ liệu POST
        url: "data.php", //gửi dữ liệu sang trang data.php
        data: data, //dữ liệu sẽ được gửi
        success: function(
          data // Hàm thực thi khi nhận dữ liệu được từ server
        ) {
          if (data == "false") {
            document.getElementById("content").innerText = "Đặt hàng thất bại";
          } else {
            document.getElementById("content").innerText = data;
            // dữ liệu HTML trả về sẽ được chèn vào trong thẻ có id content
          }
        },
      });
      // return false;
    });
  });
</script>
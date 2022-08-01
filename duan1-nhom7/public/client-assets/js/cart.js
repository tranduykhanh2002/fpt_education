const price = document.querySelectorAll("#price");
const quanTity = document.querySelectorAll("#quantity");
const total = document.querySelectorAll("#total");
const reduce = document.querySelectorAll("#reduce");
const augment = document.querySelectorAll("#augment");
const nameIp = document.getElementById("nameIp");
const phoneIp = document.getElementById("phoneIp");
const addressIp = document.getElementById("addressIp");
const noteIp = document.getElementById("noteIp");
const modalName = document.querySelectorAll("#modalName");
const modalPhone = document.querySelectorAll("#modalPhone");
const modalAddress = document.querySelectorAll("#modalAddress");
const modalNote = document.querySelectorAll("#modalNote");
const priceShip = document.getElementById("priceShip");
const totalcart = document.getElementById("totalCart");
const priceTem = document.getElementById("priceTem");
const btn_points = document.getElementById("btn_points");
const render_points = document.getElementById("render_points");
const points = document.getElementById("points");
const btnUpdate = document.getElementById("btn_update");
const btnBuy = document.getElementById("btn_buy");
const none_save = document.getElementById("none_save");
const saveAddress = document.getElementById("saveAddress");
const form_address = document.getElementById("form_address");
const mesAddress = document.getElementById("mesAddress");
const noteError = document.getElementById("noteError");
const titleError = document.getElementById("titleError");
var flagUpdate = true;
var flagAddress = false;
// tao nut tang giam so luong
btnBuy.style.backgroundColor = " #808080";
function valide() {
  for (var i = 0; i < quanTity.length; i++) {
    if (quanTity[i].value > 49) {
      quanTity[i].value = 49;
    }
  }
}

for (var i = 0; i < total.length; i++) {
  toTal(i);
}

for (var i = 0; i < reduce.length; i++) {
  reduce[i].onclick = function () {
    index = this.getAttribute("index");
    if (quanTity[index].value >= 2) {
      quanTity[index].value = Number(quanTity[index].value) - 1;
      toTal(index);
      flagUpdate = false;
      btnUpdate.setAttribute("onclick", "getUpdate()");
      btnUpdate.style.backgroundColor = " #32CD32";
      btnBuy.style.backgroundColor = " #808080";
      btnBuy.style.cursor = "default";
      btnUpdate.style.cursor = "pointer";
    }
  };
}

for (var i = 0; i < augment.length; i++) {
  augment[i].onclick = function () {
    index = this.getAttribute("index");
    console.log(index);
    quanTity[index].value = Number(quanTity[index].value) + 1;
    toTal(index);
    flagUpdate = false;
    btnUpdate.setAttribute("onclick", "getUpdate()");
    btnUpdate.style.backgroundColor = " #32CD32";
    btnBuy.style.backgroundColor = " #808080";
    btnBuy.style.cursor = "default";
    btnUpdate.style.cursor = "pointer";
  };
}
function toTal(index) {
  valide();
  total[index].innerHTML =
    price[index].innerHTML.replace(",", "").replace("đ", "") *
    quanTity[index].value;
  total[index].innerHTML =
    total[index].innerHTML.replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
  price_tem();
  totalCart();
}

function price_tem() {
  var count = 0;
  for (var i = 0; i < total.length; i++) {
    var totalI = total[i].innerHTML.replace("đ", "");
    totalI = totalI.replace(",", "");
    totalI = totalI.replace(",", "");
    count += Number(totalI);
  }
  priceTem.innerText = count;
  priceTem.innerText =
    priceTem.innerText.replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
}

function getAddRess(index) {
  nameIp.value = modalName[index].getAttribute("data");
  phoneIp.value = modalPhone[index].getAttribute("data");
  addressIp.value = modalAddress[index].getAttribute("data");
  noteIp.value = modalNote[index].getAttribute("data");
  btnBuy.removeAttribute("style");
  btnBuy.style.cursor = "pointer";
  flagAddress = true;
  mesAddress.style.display = "none";
}

function saveBlock() {
  var flag;
  vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
  mesAddress.style.display = "block";
  if (nameIp.value == "" || phoneIp.value == "" || addressIp.value == "") {
    flag = false;
    flagAddress = false;
    mesAddress.innerHTML = "note: 3 trường đầu không được để trống !";
  } else {
    if (phoneIp.value.length != 10 || vnf_regex.test(phoneIp.value) == false) {
      flag = false;
      flagAddress = false;
      mesAddress.innerHTML = "note: số điện thoại không hợp lệ !";
    } else {
      flag = true;
      flagAddress = true;
      btnBuy.removeAttribute("style");
      btnBuy.style.cursor = "pointer";
    }
  }

  if (flag == true) {
    mesAddress.style.display = "none";
    none_save.style.display = "flex";
    btnBuy.removeAttribute("style");
    btnBuy.style.cursor = "pointer";
  }
}

function totalCart() {
  var count = 0;
  for (var i = 0; i < total.length; i++) {
    var totalI = total[i].innerHTML.replace("đ", "");
    totalI = totalI.replace(",", "");
    totalI = totalI.replace(",", "");
    count += Number(totalI);
  }
  var ship = priceShip.innerHTML.replace("đ", "");
  ship = ship.replace(",", "");
  totalcart.innerText = Number(count) + Number(ship);
  totalcart.innerText =
    totalcart.innerText.replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
  PointsDown();
}
totalCart();
function clickpoints() {
  var result = totalcart.innerText.replace(",", "");
  result = result.replace(",", "");
  result = result.replace("đ", "");
  if (Number(result) < Number(render_points.getAttribute("dataWait"))) {
    render_points.innerHTML = "-" + result + "đ";
    PointsDown("true");
  } else {
    render_points.innerHTML = "-" + points.innerHTML + "đ";
    var changerData = render_points.getAttribute("dataWait");
    render_points.setAttribute("data", changerData);
    PointsDown("false");
  }
}

function PointsDown(flag) {
  if (flag == "true") {
    totalcart.innerText =0;
  } else {
    var result = totalcart.innerText.replace(",", "");
    result = result.replace(",", "");
    result = result.replace("đ", "");
    totalcart.innerText = result - Number(render_points.getAttribute("data"));
    totalcart.innerText =
      totalcart.innerText.replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ";
  }
}

delList = [];

function reLoad() {
  location.reload();
}

function checkbox() {
  var key = document.querySelectorAll(".key");
  var checkboxs = document.getElementsByName("checkbox[]");
  for (var i = 0; i < checkboxs.length; i++) {
    if (checkboxs[i].checked == true) {
      delList.push(key[i].innerHTML);
    }
  }
  if (delList.length == 0) {
    // return "Chưa có mục nào được chọn";
  }
  insertParam("updates", delList);
}

function getUpdate() {
  var listUpdate = [];
  for (var i = 0; i < quanTity.length; i++) {
    listUpdate.push(quanTity[i].value);
  }
  window.location = "?updateAll=" + listUpdate;
  flagUpdate = true;
}

function Buy() {
  if (flagAddress == false || flagUpdate == false) {
    setTimeout(function () {
      noteError.style.display = "none";
    }, 4000);
    if (flagAddress == false) {
      noteError.style.display = "flex";
      titleError.innerHTML = "Kiểm tra thông tin giao hàng!";
    }
    if (flagUpdate == false) {
      noteError.style.display = "flex";
      titleError.innerHTML = "Phải cập nhật lại giỏ hàng sau khi thay đổi!";
    }
  } else {
    var check = "?Buy";
    if (saveAddress.checked == true) {
      check += "&saveAddress";
    }
    window.location =
      check +
      "&n=" +
      nameIp.value +
      "&p=" +
      phoneIp.value +
      "&a=" +
      addressIp.value +
      "&note=" +
      noteIp.value +
      "&subTotal=" +
      priceTem.innerText.replace(",", "") +
      "&point=" +
      render_points.innerText.replace("đ", "").replace(",", "") +
      "&shipping=" +
      priceShip.innerHTML.replace("đ", "").replace(",", "") +
      "&total=" +
      totalcart.innerText.replace("đ", "").replace(",", "");
  }
}

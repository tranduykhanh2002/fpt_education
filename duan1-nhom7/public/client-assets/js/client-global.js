function confirm_remove(url, name, pageName = null) {
  Swal.fire({
    title: `Bạn có thực sự muốn xóa ${pageName} "${name}"?`,
    // showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: "Đồng ý",
    cancelButtonText: `Hủy`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      window.location.href = url;
    }
  });
}
var checkboxs = document.getElementsByName("checkbox[]");

function confirm_remove(url, name, pageName = null) {
  Swal.fire({
    title: `Bạn có thực sự muốn xóa ${pageName} "${name}"?`,
    // showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: "Đồng ý",
    cancelButtonText: `Hủy`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      window.location.href = url;
    }
  });
}

delList = [];

function reLoad() {
  location.reload();
}

function reInput() {
  var inputs = document.querySelectorAll("input");
  for (var i = 0; i < inputs.length; i++) {
    if ((inputs[i].attributes = "radio")) {
      inputs[i].value = "";
    } else if ((inputs[i].attributes = "radio")) {
      inputs[i].checked = false;
    }
  }
}

function chooseAll() {
  for (var i = 0; i < checkboxs.length; i++) {
    checkboxs[i].checked = true;
  }
}

function unchooseAll() {
  for (var i = 0; i < checkboxs.length; i++) {
    checkboxs[i].checked = false;
  }
}

function checkbox() {
  var key = document.querySelectorAll(".key");
  for (var i = 0; i < checkboxs.length; i++) {
    if (checkboxs[i].checked == true) {
      delList.push(key[i].innerHTML);
    }
  }

  function insertParam(key, value) {
    key = encodeURI(key);
    value = encodeURI(value);

    var kvp = document.location.search.substr(1).split("&");

    var i = kvp.length;
    var x;
    while (i--) {
      x = kvp[i].split("=");

      if (x[0] == key) {
        x[1] = value;
        kvp[i] = x.join("=");
        break;
      }
    }

    if (i < 0) {
      kvp[kvp.length] = [key, value].join("=");
    }

    //this will reload the page, it's likely better to store this until finished
    document.location.search = kvp.join("&");
  }
  insertParam("dels", delList);
}

function check_isset_box() {
  var checkboxs = document.getElementsByName("checkbox[]");
  const modal = document.querySelector(".modal-body");
  const btn_true = document.querySelector(".btn_true");
  const btn_false = document.querySelector(".btn_false");
  var flag;
  for (var i = 0; i < checkboxs.length; i++) {
    if (checkboxs[i].checked == true) {
      flag = true;
    }
  }
  if (flag == true) {
    modal.innerHTML = "Bạn có chắc muốn xóa các mục đã chọn ?";
    btn_false.style.display = "none";
    btn_true.style.display = "block";
  } else {
    modal.innerHTML = "Chưa có mục nào được chọn !";
    btn_true.style.display = "none";
    btn_false.style.display = "block";
  }
}

function check_delete($value, $id, id = []) {
  const btn_dell = document.querySelector("#btn_dell");
  const modal = document.querySelector("#modal-body");
  modal.innerHTML = "Bạn chắc chắn " + $value;
  if(id == null) {
    btn_dell.setAttribute("href", "?dellid=" + $id);  
  }else{
    btn_dell.setAttribute("href", "?dellid=" + $id + '&id='+$id);    
  }
}

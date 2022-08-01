const swal2 = document.getElementsByClassName(
  "swal2-container swal2-top-end swal2-backdrop-hidden"
);
setTimeout(function () {
  swal2[0].style.display = "none";
  swal2[1].style.display = "none";
  swal2[2].style.display = "none";
  swal2[3].style.display = "none";
}, 4000);

$(function () {
  var Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 4000,
  });

  $(".swalDefaultSuccess").click(function () {
    Toast.fire({
      icon: "success",
      title: "Thêm vào giỏ hàng thành công, đến giỏ hàng thanh toán ngay nào",
    });
  });
  $(".swalDefaultInfo").click(function () {
    Toast.fire({
      icon: "info",
      title: "Không thể đặt hàng, hãy đăng nhập để đặt hàn và nhân thưởng",
    });
  });
  $(".swalDefaultError").click(function () {
    Toast.fire({
      icon: "error",
      title: "Không thể đặt hàng, hãy đăng nhập để đặt hàn và nhân thưởng",
    });
  });
  $(".swalDefaultWarning").click(function () {
    Toast.fire({
      icon: "warning",
      title: "Không thể đặt hàng, hãy đăng nhập để đặt hàng và nhận thưởng",
    });
  });
  $(".swalDefaultQuestion").click(function () {
    Toast.fire({
      icon: "question",
      title: "Không thể đặt hàng, hãy đăng nhập để đặt hàn và nhân thưởng",
    });
  });

  $(".toastrDefaultSuccess").click(function () {
    toastr.success("Lorem ipsum dolor sit amet, consetetur sadipscing elitr.");
  });
  $(".toastrDefaultInfo").click(function () {
    toastr.info("Lorem ipsum dolor sit amet, consetetur sadipscing elitr.");
  });
  $(".toastrDefaultError").click(function () {
    toastr.error("Lorem ipsum dolor sit amet, consetetur sadipscing elitr.");
  });
  $(".toastrDefaultWarning").click(function () {
    toastr.warning("Lorem ipsum dolor sit amet, consetetur sadipscing elitr.");
  });

  $(".toastsDefaultDefault").click(function () {
    $(document).Toasts("create", {
      title: "Toast Title",
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultTopLeft").click(function () {
    $(document).Toasts("create", {
      title: "Toast Title",
      position: "topLeft",
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultBottomRight").click(function () {
    $(document).Toasts("create", {
      title: "Toast Title",
      position: "bottomRight",
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultBottomLeft").click(function () {
    $(document).Toasts("create", {
      title: "Toast Title",
      position: "bottomLeft",
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultAutohide").click(function () {
    $(document).Toasts("create", {
      title: "Toast Title",
      autohide: true,
      delay: 750,
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultNotFixed").click(function () {
    $(document).Toasts("create", {
      title: "Toast Title",
      fixed: false,
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultFull").click(function () {
    $(document).Toasts("create", {
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
      title: "Toast Title",
      subtitle: "Subtitle",
      icon: "fas fa-envelope fa-lg",
    });
  });
  $(".toastsDefaultFullImage").click(function () {
    $(document).Toasts("create", {
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
      title: "Toast Title",
      subtitle: "Subtitle",
      image: "../../dist/img/user3-128x128.jpg",
      imageAlt: "User Picture",
    });
  });
  $(".toastsDefaultSuccess").click(function () {
    $(document).Toasts("create", {
      class: "bg-success",
      title: "Toast Title",
      subtitle: "Subtitle",
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultInfo").click(function () {
    $(document).Toasts("create", {
      class: "bg-info",
      title: "Toast Title",
      subtitle: "Subtitle",
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultWarning").click(function () {
    $(document).Toasts("create", {
      class: "bg-warning",
      title: "Toast Title",
      subtitle: "Subtitle",
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultDanger").click(function () {
    $(document).Toasts("create", {
      class: "bg-danger",
      title: "Toast Title",
      subtitle: "Subtitle",
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
  $(".toastsDefaultMaroon").click(function () {
    $(document).Toasts("create", {
      class: "bg-maroon",
      title: "Toast Title",
      subtitle: "Subtitle",
      body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
    });
  });
});

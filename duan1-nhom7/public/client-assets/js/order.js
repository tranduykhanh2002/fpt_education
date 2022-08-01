const star = document.querySelectorAll("#star");
const starValue = document.getElementById("starValue");

var flag;

for (var i = 0; i < star.length; i++) {
  star[i].onclick = function () {
    flag = this.getAttribute("index");
    starValue.value = flag;
    for (var j = 0; j < flag; j++) {
      star[j].style.color = "#ffa400";
    }
    for (var k = flag; k <= star.length; k++) {
      star[k].style.color = "#EEEEEE";
    }
  };
}

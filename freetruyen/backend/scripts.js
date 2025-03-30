// Tạo một đối tượng XMLHttpRequest
var xhttp = new XMLHttpRequest();

// Xác định hàm xử lý khi yêu cầu AJAX được hoàn thành
xhttp.onreadystatechange = function() {
  if (this.readyState === 4 && this.status === 200) {
    // Chuyển hướng đến trang mới
    window.location.href = "http://localhost/freetruyen/backend/dashboard.php";
  }
};

// Gửi yêu cầu AJAX khi bấm vào liên kết
document.getElementById("myLink").addEventListener("click", function(event) {
  event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
  xhttp.open("GET", "http://localhost/freetruyen/admin", true);
  xhttp.send();
});

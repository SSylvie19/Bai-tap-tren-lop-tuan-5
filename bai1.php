<!DOCTYPE html>
<html>
<head>
    <title>Tính tuổi và chênh lệch ngày sinh</title>
</head>
<body>

<h2>Nhập thông tin của hai người</h2>
<form method="post">
    <label>Người 1:</label><br>
    Họ tên: <input type="text" name="name1" required><br>
    Ngày sinh (YYYY-MM-DD): <input type="date" name="dob1" required><br><br>

    <label>Người 2:</label><br>
    Họ tên: <input type="text" name="name2" required><br>
    Ngày sinh (YYYY-MM-DD): <input type="date" name="dob2" required><br><br>

    <input type="submit" name="submit" value="Tính toán">
</form>

<?php
if (isset($_POST['submit'])) {
    // Lấy thông tin từ form
    $name1 = $_POST['name1'];
    $dob1 = $_POST['dob1'];
    $name2 = $_POST['name2'];
    $dob2 = $_POST['dob2'];

    // Chuyển đổi ngày sinh thành đối tượng DateTime
    $birthDate1 = new DateTime($dob1);
    $birthDate2 = new DateTime($dob2);
    $currentDate = new DateTime(); // Ngày hiện tại

    // Tính tuổi của từng người
    $age1 = $currentDate->diff($birthDate1)->y;
    $age2 = $currentDate->diff($birthDate2)->y;

    // Tính chênh lệch ngày giữa hai ngày sinh
    $difference = $birthDate1->diff($birthDate2)->days;

    // In kết quả
    echo "<h3>Kết quả:</h3>";
    echo "Tuổi của $name1 là: $age1 tuổi<br>";
    echo "Tuổi của $name2 là: $age2 tuổi<br>";

    // Kiểm tra và hiển thị sự chênh lệch
    if ($difference > 0) {
        echo "Số ngày chênh lệch giữa $name1 và $name2 là: $difference ngày";
    } else if ($difference < 0) {
        echo "Số ngày chênh lệch giữa $name2 và $name1 là: " . abs($difference) . " ngày";
    } else {
        echo "$name1 và $name2 sinh cùng ngày!";
    }
}
?>

</body>
</html>

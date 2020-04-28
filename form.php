<!DOCTYPE html>
<html>
<title> 表單
</title>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  學號：<input type="text" name="studentId" minlength="9" maxlength="9" require="required"><br><br>
  姓名：<input type="text" name="stdName" maxlength="5" require="required"><br><br>
  類別：<select id="category" onchange="changeCategory(this.selectedIndex)"  require="required"></select><br><br>
  科目：<select id="subject"></select><br><br>
        <script type="text/javascript">
          var category=["大一必修","大二必修","大三必修","複選必修","選修","其他選修"];
          var select = document.getElementById("category");
          var inner = "<option value=0> 請選擇 </option>";
          for(var i = 0; i < category.length; i++){
            inner = inner + '<option value=i+1>' + category[i] + '</option>';
          }
          select.innerHTML = inner;

          var subjects = new Array();
          subjects[0] = ["交換電路與邏輯設計", "計算機程式設計", "生物科學通論", "普通化學丙", "普通物理學甲", "微積分甲上"];
          subjects[1] = ["電子學(一)", "電磁學(一)", "工程數學-線性代數", "工程數學-微分方程"];
          subjects[2] = ["資料結構", "演算法"];
          subjects[3] = ["工程數學-離散數學", "工程數學-複變"];

          function changeCategory(index){
            var subSelect = document.getElementById("subject");
            if (index <= 3){
              var subInner = "<option value=0> 請選擇 </option>";
              for(var i = 0; i < subjects[index].length; i++){
                subInner = subInner + '<option value=i>' + subjects[index][i] + '</option>';
              }
            }
            else{
              var subInner = '請輸入課程全名:<input type="text" name="courseName" require="required"><br>';
            }
            subSelect.innerHTML = subInner;
          }
          changeCategory(document.getElementById("category").selectedIndex);
        </script>
        <noscript>Error</noscript>
  數量：<input type="number" name="amount" value="1" min="1" require="required"><br><br>
  書價：<blockquote>
    200元<input type="radio" name="price" value="200"><br>
    300元<input type="radio" name="price" value="300"><br>
    500元<input type="radio" name="price" value="500"><br>
    700元<input type="radio" name="price" value="700"><br>
  </blockquote>
  其他事項：<input type="text" name="comment" size="100" maxlength="100"><br><br>
  
  驗證碼：<div><img src="./captcha/code.php" id="captcha"></div>
  <a href="#" onclick="document.getElementById(‘captcha’).src = document.getElementById(‘captcha’).src + ‘?’ + (new Date()).getMilliseconds()"> 
  重新整理</a><br>
  
  <input type="text" name="Turing" size="10" maxlength="10" require="required"><br>                      <!--驗證碼-->
  <input type="checkbox" name="condition" require="required">我已同意二手書網站條款<br><br>
  <input type="submit" value="送出"><br>

</form>
<?php

#verification code
session_start(); 
$Code = $_REQUEST["Turing"]; 
if(!isset($_SESSION['turing_string'])){
  $ok = 1;
  } 
else if(strtoupper($_SESSION['turing_string']) == strtoupper($Code)){
  $ok = 1;
  } 
else{
  $ok = 0; 
  echo "<b><font color=red>The Code you entered is invalid. 
  Please press the Back button of your browser and try again</font></b><br>"; 
  return 1;}

//require( dirname( __FILE__ ) . './有齊的database.php' );

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function regBook($stdId, $stdName, $price, $category, $textbookName){
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $stdId = test_input($_POST["stdId"]);
    $stdName = test_input($_POST["stdName"]);
    $price = test_input($_POST["price"]);
    $category = test_input($_POST["category"]);
    $textbookName = test_input($_POST["textbookName"]);
  }
}

$addBook = $conn->prepare("INSERT INTO Book(stdName, stdId, textbookName, 
    price, category, comment) VALUES (?, ?, ?, ?, ?, ?, ?)");
$addBook->bind_param("ssssssss", $stdName, $stdId, $textbookName,
    $price, $category);
$addbook->execute();
$addbook->close();
}
$conn->close()
?>
</body>
</html>
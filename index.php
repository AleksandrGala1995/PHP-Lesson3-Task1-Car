

<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    
    <select name="benzin_dizel" required="required">
        <option value="">Виберіть паливо</option>
        <option value="1">Бензин</option>
        <option value="2">Дизель</option>
  
    </select>
    <br>
    
    
    Введіть об’єм двигуна (куб. см) : <input type="number" name="objem" required="required"><br>
    Введіть рік випуску автомобіля (можна вводити з 1970 по поточний рік) : <input type="number" name="rik" required="required"><br>
    Введіть вартість автомобіля у євро : <input type="number" name="vartist" required="required"><br>
     
    <input type="submit">
</form>
<?php
if ((!empty($_POST['rik'])) and (!empty($_POST['objem'])) and (!empty($_POST['benzin_dizel'])) and (!empty($_POST['vartist']))) {
    $rik = $_POST['rik'];
    $objem = $_POST['objem'];
    $benzin_dizel=$_POST['benzin_dizel'];
    $vartist=$_POST['vartist'];
    
    if ( ($rik>=1970) and ($rik<=2021)) {
        
        if ($benzin_dizel==1)
        {
        $stavkaBazova=50;
        } else
            
        {
        $stavkaBazova=75;
        }
            
        $kDviguna=  $objem/1000;
        $kViku= date("Y")-$rik-1;
        if ($kViku===0) $kViku=1;
        
        $stavkaAkcizu = $stavkaBazova*$kDviguna*$kViku;
         
        
        
        echo ("Ставка акцизу: $stavkaAkcizu");
        echo "<br>";
        
        $vartist=$vartist+$stavkaAkcizu;
        
        echo ("Вартість автомобіля з урахуванням акцизу: $vartist");
        
    } else 
    {
      echo ("Введені неправильні дані");
        
    }
    
  
    
}


?>

</body>
</html>


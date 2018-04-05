<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <m\eta charset="utf-8">
    <title></title>
    <style media="screen">
    @import url('https://fonts.googleapis.com/css?family=Poppins');
    body{
      margin: 0 auto;
    }
      #inputPain{
        font-family: 'Poppins', sans-serif;
        font-size: 30px;
        width: 70%;
        height: 50px;
        margin: 10% 0% 0% 15%;
      }
      #btnSub{
        font-family: 'Poppins', sans-serif;
        font-size: 30px;
        font-weight: bold;
        height: 57px;
        color: #fff;
        background-color: #000;
        border: none;
      }
      #btnSub:hover{
        color: #000;
        background-color: #ccc;
        cursor: pointer;
      }
      #tableInfo{
        width: 70%;
        text-align: center;
      }
      #tableInfo td{
        font-family: 'Poppins', sans-serif;
        font-size: 30px;
        border: 3px solid #ccc;
        border-radius: 5px;
        padding: 10px;
      }
      #tableInfo2{
        width: 70%;
      }
      #tableInfo2 td{
        font-family: 'Poppins', sans-serif;
        font-size: 30px;
        border: 3px solid #000;
        padding: 10px;
        text-align: center;
      }
      #tableInfo2{
        margin: 30px 0px 0px 0px;
      }
      #tableInfo2 #tablehead{
        font-size: 40;
        font-weight: bold;
        background-color: #ddd;
      }
      #tableInfo2 #tdDis{
        border: none;
        background-color: #fff;
      }
      #test{
        font-family: 'Poppins', sans-serif;
        font-size: 30px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <form action="#" method="post">
      <input type="text" id="inputPain" name="input">
      <input type="submit" name="btnSub" value=" GO " id=btnSub>
    </form>


    <?php
    function isPrime($num)
    {
        for ($i = 2; $i < $num; $i++)
        {
            if ($num % $i == 0)
            {
                return false;

            }

        }
        return true;
    }
    function gcd($a,$h)
    {
        while (true)
        {
            $temp = fmod($a,$h);
            if ($temp == 0)
              return $h;
            $a = $h;
            $h = $temp;
        }
    }

//--------------------------------------------------------------------------------------------------


      if(isset($_POST["input"]))
        $input = $_POST["input"];

      echo isPrime(148)."<br>";
      while (true) {
        $p = rand(2,20);
        $q = rand(2,20);
        if(isPrime($p) && isPrime($q)) break;
      }
      //echo "$p        ,            $q<br>";

      $p=5;
      $q=6;
      $n = $p*$q;
      $z = ($p-1)*($q-1);
      $e=4;
      //echo "p = $p<br>q = $q<br>n = $n<br><br>z = $z<br>";
      while ($e < $n)//gen e
      {
        if (gcd($e, $z)==1)
            break;
        else
            $e++;
      }
      //echo "<br>e = $e<br>";

      $d=0;
      while (true)//gen d
      {
        if (fmod(($d*$e),$z) == 1 )
            break;
        else
            $d++;
      }
      //echo "<br>d = $d<br>";
      $pow = number_format(pow(30,30),0,'.','');
      $mod = fmod($pow,$n);
      //echo "pow = $pow<br>mod = $mod<br><br><br>";
    ?>
    <div id="test">
    <?php
/*
      $base = 30;
      $result = 30;
      $power = 30;
      for($i=1 ; $i<=$power ; $i++){
        echo "$base ^ $i = " . $result ."<br>";
        if($i == $power) break;
        $result *= $base;
      }
      $n=12;//,0,'.',''
      $pow = number_format(pow(30,30),0,'.','');
      $mod = fmod($pow,$n);
      echo "pow = $pow<br>mod = $mod<br><br><br>";*/
      ?>
    </div>
      <table id="tableInfo" cellspacing=10>
        <tr>
          <td><?php echo "p = $p"; ?></td>
          <td><?php echo "q = $q"; ?></td>
          <td><?php echo "n = $n"; ?></td>
          <td><?php echo "z = $z"; ?></td>
          <td><?php echo "e = $e"; ?></td>
          <td><?php echo "d = $d"; ?></td>
        </tr>
      </table>

      <center>
      <table id="tableInfo2">
        <tr id="tablehead">
          <td colspan="2">Plantext(P)</td>
          <td id="tdDis"></td>
          <td>Ciphertext(C)</td>
          <td id="tdDis"></td>
          <td colspan="2">After decryption</td>
        </tr>
        <tr>
          <td>Symbolic</td>
          <td>Numeric</td>
          <td><?php echo "P pow $e" ?></td>
          <td><?php echo "MOD $n" ?></td>
          <td><?php echo "C pow $d" ?></td>
          <td><?php echo "MOD $n" ?></td>
          <td>Symbolic</td>
        </tr>
        <?php
        if(isset($_POST["input"])){
          for ($i=0; $i < strlen($input) ; $i++) {
            echo "<tr>";
            echo "<td>";
            echo $input[$i];
            echo "</td>";
            echo "<td>";
            $numericChar = ord($input[$i])-64;
            echo $numericChar;
            echo "</td>";
            echo "<td>";
            $planTextPow_e = pow($numericChar,$e);
            echo $planTextPow_e;
            echo "</td>";
            echo "<td>";
            $cipher = fmod($planTextPow_e,$n);
            echo $cipher;
            echo "</td>";
            echo "<td>";
            $cipher_pow_d = number_format(pow($cipher,$d),0,'.','');
            echo $cipher_pow_d;
            echo "</td>";
            echo "<td>";
            $numeric_PlanText = bcmod($cipher_pow_d,$n);
            echo $numeric_PlanText;
            echo "</td>";
            echo "<td>";
            echo chr($numeric_PlanText+64);
            echo "</td>";
            echo "</tr>";
          }
        }
        ?>
      </table>
      </center>
  </body>
</html>

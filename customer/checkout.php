<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table style="transform: translateX(300px);">
<tr>
<th>Item</th>
<th>Price</th>
</tr>
<?php $totalprice=0;
$allcartid=date("Y-m-d h:i:sa")."";
 foreach ($checkoutvalues as $value) {
    $totalprice=$totalprice+$value['total_price'];?>
<tr>
    <?php 
    $currentvalue=$value["id"];
    $allcartid.=$currentvalue.".";
     ?>
    
<td><?php echo $value['name']?></td>
<td><?php echo $value['total_price']?></td>
</tr>
<?php }
?>
<input type="hidden" name="allcartid" id="allcartid" value="<?php echo $allcartid;?>">
<tr>
<th>Sub Total:   </th>
<th><?php echo "  ".$totalprice; 
?><input type="hidden" id="totalprice" value="<?php echo $totalprice;?>"></th>
</tr>

</table>
<input type="submit" name="esewa" value="esewa" onclick="post(path,params)" style="background-color: lightgreen; transform: translateX(300px);" >

    <form action="confirmorder.php" method="POST">
        <input type="hidden" name="changecartstatus" value="<?php echo $changecartstatus; ?>">
        <input type="hidden" name="confirmsql" value="<?php echo $insertintodatabase; ?>">
        <input type="submit" name="orderconfirm" value="Confirm Payment" style=" transform: translateX(300px);">
</form>
<?php
$_SESSION['totalprice']= $totalprice;
?>
<script type="text/javascript">
    var allcartid=document.getElementById("allcartid").value;
    console.log("All cart id:");
    console.log(allcartid);
    var totalprice=document.getElementById("totalprice").value;
    console.log(totalprice);
    var path="https://uat.esewa.com.np/epay/main";
    var params= {
    amt:0,
    psc: 0,
    pdc: 0,
    txAmt: 0,
    tAmt: 0,
    pid: "null",
    scd: "NP-ES-COLLEGE-TEST",
    su: "http://localhost/ecommerce/customer/sucess.php",
    fu: "http://localhost/ecommerce/customer/failure.php"
}
params["amt"]=totalprice;
params["tAmt"]=totalprice;
params["pid"]=allcartid;


function post(path, params) {
    var form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action", path);

    for(var key in params) {
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", params[key]);
        form.appendChild(hiddenField);
    }
    document.body.appendChild(form);
    form.submit();
}
</script>
</body>
</html>

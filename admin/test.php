<?php
echo ('<script type="text/javascript">
    window.onload = function() {
        alert("Payroll")
    }
</script>');

echo ('<script type="text/javascript">
    var name = prompt("Enter Name:");
    var dpt = prompt("Enter Department:");
    var rate = parseInt(prompt("Enter rate:"));
    var ot = parseInt(prompt("Enter Overtime:"));
    var bpay = parseInt(prompt("Enter Basic Pay:"));
</script>');


$name = '<script type="text/javascript">
    document.write(name);
</script>';

$dpt = '<script type="text/javascript">
    document.write(dpt);
</script>';

$rate = '<script type="text/javascript">
    document.write(rate);
</script>';

$ot = '<script type="text/javascript">
    document.write(ot);
</script>';

$bpay = '<script type="text/javascript">
    document.write(bpay);
</script>';

$grosspay = '<script type="text/javascript">
    var grosspay = (rate * ot) + bpay;
    document.write(grosspay);
</script>';

$grosspay = '<script type="text/javascript">
    var grosspay = (rate * ot) + bpay;
    document.write(grosspay);
</script>';

$sss = '<script type="text/javascript">
    var sss = bpay * .05;
    document.write(sss);
</script>';

$phealth = '<script type="text/javascript">
    var phealth = bpay * .02;
    document.write(phealth);
</script>';

$pagibig = '<script type="text/javascript">
    var pagibig = bpay * .03;
    document.write(pagibig);
</script>';

$tax = '<script type="text/javascript">
    var tax = bpay * .1;
    document.write(pagibig);
</script>';

$deductions = '<script type="text/javascript">
    var deductions = sss + phealth + pagibig + tax;
    document.write(deductions);
</script>';

$netpay = '<script type="text/javascript">
    var netpay = grosspay - deductions;
    document.write(netpay);
</script>';


echo $name . '<br/>';
echo $dpt . '<br/>';
echo 'Gross Income: ' . $grosspay . '<br/>';
echo 'Deductions: ' . '<br/>';
echo 'SSS: ' . $sss . '<br/>';
echo 'PhilHealth: ' . $phealth . '<br/>';
echo 'Pagibig: ' . $pagibig . '<br/>';
echo 'Income tax: ' . $tax . '<br/>';
echo 'Total Deductions: ' . $deductions . '<br/>';
echo 'Netpay: ' . $netpay;

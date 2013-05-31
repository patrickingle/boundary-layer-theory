<?php
/∗  

	BOUNDARY.PHP - Calculates the volume rate of suction for give boundary layer thicknesses.  
    Copyright (C) 2013  Patrick Ingle

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

∗/

define('U',  300.00);
define('V',  .000150);
define('PI',  3.14);
define('R',  .34);
define('NTOF',  12.00);
define('CONSTANT',  0.37);
define('EXPONENT',  0.2);
define('CNTOCF',  1728.0);

$length = 0.5 ∗ PI ∗ R / NTOF;
$temp = ( U ∗ $length / V );
$rey = pow ( $temp, EXPONENT );
$rey = 1 / $rey;
$sigma = CONSTANT ∗ $length ∗ $rey;
$sigma = $sigma ∗ NTOF;
echo "The Turbulent Boundary-Layer thickness is $sigma inches<br>";


if (isset($_POST['submit'])) {
	$blnew = $_POST['blnew'];
	$blnew = $blnew / NTOF;
	$sucvel = - V / $blnew;
	$critrey = U ∗ $blnew / V;
	echo "<br>The NEW Critical Reynolds Number is $critrey<br>";

	$rnf = R / 12;
	$area = 4.0 ∗ PI ∗ pow( $rnf , 2.0 );
	$cq = (-1 * $sucvel) / U;
	$q = $cq ∗ $area ∗ U;
	$q = $q ∗ CNTOCF;
	echo "<br><br>The amount of suction is $q cubic inches per second<br><br>";

}

<form method="post">
echo "<br>Enter a new boundary-layer thickness [< $signma]:  ";
<input type="text" name="newbl" value="">
<input type="submit" name="submit" value="Submit">
</form>

?>
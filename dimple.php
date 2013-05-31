<?php
/∗  

	DIMPLE.PHP:  

	Given the dimple dimensions, will calculate the number of dimples that can fit on the ball 
	plus the total instantaneous volume of all dimples.  

    DIMPLE.PHP - calculates the number of dimples that can fit on a paintball
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

define('PI',  3.14);
define('R',  0.34);

if (isset($_POST['submit'])) {
	$diam = $_POST['diam'];
	$time = $_POST['time'];
	$h = $_POST['h'];

	$nd = pow (  R,  2  );
	$surface = 4 ∗ PI ∗ $nd;
	$cd = $diam / ;
	$sd = pow ( $cd,  2 );
	$area = PI ∗ $sd;
	echo $cd . ', ' . $sd . ', ' . $surface . ', ' . $area . '<br>';
	$number = $surface / $area;
	echo “<br>The number of dimples are $number<br><br>”;
	$cube = pow (  $cd,  3  );
	$volume = 4 ∗ PI ∗ $cube / 6;
	$total = $number ∗ $volume / $time;
	echo “The TOTAL VOLUME displacement is $total cubic-inches per second.<br><br>”;
	$wetted = $area ∗ $number;
	$totwet = $surface – $wetted;
	echo "Wetted-Surface Area = $totwet square-inches.<br>";
	$sucvel = $total / $totwet;
	echo "Suction Velocity = $sucvel inches per second.<br>";
	$sucvel = $sucvel / 12;
	$sigma = .000150 / $sucvel;
	echo "The Improved – BALL boundary-layer thickness is ". ($sigma * 12) . " inches.<br>";
	$re = 300.0 ∗ $sigma /  .000150;
	echo "Reynolds Number is  $re <br>";
	$fstoms = pow ( 3.28, 2 );
	$totwet = $totwet / ( 144.0 ∗ $fstoms );  
	$dragacel =  .4 ∗ 1.21 ∗ $totwet ∗ pow (  91.44,  2 ) / ( 2 ∗  .048  );
	$xd = $h /  ( 3.28 ∗ 4.9 );
	$maxt = pow ( $xd ,  0.5 );
	$dragpos = $maxt ∗ $maxt ∗ $dragacel ;
	$xideal = $maxt ∗ 300 / 3.28;
	$maxx = $xideal – $dragpos;
	$dif = $dragpos ∗ 3.28;
	$xinfeet = $xideal ∗ 3.28;
	echo "The IDEAL maximum distance travelled is $xinfeet feet.<br>";
	echo "<br>The distance travelled for the IMPROVED-BALL is ".(maxx * 3.28)." feet.<br>";
}

echo "<br>Enter the diameter (in inches) of a single, arbitrary dimple:  ";
<input type="text" name="diam" value="">
<br>
echo "Enter the instantaneous time, t:  ";
<input type="text" name="time" value="">

echo "<br><br>Enter the height of weapon fire [in feet]:  ";
<input type="text" name="h" value="">

?>
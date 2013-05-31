<?php

/∗ 

    BALL.PHP:      

    Determines distance travelled of a paint ball by changing the Drag coefficient and comparing
    the value with the ideal case; that is, taking into account the gravity effects only.

 	BALL.PHP - determines distance travelled of a paintball
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

*/

define('PI', 3.14);
define('K', 121.01); 
define('V', 91.37);
define('FTOM',  3.28);
define('GRAVITY',  4.9);

if (isset($_POST['submit'])) {
	$h = $_POST['h'];
	$dragcof = $_POST['dragcof'];

	$xd = $h / (FTOM ∗ GRAVITY );
	$yd = 0.5;
	$time = pow($xd , $yd);
	$xideal = V ∗ $time;

	$dragacel = K ∗ $dragcof;
	$dragpos = $time ∗ $time ∗ $dragacel;
	$maxx = $xideal – $dragpos;
	$dif = $dragpos ∗ FTOM;
	$xinfeet = $xideal * FTOM;

	print(  "<br>The IDEAL maximum distance travelled is $xinfeet feet.<br>"  );
	print(  "The distance travelled for the un-improved Ball is ",($maxx * FTOM)," feet.<br>" );
	print(  "<br>This is a difference of $dif feet.<br><br>");

}

?>

<form method="post">
	Enter the height of the weapon fire (in feet): 
	<input type="text" name="h"><br>
	Enter the Drag Coefficient:
	<input type="text" name="dragcof"><br>
	<input type="submit" name="submit" value="Calculate">
</form>
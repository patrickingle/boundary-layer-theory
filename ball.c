/∗ 

    BALL.C:      

    Determines distance travelled of a paint ball by changing the Drag coefficient and comparing
    the value with the ideal case; that is, taking into account the gravity effects only.

 	BALL.C - determines distance travelled of a paintball
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

#include <stdio.h>
#include <float.h>
#include <math.h>

#define  PI  3.14
#define  K  121.01
#define  V  91.37
#define  FTOM  3.28
#define  GRAVITY  4.9

double pow (double x, double y);

main ( )
{
	float dragacel, dragpos, maxx, xideal, dif, xinfeet;
	float dragccof, h;
	double time, xd, yd;

	printf(  “Enter the height of the weapon fire (in feet):  “  );
	scanf(  “%f”, &h );
	xd = h / (FTOM ∗ GRAVITY );
	yd = 0.5;
	time = pow( xd , yd );
	xideal = V ∗ time;
	print f (  “Enter the Drag Coefficient:  “  );
	scan f (  “%f”,  &dragcof );
	dragacel = K ∗ dragcof;
	dragpos = time ∗ time ∗ dragacel;
	maxx = xideal – dragpos;
	dif = dragpos ∗ FTOM;
	xinfeet = xideal * FTOM;

	printf(  “\nThe IDEAL maximum distance travelled is %f feet.\n:, xinfeet  );
	printf(  “The distance travelled for the un-improved Ball is %f feet.\n”, maxx * FTOM );
	printf(  “\n  This is a difference of %f feet.\n\n”, dif  );
}

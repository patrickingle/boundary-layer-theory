/∗  

	DIMPLE.C:  

	Given the dimple dimensions, will calculate the number of dimples that can fit on the ball 
	plus the total instantaneous volume of all dimples.  

    DIMPLE.C - calculates the number of dimples that can fit on a paintball
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

#include <stdio.h>
#include <float.h>
#include <math.h>

#define  PI  3.14
#define  R  0.34

double pow (double x, double y);

main ( )
{
int number;
float diam, surface, area, volume, total, time, wetted, totwet;
float sucvel, sigma, re;
float dragacel, dragpos, xideal, maxx, dif, xinfeet, h, maxt;
double nd, cube, cd, sd, xd, fstoms;
printf (  “\nEnter the diameter (in inches) of a single, arbitrary dimple:  “  );
scanf (  “%f ”,  &diam  );
printf (  “Enter the instantaneous time, t:  “  );
scanf (  “% f “,  &time  );
nd = pow (  R,  2  );
surface = 4 ∗ PI ∗ nd;
cd = diam / ;
sd = pow ( cd,  2 );
area = PI ∗ sd;
printf (  “%f   %f  %f  %f \n”, cd, sd, surface, area );
number = surface / area;
printf (  “\ nThe number of dimples are %d. \n\n”, number  );
cube = pow (  cd,  3  );
volume = 4 ∗ PI ∗ cube / 6;
total = number ∗ volume / time;
printf (  “The TOTAL VOLUME displacement is %f cubic-inches per second. \n\n”, total  );
wetted = area ∗ number;
totwet = surface – wetted;
printf (  “Wetted-Surface Area = %f square-inches. \n”, totwet  );
sucvel = total / totwet;
printf (  “Suction Velocity = %f inches per second. \n”, sucvel  );
sucvel = sucvel / 12;
sigma = .000150 / sucvel;
printf (  “The Improved – BALL boundary-layer thickness is %f inches. \n”, sigma ∗ 12);
re = 300.0 ∗ sigma /  .000150;
printf (  “Reynolds Number is  %f. \n”,  re  );
fstoms = pow ( 3.28, 2 );
totwet = totwet / ( 144.0 ∗ fstoms );  
dragacel =  .4 ∗ 1.21 ∗ totwet ∗ pow (  91.44,  2 ) / ( 2 ∗  .048  );
printf (  “\n\nEnter the height of weapon fire [in feet]:  ”  );
scanf (  “%f “,   &h  );
xd = h /  ( 3.28 ∗ 4.9 );
maxt = pow ( xd ,  0.5 );
dragpos = maxt ∗ maxt ∗ dragacel ;
xideal = maxt ∗ 300 / 3.28;
maxx = xideal – dragpos;
dif = dragpos ∗ 3.28;
xinfeet = xideal ∗ 3.28;
printf ( “\nThe IDEAL maximum distance travelled is %f feet. \n”, xinfeet  );
printf (  “\nThe distance travelled for the IMPROVED-BALL is %f feet.\n”, maxx * 3.28  );

}
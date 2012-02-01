<?php session_start('test'); ?>
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
	"http://www.w3.org/ter/xhtml11/DTD/xhtml11.dtd">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<title>
			<?php include 'forumname.php'; ?>
		</title>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<?php include 'header.php'; ?>
			</div>
			<div class="menu">
				<?php include 'menu.php';?>
			</div>
			<div class="slidemenu">
				<?php include 'slidemenu.php';?>
			</div>
			<div class="center">
				<div class="register">
				<form action="insert.php" method="post">
				<table border="0px">
					
					<tr>
					<td> Username</td>
					<td> <input type="text" name="username" /> </td>
					</tr>
					
					<tr>
					<td> First name</td>
					<td> <input type="text" name="firstname" /> </td>
					</tr>
					
					<tr>
					<td> Last name</td>
					<td> <input type="text" name="lastname" /> </td>
					</tr>
					
					<tr>
					<td> Email </td>
					<td> <input type="text" name="email" /> </td>
					</tr>
					
					<tr>
					<td> Repeat Email </td>
					<td> <input type="text" name="repeatemail" /> </td>
					</tr>
					
					<tr>
					<td> Date of Birth</td>
					<td> 	
					<select name="day" method="post">
  							<option>01</option>
  							<option>02</option>
  							<option>03</option>
  							<option>04</option>
  							<option>05</option>
  							<option>06</option>
  							<option>07</option>
  							<option>08</option>
  							<option>09</option>
  							<option>10</option>
  							<option>11</option>
  							<option>12</option>
  							<option>13</option>
  							<option>14</option>
  							<option>15</option>
  							<option>16</option>
  							<option>17</option>
  							<option>18</option>
  							<option>19</option>
  							<option>20</option>
  							<option>21</option>
  							<option>22</option>
  							<option>23</option>
  							<option>24</option>
  							<option>25</option>
  							<option>26</option>
  							<option>27</option>
  							<option>28</option>
  							<option>29</option>
  							<option>30</option>
  							<option>31</option>
						</select>
						 
						<select name="month" method="post">
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select>
						
						
						<select name="year" method="post">
							<option>1901</option>
							<option>1902</option>
							<option>1903</option>
							<option>1904</option>
							<option>1905</option>
							<option>1906</option>
							<option>1907</option>
							<option>1908</option>
							<option>1909</option>
							<option>1910</option>
							<option>1911</option>
							<option>1912</option>
							<option>1913</option>
							<option>1914</option>
							<option>1915</option>
							<option>1916</option>
							<option>1917</option>
							<option>1918</option>
							<option>1919</option>
							<option>1920</option>
							<option>1921</option>
							<option>1922</option>
							<option>1923</option>
							<option>1924</option>
							<option>1925</option>
							<option>1926</option>
							<option>1927</option>
							<option>1928</option>
							<option>1929</option>
							<option>1930</option>
							<option>1931</option>
							<option>1932</option>
							<option>1933</option>
							<option>1934</option>
							<option>1935</option>
							<option>1936</option>
							<option>1937</option>
							<option>1938</option>
							<option>1939</option>
							<option>1940</option>
							<option>1941</option>
							<option>1942</option>
							<option>1943</option>
							<option>1944</option>
							<option>1945</option>
							<option>1946</option>
							<option>1947</option>
							<option>1948</option>
							<option>1949</option>
							<option>1950</option>
							<option>1951</option>
							<option>1952</option>
							<option>1953</option>
							<option>1954</option>
							<option>1955</option>
							<option>1956</option>
							<option>1957</option>
							<option>1958</option>
							<option>1959</option>
							<option>1960</option>
							<option>1961</option>
							<option>1962</option>
							<option>1963</option>
							<option>1964</option>
							<option>1965</option>
							<option>1966</option>
							<option>1967</option>
							<option>1968</option>
							<option>1969</option>
							<option>1970</option>
							<option>1971</option>
							<option>1972</option>
							<option>1973</option>
							<option>1974</option>
							<option>1975</option>
							<option>1976</option>
							<option>1977</option>
							<option>1978</option>
							<option>1979</option>
							<option>1980</option>
							<option>1981</option>
							<option>1982</option>
							<option>1983</option>
							<option>1984</option>
							<option>1985</option>
							<option>1986</option>
							<option>1987</option>
							<option>1988</option>
							<option>1989</option>
							<option>1990</option>
							<option>1991</option>
							<option>1992</option>
							<option>1993</option>
							<option>1994</option>
							<option>1995</option>
							<option>1996</option>
							<option>1997</option>
							<option>1998</option>
							<option>1999</option>
							<option>2000</option>
							<option>2001</option>
							<option>2002</option>
							<option>2003</option>
							<option>2004</option>
							<option>2005</option>
							<option>2006</option>
							<option>2007</option>
							<option>2008</option>
							<option>2009</option>
							<option>2010</option>
							<option>2011</option>
							<option>2012</option>
						</select>
						
						</td>
					</tr>
					
					<tr>
					<td> Sex</td>
					<td> <select name="sex" method="post">
							<option>Male</option>
							<option>Female</option>
							<option>Yes Please</option>
						</select> </td>
					</tr>
					
					
					<tr>
					<td> About me</td>
					<td> <input type="text" size="30" maxlength="3000" name="overjouw" style="height:100px;"/> </td>
					</tr>
					
					<tr>
					<td> Favo Browser </td>
					<td> <input type="text" name="browser"/> </td>
					</tr>
				
					</table>
					
						<input type="submit" name="submit" />
		
					</form>
				</div>
			</div>
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?>
			</div>
		</div>
	</body>
</html>
<?php session_start('test');
/*
Deze file genereert het draadje. Dit wordt gedaan door een while statment die net zo lang uitgevoerd wordt 
totdat alle posts in een draadje ge-genereerd zijn. 
Tevens zit hier de javascipt in voor de like button. Op het moment dat er op de like button wordt gedrukt wordt 
de file like.php geactiveerd. Hierin wordt de like daadwerkelijk in de database gezet. 
*/
?>
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
	"http://www.w3.org/ter/xhtml11/DTD/xhtml11.dtd">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		
		<script type="text/javascript">
				function likef(int, ale)
				{
					if (ale < 1)
					{
						alert("You like this post!");
					}
					else
					{
						alert("You have already liked this!");
						return;
					}
				
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("like"+int).innerHTML="You like this post.";
						document.getElementById("ale"+int).name="9001";
					//document.getElementById("likeshizle").innerHTML=xmlhttp.responseText;
					}
				  }
				xmlhttp.open("GET","like.php?q="+int,true);
				
				xmlhttp.send(null);
				}
			</script>
		
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
				<?php include 'menu.php'; ?>
			</div>
			<div class="slidemenu">
				<?php include 'slidemenu.php'; ?>
			</div>
			<div class="center">
				<?php 
					include 'dblogin.php';
					
					$getPostID = -1;
					$getCat = -1;
					
					if (array_key_exists('topicid',$_GET))
						$getPostID = mysql_real_escape_string($_GET['topicid']);
					else
						echo "Incorrect post id specified.<br />";
						
					if (array_key_exists('cat',$_GET))
						$getCat = mysql_real_escape_string($_GET['cat']);
					else
						echo "Incorrect category specified.<br />";
					
					if ($getPostID >= 0 && $getCat >= 0)
					{
						$result = mysql_query("SELECT * FROM topics WHERE approved = '1' and post_id = '$getPostID' ORDER BY starttime ASC") or die(mysql_error());  
						
						while($row = mysql_fetch_array($result))
						{
							$postUser = $row['user_id'];
							$name = mysql_query("SELECT username FROM users WHERE id = '$postUser'") or die(mysql_error());
							$name = mysql_fetch_array($name);
							echo "<div class='post'>";
							echo "Title: ".$row['posttitle'];
							echo "<br />Username: <a href='personal.php?id=".$row['user_id']."'>".$name['username']."</a>";
							//echo "<br />PostID: ".$row['post_id'];
							echo "<br />Time: ".$row['starttime'];
							$q = $row['id'];
							$likes = mysql_query("SELECT user_id FROM `like` WHERE id = '$q'") or die(mysql_error());
							$likes = mysql_num_rows($likes);
							
							if (array_key_exists('userID',$_SESSION))
							{
								$use = mysql_real_escape_string($_SESSION['userID']);
								$ale = mysql_query("SELECT * FROM `like` WHERE user_id = '$use' AND id = '$q'") or die(mysql_error());
								$ale = mysql_num_rows($ale);
							}
							if (array_key_exists('admin',$_SESSION))
							{
								echo "<div class=button>
									  <form action='maketopic.php?id=".$getPostID."&topic=f&cat=".$getCat."' method='POST'>
									  <input type='submit' value='reply'/>
									  </form>
									  </div>";
								echo "<form>
									<input type ='button' id='ale".$q."' name='".$ale."' value='Like' onclick='likef($q, this.name )' />
									</form>
									<div id='like".$q."'> This post has been liked ".$likes." times.</div>";
							}
							echo "<br /><hr />".$row['postcontent'];
							echo "</div>";
						}
					}
					else
					{
						echo "Error finding topic.";
					}
					mysql_close($dbhandle);
				?>
			</div>	
			<div class="footer">
				&#169; 2012 <?php include 'forumname.php'; ?> 
			</div>
		</div>
	</body>
</html>
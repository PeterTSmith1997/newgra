<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
      <script>

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



        ga('create', 'UA-55673568-5', 'auto');

        ga('send', 'pageview');



    </script>

    
    <meta name = "viewport" content="width=device-width, maximum-scale=1.0"/>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php
include '../includes/navBar.php';
?>
	<main>

		<h1>Blog</h1>
		<hr />

		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
				while($row = $stmt->fetch()){
					
					echo '<div>';
						echo '<h2><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h2>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</main>
    <?php

include '../../includes/footer.php';

echo poweredBy("https://www.petersweb.me.uk/invoicing/link.php?id=3");

?>

</body>
</html>
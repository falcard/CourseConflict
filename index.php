<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>McMurry Course Conflict Tester</title>
<meta name="description" content="Homepage of J. Logan Gage.">
<link href="../main.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
  <div id="heading"><img src="../images/header.jpg" width="700" height="125" alt=""/></div>
  <div id="nav">
    <ul>
      <li><a href="http://www.falcard.com" title="Falcard Homepage" target="_self">Home</a></li>
      <li><a href="#">Demos</a>
        <ul>
          <li><a href="CourseConflict/index.php">McMurry Course Conflict</a></li>
          <li><a href="#">Graphical PI</a></li>
          <li><a href="#">TBA</a></li>
        </ul>
      </li>
      <li><a href="about-us.html" title="Falcard about us page" target="_self">About</a></li>
      <li><a href="contact-us.html" title="Falcard contact us page" target="_self">Contact</a></li>
    </ul>
  </div>
  <div id="text">
  
        <h1>Course Conflict Selector</h1>
	<hr/>
        
        <form action="index.php" method="post">

        <label>Please select department:</label>
        <select id="slctDept" name="department"></select>
        <br/>
        <br/>

        <label>Please select class:</label>
        <select id="slctCourse" name="course"></select>
        <br/>
        <br/>

        <script src="scripts/jquery-1.11.3.min.js"></script>
        <script src="scripts/script.js"></script>

        <br/>
        <input name="submit" type="submit" value="Submit" />

        <h2>Results:</h2>

        <?php
        if (isset($_POST['submit'])){
            include 'parse.php';
        }
        ?>
        </form>


  </div>
  <div id="image"><img src="../images/mcm-logo.jpg" width="230" height="153" alt="McMurry Warhawk logo - red"/></div>
  <div id="footer">
  	<div id="inside_footer">
    	<a href="http://www.facebook.com"><img src="../images/Facebook_button.png" width="51" height="51" alt=""/></a>
    	<a href="http://www.twitter.com/"><img src="../images/Twitter_button.png" width="51" height="51" alt=""/></a>
    	<a href="http://www.instagram.com/"><img src="../images/Instagram_button.png" width="51" height="51" alt=""/></a>
    	<a href="https://www.linkedin.com/in/logangage03/"><img src="../images/LinkedIn_button.png" width="51" height="51" alt=""/></a>
    </div>
  	<p><img src="../images/myicon.png" width="156" height="149" alt=""/></p>
    <p>Copyright 2015&copy; - Site designed by <a href="mailto:logan@falcard.com">J. Logan Gage</a> - <a href="http://www.falcard.com" title="Falcard Homepage" target="_self">Home</a></p>
                         <div style="text-align: center; float: right; width: 33%; text-align: right; margin-right: 20px;"></div>

  </div>
</div>
</body>
</html>

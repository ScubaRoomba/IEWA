<?php

$title = $price = $paragraph_text = $card_name = $card_img = "";
$target_dir = "images/";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$title = htmlentities($_POST['title']);
	$price = htmlentities($_POST['price']);
	$paragraph_text = htmlentities($_POST['paragraph_text']);
	$card_name = urlencode($title) . ".html";
	$card_img = $target_dir . $_FILES['card_img']['name'];

//file checking
	$failed = 0;
	if (stripos($card_img, '.php') !== false) {
		$failed += 1;
		$msg = '<h2 class=\"display-6\">The uploading of PHP files is prohibited.</h2><br>';
	} else {
		if (move_uploaded_file($_FILES['card_img']['tmp_name'], $card_img)){
			$card_contents = "<div class=\"col-lg-3 col-md-6 mb-4\"><div class=\"card h-100\"><img class=\"card-img-top\" src=\"$card_img\" alt=\"\" width=\"300\" height=\"168.75\" ><div class=\"card-body\"><h4 class=\"card-title\">$title</h4><h5 class=\"card-price\">\$$price</h5><p class=\"card-text\">$paragraph_text</p></div></div></div>";
			file_put_contents("uploads/" . $card_name, $card_contents);
			$msg = '<h2 class=\"display-6\">Your card was successfully uploaded!</h2><br>';
		} else {
			$msg = '<h2 class=\"display-6\">An unexpected error has occured.</h2><br>';
		}
	echo '<div class="container"><header class="jumbotron my-4">',$msg,'</header><div class="row text-center"></div></div>';
	}
} else {

?>
<br><br><br><br>
  <!-- Page Content -->
  <div class="container">
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h2 class="display-4">So you wish to join the ranks of our elite Meme Archaeologists? Begin by uploading your first meme!</h2>
    </header>
    <!-- Page Features -->
    <div class="row text-center">
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="images/500x325.png" alt="" width="300" height="168.75">
    <!-- Image upload -->
          <form action="?page=upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="card_img"/>
    <!-- Card Data Upload -->
          <div class="card-body">
            <h4 class="card-title"><input type="text" name="title" size="13" maxlength="20" onfocus="this.value=''" value="Card Title"></h4>
            <h5 class="card-title">$<input type="number" id="price" name="price" min="0.00" max="99.99" step="0.01" style="width: 4em;" onfocus="this.value=''" value="12.34"></h5>
            <p class="card-text"><textarea id="paragraph_text" name="paragraph_text" cols="20" rows="3" maxlength="130" onfocus="this.value=''">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</textarea></p>
          </div>
          <input type="submit" name="submit" value="Submit" />
          </form>
        </div>
      </div>

    <!-- Demo Card -->
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="images/500x325.png" alt="" width="300" height="168.75">
          <div class="card-body">
            <h4 class="card-title">Card Title</h4>
            <h5 class="card-title">$12.34</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
          </div>
        </div>
      </div>
    </div>

<?php
}
?>

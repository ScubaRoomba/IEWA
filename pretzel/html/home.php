<br><br></br></br>
  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4 bg-transparent">
    <h1 class="display-3">Welcome to the Meme Archives!</h1>
    <p class="lead">The Meme Archives is the home of the worlds most prominent, relevant, and historically significant memes. Whether you intend to claim ownership, or learn some history, the Meme Archives have a place for you. </p>
    </header>
    <!-- Page Features -->
    <div class="row text-center">

<?php 
// this includes the meme cards onto the home page
$cards = glob('uploads/*.html');
foreach($cards as $card) {
	$card = fopen($card, "r");
	echo fgets($card);
	fclose($card);

}
?>

    </div>

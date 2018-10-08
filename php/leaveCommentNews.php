<?php 
if(isset($_SESSION['id'])){
echo"<div id=\"leave-comment\" class=\"clearfix leave-comment\">
	<h3 class=\"title\"><span class=\"title-icon ti-comment-alt\"></span>Laisser un commentaire</h3>
	<div id=\"respond\">
		<form action=\"./php/addCommentNews.php\" method=\"post\" id=\"commentform\" class=\"commentform\">
			<input id=\"auteur\" class=\"name\" name=\"auteur\" type=\"hidden\" value=\"".$_SESSION['id']."\" required>
			<input id=\"idNew\" class=\"name\" name=\"idNew\" type=\"hidden\" value=\"".$_GET['idNew']."\" required>
			<!-- <input id=\"email\" class=\"email\" name=\"email\" type=\"email\" placeholder=\"Email*\" value=\"\" required>
			<input id=\"url\" class=\"url\" name=\"email\" type=\"email\" placeholder=\"Url*\" value=\"\" required> -->
			<textarea id=\"contenu\" class=\"comment\" name=\"contenu\" placeholder=\"Commentaire\" rows=\"4\" required></textarea>
			<button name=\"submit\" class=\"submit-btn\" type=\"submit\" id=\"submit\"><span class=\"ti-shift-right\"></span>Envoyer</button>
		</form><!-- /#commentform -->
	</div><!-- /#respond -->
</div><!-- /#leave-comment -->";
}
else {
	echo "Vous devez être connecté pour laisser un commentaire.";
}
?>
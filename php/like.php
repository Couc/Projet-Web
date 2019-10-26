<?php
include('_A8s2f9g714ef.php');
mysql_query("SET NAMES UTF8");

if ($_GET['type'] == "like") {
	$login = isset($_GET['login']) ? mysql_real_escape_string($_GET['login']) : null;
	$id_at = isset($_GET['id_art']) ? mysql_real_escape_string($_GET['id_art']) : null;
	if ($login === null || $id_art = null) {
		echo "bad request";
	}

	$query_dejalike = mysql_query("SELECT * FROM ARTICLE_FAV WHERE login = '" . $login . "' and id_art = " . $id_art . ";");
	$query_dejadislike1 = mysql_query("SELECT * FROM ARTICLE_DISLIKE WHERE login = '" . $login . "' and id_art = " . $id_art . ";");

	if (mysql_num_rows($query_dejalike) == 0) {

		if (mysql_num_rows($query_dejadislike1) != 0) {

			echo "dejadislike1";
			mysql_query(" UPDATE ARTICLE SET nb_like = nb_like + 2 WHERE id_art = " . $id_art . ";");
			mysql_query("INSERT INTO ARTICLE_FAV(login,id_art) VALUES('" . $login . "'," . $id_art . ");");
			$query = mysql_query("SELECT * FROM ARTICLE_DISLIKE where login = '" . $login . "';");

			if (mysql_num_rows($query) != 0) {
				mysql_query("DELETE FROM ARTICLE_DISLIKE WHERE login = '" . $login . "' and id_art = '" . $id_art . "' ;");
			}
		} else {
			mysql_query(" UPDATE ARTICLE SET nb_like = nb_like + 1 WHERE id_art = " . $id_art . ";");
			mysql_query("INSERT INTO ARTICLE_FAV(login,id_art) VALUES('" . $login . "'," . $id_art . ");");
			$query = mysql_query("SELECT * FROM ARTICLE_DISLIKE where login = '" . $login . "';");

			if (mysql_num_rows($query) != 0) {
				mysql_query("DELETE FROM ARTICLE_DISLIKE WHERE login = '" . $login . "' and id_art = '" . $id_art . "' ;");
			}
		}
	} else {
		mysql_query(" UPDATE ARTICLE SET nb_like = nb_like - 1 WHERE id_art = " . $id_art . ";");
		mysql_query("DELETE FROM ARTICLE_FAV WHERE login = '" . $login . "' and id_art = '" . $id_art . "' ;");
		echo "dejalike";
	}
} else if ($_GET['type'] == "dislike") {
	$query_dejadislike = mysql_query("SELECT * FROM ARTICLE_DISLIKE WHERE login = '" . $login . "' and id_art = " . $id_art . ";");
	$query_dejalike1 = mysql_query("SELECT * FROM ARTICLE_FAV WHERE login = '" . $login . "' and id_art = " . $id_art . ";");

	if (mysql_num_rows($query_dejadislike) == 0) {
		if (mysql_num_rows($query_dejalike1) != 0) {
			echo "dejalike1";
			mysql_query("UPDATE ARTICLE SET nb_like = nb_like - 2 WHERE id_art = " . $id_art . ";");
			mysql_query("INSERT INTO ARTICLE_DISLIKE(login,id_art) VALUES('" . $login . "'," . $id_art . ");");
			$query = mysql_query("SELECT * FROM ARTICLE_FAV where login = '" . $login . "';");

			if (mysql_num_rows($query) != 0) {
				mysql_query("DELETE FROM ARTICLE_FAV WHERE login = '" . $login . "' and id_art = '" . $id_art . "' ;");
			}
		} else {
			mysql_query("UPDATE ARTICLE SET nb_like = nb_like - 1 WHERE id_art = " . $id_art . ";");
			mysql_query("INSERT INTO ARTICLE_DISLIKE(login,id_art) VALUES('" . $login . "'," . $id_art . ");");
			$query = mysql_query("SELECT * FROM ARTICLE_FAV where login = '" . $login . "';");

			if (mysql_num_rows($query) != 0) {
				mysql_query("DELETE FROM ARTICLE_FAV WHERE login = '" . $login . "' and id_art = '" . $id_art . "' ;");
			}
		}
	} else {
		mysql_query(" UPDATE ARTICLE SET nb_like = nb_like + 1 WHERE id_art = " . $id_art . ";");
		mysql_query("DELETE FROM ARTICLE_DISLIKE WHERE login = '" . $login . "' and id_art = '" . $id_art . "' ;");
		echo "dejadislike";
	}
}

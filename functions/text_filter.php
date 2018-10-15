<?php
	// remove multiple whitespaces to single whitespaces 
	function removeSpaces($text) {
		$text = trim($text);
		$text = preg_replace("/(\r?\n)+/", "\n", $text);
		$text = preg_replace("/(\n?[ ])+/", " ", $text);
		return $text;
	}

	// secure text from sql injections and replace whitespaces to <br>
	function secureText($conn,$text) {
		$text = strip_tags($text);
		$text = mysqli_real_escape_string($conn, $text);
		return $text;
	}

	// replace all text URLs to links "<a href='URL' target='_blank'>URL</a>"
	function replaceURLToLink($text) {
		$text = nl2br($row['text']);
		if(preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $text, $match)) {
			foreach ($match[0] as $url) {
				$text = str_replace($url, "<a href='" . $url . "' target='_blank'>". $url . "</a>", $text);
			}
		}
		return $text;
	}

	// return wheather $text is empty or not
	function isEmptyText($text) {
		return (preg_replace("/(\r)+(\n)+/", "", $text)=="");
	}
?>
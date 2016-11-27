<?php

function madcapua_breadcrumb($breadcrumb) {
   if (!empty($breadcrumb)) {
     return '<div class="breadcrumb">'. implode(' :: ', $breadcrumb) .'</div>';
   }
}

function switch_language() {
		global $language;
		switch($language->language) {
				case 'ru' :
						$output = '<div class="left"><div id="lang"><a href="/">eng</a><a href="/ru" class="active">rus</a></div></div>';
						break;
				case 'en' :
				default :
						$output = '<div class="left"><div id="lang"><a href="/" class="active">eng</a><a href="/ru">rus</a></div></div>';
				  break;
		}
		return $output;
}
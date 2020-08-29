<?php

/*
    Plugin Name: Own HTML widget
    Plugin URI: https://github.com/awaluk/q2a-own-html-widget
    Plugin Description: Allows creating widgets with custom text
    Plugin Version: 1.0.0
    Plugin Date: 2020-08-29
    Plugin Author: Arkadiusz Waluk
    Plugin Author URI: https://waluk.pl
    Plugin License: MIT
    Plugin Minimum Question2Answer Version: 1.7
    Plugin Minimum PHP Version: 7.0
    Plugin Update Check URI: https://raw.githubusercontent.com/awaluk/q2a-own-html-widget/master/metadata.json
*/

if (!defined('QA_VERSION')) {
    header('Location: ../../');
    exit();
}

require_once 'src/own-html-widget-base.php';
qa_register_plugin_module('widget', 'src/own-html-widget-1.php', 'own_html_widget_1', 'Own HTML 1');
qa_register_plugin_module('widget', 'src/own-html-widget-2.php', 'own_html_widget_2', 'Own HTML 2');
qa_register_plugin_module('widget', 'src/own-html-widget-3.php', 'own_html_widget_3', 'Own HTML 3');

qa_register_plugin_phrases('lang/*.php', 'own_html');

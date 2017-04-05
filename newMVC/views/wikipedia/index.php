<?php
function normalize($url)
{
        $page = @file_get_contents($url);
        if (!$page) return null;
        $matches = array();
        if (preg_match('/<h1>(.*?)<\/h1>/', $page, $matches)) {
            return $matches[1];
        }
        return null;
}


$d=normalize("https://en.wikipedia.org/wiki/Barcelona");


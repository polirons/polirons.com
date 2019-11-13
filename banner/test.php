<?php

function properText($text){
    $text = mb_convert_encoding($text, "HTML-ENTITIES", "UTF-8");
    $text = preg_replace('~^(&([a-zA-Z0-9]);)~',htmlentities('${1}'),$text);
    return($text); 
}

$persons = [
    'maydemirx' => [
        'Mehmet AYDEMİR',
        'Kurucu Ortak / Founder',
        '+90850 303 7576',
        '+90552 279 7576',
        'www.polirons.com'
    ],
    'ozgur.keles' => [
        'Özgür KELEŞ',
        'Kurucu Ortak / Founder',
        '+90850 303 7576',
        '+90552 278 7576',
        'www.polirons.com'
    ],
    'safa.sezgin' => [
        'Safa SEZGİN',
        'Kurucu Ortak / Founder',
        '+90850 303 7576',
        '+90552 277 7576',
        'www.polirons.com'
    ],
    'mehmet.acan' => [
        'Mehmet Açan',
        'Elektrik-Elektronik Mühdenisi/ Electrical & Electronic Engineer',
        '+90850 303 7576',
        'www.polirons.com'
    ]
];

// 100*30'luk bir resim oluşturalım
$im = imagecreate(500, 250);

// Beyaz artalan üstüne mavi metin
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 0);
$font = './Bellefair-Regular.ttf';
//$grey = imagecolorallocate($im, 128, 128, 128);

// Dizgeyi resmin sol üst tarafına yazalım
if (isset($_GET['name']) && isset($persons[$_GET['name']])) {
    $startY = 15;
    foreach ($persons[$_GET['name']] as $value) {

        /**
         * 
         * array imagettftext ( resource $image 
         * , float $size 
         * , float $angle 
         * , int $x 
         * , int $y 
         * , int $color 
         * , string $fontfile 
         * , string $text )
         * 
         */

        imagettftext($im, 13, 0, 5, $startY, $textcolor, $font, $value);


       // imagestring($im, 5, 5, $startY, properText($value), $textcolor);
        $startY += 17;
    }
}

$pngFile = imagecreatefrompng('WebBanner.png');

if ($pngFile == FALSE) {
    die('could not read png file');
}

list($width, $height, $type, $attr) = getimagesize("WebBanner.png");

/**
 * bool imagecopy ( 
 * resource $hedef 
 * , resource $kaynak 
 * , int $hdf_x 
 * , int $hdf_y 
 * , int $kyn_x 
 * , int $kyn_y 
 * , int $kyn_gnş 
 * , int $kyn_yks )
 * 
 */

if (imagecopy($im, $pngFile, 0, $startY, 0, 0, $width, $height) == FALSE) {
    die(var_dump(error_get_last()));
}

// Resmi çıktılayalım
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);

?>

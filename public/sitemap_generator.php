<?php
// Incluir los archivos necesarios y configurar la sesión si es necesario

// Cargar el inicializador de la aplicación
require_once __DIR__ . '/../includes/app.php';
// Generar el contenido del sitemap
$xml = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Agregar las URLs de las páginas en español al sitemap
$xml .= '
    <url>
        <loc>https://true-sec.com/</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://true-sec.com/nosotros</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://true-sec.com/servicios</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://true-sec.com/contacto</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>';

// Agregar las URLs de las páginas en inglés al sitemap
$xml .= '
    <url>
        <loc>https://true-sec.com/en</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://true-sec.com/about_us</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://true-sec.com/services</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://true-sec.com/contact</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>';

$xml .= '
</urlset>';

// Guardar el contenido en un archivo sitemap.xml
file_put_contents(__DIR__ . '/../public/sitemap.xml', $xml);
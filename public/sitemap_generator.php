<?php
// Incluir los archivos necesarios y configurar la sesión si es necesario

// Cargar el inicializador de la aplicación
require_once __DIR__ . '/../includes/app.php';

// Importar las clases necesarias
use Model\Project;

// Obtener los proyectos desde la base de datos
$projects = Project::all();

// Generar el contenido del sitemap
$xml = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Agregar las URLs de las páginas en español al sitemap
$xml .= '
    <url>
        <loc>https://rslcr.com/</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://rslcr.com/nosotros</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://rslcr.com/servicios</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://rslcr.com/proyectos</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://rslcr.com/contacto</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>';

// Agregar las URLs de las páginas en inglés al sitemap
$xml .= '
    <url>
        <loc>https://rslcr.com/en</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://rslcr.com/us</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://rslcr.com/services</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://rslcr.com/projects</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://rslcr.com/contact</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>';

// Agregar las URLs de los proyectos en español al sitemap
foreach ($projects as $project) {
    $xml .= '
    <url>
        <loc>https://rslcr.com/proyecto?id=' . $project->id . '</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>';
}

// Agregar las URLs de los proyectos en inglés al sitemap
foreach ($projects as $project) {
    $xml .= '
    <url>
        <loc>https://rslcr.com/project?id=' . $project->id . '</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>';
}

$xml .= '
</urlset>';

// Guardar el contenido en un archivo sitemap.xml
file_put_contents(__DIR__ . '/../public/sitemap.xml', $xml);
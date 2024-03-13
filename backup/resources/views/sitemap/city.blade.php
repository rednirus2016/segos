<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
            <loc>https://www.pharmapcdbazaar.com/</loc>
             <lastmod>{{ date('Y-m-d\Th:i:s'.'+00:00') }}</lastmod>
            <priority>1.00</priority>
        </url>
   
    @foreach ($city as $city)
        <url>
            <loc>{{ url($city->slug) }}</loc>
             <lastmod>{{ date('Y-m-d\Th:i:s'.'+00:00') }}</lastmod>
            <priority>0.9</priority>
        </url>
    @endforeach
  
  
</urlset>
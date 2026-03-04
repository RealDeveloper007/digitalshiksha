<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <?php foreach($exams as $url) { ?>
    <url>
        <loc><?= base_url('mock-test-details').'/'.$url->slug ?></loc>
        <lastmod>2023-05-07T14:33:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
     <url>
        <loc><?= base_url('mock-test-details').'/instructions/'.$url->slug ?></loc>
        <lastmod>2023-05-07T14:33:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
     <url>
        <loc><?= base_url('mock-test-details').'/start-exam/'.$url->slug ?></loc>
        <lastmod>2023-05-07T14:33:17+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <?php } ?>

</urlset>
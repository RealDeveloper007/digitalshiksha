<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <?php foreach($blogs as $url) { ?>
    <url>
        <loc><?= base_url('digital-shiksha-search-engine').'/'.$url->slug ?></loc>
        <lastmod><?=  date("Y-m-d\TH:i:s",strtotime($url->blog_post_date)) ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <?php } ?>

</urlset>
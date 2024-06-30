<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Digital Shiksha Darpan is a comprehensive platform that offers information, resources, and tools to students and teachers to enhance the learning experience.">
  <meta name="keywords" content="Digital Shiksha, digital shiksha in hindi, Digital education, Online learning, E-learning, Digital literacy
, Technology in education, Skill development, Digital empowerment, Digital classroom, Online education, mock test, mock test for 10th, mock test for 12th, sample paper for 10th, sample paper for 12th">
  <!--<meta name="author" content="Real Developer">-->
  <title><?= ($brand_name) ? $brand_name . ' - ' . $brand_tagline : 'digitalshiksha' ?></title>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('favicon.png') ?>">
  <link href="<?php echo base_url('assets/css/head.css') ?>" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
  <!--Header-->
  <?= $header; ?>
  <!--Page Specific Header-->
  <?php if (isset($extra_head)) echo $extra_head; ?>
  <script data-ad-client="ca-pub-3426334331005155" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

  <meta name="google-site-verification" content="o_w16jeHha8RsVfokM0D0A_j1q3UBEJIVUTp1W7boHA" />
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-X2GLTXP9SP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X2GLTXP9SP');
</script>
   
   <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "item": {
            "@id": "https://digitalshikshadarpan.com",
            "name": "Home"
            }
        },
        {
            "@type": "ListItem",
            "position": 2,
            "item": {
            "@id": "https://digitalshikshadarpan.com/about-us",
            "name": "About us"
            }
        },
        {
            "@type": "ListItem",
            "position": 3,
            "item": {
            "@id": "https://digitalshikshadarpan.com/mock-test",
            "name": "Mock Test"
            }
        },
        {
            "@type": "ListItem",
            "position": 4,
            "item": {
            "@id": "https://digitalshikshadarpan.com/faq",
            "name": "FAQ"
            }
        },
         {
            "@type": "ListItem",
            "position": 5,
            "item": {
            "@id": "https://digitalshikshadarpan.com/digital-shiksha-search-engine",
            "name": "Digital Shiksha Search Engine"
            }
        }
        
        
        ]
    }
    </script>
</head>

<body class="Site">
  <a id="button"></a>

  <!--Top Navigation-->
  <?= (isset($top_navi)) ? $top_navi : ''; ?>
  <!--Sidebar-->
  <?= (isset($sidebar)) ? $sidebar : ''; ?>

  <!--Content-->
  <?= (isset($content)) ? $content : ''; ?>

  <!--Footer-->
  <?= $footer; ?>
  <!--Page Specific Footer-->
  <?php if (isset($extra_footer)) echo $extra_footer; ?>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php if ( is_tag() ) { echo wp_title('Tag:');if($paged > 1) printf(' - 第%s页',$paged);echo ' | '; bloginfo( 'name' );} elseif ( is_archive() ) {echo wp_title(''); if($paged > 1) printf(' - 第%s页',$paged); echo ' | '; bloginfo( 'name' );} elseif ( is_search() ) {echo '&quot;'.wp_specialchars($s).'&quot;的搜索结果 | '; bloginfo( 'name' );} elseif ( is_home() ) {bloginfo( 'name' );$paged = get_query_var('paged'); if($paged > 1) printf(' - 第%s页',$paged);} elseif ( is_404() ) {echo '页面不存在！ | '; bloginfo( 'name' );}else {echo wp_title( ' | ', false, right ) ; bloginfo( 'name' );} ?></title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Rika Akiba">
    <!-- style file -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/styles/nprogress.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/styles/normalize.min.css">
    <link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_directory'); ?>/styles/styles.less" />
    <!-- my less files-->
    <script src="<?php bloginfo('template_directory'); ?>/js/less-1.7.4.min.js" type="text/javascript"></script>

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="RSS 1.0" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="ATOM 1.0" href="<?php bloginfo('atom_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body>
    <div id="wrap-content">
        <header>
            <div class="container">
                <div class="wrap-title">
                    <a class="ajax-link" href="<?php $url = home_url('/'); echo $url; ?>">MIKAN</a>
                    <a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><span class="icon-feed"></span></a>
                </div>
                <nav>
                    <ul>
                        <li><a>目录一</a></li>
                        <li><a>目录二</a></li>
                        <li><a>目录三</a></li>
                    </ul>
                </nav>
                <div class="sub"><?php bloginfo('description'); ?></div>
            </div>
        </header>
        <section class="content">
            <div class="wrap-post">
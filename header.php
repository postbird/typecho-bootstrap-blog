<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no">
    <title><?php $this->archiveTitle(array(
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <!--    上线的话可以直接使用 cdn 的链接-->
    <!--    <link href="https://cdn.bootcss.com/normalize/8.0.0/normalize.min.css" rel="stylesheet">-->
    <!--    <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">-->
    <!--    <script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>-->
    <!--    <script src="https://cdn.bootcss.com/popper.js/1.14.3/popper.min.js"></script>-->
    <!--    <script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->

    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/prism.css'); ?>">
    <script src="<?php $this->options->themeUrl('js/jquery-2.2.1.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/popper.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/jquery.goup.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/prism.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/app.js'); ?>"></script>
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>

    <!-- 用户自定义 stylesheet -->
    <style>
        <?php if($this->options->postbirdStylesheet) { ?>
        <?php $this->options->postbirdStylesheet() ?>
        <?php } ?>
    </style>
</head>
<body>
<!--[if lt IE 8]>
<div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a
        href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.
</div>
<![endif]-->

<header id="header" class="clearfix">
    <?php //print_r($this);?>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container">
                <?php if ($this->options->logoUrl) { ?>
                    <a class="navbar-brand" href="<?php $this->options->siteUrl() ?>"
                       title="<?php $this->options->description() ?>">
                        <img src="<?php $this->options->logoUrl() ?>" alt="logo" class="navbar-logo">
                    </a>
                <?php } else { ?>
                    <a class="navbar-brand" href="<?php $this->options->siteUrl() ?>"
                       title="<?php $this->options->description() ?>"><?php $this->options->title() ?></a>
                <?php } ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php $this->options->siteUrl() ?>">首页 <span class="sr-only">(current)</span></a>
                        </li>
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php $pages->permalink(); ?>"
                                   title="<?php $pages->title(); ?>"><span><?php $pages->title(); ?></span></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <div class="navbar-text">
                        <form method="post" action="" class="search-form form-inline">
                            <div class="form-group">
                                <input type="search" name="s" class="form-control form-control-sm"/>
                                <button class="btn btn-info btn-sm">搜索</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
    </nav>
</header><!-- end #header -->
<div id="body">
    <div class="container main-wrapper">
        <div class="row">

    
    

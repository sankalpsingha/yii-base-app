<?php
//Yii::app()->clientScript->registerCssFile($this->assetsBase.'/css/bs/slate.min.css');
Yii::app()->clientScript->registerScriptFile($this->assetsBase.'/js/fokus.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile($this->assetsBase.'/js/prettify.js',CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile($this->assetsBase.'/css/main.css');
Yii::app()->clientScript->registerCssFile($this->assetsBase.'/css/prettify.css');
Yii::app()->clientScript->registerScript('prettify',"prettyPrint();",CClientScript::POS_READY);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php  echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <script src="<?php echo $this->assetsBase.'/js/vendor/modernizr-2.6.2.min.js'; ?>"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<?php
$this->widget(
    'bootstrap.widgets.TbNavbar',
    array(
        'type' => 'inverse',
        'brand' => 'Base App',
        'collapse' => true,
        //'fixed' => false,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => 'Home', 'url' => array('/user/home'), 'icon'=>'icon-home'),
                    array('label' => 'Contact Us', 'url' => array('/site/contact'),'icon'=>'icon-bell'),
                    array('label' => 'Register', 'url' => array('/user/create'), 'icon'=>'icon-signin','visible'=>Yii::app()->user->isGuest),
                    array('label' => 'Log In', 'url' => array('/site/login'),'icon'=>'icon-off','visible'=>Yii::app()->user->isGuest),
                    array('label' => ucfirst(Yii::app()->user->name), 'url' => array('/site/logout'),'icon'=>'icon-off','visible'=>!Yii::app()->user->isGuest,
                        'items'=>array(
                        array('label' => 'Settings', 'url' => array('/user/settings'), 'icon'=>'icon-cog'),
                        array('label' => 'Log Out', 'url' => array('/site/logout'), 'icon'=>'icon-off'),
                    )),
                )
            )
        )
    )
);
?>

<div class="container" style="margin-top: 60px">
    <?php echo $content; ?>
</div>

<script src="<?php echo $this->assetsBase.'/js/plugins.js' ?>"></script>

<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>

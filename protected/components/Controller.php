<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    private $_assetsBase;

    /**
     * @return mixed
     * This method returns the asset base to be used in the views. Now all the
     * CSS/JS and IMG can be put in the assets folder located at 'application.assets'
     *
     * Now in the view, any static file which is put in the assets folder can be accessed
     * via : Yii::app()->clientScript->registerCssFile($this->assetsBase.'/css/campusstyle.css');
     *
     * @author  Sankalp Singha
     */
    public function getAssetsBase()
    {
        if ($this->_assetsBase === null) {
            $this->_assetsBase = Yii::app()->assetManager->publish(
                Yii::getPathOfAlias('application.assets'),
                false,
                -1,
                defined('YII_DEBUG') && YII_DEBUG
            );
        }
        return $this->_assetsBase;
    }

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
}
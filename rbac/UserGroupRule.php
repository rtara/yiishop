<?php
namespace app\rbac;
 
use Yii;
use yii\rbac\Rule;
 
class UserGroupRule extends Rule
{
    public $name = 'userGroup';
	
	
	public function execute($user, $item, $params)
    {
        if (!\Yii::$app->user->isGuest) {
            $group = \Yii::$app->user->identity->group;
            if ($item->name === 'superadmin') {
				return $group == 'superadmin';
            } elseif ($item->name === 'admin') {
                return $group == 'superadmin' || $group == 'admin';
			} elseif ($item->name === 'administrator') {
                return $group == 'superadmin' || $group == 'administrator';
			} elseif ($item->name === 'user') {
                return $group == 'superadmin' || $group == 'user';
		    }
		return true;
	    }
 
    }
}
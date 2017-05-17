<?php
namespace app\commands;
 
use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;
 
class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;
 
        // Create roles
        $guest  = $authManager->createRole('guest');
        $user  = $authManager->createRole('user');
        $administrator = $authManager->createRole('administrator');
        $admin  = $authManager->createRole('admin');
		$superadmin  = $authManager->createRole('superadmin');
 
        // Create simple, based on action{$NAME} permissions
        $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
         
        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
 
 
        // Add rule, based on UserExt->group === $user->group
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);
 
        // Add rule "UserGroupRule" in roles
        $guest->ruleName  = $userGroupRule->name;
        $user->ruleName  = $userGroupRule->name;
        $administrator->ruleName = $userGroupRule->name;
        $admin->ruleName  = $userGroupRule->name;
		$superadmin->ruleName  = $userGroupRule->name;
 
        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($user);
        $authManager->add($administrator);
        $authManager->add($admin);
		$authManager->add($superadmin);
 
        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
 
        // User
		$authManager->addChild($user, $guest);
        
		
		// Administrator
		$authManager->addChild($administrator, $user);
		
		// Admin
		$authManager->addChild($admin, $administrator);
		
		// Superamin
		$authManager->addChild($superadmin, $admin);
		
    }
}
<?php

namespace console\controllers;

use tree\services\UserRole;
use Yii;
use yii\console\Controller;
use yii\helpers\FileHelper;
use yii\helpers\Inflector;

/**
 * This command creates roles
 * @author Azizjon Allanazarov <aballanazarov@gmail.com>
 * @since 1.0
 */
class RbacController extends Controller
{
    function actionInit()
    {
        $permissions = [
            ['name' => 'site_index', 'description' => '', 'rule' => []],
            ['name' => 'site_login', 'description' => '', 'rule' => []],
            ['name' => 'site_logout', 'description' => '', 'rule' => []],
            ['name' => 'site_s', 'description' => '', 'rule' => []],
        ];

        $roles = [
            [
                'name' => UserRole::ROLE_ADMIN,
                'description' => 'Администратор',
                'permissions' => []
            ],
            [
                'name' => UserRole::ROLE_USER,
                'description' => 'Пользователь',
                'permissions' =>
                    [
                        'site_index',
                        'site_login',
                        'site_logout',
                    ]
            ],
        ];

        // Add all permissions to 'admin' role
        foreach ($permissions as $permission) {
            array_push($roles[0]['permissions'], $permission['name']);
        }

        $auth = Yii::$app->authManager;
        $auth->removeAllPermissions();
        $auth->removeAllRules();

        foreach ($permissions as $permission) {
            $auth = Yii::$app->authManager;
            $createPermission = $auth->createPermission($permission['name']);
            $createPermission->description = $permission['description'];
            if (!empty($permission['rule'])) {
                $auth->add($permission['rule']['instance']);
                $createPermission->ruleName = $permission['rule']['instance']->name;
            }
            $auth->add($createPermission);
        }

        foreach ($roles as $role) {
            $realRole = $auth->getRole($role['name']);
            if (!$realRole) {
                $realRole = $auth->createRole($role['name']);
                $realRole->description = $role['description'];
                $auth->add($realRole);
            }

            if (!empty($role['permissions'])) {
                foreach ($role['permissions'] as $role_permission) {
                    $this_permission = $auth->getPermission($role_permission);
                    $auth->addChild($realRole, $this_permission);
                }
            }
        }

        echo "OK\r\n";
        return true;
    }

    function actionGetAllControllerActions()
    {
        $controllers = FileHelper::findFiles(Yii::getAlias('tree/controllers'), ['recursive' => true]);
        $actions = [];
        foreach ($controllers as $controller) {
            $contents = file_get_contents($controller);
            $controllerId = Inflector::camel2id(substr(basename($controller), 0, -14));
            preg_match_all('/function action(\w+?)\(/', $contents, $result);
            foreach ($result[1] as $action) {
                $actionId = Inflector::camel2id($action);
                $route = str_replace('-', '_', $controllerId . '_' . $actionId);
                $actions[$route] = " ['name' => '{$route}', 'description' => '', 'rule' => []],";
            }
        }
        asort($actions);
        file_put_contents('all_actions.txt', implode(PHP_EOL, $actions));
        echo "OK\r\n";
        die();
    }

    function actionRemoveAll()
    {
        $auth = Yii::$app->authManager;
        echo $auth->removeAllPermissions();
        echo $auth->removeAllRules();
        echo $auth->removeAllRoles();
        echo "OK\r\n";
        die();
    }
}
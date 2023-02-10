<?php

namespace common\constant;

use Yii;

class UserRole
{
    const ROLE_ADMIN = 'admin';                             // Администратор
    const ROLE_USER = 'user';                               // Пользователь

    /**
     * @return array
     */
    public static function getArray(): array
    {
        return [
            self::ROLE_ADMIN                => self::getString(self::ROLE_ADMIN),
            self::ROLE_USER                 => self::getString(self::ROLE_USER),
        ];
    }

    /**
     * @param $user_role
     * @return string
     */
    public static function getString($user_role): string
    {
        switch ($user_role)
        {
            case self::ROLE_ADMIN:          return Yii::t('app', 'Администратор');
            case self::ROLE_USER:           return Yii::t('app', 'Пользователь');
            default:                        return Yii::t('app', "Неизвестный");
        }
    }
}
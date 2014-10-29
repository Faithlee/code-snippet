<?php

class UserModel {

    /**
     * 根据用户编号获取用户名
     * 
     * @param int $userId
     * @return string
     */
    public function getUserName($userId) {
        if ($userId == 1) {
            return "iceup";
        }

        return false;
    }
}

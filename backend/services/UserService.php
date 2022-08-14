<?php

require_once "backend/dao/UserDao.php";

class UserService
{

    public function getAll(){
        $user_dao = new UserDao();
        return $user_dao->getAll();
    }

    public function create($user){
        $user_dao = new UserDao();
        $user_dao->create($user);
    }

    public function update($user){
        $user_dao = new UserDao();
        $user_dao->update($user);
    }

    public function delete($user){
        $user_dao = new UserDao();
        $user_dao->delete($user);
    }
}

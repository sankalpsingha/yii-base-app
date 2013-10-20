<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;

    const ERROR_USERNAME_INACTIVE = 22;
    public function authenticate()
    {
        $user = User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
        if($user===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            Yii::app()->user->setFlash('danger','<p>Sorry no username found with that entry.</p>');
        }else if($user->password !== crypt($this->password,$user->password)){
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            Yii::app()->user->setFlash('danger','<i class="icon-remove-circle"></i> <strong>Wrong</strong> Password.');
        }/*else if($user->active == 0){
            $this->errorCode = self::ERROR_USERNAME_INACTIVE;
            Yii::app()->user->setFlash('info','Your account has not been activated till now. Kindly, check your mail for the activation link. (Sometimes it might be in your SPAM folder)');
        }*/
        else{
            $this->_id = $user->id;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode === self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->_id;
    }
}
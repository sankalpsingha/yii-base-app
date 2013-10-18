<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $gender
 * @property string $power
 * @property string $created_on
 * @property string $updated_on
 */
class User extends CActiveRecord
{
    //setting the date values  :
    public $year;
    public $month;
    public $day;

    // ----------------------------------------------
    // @author Sankalp
    // Making the constants for getting the gender.
    const USER_MALE = 0;
    const USER_FEMALE = 1;



    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			array('username, email', 'length', 'max'=>100),
            array('email','email'),
			array('password', 'length', 'max'=>200),
			array('gender, power', 'length', 'max'=>1),
			array('created_on, updated_on', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, gender, power, created_on, updated_on', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'gender' => 'Gender',
			'power' => 'Power',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('power',$this->power,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return array
     * These are the functions that are there for the dropdown of the
     * months and the days and the year during the registation process.
     *
     * @author : Sankalp Singha
     */
    public function getMonthsArray()
    {
        for($monthNum = 1; $monthNum <= 12; $monthNum++){
            $months[$monthNum] = date('F', mktime(0, 0, 0, $monthNum, 1));
        }

        return array(0 => 'Month:') + $months;
    }

    /**
     * @return array
     * These are the functions that are there for the dropdown of the
     * months and the days and the year during the registation process.
     *
     * @author : Sankalp Singha
     */
    public function getDaysArray()
    {
        for($dayNum = 1; $dayNum <= 31; $dayNum++){
            $days[$dayNum] = $dayNum;
        }

        return array(0 => 'Day:') + $days;
    }

    /**
     * @return array
     * These are the functions that are there for the dropdown of the
     * months and the days and the year during the registation process.
     *
     * @author : Sankalp Singha
     */
    public function getYearsArray()
    {
        $thisYear = date('Y', time());

        for($yearNum = $thisYear; $yearNum >= 1920; $yearNum--){
            $years[$yearNum] = $yearNum;
        }

        return array(0 => 'Year:') + $years;
    }

    /**
     * @param $time time
     * @return bool|int|string
     * @author Jagjot Singh <parry@ymail.com>
     */
    public function getElapsedTime($time){
        $return = (int)round((strtotime("now") - strtotime($time))/60, 1);
        if($return < 60){
            if($return <= 1){
                $return .= " minute ago";
            }else{
                $return .= " minutes ago";
            }
        }elseif(($return>=60) && ($return<720)){
            $return = (int)round($return/60);
            if($return<=1){
                $return .= " hour ago";
            }else{
                $return .= " hours ago";
            }
        }elseif($return>720){
            $return = date('l \a\t g\:ia', strtotime($time));
        }
        return $return;
    }


    /**
     * Gets the user gender in the view.
     * @return array
     * @author <sankalp>
     */
    public function getUserGender()
    {
        return array(self::USER_MALE=>'Male',self::USER_FEMALE=>'Female');
    }

    /**
     * This would automatically set the Created On and the Update On
     * attribute for the timestamp
     * @return array
     */
    public function behaviors()
    {
        return array('CTimestampBehavior'=>array(
            'class' => 'zii.behaviors.CTimestampBehavior',
            'createAttribute' => 'created_on',
            'updateAttribute' => 'updated_on',
            'setUpdateOnCreate' => true,
        ));
    }


    /**
     * Generate a random salt in the crypt(3) standard Blowfish format.
     *
     * @param int $cost Cost parameter from 4 to 31.
     *
     * @throws Exception on invalid cost parameter.
     * @return string A Blowfish hash salt for use in PHP's crypt()
     */
    function blowfishSalt($cost = 5)
    {
        if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
            throw new Exception("cost parameter must be between 4 and 31");
        }
        $rand = array();
        for ($i = 0; $i < 8; $i += 1) {
            $rand[] = pack('S', mt_rand(0, 0xffff));
        }
        $rand[] = substr(microtime(), 2, 6);
        $rand = sha1(implode('', $rand), true);
        $salt = '$2a$' . sprintf('%02d', $cost) . '$';
        $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
        return $salt;
    }

    /**
     * Hashes the password with Blowfish Algorithm and using Crypt.
     * @param  string $password
     * @return string
     */
    public function hashPassword($password)
    {
        return crypt($password,self::blowfishSalt());
    }

    /**
     * Saving the setting after the form has been validated.
     * @return otherthings
     * @author Sankalp <sankalpsingha@gmail.com>
     */
    protected function afterValidate()
    {
        //parent::afterValidate(); // So that the parent can handle if things go wrong.
        if(!$this->hasErrors()){
            // These will get mre information about the users.
            $this->password = $this->hashPassword($this->password);
        }
        return true;
    }

}
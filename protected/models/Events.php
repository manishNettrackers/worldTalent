<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $id
 * @property integer $sports_id
 * @property string $eventName
 * @property integer $unitid
 * @property integer $category_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Sport $sports
 * @property Scores[] $scores
 */
class Events extends CActiveRecord
{
	public $user_id;
	public $category_id;
	public $event_id;
	public $unit_id;
	public $score;
	public $dateTime;
	public $description;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sports_id, eventName, unitid, category_id', 'required'),
			array('sports_id, unitid, category_id', 'numerical', 'integerOnly'=>true),
			array('eventName', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sports_id, eventName, unitid, category_id, description', 'safe', 'on'=>'search'),
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
			'sports' => array(self::BELONGS_TO, 'Sport', 'sports_id'),
			'unit' => array(self::BELONGS_TO, 'Units', 'unitid'),
			'scores' => array(self::HAS_MANY, 'Scores', 'event_id'),
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sports_id' => 'Sports',
			'eventName' => 'Event Name',
			'unitid' => 'Unitid',
			'category_id' => 'Category',
			'description' => 'Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('sports_id',$this->sports_id);
		$criteria->compare('eventName',$this->eventName,true);
		$criteria->compare('unitid',$this->unitid);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function scoresearch()
		{
			//SELECT `s`.* FROM `events` `e` left join `scores` `s` on `s`.`event_id`=`e`.`id` WHERE `e`.`id`=1
			$criteria=new CDbCriteria;
			$criteria->select=array('s.user_id as user_id,s.category_id as category_id,s.event_id as event_id,s.unit_id as unit_id,s.score as score,s.dateTime as dateTime,s.description as description');
			$criteria->join="Left JOIN scores s on s.event_id = t.id";
			$criteria->condition='t.id='.$_REQUEST['id'];
			
			return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

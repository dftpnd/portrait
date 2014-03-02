<?php

/**
 * This is the model class for table "{{callback}}".
 *
 * The followings are the available columns in table '{{callback}}':
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 */
class Callback extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{callback}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, phone, email', 'length', 'max' => 255),
            // The following rule is used by search().
            array('name, phone', 'required', 'on' => '1'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'email',
        );
    }

    protected function afterFind()
    {
        // convert to display format
        $this->created = DateTime::createFromFormat('U', $this->created)->format('d.m.Y H:i');
        parent::afterFind();
    }

    protected function beforeSave()
    {
        MyHelper::sendMail($this);
        $this->created = time();
        return parent::beforeSave();
    }

    public function getTitle()
    {
        return "Обратный звонок";
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
        $criteria = new CDbCriteria;
        $criteria->order = 'id DESC';
        $criteria->compare('id', $this->id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Callback the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}

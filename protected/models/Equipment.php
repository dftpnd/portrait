<?php

/**
 * This is the model class for table "{{equipment}}".
 *
 * The followings are the available columns in table '{{equipment}}':
 * @property integer $id
 * @property string $name
 * @property integer $pg_id
 * @property integer $file_id
 */
class Equipment extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Equipment the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{equipment}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pg_id, file_id', 'numerical', 'integerOnly' => true),
            array('name, adres, mini_img_id, large_img_id', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, pg_id, file_id, text, adres', 'safe', 'on' => 'search'),
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
            'uploadedfiles' => array(self::BELONGS_TO, 'Uploadedfiles', 'file_id'),
            'mini_img' => array(self::BELONGS_TO, 'Uploadedfiles', 'mini_img_id'),
            'large_img' => array(self::BELONGS_TO, 'Uploadedfiles', 'large_img_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'pg_id' => 'Pg',
            'file_id' => 'File',
            'text' => 'text',
            'adres' => 'adres',
            'mini_img_id' => 'mini_img_id',
            'large_img_id' => 'large_img_id'
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('pg_id', $this->pg_id);
        $criteria->compare('file_id', $this->file_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}
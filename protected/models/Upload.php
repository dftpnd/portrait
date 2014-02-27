<?php

/**
 * This is the model class for table "{{upload}}".
 *
 * The followings are the available columns in table '{{upload}}':
 * @property integer $id
 * @property integer $home_id
 * @property string $size
 * @property string $mime
 * @property string $name
 * @property string $source
 */
class Upload extends CActiveRecord
{
    const width = 100;
    const height = 80;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{upload}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('home_id, size, mime, name, source', 'required'),
            array('home_id, created', 'numerical', 'integerOnly' => true),
            array('size, mime, name, source', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, home_id, size, mime, name, source', 'safe', 'on' => 'search'),
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
            'home_id' => 'Home',
            'size' => 'Size',
            'mime' => 'Mime',
            'name' => 'Name',
            'source' => 'Source',
            'created' => 'created',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('home_id', $this->home_id);
        $criteria->compare('size', $this->size, true);
        $criteria->compare('mime', $this->mime, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('source', $this->source, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Upload the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    protected function beforeSave()
    {
        $this->created = time();
        return parent::beforeSave();
    }
}

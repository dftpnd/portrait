<?php

/**
 * This is the model class for table "{{datapick}}".
 *
 * The followings are the available columns in table '{{datapick}}':
 * @property integer $id
 * @property string $datapick
 * @property integer $created
 * @property integer $status
 * @property integer $home_id
 * @property string $name
 * @property string $phone
 * @property string $email
 */
class Datapick extends CActiveRecord
{

    const STATUS_NEW = 1;
    const STATUS_APPROVED = 2;
    const STATUS_UNCHECKED = 3;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{datapick}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('datapick, name, phone', 'required'),
            array('created, status, home_id', 'numerical', 'integerOnly' => true),
            array('name, phone, email', 'length', 'max' => 255),

            //
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'created' => 'Created',
            'datapick' => 'Дата бронирования',
            'status' => 'Статус',
            'home_id' => 'Номер домика',
            'name' => 'ФИО',
            'phone' => 'телефона',
            'email' => 'E-mail',
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Datapick the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function setDatapick()
    {
        $datapick = new self();

        $datapick->attributes = $_POST['Datapick'];
        $datapick->created = time();

        if ($datapick->save()) {
            //send email
        }

    }

    public function popupPrepear($model)
    {
        return "<div datapick_id='$model->id' >$model->datapick</div>";
    }

    public static function addZero($num)
    {
        if ($num < 10) {
            $num = "0" . $num;
        }
        return $num;
    }


    public function jsonePrepeare($data)
    {
        $response = array();
        if (!empty($data)) {
            foreach ($data as $datapick) {
                $date = DateTime::createFromFormat('d.m.Y', $datapick->datapick)->format('m-d-Y');

                if (isset($response[$date])) {
                    $response[$date] .= self::tagWrapper($datapick->home_id);
                } else {
                    $response[$date] = self::tagWrapper($datapick->home_id);
                }
            }
        }

        return CJSON::encode($response);
    }


    public static function tagWrapper($home_id)
    {
        return "<div class='data-dom'>$home_id</div>";
    }


    protected function afterFind()
    {
        // convert to display format
        $this->datapick = DateTime::createFromFormat('Y-m-d', $this->datapick)->format('d.m.Y');
        parent::afterFind();
    }

    protected function beforeValidate()
    {
        return parent::beforeValidate();
    }

    protected function beforeSave()
    {
        $this->datapick = DateTime::createFromFormat('d.m.Y', $this->datapick)->format('Y-m-d');
        return parent::beforeSave();
    }

    public function search()
    {
        //$dataProvider= new CActiveDataProvider('Post');

        $criteria = new CDbCriteria;
        $criteria->order = 'status ASC,created DESC';
        $criteria->compare('id', $this->id);
        $criteria->compare('datapick', $this->datapick, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function confirmation()
    {

        if ($this->status == self::STATUS_APPROVED) {
            $model_count = self::model()->countByAttributes(
                array(
                    'status' => $this->status,
                    'datapick' => DateTime::createFromFormat('d.m.Y', $this->datapick)->format('Y-m-d'),
                    'home_id' => $this->home_id
                )
            );

            if ($model_count == 0) {
                return true;
            } else {
                return false;
            }
        }

        return true;

    }

}

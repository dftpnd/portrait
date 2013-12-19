<?php

/**
 * This is the model class for table "{{datapick}}".
 *
 * The followings are the available columns in table '{{datapick}}':
 * @property integer $id
 * @property string $datapick
 * @property string $year
 * @property string $day
 * @property string $month
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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('datapick, year, day, month', 'required'),
            array('datapick, year, day, month, created, status', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, datapick, year, day, month', 'safe', 'on' => 'search'),
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
            'datapick' => 'Выбраная дата',
            'year' => 'Year',
            'day' => 'Day',
            'month' => 'Month',
            'created' => 'Дата создания',
            'status' => 'Статус'
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
        //$dataProvider= new CActiveDataProvider('Post');

        $criteria = new CDbCriteria;
        $criteria->order = 'status ASC,created DESC';
        //$criteria->order = 'created DESC';

        $criteria->compare('id', $this->id);
        $criteria->compare('datapick', $this->datapick, true);
        $criteria->compare('year', $this->year, true);
        $criteria->compare('day', $this->day, true);
        $criteria->compare('month', $this->month, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
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

    public static function dateFormator($month, $day, $year)
    {
        $d = '-';
        $str = self::addZero($month) . $d . self::addZero($day) . $d . self::addZero($year);
        return $str;
    }

    public function jsonePrepeare($data)
    {

        $response = array();

        if (!empty($data)) {
            foreach ($data as $datapick) {

                $date = self::dateFormator($datapick->month, $datapick->day, $datapick->year);

                if (isset($response[$date])) {
                    $response[$date] = $response[$date] . '<br/>' . $datapick->created;
                } else {
                    $response[$date] = $datapick->created;
                }


            }
        }

        return json_encode($response);

    }
}
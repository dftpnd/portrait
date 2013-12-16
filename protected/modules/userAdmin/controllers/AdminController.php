<?php

class AdminController extends Controller
{

    public $layout = 'main';

    public function actionIndex()
    {
        $user = User::model()->findByPk(1);
        if (isset($_POST['User'])) {
            if (!empty($_POST['User']['username']) && !empty($_POST['User']['password'])) {
                $user->username = $_POST['User']['username'];
                $user->password = md5($_POST['User']['password']);
                $user->save(false);
                echo json_encode(array('status' => 'succses'));

            }
            die();
        }
        $this->render('index', array('user' => $user));
    }



    public function actionSaveSledePosition()
    {
        $order = 1;
        foreach ($_POST['slides'] as $id) {
            $slide = Slider::model()->findByPk($id);
            $slide->order = $order;
            $slide->save();
            $order++;
        }
        echo json_encode(array('status' => 'succses'));
    }

    public function actionDeleteSlide($id)
    {
        Slider::model()->deleteByPk($id);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionPositionSlide($id)
    {
        $slide = Slider::model()->findByPk($id);

        switch ($slide->position) {
            case Slider::POSION_HIDE:
                $slide->position = Slider::POSION_SHOW;
                break;
            case Slider::POSION_SHOW:
                $slide->position = Slider::POSION_HIDE;
                break;
        }

        $slide->save();
        echo json_encode(array('status' => 'succses'));
    }

    public function actionCreateSleder()
    {
        $slide = new Slider();
        $slide->position = Slider::POSION_HIDE;
        $slide->order = 0;
        $slide->file_id = 0;
        $slide->save();
        echo json_encode(array('status' => 'succses'));
    }

    public function actionAbout()
    {

        $vacancys = Vacancy::model()->findAll();
        $about_large = Contacts::model()->findByAttributes(array('name' => 'about_large'));
        $this->render('about', array('vacancys' => $vacancys, 'about_large' => $about_large));
    }

    public function actionUpdateVacancy($id)
    {
        if (isset($_POST['Vacancy'])) {
            $vacancy = Vacancy::model()->findByPk($id);
            $vacancy->attributes = $_POST['Vacancy'];
            if ($vacancy->save()) {
                echo json_encode(array('status' => 'succses'));
            }
        }

    }

    public function actionAddCharge()
    {
        if (isset($_POST['Charge'])) {

            $charge = new Charge();
            $charge->attributes = $_POST['Charge'];
            if ($charge->save()) {
                echo json_encode(array('status' => 'succses'));
            }
        }
    }

    public function actionAddRequirements()
    {

        if (isset($_POST['Requirements'])) {

            $requirements = new Requirements();
            $requirements->attributes = $_POST['Requirements'];

            if ($requirements->save()) {
                echo json_encode(array('status' => 'succses'));
            }
        }
    }

    public function actionDeleteRequirements($id)
    {
        Requirements::model()->deleteByPk($id);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionDeleteCharge($id)
    {
        Charge::model()->deleteByPk($id);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionDeleteVacancy($id)
    {
        Charge::model()->deleteAllByAttributes(array('vacancy_id' => $id));
        Requirements::model()->deleteAllByAttributes(array('vacancy_id' => $id));
        Vacancy::model()->deleteByPk($id);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionProducts()
    {
        $pgs = ProductsGroup::model()->findAll();
        $equipments = Equipment::model()->findAll();

        $this->render('products', array('pgs' => $pgs, 'equipments' => $equipments));
    }

    public function actionSaveProductsGroup()
    {
        if (isset($_POST['ProductsGroup'])) {
            $model = new ProductsGroup();
            $model->attributes = $_POST['ProductsGroup'];
            if ($model->save()) {
                echo json_encode(array('status' => 'succses'));
            }
        }
    }

    public function actionDeletePg($id)
    {
        ProductsGroup::model()->deleteByPk($id);

        $models = Equipment::model()->findAllByAttributes(array('pg_id' => $id));

        foreach ($models as $model) {
            $model->pg_id = 0;
            $model->save(false);
        }

        echo json_encode(array('status' => 'succses'));
    }

    public function actionSaveEquipment($id)
    {

        if (isset($_POST['Equipment'])) {
            if (empty($id)) {
                $model = new Equipment();
            } else {

                $model = Equipment::model()->findByPk($id);
            }
            $model->attributes = $_POST['Equipment'];
            if ($model->save(false)) {
                echo json_encode(array('status' => 'succses'));
            }
        }
    }

    public function actionWorks()
    {
        $tags = Tag::model()->findAll();
        $portfolios = Portfolio::model()->findAll();

        $this->render('works', array('tags' => $tags, 'portfolios' => $portfolios));
    }

    public function actionCreateVacancy()
    {
        if (isset($_POST['Vacancy'])) {
            $model = new Vacancy();
            $model->attributes = $_POST['Vacancy'];
            if ($model->save()) {
                echo json_encode(array('status' => 'succses'));
            }
        }
    }

    public function actionPositionVacancy($id)
    {
        $vacancy = Vacancy::model()->findByPk($id);
        switch ($vacancy->position) {
            case 1:
                $vacancy->position = 2;
                break;
            case 2:
                $vacancy->position = 1;
                break;
        }
        $vacancy->save();
        echo json_encode(array('status' => 'succses'));
    }

    public function actionSaveTag()
    {
        if (isset($_POST['Tag'])) {
            $model = new Tag();
            $model->attributes = $_POST['Tag'];
            if ($model->save()) {
                echo json_encode(array('status' => 'succses'));
            } else {
                echo json_encode(array('status' => 'error', 'text' => $model->getErrors()));
            }
        }
    }

    public function actionSavePortfolio()
    {
        if (isset($_POST['Portfolio'])) {
            $model = new Portfolio();
            $model->attributes = $_POST['Portfolio'];
            if ($model->save()) {
                echo json_encode(array('status' => 'succses'));
            } else {
                echo json_encode(array('status' => 'error', 'text' => $model->getErrors()));
            }
        }
    }

    public function actionUpdatePortfolio($id)
    {
        if (isset($_POST['Portfolio'])) {
            $model = Portfolio::model()->findByPk($id);
            $model->attributes = $_POST['Portfolio'];
            if ($model->save()) {
                echo json_encode(array('status' => 'succses'));
            } else {
                echo json_encode(array('status' => 'error', 'text' => $model->getErrors()));
            }
        }
    }

    public function actionDeletePortfolio($id)
    {
        Portfolio::model()->deleteByPk($id);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionDeleteTag($id)
    {
        $portfolios = Portfolio::model()->findAllByAttributes(array('tag_id' => $id));
        foreach ($portfolios as $portfolio) {
            $portfolio->tag_id = 0;
            $portfolio->save();
        }
        Tag::model()->deleteByPk($id);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionDeleteFileEquipment($id)
    {
        $model = Equipment::model()->findByPk($id);
        $model->file_id = 0;
        $model->save(false);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionDeleteEquipment($id)
    {
        Equipment::model()->deleteByPk($id);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionDownloadFile($type, $id)
    {
        if ($type == '1') {
            //Portfolio
            $model = Portfolio::model()->findByPk($id);
            $width = '140';
            $height = '100';
        } elseif ($type == '2') {
            //Equipment
            $width = '140';
            $height = '140';
            $model = Equipment::model()->findByPk($id);
        } elseif ($type == '3') {
            //Equipment
            $width = '940';
            $height = '400';
            $model = Slider::model()->findByPk($id);
        }


        $uf = DIRECTORY_SEPARATOR;
        $basePath = Yii::app()->basePath . "{$uf}..{$uf}uploads{$uf}";
        if (!file_exists($basePath))
            mkdir($basePath);

        $allowedExtensions = $array = array("png", "jpg", "jpeg", "gif");
        $sizeLimit = 5 * 1024 * 1024;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($basePath);


        if (!empty($result['error'])) {
            echo json_encode(array('status' => 'fail', 'error' => $result['error']));
            Yii::app()->end();
        }

        $file = array(
            'name' => $result['filename'],
            'orig_name' => $result['user_filename'],
            'size' => $result['size'],
            'ext' => $result['ext'],
        );

        $Uploadedfiles = new Uploadedfiles();
        $Uploadedfiles->attributes = $file;
        if (!$Uploadedfiles->save()) {
            echo json_encode(array('status' => 'fail', 'error' => 'Ошибка, сохранение не произошло 1'));
            Yii::app()->end();
        }

        $img = Yii::app()->ih
            ->load($basePath . $Uploadedfiles->name);

        if ($img->width > $width)
            $img->resize($width, $height)
                ->save($basePath . $Uploadedfiles->name);
        if ($img->height > $height)
            $img->resize($width, $height)
                ->save($basePath . $Uploadedfiles->name);


        $result['file_id'] = $Uploadedfiles->id;
        $model->file_id = $Uploadedfiles->id;
        $model->save(false);
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

    }

    public function actionDownloadImg()
    {
        $uf = DIRECTORY_SEPARATOR;
        $basePath = Yii::app()->basePath . "{$uf}..{$uf}uploads{$uf}";
        if (!file_exists($basePath))
            mkdir($basePath);

        $allowedExtensions = $array = array("png", "jpg", "jpeg", "gif");
        $sizeLimit = 5 * 1024 * 1024;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($basePath);


        if (!empty($result['error'])) {
            echo json_encode(array('status' => 'fail', 'error' => $result['error']));
            Yii::app()->end();
        }

        $file = array(
            'name' => $result['filename'],
            'orig_name' => $result['user_filename'],
            'size' => $result['size'],
            'ext' => $result['ext'],
        );

        $Uploadedfiles = new Uploadedfiles();
        $Uploadedfiles->attributes = $file;
        if (!$Uploadedfiles->save()) {
            echo json_encode(array('status' => 'fail', 'error' => 'Ошибка, сохранение не произошло 1'));
            Yii::app()->end();
        }

        $result['file_id'] = $Uploadedfiles->id;
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    }

    public function actionSaveEqText($id)
    {

        $equipment = Equipment::model()->findByPk($id);
        $equipment->text = $_POST['Equipment']['text'];
        $equipment->adres = $_POST['Equipment']['adres'];
        $equipment->save(false);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionDeleteFilePortfolio($id)
    {
        $model = Portfolio::model()->findByPk($id);
        $model->file_id = '';
        $model->save(false);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionInfo($id)
    {
        $model = Equipment::model()->findByPk($id);
        $this->render('info', array('model' => $model));
    }

    public function actionService()
    {
        $models = Service::model()->findAll();
        $this->render('service', array('models' => $models));
    }

    public function actionUpdateService()
    {
        foreach ($_POST['Service'] as $id => $value) {

            $model = Service::model()->findByPk($id);
            $model->name = $value['name'];
            $model->pay = $value['pay'];
            $model->val = $value['val'];
            $model->save(false);
            echo json_encode(array('status' => 'succses'));
        }

    }

    public function actionUpdatePlusMaine()
    {
        $contact = Contacts::model()->findByAttributes(array('name' => 'about_plus'));
        $contact->val = $_POST['Contacts']['about_plus'];
        $contact->save();
        echo json_encode(array('status' => 'succses'));
    }

    public function actionUpdateAboutMaine()
    {
        $contact = Contacts::model()->findByAttributes(array('name' => 'about_maine'));
        $contact->val = $_POST['Contacts']['about_maine'];
        $contact->save();
        echo json_encode(array('status' => 'succses'));

    }

    public function actionDownloadMiniImgId($id)
    {
        $width = 300;
        $height = 100;

        $model = Equipment::model()->findByPk($id);
        $uf = DIRECTORY_SEPARATOR;
        $basePath = Yii::app()->basePath . "{$uf}..{$uf}uploads{$uf}";
        if (!file_exists($basePath))
            mkdir($basePath);

        $allowedExtensions = $array = array("png", "jpg", "jpeg", "gif");
        $sizeLimit = 5 * 1024 * 1024;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($basePath);


        if (!empty($result['error'])) {
            echo json_encode(array('status' => 'fail', 'error' => $result['error']));
            Yii::app()->end();
        }

        $file = array(
            'name' => $result['filename'],
            'orig_name' => $result['user_filename'],
            'size' => $result['size'],
            'ext' => $result['ext'],
        );

        $Uploadedfiles = new Uploadedfiles();
        $Uploadedfiles->attributes = $file;
        if (!$Uploadedfiles->save()) {
            echo json_encode(array('status' => 'fail', 'error' => 'Ошибка, сохранение не произошло 1'));
            Yii::app()->end();
        }
        $model->mini_img_id = $Uploadedfiles->id;
        $model->save(false);


        $img = Yii::app()->ih
            ->load($basePath . $Uploadedfiles->name);

        if ($img->width > $width)
            $img->resize($width, $height)
                ->save($basePath . $Uploadedfiles->name);
        if ($img->height > $height)
            $img->resize($width, $height)
                ->save($basePath . $Uploadedfiles->name);

        $result['file_id'] = $Uploadedfiles->id;
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
    }

    public function actionDownloadLargeImgId($id)
    {
        $width = 620;
        $height = 277;

        $model = Equipment::model()->findByPk($id);
        $uf = DIRECTORY_SEPARATOR;
        $basePath = Yii::app()->basePath . "{$uf}..{$uf}uploads{$uf}";
        if (!file_exists($basePath))
            mkdir($basePath);

        $allowedExtensions = $array = array("png", "jpg", "jpeg", "gif");
        $sizeLimit = 5 * 1024 * 1024;
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($basePath);


        if (!empty($result['error'])) {
            echo json_encode(array('status' => 'fail', 'error' => $result['error']));
            Yii::app()->end();
        }

        $file = array(
            'name' => $result['filename'],
            'orig_name' => $result['user_filename'],
            'size' => $result['size'],
            'ext' => $result['ext'],
        );

        $Uploadedfiles = new Uploadedfiles();
        $Uploadedfiles->attributes = $file;
        if (!$Uploadedfiles->save()) {
            echo json_encode(array('status' => 'fail', 'error' => 'Ошибка, сохранение не произошло 1'));
            Yii::app()->end();
        }
        $model->large_img_id = $Uploadedfiles->id;
        $model->save(false);

        $img = Yii::app()->ih
            ->load($basePath . $Uploadedfiles->name);

        if ($img->width > $width)
            $img->resize($width, $height)
                ->save($basePath . $Uploadedfiles->name);
        if ($img->height > $height)
            $img->resize($width, $height)
                ->save($basePath . $Uploadedfiles->name);


        $result['file_id'] = $Uploadedfiles->id;
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

    }

    public function actionUpdateLarge()
    {
        $contact = Contacts::model()->findByAttributes(array('name' => 'about_large'));
        $contact->val = $_POST['Contacts']['about_large'];
        $contact->save();
        echo json_encode(array('status' => 'succses'));

    }

    public function actionDeleteLargeImg($id)
    {
        $model = Equipment::model()->findByPk($id);
        $model->large_img_id = NULL;
        $model->save(false);
        echo json_encode(array('status' => 'succses'));
    }

    public function actionDeleteMiniImg($id)
    {
        $model = Equipment::model()->findByPk($id);
        $model->mini_img_id = NULL;
        $model->save(false);
        echo json_encode(array('status' => 'succses'));
    }
}
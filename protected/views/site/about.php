<div class="about">
    <div class="section">
        <a name="about"></a>
        <h2>О компании</h2>
        <?php echo $this->contacts['about_large']; ?>
        <table width="100%" class="benefits">
            <tr>
                <td width="470">
                    <h2>Преимущества</h2>
                    <ul>
                        <li>профессиональные знания и опыт &mdash; десятки выполненных объектов различного уровня
                            сложности
                        </li>
                        <li>высокий уровень сервиса &mdash; мы всегда работаем для клиента</li>
                        <li>высокое качество выполненных работ</li>
                        <li>динамичность и гибкость</li>
                        <li>применение в работе исключительно качественных материалов оборудования (Viessmann, Vaillant,
                            Buderus, Uponor, Purmo, Far)
                        </li>
                        <li>гарантия на все выполненные работы 5 лет</li>
                    </ul>
                </td>
                <td>
                    <table class="special-benefits">
                        <tr>
                            <td width="90">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/benefits-delivery.png"
                                     style="margin-left:15px;"/>
                            </td>
                            <td>Бесплатная доставка</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/benefits-installation.png"
                                     style="margin-left:10px;"/>
                            </td>
                            <td>Установка и обслуживание</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/benefits-garanty.png"
                                     style="margin-left:10px;"/>
                            </td>
                            <td>Гарантия 5 лет</td>
                        </tr>
                        <tr style="height:5px;">
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/benefits-hotline.png"/>
                            </td>
                            <td>Горячая линия<br/>8 (903) 313-33-70</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>Вы приходите к нам с идеей или задачей, которую необходимо решить. Мы конкретизируем и реализуем вашу идею –
            переводим ее в технологически выполнимые операции и доводим до нужного вам этапа, а при необходимости
            производим дальнейшее обслуживание.</p>
    </div>
    <div class="section">
        <a name="vacancy"></a>
        <h2>Вакансии</h2>

        <table class="vacancies">
            <?php foreach ($vacancys as $vacancy): ?>
                <tr>
                    <td class="vacansies_td" width="320">
                        <h3><?php echo $vacancy->title; ?></h3>
                        <a href="<?php echo $this->contacts['email']; ?>" class="respond-to-vacancy">Откликнуться на
                            вакансию</a>
                    </td>
                    <td>
                        <h4>Требования:</h4>
                        <ul>
                            <?php foreach ($vacancy->requirements as $value): ?>
                                <li><?php echo $value->text ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <h4>Обязанности:</h4>
                        <ul>
                            <?php foreach ($vacancy->charge as $value): ?>
                                <li><?php echo $value->text ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="section">
        <a name="contact"></a>

        <h2><a name="contacts"></a>Контакты</h2>

        <div class="map">
            <?php echo $this->contacts['map']; ?>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/banner-shadow.png"/>
        </div>

        <div class="juridical-name"><?php echo $this->contacts['full_name']; ?></div>
        <table class="contacts">
            <tr>
                <td class="contact-label">Адрес</td>
                <td class="contact-info"><?php echo $this->contacts['anschrift']; ?></td>
                <td class="contact-label">Тел. горячей линии</td>
                <td class="contact-info"><?php echo $this->contacts['tel_hotline']; ?></td>
            </tr>
            <tr>
                <td class="contact-label">Телефон</td>
                <td class="contact-info"><?php echo $this->contacts['tel']; ?></td>
                <td class="contact-label">Тел. мобильный</td>
                <td class="contact-info"><?php echo $this->contacts['tel_handy']; ?></td>
            </tr>
            <tr>
                <td class="contact-label">Электронная почта</td>
                <td><a href="<?php echo $this->contacts['email']; ?>"><?php echo $this->contacts['email']; ?></a></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>


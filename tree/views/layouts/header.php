<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

?>

<navbar>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                    aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/">SHAJARA</a>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['tree/index']);?>">People</a>
                    </li>
                </ul>

                <?php
                $form = ActiveForm::begin([
                    'method' => "POST",
                    'action' => 'site/logout'
                ]); ?>
                <button class="logout btn btn-light" type="submit">Logout</button>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </nav>
</navbar>
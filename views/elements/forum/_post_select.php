<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pb@human-device.com>
 * @since 0.1
 */

use yii\helpers\Html;

$this->registerJs("$('[data-toggle=\"tooltip\"]').tooltip();");

?>
<div class="row" id="post<?= $model->id ?>">
    <div class="col-sm-2" id="postAvatar<?= $model->id ?>">
        <?= Html::checkbox('post[]', false, ['value' => $model->id, 'label' => Yii::t('podium/view', 'Select this post')]) ?>
    </div>
    <div class="col-sm-10" id="postContent<?= $model->id ?>">
        <div class="popover right podium">
            <div class="arrow"></div>
            <div class="popover-title">
                <small class="pull-right">
                    <span data-toggle="tooltip" data-placement="top" title="<?= Yii::$app->formatter->asDatetime($model->created_at, 'long') ?>"><?= Yii::$app->formatter->asRelativeTime($model->created_at) ?></span>
<?php if ($model->edited && $model->edited_at): ?>
                    <em>(<?= Yii::t('podium/view', 'Edited') ?> <span data-toggle="tooltip" data-placement="top" title="<?= Yii::$app->formatter->asDatetime($model->edited_at, 'long') ?>"><?= Yii::$app->formatter->asRelativeTime($model->edited_at) ?>)</span></em>
<?php endif; ?>
                </small>
                <?= $model->author->podiumTag ?>
                <small>
                    <span class="label label-info" data-toggle="tooltip" data-placement="top" title="<?= Yii::t('podium/view', 'Number of posts') ?>"><?= $model->author->postsCount ?></span>
                </small>
            </div>
            <div class="popover-content podium-content">
                <?= $model->content ?>
            </div>
        </div>
    </div>
</div>

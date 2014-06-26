<?php
class CommentWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $comments = Yii::app()->db->createCommand()->select('*')->from('comment')->queryAll();
        $countComment = count($comments);
        echo '<script  type="text/javascript"> var reviews = ' . json_encode($comments) . '</script>';
        echo '<script  type="text/javascript"> var imgPath = ' . json_encode(Yii::app()->baseUrl . '/upload/comment/') . '</script>';
        echo '<script  type="text/javascript"> var countComment = ' . json_encode($countComment) . '</script>';

        $this->render('comment', array('countComment' => $countComment));
    }
}
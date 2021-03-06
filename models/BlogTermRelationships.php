<?php

namespace linchpinstudios\blog\models;

use Yii;
use linchpinstudios\blog\models\BlogPosts;
use linchpinstudios\blog\models\BlogTermRelationshipsQuery;

/**
 * This is the model class for table "blog_term_relationships".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $term_id
 *
 * @property BlogTerms $term
 * @property BlogTerms $post
 */
class BlogTermRelationships extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blog_term_relationships}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'term_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'term_id' => 'Term ID',
        ];
    }
    

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new BlogTermRelationshipsQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerm()
    {
        return $this->hasOne(BlogTerms::className(), ['id' => 'term_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(BlogPosts::className(), ['id' => 'post_id']);
    }
}

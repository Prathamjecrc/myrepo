<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property int $student_id
 * @property string $subjects
 * @property int $marks
 *
 * @property Student $student
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'subjects', 'marks'], 'required'],
            [['student_id', 'marks'], 'integer'],
            [['subjects'], 'string'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'subjects' => 'Subjects',
            'marks' => 'Marks',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }
}

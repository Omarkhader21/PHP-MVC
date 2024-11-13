<?php

namespace app\models;

use omarkhader\phpmvccore\ContactModel;

class ContactForm extends ContactModel
{
    const STATUS_VIEW = 1;
    const STATUS_NOT_VIEW = 0;
    public string $subject = '';
    public string $email = '';
    public string $message = '';
    public int $status = self::STATUS_NOT_VIEW;

    public static function tableName(): string
    {
        return 'contacts';
    }
    public static function primaryKey(): string
    {
        return 'id';
    }
    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'message' => [self::RULE_REQUIRED],
        ];
    }
    public function labels(): array
    {
        return [
            'subject' => 'Subject',
            'email' => 'Email',
            'message' => 'Message'
        ];
    }
    public function save()
    {
        $this->status = self::STATUS_NOT_VIEW;
        return parent::save();
    }
    public function attributes(): array
    {
        return ['subject', 'email', 'message', 'status'];
    }
}

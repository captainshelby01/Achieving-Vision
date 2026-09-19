<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Schemas\Components\Component;
use SensitiveParameter;

class Login extends BaseLogin
{
    protected function getEmailFormComponent(): Component
    {
        return parent::getEmailFormComponent()
            ->extraInputAttributes([
                'autocapitalize' => 'none',
                'autocorrect' => 'off',
                'spellcheck' => 'false',
                'inputmode' => 'email',
            ]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()
            ->revealable()
            ->extraInputAttributes([
                'autocapitalize' => 'none',
                'autocorrect' => 'off',
                'spellcheck' => 'false',
            ]);
    }

    protected function getCredentialsFromFormData(#[SensitiveParameter] array $data): array
    {
        return [
            'email' => strtolower(trim((string) ($data['email'] ?? ''))),
            'password' => (string) ($data['password'] ?? ''),
        ];
    }
}
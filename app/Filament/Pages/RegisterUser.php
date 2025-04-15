<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterUser extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $view = 'filament.pages.register-user';

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('role')
                ->label('Role')
                ->options([
                    'hr' => 'HR',
                    'employee' => 'Employee',
                ])
                ->required(),
            Forms\Components\TextInput::make('password')
                ->password()
                ->required()
                ->minLength(8)
                ->rules([Password::min(8)->letters()->numbers()->mixedCase()->symbols()]),
            Forms\Components\TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->same('password'),
        ];
    }

    public function register()
    {
        $data = $this->form->getState();

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', 'in:hr,employee'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);

        $this->notify('success', 'User registered successfully. Please login.');

        return redirect()->route('filament.auth.login');
    }
}

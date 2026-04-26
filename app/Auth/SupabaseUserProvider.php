<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;

class SupabaseUserProvider implements UserProvider
{
    public function retrieveById($identifier): ?Authenticatable
    {
        if ($identifier === 'admin') {
            return new SupabaseUser(['id' => 'admin', 'email' => env('ADMIN_EMAIL')]);
        }

        return null;
    }

    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        return null;
    }

    public function updateRememberToken(Authenticatable $user, $token): void {}

    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        if (strtolower(trim($credentials['email'] ?? '')) === strtolower(trim(env('ADMIN_EMAIL', '')))) {
            return new SupabaseUser(['id' => 'admin', 'email' => env('ADMIN_EMAIL')]);
        }

        return null;
    }

    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        $password = env('ADMIN_PASSWORD', '');

        if (Hash::needsRehash($password)) {
            return $credentials['password'] === $password;
        }

        return Hash::check($credentials['password'], $password);
    }

    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false): void {}
}

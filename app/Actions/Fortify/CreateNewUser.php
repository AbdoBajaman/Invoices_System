<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;




    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'photo' => ['required', 'image', 'max:1024'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();


        //!خزن الامتداد في الامتداد المعطى
        $profilePhotoPath = isset($input['photo']) ? $input['photo']->store('profile-photos', 'public') : null;

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'profile_photo_path' => $profilePhotoPath,
            'password' => Hash::make($input['password']),
        ]);

    }
}

<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'family_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string','min:10', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dob' => ['required', 'date','before:2018-02-01'],
            'line1' => ['required', 'string', 'max:255'],
            'line2' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'pin' => ['required', 'string', 'max:6'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
            'family_name' => $input['family_name'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'mobile' => $input['mobile'],
            'email' => $input['email'],
            'dob' => $input['dob'],
            'line1' => $input['line1'],
            'line2' => $input['line2'],
            'city' => $input['city'],
            'state' => $input['state'],
            'pin' => $input['pin'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'family_name' => $input['family_name'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'mobile' => $input['mobile'],
            'email' => $input['email'],
            'dob' => $input['dob'],
            'line1' => $input['line1'],
            'line2' => $input['line2'],
            'city' => $input['city'],
            'state' => $input['state'],
            'pin' => $input['pin'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}

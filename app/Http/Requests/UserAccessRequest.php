<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserAccessRequest extends FormRequest
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function authorize(): bool
    {
        $id = $this->route('id'); // Assuming your route parameter is named 'id'

        if ($this->user->hasRole(1) && $id->role_id === 1) {
            return false; // Denied
        }

    
        if ($this->user->hasRole(2) && in_array($id->role_id, [1, 2])) {
            return false; // Denied
        }

        return true; // Allowed
    }



    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}

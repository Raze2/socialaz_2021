<?php

namespace App\Http\Requests;

use App\Models\UserFriend;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateUserFriendRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_friend_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
                'in:' . implode(',', Arr::pluck(UserFriend::STATUS_SELECT, 'value')),
            ],
        ];
    }
}

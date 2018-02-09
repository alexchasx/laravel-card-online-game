<?php

namespace App\Http\Requests;

class ChangeAvatarRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar_id' => 'required|integer|min:1|max:9999',
        ];
    }

    /**
     * @return int
     */
    public function getParamAvatarId()
    {
        return $this->input('avatar_id');
    }
}

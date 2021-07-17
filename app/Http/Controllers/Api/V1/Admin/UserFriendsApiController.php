<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserFriendRequest;
use App\Http\Resources\Admin\UserFriendResource;
use App\Models\UserFriend;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserFriendsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_friend_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserFriendResource(UserFriend::with(['firstUser', 'secondUser'])->advancedFilter());
    }

    public function show(UserFriend $userFriend)
    {
        abort_if(Gate::denies('user_friend_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserFriendResource($userFriend->load(['firstUser', 'secondUser']));
    }

    public function update(UpdateUserFriendRequest $request, UserFriend $userFriend)
    {
        $userFriend->update($request->validated());

        return (new UserFriendResource($userFriend))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(UserFriend $userFriend)
    {
        abort_if(Gate::denies('user_friend_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new UserFriendResource($userFriend),
            'meta' => [
                'status' => UserFriend::STATUS_SELECT,
            ],
        ]);
    }

    public function destroy(UserFriend $userFriend)
    {
        abort_if(Gate::denies('user_friend_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userFriend->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

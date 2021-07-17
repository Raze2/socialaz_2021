<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\LikeResource;
use App\Models\Like;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LikesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('like_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LikeResource(Like::with(['post', 'user'])->advancedFilter());
    }

    public function show(Like $like)
    {
        abort_if(Gate::denies('like_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LikeResource($like->load(['post', 'user']));
    }

    public function destroy(Like $like)
    {
        abort_if(Gate::denies('like_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $like->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

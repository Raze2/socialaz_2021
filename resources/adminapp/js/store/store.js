import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import CommentsIndex from './cruds/Comments'
import CommentsSingle from './cruds/Comments/single'
import PostsIndex from './cruds/Posts'
import PostsSingle from './cruds/Posts/single'
import LikesIndex from './cruds/Likes'
import LikesSingle from './cruds/Likes/single'
import UserFriendsIndex from './cruds/UserFriends'
import UserFriendsSingle from './cruds/UserFriends/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    CommentsIndex,
    CommentsSingle,
    PostsIndex,
    PostsSingle,
    LikesIndex,
    LikesSingle,
    UserFriendsIndex,
    UserFriendsSingle
  },
  strict: debug
})

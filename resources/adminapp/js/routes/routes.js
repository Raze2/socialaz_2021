import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      },
      {
        path: 'posts',
        name: 'posts.index',
        component: () => import('@cruds/Posts/Index.vue'),
        meta: { title: 'cruds.post.title' }
      },
      {
        path: 'posts/create',
        name: 'posts.create',
        component: () => import('@cruds/Posts/Create.vue'),
        meta: { title: 'cruds.post.title' }
      },
      {
        path: 'posts/:id',
        name: 'posts.show',
        component: () => import('@cruds/Posts/Show.vue'),
        meta: { title: 'cruds.post.title' }
      },
      {
        path: 'posts/:id/edit',
        name: 'posts.edit',
        component: () => import('@cruds/Posts/Edit.vue'),
        meta: { title: 'cruds.post.title' }
      },
      {
        path: 'comments',
        name: 'comments.index',
        component: () => import('@cruds/Comments/Index.vue'),
        meta: { title: 'cruds.comment.title' }
      },
      {
        path: 'comments/create',
        name: 'comments.create',
        component: () => import('@cruds/Comments/Create.vue'),
        meta: { title: 'cruds.comment.title' }
      },
      {
        path: 'comments/:id',
        name: 'comments.show',
        component: () => import('@cruds/Comments/Show.vue'),
        meta: { title: 'cruds.comment.title' }
      },
      {
        path: 'comments/:id/edit',
        name: 'comments.edit',
        component: () => import('@cruds/Comments/Edit.vue'),
        meta: { title: 'cruds.comment.title' }
      },
      {
        path: 'likes',
        name: 'likes.index',
        component: () => import('@cruds/Likes/Index.vue'),
        meta: { title: 'cruds.like.title' }
      },
      {
        path: 'likes/:id',
        name: 'likes.show',
        component: () => import('@cruds/Likes/Show.vue'),
        meta: { title: 'cruds.like.title' }
      },
      {
        path: 'user-friends',
        name: 'user_friends.index',
        component: () => import('@cruds/UserFriends/Index.vue'),
        meta: { title: 'cruds.userFriend.title' }
      },
      {
        path: 'user-friends/:id',
        name: 'user_friends.show',
        component: () => import('@cruds/UserFriends/Show.vue'),
        meta: { title: 'cruds.userFriend.title' }
      },
      {
        path: 'user-friends/:id/edit',
        name: 'user_friends.edit',
        component: () => import('@cruds/UserFriends/Edit.vue'),
        meta: { title: 'cruds.userFriend.title' }
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})

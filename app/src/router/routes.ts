import { RouteRecordRaw } from "vue-router";
import AuthLayout from '@/layouts/AuthLayout.vue'
import MainLayout from '@/layouts/MainLayout.vue'

export const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: AuthLayout,
    children: [
      {
        path: '/sign-in',
        name: 'login',
        component: () => import('@/pages/auth/SignIn.vue')
      },
      {
        path: '/sign-up',
        name: 'sign-up',
        component: () => import('@/pages/auth/SignUp.vue')
      }
    ]
  },
  {
    path: '/',
    component: MainLayout,
    meta: {auth: true},
    children: [
      {
        path: '/home',
        name: 'home',
        component: () => import('@/pages/IndexView.vue')
      },
    ]
  }
]
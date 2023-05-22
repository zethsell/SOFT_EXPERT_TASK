import type { RouteRecordRaw } from "vue-router";
import AuthLayout from '@/layouts/AuthLayout.vue'
import MainLayout from '@/layouts/MainLayout.vue'
import FormLayout from '@/layouts/FormLayout.vue'

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
      {
        path: '/users',
        name: 'users',
        component: () => import('@/pages/user/ListView.vue')
      },
    
      {
        path: '/products',
        name: 'products',
        component: () => import('@/pages/product/ListView.vue')
      },
      {
        path: '/product-types',
        name: 'product-types',
        component: () => import('@/pages/productType/ListView.vue')
      },
      {
        path: '/sells',
        name: 'sells',
        component: () => import('@/pages/sell/ListView.vue')
      },
      {
        path: '/new-sell',
        name: 'new-sell',
        component: () => import('@/pages/sell/CreateSellView.vue')
      },
      {
        path: '/taxes',
        name: 'taxes',
        component: () => import('@/pages/tax/ListView.vue')
      },
    ]
  },
  {
    path: '/',
    component: FormLayout,
    meta: {auth: true},
    children:[
      {
        path: '/user/manage/:id?',
        name: 'user-manager',
        component: () => import('@/pages/user/FormView.vue')
      },
      {
        path: '/tax/manage/:id?',
        name: 'tax-manager',
        component: () => import('@/pages/tax/FormView.vue')
      },
      {
        path: '/product-type/manage/:id?',
        name: 'product-type-manager',
        component: () => import('@/pages/productType/FormView.vue')
      },
      {
        path: '/product/manage/:id?',
        name: 'product-manager',
        component: () => import('@/pages/product/FormView.vue')
      },
    ]

  }
]
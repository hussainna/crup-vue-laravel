import {createRouter,createWebHistory} from 'vue-router'
import Product from '../components/Products.vue'
import AddStudent from '../components/AddStudent.vue'
import EditStudent from '../components/EditStudent.vue'

const routes=[
    {
        path:'/',
        component:Product,
    },
    {
        path:'/add-student',
        component:AddStudent,
    },
    {
        path:'/edit-student/:id',
        component:EditStudent,
    },
    
    
]

const router=createRouter({
    history:createWebHistory(),
    routes
})

export default router
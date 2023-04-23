<template lang="">
    <div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Products
                    <router-link to="/add-student" class='btn btn-primary float-end'>Add Student</router-link>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Email</th>
                            <th>Phone</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(students,idx) in this.students" :key="idx" >
                            <td>{{students.id}}</td>
                            <td>{{students.Name}}</td>
                            <td>{{students.Course}}</td>
                            <td>{{students.Email}}</td>
                            <td>{{students.Phone}}</td>
                            <td>
                                <button @click="deleteStudent(students.id)" class='btn btn-danger mx-2'>Delete</button>
                                <router-link :to="{path:'edit-student/'+students.id}" class='btn btn-primary mx-2'>Edit</router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    name:'student',
    data(){
        return{
            students:[]
        }
    },
    mounted(){
        this.getStudents();
        // console.log('iam here niggga')
    },
    methods:{
        getStudents(){
            axios.get('http://localhost:8000/api/get-students').then(res=>{
                this.students=res.data.students
                console.log(this.students)
            })
        },
        deleteStudent(id){
        axios.post(`http://localhost:8000/api/delete-students/${id}`).then(res=>{
                alert(res.data.message)
            })
       }
    },
  
}
</script>
<style lang="">
    
</style>
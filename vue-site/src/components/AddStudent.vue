<template lang="">
    <div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Student
                    <router-link to="/" class='btn btn-primary float-end'>Student</router-link>
                </h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3 form-group">
                        <label>Name</label>
                        <input type="text" v-model="model.students.name" placeholder='Enter Name' class="form-control">
                    </div>
                    <div class="mb-3 form-group">
                        <label>Course</label>
                        <input type="text" placeholder='Enter Course' v-model="model.students.course" class="form-control">
                    </div>
                    <div class="mb-3 form-group">
                        <label>Email</label>
                        <input type="text" v-model="model.students.email" placeholder='Enter Email' class="form-control">
                    </div>
                    <div class="mb-3 form-group">
                        <label>Phone</label>
                        <input type="text" v-model="model.students.phone" placeholder='Enter Phone' class="form-control">
                    </div>
                    <button @click="SaveStudent" class='btn btn-primary'>Insert</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    name:'addStudent',
    data(){
        return{
            model:{
                students:{
                    name:'',
                    course:'',
                    email:'',
                    phone:'',
                    
                }
            }
        }
    },
    methods:{
        SaveStudent(e){
            e.preventDefault();
            
            axios.post('http://localhost:8000/api/insert-student',this.model.students).then(res=>{
                if(res.data.status===200)
                {
                    alert(res.data.message)
                    window.location.href = '/';
                }
            })
        }
    }
}
</script>
<style lang="">
    
</style>
<template lang="">
    <div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Student
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
                    <button @click="UpdateStudent" class='btn btn-primary'>Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    name:'EditStudent',
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
    mounted(){
        console.log(this.$route.params.id)
        this.EditStudent();
    },
    methods:{
        UpdateStudent(e){
            e.preventDefault();
            const student_id=this.$route.params.id

            axios.post(`http://localhost:8000/api/update-student/${student_id}`,this.model.students).then(res=>{
                if(res.data.status===200)
                {
                    alert(res.data.message)
                    window.location.href = '/';
                }
            })
        },
        EditStudent(){
            const student_id=this.$route.params.id
            axios.get(`http://localhost:8000/api/edit-student/${student_id}`).then(res=>{
                if(res.data.status===200)
                {
                    this.model.students.name=res.data.students.Name;
                    this.model.students.course=res.data.students.Course;
                    this.model.students.email=res.data.students.Email;
                    this.model.students.phone=res.data.students.Phone;
                    
                }
            })
        }
    }
}
</script>
<style lang="">
    
</style>
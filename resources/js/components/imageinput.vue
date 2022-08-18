<template>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title" style="color:#1f64a0!important;font-weight:bold">Images</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div v-for="GetImage in InputArrayImageList"  style="margin-top:5px;" class="col-sm-2">
                    <input type="hidden" name="images[]" value="1">
                    <img mediaid="315" src=""  style="width: 98%; height: 150px;border:1px solid #1f64a0;">
                    <p>Hello World</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style>

</style>

<script>
    export default{
        name:'imageinput',
        props:['InputArrayImageList'],
        data(){
            return {
                counter : 0,
            };
        },
        methods:{

        }
    };
</script>
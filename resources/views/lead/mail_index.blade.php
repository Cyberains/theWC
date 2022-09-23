<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="app">
{{--        v-if="tasks.length > 0"   --}}
        <table class="table table-bordered table-striped table-responsive" >
            <tbody>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Description</th>
{{--                <th>Action</th>--}}
            </tr>
            <tr v-for="(task, index) in tasks">
                <td>@{{ index + 1 }}</td>
                <td>@{{ task.name }}</td>
                <td>@{{ task.email }}</td>
{{--                <td>--}}
{{--                    <button @click="initUpdate(index)" class="btn btn-success btn-xs" style="padding:8px"><span class="glyphicon glyphicon-edit"></span></button>--}}
{{--                    <button @click="deleteTask(index)" class="btn btn-danger btn-xs" style="padding:8px"><span class="glyphicon glyphicon-trash"></span></button>--}}
{{--                </td>--}}
            </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data(){
                return {
                    tasks: []
                }
            },
            // mounted()
            // {
            //     this.readTasks();
            // },
            method: {
                readTasks()
                {
                    axios.get('http://localhost/project/the_womens_company/lead-mail')
                        .then(response => {
                            console.log(response.data);
                            this.tasks = response.data;
                        });
                },
            }
        });
    </script>
</body>
</html>

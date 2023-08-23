<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/web/index.css') }}">
    <title>Question 2</title>
</head>
<body>

<section id="app" class="question2">
    <div class="container">
        <div class="table-data">
            <table>
                <thead>
                    <tr>
                        <th data-field="fruit" data-sortable="true" class="sorting">
                            <input v-model="selectAll" type="checkbox">
                        </th>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>BALANCE</th>
                        <th>STATUS</th>
                        <th>REGISTER AT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in list">
                        <td data-field="fruit" data-sortable="true" class="sorting">
                            <input v-model="selected" type="checkbox" :value="item.id" :id="'id'+item.id">
                        </td>
                        <td v-text="_.get(item,'name','')"></td>
                        <td v-text="_.get(item,'balance','')"></td>
                        <td v-text="_.get(item,'email','')"></td>
                        <td v-text="_.get(item,'email','')"></td>
                        <td v-text="_.get(item,'registerAt','')"></td>
                        <td v-text="_.get(item,'active','')"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>



<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('slick/slick/slick.min.js') }}"></script>
<script src="https://unpkg.com/vue@2"></script>
<script src="https://unpkg.com/jquery@3.1.1/dist/jquery.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let app = new Vue({
            el: '#app',
            data: {
               list: [],
                selected: [],

            },
            created() {
                let vm = this;
            },
            mounted() {
                let vm = this;
                vm.loadList();
            },
            methods: {
                loadList(){
                    let vm = this;
                    for (let i = 1; i <= 120; i++) {
                        let user = {
                            id: `user${i}`,
                            name: faker.name.findName(),
                            balance: Math.floor(Math.random() * 10000),
                            email: faker.internet.email(),
                            registerAt: faker.date.past(),
                            active: Math.random() < 0.5,
                        };
                        vm.list.push(user);
                    }

                }
            },
            computed: {
                selectAll: {
                    get: function() {
                        return this.list ? this.selected.length === this.list.length : false;
                    },
                    set: function(value) {
                        let selected = [];
                        if (value) {
                            this.list.forEach(function(list_user) {
                                selected.push(list_user.id);
                            });
                        }
                        this.selected = selected;
                    }
                }
            }
        })
    })
</script>


</body>
</html>

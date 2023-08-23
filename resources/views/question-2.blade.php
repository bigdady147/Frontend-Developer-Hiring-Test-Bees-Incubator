<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('css/web/index.css') }}">
    <title>Question 2</title>
</head>
<style>
    body {
        background: #eee;
    }
</style>
<body>

<section id="app" class="question2">
    <div class="container">
        <div class="title">
            <h2>Question 2</h2>
        </div>
        <div class="table-data">
            <table>
                <thead>
                <tr>
                    <th data-field="fruit" data-sortable="true" class="sorting">
                        <input v-model="selectAll" type="checkbox">
                    </th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>BALANCE</th>
                    <th>STATUS</th>
                    <th style="width: 300px">REGISTER AT</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item,index) in displayedUsers">
                    <td data-field="fruit" data-sortable="true" class="sorting text-center">
                        <input v-model="selected" type="checkbox" :value="item.id" :id="'id'+item.id">
                    </td>
                    <td v-text="_.get(item,'id','')"></td>
                    <td>
                        <strong v-text="_.get(item,'name','')"></strong>
                    </td>
                    <td>
                        <p>
                            <a :href="'mailto:' +  _.get(item,'email','')" v-text="_.get(item,'email','')"></a>
                        </p>
                    </td>
                    <td v-text="formatDollar(_.get(item,'balance',''))"></td>
                    <td>
                        <span :class="item.active ? 'bg-success' : 'bg-danger' " class="btn-status"
                              v-text="_.get(item,'active','')"></span>
                    </td>
                    <td >
                        <div  class="tooltips-date">
                            @{{ formatDate(_.get(item,'registerAt','')) }}
                            <div  v-text="_.get(item,'registerAt','')" class="text"></div>
                        </div>
                    </td>
                    <td>
                        <div class="list-action">
                            <span class="icon-edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span class="icon-remove">
                                <i class="fa-solid fa-trash"></i>
                            </span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div>
                <div class="table-footer">
                    <div class="total mt-3">
                        <span v-text="'Total:' + ' '  +  list.length + ' user'"></span>
                    </div>
                    <div class="pagination">
                        <button @click="previousPage" :disabled="currentPage === 1">Previous</button>
                        <span v-for="(pageNumber,i) in pages" :key="pageNumber">
                        <button @click="goToPage(pageNumber)"
                                :class="{ active: pageNumber === currentPage }">@{{ pageNumber }}</button>
                        <span v-if="pageNumber !== totalPages && pageNumber + 1 !== totalPages"></span>
                    </span>
                        <button @click="nextPage" :disabled="currentPage === totalPages">Next</button>
                    </div>
                </div>

            </div>
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
    window.addEventListener('DOMContentLoaded', () => {
        var tooltips = Vue.component('tooltips', {
            template: `
                    <div class="jt-tooltip-over">@{{ replaceText(text, length) }}
                        <span class="jt-tooltiptext-text" v-text="text"></span>
                    </div>`,
            props: {
                text: {
                    required: false,
                    type: String,
                },
                length: {
                    required: false,
                    type: Number,
                    default: 0,
                },
            },
            data: function () {
                return {
                    bar: null,
                }
            },
            mounted() {

            },
            methods: {
                replaceText(str, n) {
                   return str + '12312312312';
                },
            },
            watch: {}
        });
        let app = new Vue({
            el: '#app',
            data: {
                list: [],
                selected: [],
                currentPage: 1,
                itemsPerPage: 10,

            },

            created() {
                let vm = this;
            },
            components: {
                tooltips: tooltips,
            },
            mounted() {
                let vm = this;
                vm.loadList();
            },
            methods: {
                loadList() {
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

                },
                formatDollar(balance){
                    return formattedBalance = '$' + Math.floor(balance).toString().replace(/\d(?=(\d{3})+$)/g, '$&,').replace('.', ',');
                },
                formatDate(date) {
                    var d = new Date(date),
                        month = '' + (d.getMonth() + 1),
                        day = '' + d.getDate(),
                        year = d.getFullYear();

                    if (month.length < 2)
                        month = '0' + month;
                    if (day.length < 2)
                        day = '0' + day;

                    return [year, month, day].join('-');
                },
                previousPage() {
                    this.currentPage -= 1;
                }
                ,
                nextPage() {
                    this.currentPage += 1;
                }
                ,
                goToPage(pageNumber) {
                    this.currentPage = pageNumber;
                }
                ,

            },
            computed: {
                selectAll: {
                    get: function () {
                        return this.list ? this.selected.length === this.list.length : false;
                    }
                    ,
                    set: function (value) {
                        let selected = [];
                        if (value) {
                            this.list.forEach(function (list_user) {
                                selected.push(list_user.id);
                            });
                        }
                        this.selected = selected;
                    }
                }
                ,

                displayedUsers() {
                    let vm = this;
                    const startIndex = (vm.currentPage - 1) * vm.itemsPerPage;
                    const endIndex = startIndex + vm.itemsPerPage;
                    return vm.list.slice(startIndex, endIndex);
                }
                ,
                totalPages() {
                    let vm = this;
                    return Math.ceil(vm.list.length / vm.itemsPerPage);
                }
                ,
                pages() {
                    let vm = this;
                    const pagesArray = [];
                    for (let i = 1; i <= this.totalPages; i++) {
                        pagesArray.push(i);
                    }
                    return pagesArray;
                },
            }
        })
    })
</script>


</body>
</html>

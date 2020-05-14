
document.addEventListener('DOMContentLoaded', function () {

        var renderComponent = new Vue({
            el: '#render-products',
            delimiters: ['<%', '%>'],
            data: {
                items: []
            },
            methods: {
                setProductsToBeRendered(items) {
                    this.items = items;
                }
            }
        })

        const store = new Vuex.Store({
            state: {
                products: [],
            },
            getters: {
                products ({ products }) {
                    return products;
                },
            },
            actions: {
                loadActivities({commit},payload) {
                    var date = payload.date +"23:59:59";
                    var url = "back/activities?people="+payload.people+"&date="+date;
                    axios.get(url).then(function (response) {

                        console.log(response.data.message);
                        if (response.data.message.length > 0) {
                            renderComponent.setProductsToBeRendered(response.data.message);
                        } else {
                            swal("Aviso", "No hay actividades para ese dia", "warning");
                        }

                    }).catch(function (error) {
                        console.log("error returning list of products");
                    })
                },

            },
            mutations: {
                setProducts(state, products) {
                    state.products = products;
                }
            }
        });

        const app = new Vue({
            store: store,
            delimiters: ['<%', '%>'],
            el: '#app',
            data: {
                date: '',
                products:[],
                people: [
                    {key: 1, id: "1"},
                    {key: 2, id: "2"},
                    {key: 3, id: "3"},
                    {key: 4, id: "4"},
                    {key: 5, id: "5"},
                    {key: 6, id: "6"},
                    {key: 7, id: "7"}
                ],
                selectedPerson: "",
                errors:[]
            },
            mounted: function() {

                var args = {
                    format: 'YYYY-MM-DD'
                };
                this.$nextTick(function() {
                    $('.datepicker').datetimepicker(args)
                });

                this.$nextTick(function() {
                    $('.time-picker').datetimepicker({
                        format: 'LT'
                    })
                });
            },
            methods: {
                checkForm: function (e) {

                    this.errors = [];

                    if (!this.selectedPerson) {
                        this.errors.push("Debes seleccionar el numero de personas.");
                    }

                    if (!this.date) {
                        this.errors.push("La fecha de actividad es obligatoria");
                    }

                    if (!this.errors.length) {
                        console.log("El payload es");
                        var payload= {date: this.date, people:this.selectedPerson};
                        console.log(payload);
                        this.$store.dispatch('loadActivities', payload);
                    }

                    e.preventDefault();
                }
            }
        })


        $('.datepicker').on('dp.change', function(event) {
            var date = event.date.format('YYYY-MM-DD');
            Vue.set(app, 'date', date);
        });



        $(document).on("click",".button-buy",function() {
            var full = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');
            var uri = full + "/back/buy/save";
            var dateactivity =  $("#date").val() + "00:00:00";
            var idactivity = $(this).attr("id");

            var price = $(this).attr("price")

            var e = document.getElementById("people");
            var people = e.options[e.selectedIndex].value

            var params = {"id_activity":idactivity, 'people':people, "date_activity":dateactivity, "price_total":price};
            $.ajax({
                url: uri,
                dataType: "json",
                contentType: "application/json;charset=utf-8",
                type: "POST",
                data: JSON.stringify(params),
                success: function (msg) {
                    if (msg.code == 200) {
                        swal("Enhorabuena", "Item comprado correctamente", "success");
                    }
                }
            });
        });

});
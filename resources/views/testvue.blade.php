@include('layouts.sidebar')
@include('layouts.topnavbar')
@extends('layouts.app')


@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

<div class="container">
    <h1 class="page-header text-center">Vue.Js Multi Step Form</h1>
    <div id="app">
        <button v-if="activePhase!=1" type="button" @click.prevent="goBack()" class="btn btn-primary">go Back</button>


        <template id="user_detail1" v-if="activePhase == 1">
            <h1>Step 1</h1>
            <div class="card-body p-0 ml-3 mr-5">
                <input type="text" v-model="user_detail1.description" id="">
                <select v-model="user_detail1.selectedScanEng" id="playbook_id">
                    @foreach($scanEngs as $item )
                        <option value="{{$item->id}}">{{$item->ipAddress}}</option>
                    @endforeach
                </select>
                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <td >Action</td>
                                <td>Id Of Server </td>

                                <td>Ip Address Of Server</td>


                            </tr>
                            </thead>
                            <tbody>
                            <template class="form-group col" v-for="server in servers">
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" :value="server.id" v-model="user_detail1.serverIds">
                                    </td>
                                    <td>
                                        <span class="checkbox-label"> @{{server.id}} </span>
                                    </td>
                                    <td>
                                        <span class="checkbox-label"> @{{server.ipAddress}} </span>
                                    </td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                <button type="button" @click.prevent="goToStep(2)" class="btn btn-primary">Continue</button>

            </div>


        </template>

        <template id="user_detail2" v-if="activePhase == 2">
            <h1>Step 2</h1>
            <div class="card-body p-0 ml-3 mr-5">
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <td>Id Of Server </td>

                        <td>Ip Address Of Server</td>


                    </tr>
                    </thead>
                    <tbody>
                    <template class="form-group col" v-for="(server, i) in servers">

                        <tr v-if="user_detail1.serverIds.includes(server.id)">

                            <td>
                                <span class="checkbox-label"> @{{server.id}} </span>
                            </td>
                            <td>
                                <span class="checkbox-label"> @{{server.ipAddress}} </span>
                            </td>
                            <td>
                                <select v-model="user_detail2.selectionNoPriv[i]">
                                    <option v-for="credential in  user_detail2.credentials[server.id]"  :value="credential.id">@{{credential.username}}<option>
                                </select>

                            </td>
                            <td>
                                <select v-model="user_detail2.selectionWithPriv[i]">
                                    <option v-for="credential in  user_detail2.credentials[server.id]"  :value="credential.id">@{{credential.username}}<option>
                                </select>

                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
                <button type="button" @click.prevent="goToStep(3)" class="btn btn-primary">Next</button>

            </div>


        </template>
        <template id="user_detail3" v-if="activePhase == 3">
            <h1>Step 3</h1>
            <div class="btn btn-blueviolet btn-inline-block btn-create" @click="addRow">Add Row</div>
            <div class="card-body p-0 ml-3 mr-5">
                <table class="table table-bordered" id="dynamicTable">

                    <tr>

                        <th>Order</th>
                        <th>playbook</th>



                        <th>Regex</th>
                        <th>Action</th>

                    </tr>

                    <tr v-for="(row,i) in user_detail3.selectedPlaybook">
                        <td>
                           @{{i}}
                        </td>
                        <td>
                            <select v-model="user_detail3.selectedPlaybook[i]" @onchange.prevent="Reset(i)">
                                <option v-for="playbook in  user_detail3.playbooks"  :value="playbook.id">@{{playbook.name}}<option>
                            </select>
                        </td>
                        <td>
                            <select v-model="user_detail3.selectedRegex[i]">
                                <option v-for="regex in  user_detail3.regexes[user_detail3.selectedPlaybook[i]]"  :value="regex.id">@{{regex.id}}<option>
                            </select>
                        </td>
                        <td><button type="button" @click="removeRow(row)" class="fa fa-remove delete-button"> Remove</button></td>
                    </tr>

                </table>

                <button type="button" @click.prevent="createAudit()" class="btn btn-primary">Create Audit</button>

            </div>


        </template>

    </div>
</div>
<!-- ./wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
    var i = 0;






    $(document).on('click', '.remove-tr', function(){

        $(this).parents('tr').remove();

    });

    var app = new Vue({
        el: '#app',
        data: {
            activePhase: 1,
            isLoading: false,
            isLoading: false,
            servers:@json($servers),
            user_detail1: {
                serverIds: [],
                selectedScanEng:[],
                description:"",
            },
            user_detail2: {
                credentials:{},
                selectionNoPriv:{},
                selectionWithPriv:{}

            },
            user_detail3: {
                playbooks:{},
                regexes:[],
                selectedPlaybook:[],
                selectedRegex:[]
            }
        },
        ready: function() {
            console.log('ready');
        },
        methods: {
            goToStep: function(step) {
                this.activePhase = step;

                if(step==2) {

                    axios.post('/server/users', {
                            serverIds:this.user_detail1.serverIds
                        }

                    )  .then(response=>{
                        this.user_detail2.credentials=response.data[0];
                        // for (const item in this.user_detail2.credentials) {
                        //     this.user_detail2.selectionNoPriv[item]=this.user_detail2.credentials[item][0].id;
                        //     this.user_detail2.selectionWithPriv[item]=this.user_detail2.credentials[item][0].id;
                        //
                        // }


                    });
                }else {
                    if (step = 3) {
                        axios.get('/playbook/regexes', {
                                serverIds: this.user_detail1.serverIds
                            }
                        ).then(response => {
                            console.log(response.data);
                            this.user_detail3.playbooks=response.data["playbooks"];
                            this.user_detail3.regexes=response.data["regexes"][0];



                        });

                    }
                }
            },
            goBack:function(){
                this.activePhase--;

            },
            addRow: function(){
                this.user_detail3.selectedPlaybook.push(0);
            },
            removeRow: function(row){
                //console.log(row);
                this.user_detail3.selectedPlaybook.splice(row, 1);
                this.user_detail3.selectedRegex.splice(row, 1);

            }, Reset: function(row){
                //console.log(row);
                this.user_detail3.selectedRegex[row]=0;
            }  ,createAudit: function(){
                listUsers={}
                listRegex={}
                for (var i =0;i<this.user_detail1.serverIds.length;i++){
                    listUsers[this.user_detail1.serverIds[i]]=
                        {
                            'NoPrivilege':this.user_detail2.selectionNoPriv[i],
                            'Privilege':this.user_detail2.selectionWithPriv[i],
                        };
                }
                for (var i =0;i<this.user_detail3.selectedPlaybook.length;i++){

                    listRegex[this.user_detail3.selectedPlaybook[i]]=
                        this.user_detail3.selectedRegex[i];
                }



                axios.post('/admin/audit/', {
                    servers: this.user_detail1.serverIds,
                    scanEngs: this.user_detail1.selectedScanEng,
                    users: listUsers,
                    description: this.user_detail1.description,
                    playbooks: this.user_detail3.selectedPlaybook,
                    regex:listRegex,

                    }
                ).then(response => {
                    console.log(response.data);});
            }

        }
    });
</script>


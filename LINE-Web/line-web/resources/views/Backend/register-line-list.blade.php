@extends('Backend.backend-view')
@section('ContentAdmin')

    {{-- <div class="title-manager">
    <h1 class="text-title-manager" >Table Register Notification Line</h1>
    </div> --}}

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Register Line List</h5>
                <span>This is table contain register line list.</span>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Alexander</td>
                            <td>Orton</td>
                            <td>@mdorton</td>
                            <td>Admin</td>
                            <td>USA</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>John Deo</td>
                            <td>Deo</td>
                            <td>@johndeo</td>
                            <td>User</td>
                            <td>USA</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Randy Orton</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>admin</td>
                            <td>UK</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Randy Mark</td>
                            <td>Ottandy</td>
                            <td>@mdothe</td>
                            <td>user</td>
                            <td>AUS</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Ram Jacob</td>
                            <td>Thornton</td>
                            <td>@twitter</td>
                            <td>admin</td>
                            <td>IND</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Alexander</td>
                            <td>Orton</td>
                            <td>@mdorton</td>
                            <td>Admin</td>
                            <td>USA</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>John Deo</td>
                            <td>Deo</td>
                            <td>@johndeo</td>
                            <td>User</td>
                            <td>USA</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Randy Orton</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>admin</td>
                            <td>UK</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Randy Mark</td>
                            <td>Ottandy</td>
                            <td>@mdothe</td>
                            <td>user</td>
                            <td>AUS</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Ram Jacob</td>
                            <td>Thornton</td>
                            <td>@twitter</td>
                            <td>admin</td>
                            <td>IND</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Alexander</td>
                            <td>Orton</td>
                            <td>@mdorton</td>
                            <td>Admin</td>
                            <td>USA</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>John Deo</td>
                            <td>Deo</td>
                            <td>@johndeo</td>
                            <td>User</td>
                            <td>USA</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Randy Orton</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>admin</td>
                            <td>UK</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Randy Mark</td>
                            <td>Ottandy</td>
                            <td>@mdothe</td>
                            <td>user</td>
                            <td>AUS</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Ram Jacob</td>
                            <td>Thornton</td>
                            <td>@twitter</td>
                            <td>admin</td>
                            <td>IND</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="container-table-register">
        <table class="table table-striped table-register">
            <thead>
                <tr>
                    <th scope="col">User name</th>
                    <th scope="col">Email</th>
                    <th scope="col">State</th>
                    <th scope="col">Time Connected</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tung Truong</td>
                    <td>tung@gmail.com</td>
                    <td>Line</td>
                    <td>23/06/2023</td>
                </tr>
            </tbody>
        </table>
    </div> --}}
    {{-- @foreach ($dataList as $subDataList )
    <tr>
        <td>{{ $subDataList->displayName }}</td>
        <td>{{ $subDataList->email }}</td>
        <td>{{ $subDataList->status }}</td>
        <td>{{ $subDataList->date }}</td>
    </tr>
    @endforeach --}}

@endsection



    {{-- <div class="container-form-send-notify">
        <form  id="form-send-notify">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Content Notify</label>
                <textarea type="texr" class="form-control" class="ipt_notify" id="ipt_text_notify"></textarea>
            </div>
            <button id="submit-btn" type="submit" class="btn btn-primary btn-submit-notify">Submit</button>
            <button class="btn btn-primary btn-select-all-notify">Select All</button>
        </form>
    </div> --}}


    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script> --}}
 

        

        {{-- // window.addEventListener('load',event=>{
        //     loadEventFormSubmit();
        // })
        // function loadEventFormSubmit()
        // {
            
        // }
        // var elForm = document.querySelector('#form-send-notify')
        // if(elForm)
        // {
        //     elForm.addEventListener('submit',event=>{
        //         event.preventDefault()
        //         $('#ipt_text_notify')
        //         var ipt_text_notify = elForm.querySelector('#ipt_text_notify')
        //         var elChoosed_receivers = document.querySelectorAll('.cbx-receiver-choose')
        //         elChoosed_receivers = Array.from(elChoosed_receivers)            
        //         var dataReceivers = elChoosed_receivers.map(choosed_receiver=>{
        //             if(choosed_receiver.checked)
        //             return choosed_receiver.getAttribute('data-id-user')
        //         })
        //         dataReceivers = dataReceivers.filter(dataReceiver=>dataReceiver)
        //         requestSendNotification(ipt_text_notify.value.trim(),dataReceivers)
        //     })
        // }

        // var btnSelectAll = elForm.querySelector('.btn-select-all-notify');
        // btnSelectAll.addEventListener('click',event=>{
        //     event.preventDefault();
        //     var elChoosed_receivers = document.querySelectorAll('.cbx-receiver-choose')
        //     elChoosed_receivers.forEach(
        //         elChoosed_receiver=>{
        //             elChoosed_receiver.checked=true
        //         }
        //     )
        // })


        // function requestSendNotification(textNotification,dataReceivers=[])
        // {
        //     if(textNotification.length<=0)
        //     {
        //         displayToast('Please Enter input content notify')
        //         // alert('Please Enter input content notify')
        //     }
        //     else if (dataReceivers.length<=0)
        //     {
        //         displayToast('Please Select receiver')
        //         // alert('Please Select receiver')
        //     }
        //     else
        //     {
        //         var form  = new FormData();
        //         form.append('message', textNotification);
        //         form.append('listUserId', JSON.stringify(dataReceivers));  
                
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         $.ajax({
        //             url: '{{URL::to("/admin/send-mess")}}',
        //             method: 'post',
        //             data: form,
        //             contentType: false,
        //             processData: false,
        //             dataType: 'json',
        //             success: function(data) {
        //                 document.querySelector('#ipt_text_notify').value = "";
        //                 displayToast('Send Success!');
        //             },
        //             error: function() {
        //                 displayToast('Can not add data!');
        //             }
        //         });
        //         console.log(textNotification,dataReceivers);
        //     }
            
        // } --}}


















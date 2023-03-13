@extends('Backend.backend-view')
@section('ContentAdmin')
    <style>
        .link-detail-announce
        {
            cursor: pointer;
        }
    </style>
    {{-- <div class="title-manager">
    <h1 class="text-title-manager" >Table Register Notification Line</h1>
    </div> --}}

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header" style="padding: 10px 40px;">
                <div class="media" style="display: flex; padding: 0px;">
                    <form class="form-inline" style=" border: 1px solid #f4f4f4;  padding: 0px 20px; border-radius: 5px;">
                        <div class="form-group mb-0" style="justify-content: center; align-items: center;">                                      
                            <i class="fa fa-search" style="padding-right: 10px"></i>
                            <input class="form-control-plaintext" type="text" placeholder="Search...">
                        </div>
                    </form>
                    <div class="media-body text-end" style="display: flex; justify-content: flex-end;">
                        <div class="btn btn-outline-primary ms-2 btn-new-notification" style="display: flex; justify-content: center; align-items: center; width: 300px;">
                            <i data-feather="send"></i>New Notification  
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 40px;">
                <div>
                    <h5>Notification List</h5>
                    <span>This is table contain notification list.</span>
                </div>
                <div>

                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Title ID</th>
                            <th scope="col">Time Notification</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($dataList as $subDataList )
                        <tr class="link-detail-announce" data-id-notification='{{$subDataList->id}}'>
                            <td >{{$subDataList->name_type}}</td>
                            <td>{{$subDataList->announce_title}}</td>
                            <td>{{$subDataList->created_at}}</td>
                        </tr>
                    @endforeach 

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <script>
        var tr_announces = document.querySelectorAll('.link-detail-announce');
        tr_announces.forEach(tr_announce=>{
            tr_announce.addEventListener('click',event=>{
                location.href =`/admin/notification/${event.currentTarget.getAttribute('data-id-notification')}/detail`
            })
        })
        let btnNewNotification = document.querySelector('.btn-new-notification');
        btnNewNotification.addEventListener('click', (e)=> {
            $('.parent-form-popup').css("display", "flex");
            $('.parent-form-popup .title-popup').text("Choose a method of notification");

            let newHtml = `
                <button class="btn-lg btn-primary send-notification" notification_type="2">Total Everyone</button>
                <button class="btn-lg btn-info send-notification" notification_type="3">Only Email</button>
            `;
            // document.querySelector('.parent-form-popup .faq-form').insertAdjacentHTML('beforeend', newHtml);
            document.querySelector('.parent-form-popup .faq-form').innerHTML = newHtml;

            let sendNotification = document.querySelectorAll('.send-notification');
            sendNotification.forEach((item) => {
                item.addEventListener('click', (e) => {
                    let notification_type = e.currentTarget.getAttribute('notification_type');
                    window.location.href = "/admin/send-notification-view/" + notification_type;
                });
            
            })

            $('.parent-form-popup .close-popup').click(function() {
                $('.parent-form-popup').css("display", "none");
            });


        });

    </script>

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




































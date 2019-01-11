$(()=>{  
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });
    
    // $('#ajaxbtn').click(
    //     function () {
    //         $.get("/ajax_test", function (data, status) {
    //                 let obj = JSON.parse(data);
    //                 console.log(obj);
    //                 alert("Data: " + data + "\nStatus: " + status);
    //             });
    //     });            
    
    $(document).on('click','.task-status', function(){
            var id=$(this).data('id');
            $.post( "/tasks/"+id,{
                _method: 'PATCH'
            },
                function (data, status) {
                    if( $('#task-'+id).parent().hasClass('is-complete')){
                        $('#task-'+id).parent().removeClass('is-complete');
                    }
                    else{
                        $('#task-'+id).parent().addClass('is-complete');
                    }
                });
        });

    $('#new-task-button').click(
        function () {
            var project_id=$('#project-id').text();
            var descr=$('#new-task-description').val();
            if(descr===''){
                $('#add-task-alert').show();
                return;
            }
            else{
                $('#add-task-alert').hide();
            }
            $('#new-task-description').val('');
            $.post( '/projects/'+project_id+'/tasks',{
                description:descr
            },
                function (data, status) {
                    let task = JSON.parse(data);
                    $('#task-list').append(`
                    <form class='new-task-form' action="/tasks/${task.id}" method='post' style="display:none;"> 
                    </form>
                    `);

                    $('.new-task-form').hide().html(`
                    <input type="hidden" name="_token" value="${ $('meta[name=csrf-token]').attr('content')}">
                    <input type="hidden" name="_method" value="PATCH">
                        <div class='delete-task-button button is-danger is-pulled-right'  data-id='${task.id}'>Delete</div>
                        <label class="panel-block" >
                            <input id='task-${task.id}'  data-id='${task.id}' class='task-status' type="checkbox" name='completed' >
                            ${task.description}
                        </label>  

                        `).slideToggle(300);

                    $('.new-task-form').removeClass('new-task-form');
                });
        });

        $(document).on('click','.delete-task-button', function(){
            var id=$(this).data('id');
            $.post( "/tasks/"+id,{
                _method: 'DELETE'
            },
                (data, status) =>{
                    $(this).parent().slideToggle(300,()=>{
                        $(this).parent().remove();
                    });
                });
        });


});

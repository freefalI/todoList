$(()=>{  
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });
    

    setInterval(function() {
        $('#tasks-count strong').text($('#task-list-body form:visible').length);

    }, 500);

    setInterval(function() {
        var input, filter, ul, li, a, i, txtValue;
        input = $('#search-tasks-input');
        filter = input.val().toUpperCase();
        items = $('#task-list-body').children();
        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < items.length; i++) {
            b=$ (items[i]).find(".task-description");
            txtValue = b.text();
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                $(items[i]).show();
            } else {
                $(items[i]).hide();
            }
        }
    }, 500);
    


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
                    $('#task-list-body').append(`
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


        $(document).on('click','.delete-all-tasks-button', function(){
            var project_id=$('#project-id').text();
            $.post( "/project/"+project_id+'/clear',{
                _method: 'PATCH'
            },
                (data, status) =>{
                    $('#task-list-body').slideToggle(300,()=>{
                        $('#task-list-body').children().remove();
                        $('#task-list-body').show();
                    });
                });
        });
        


    // function myFunction() {
        // Declare variables
        /*
        var input, filter, ul, li, a, i, txtValue;
        input = $('#search-tasks-input');
        filter = input.value.toUpperCase();
        li = $('#task-list-body').children();
        
        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            } else {
            li[i].style.display = "none";
            }
        }
        */
    // }




});

$(() => {
    $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=csrf-token]').attr('content') }
    });


    setInterval(function () {
        $('#projects-count strong').text($('#projects-list-body li:visible').length);
    }, 500);

    //search panel
    setInterval(function () {
        var input, filter, i, txtValue;
        input = $('#search-projects-input');
        filter = input.val().toUpperCase();
        var items = $('#projects-list-body').children();

        for (i = 0; i < items.length; i++) {
            el = $(items[i]).find(".project-name .search-data");
            txtValue = el.text();
            if (txtValue.toUpperCase().indexOf(filter) > -1)
            {
                $(items[i]).show(()=>{$(this).slideToggle(300)});
            } else {
                $(items[i]).hide(()=>{$(this).slideToggle(300)});
            }

        }
    }, 500);

    // // $('#ajaxbtn').click(
    // //     function () {
    // //         $.get("/ajax_test", function (data, status) {
    // //                 let obj = JSON.parse(data);
    // //                 console.log(obj);
    // //                 alert("Data: " + data + "\nStatus: " + status);
    // //             });
    // //     });            

    // $(document).on('click', '.task-status', function () {
    //     var id = $(this).data('id');
    //     $.post("/tasks/" + id, {
    //         _method: 'PATCH'
    //     },
    //         function (data, status) {
    //             if ($('#task-' + id).parent().hasClass('is-complete')) {
    //                 $('#task-' + id).parent().removeClass('is-complete');
    //             }
    //             else {
    //                 $('#task-' + id).parent().addClass('is-complete');
    //             }
    //         });
    // });
    // // $('#new-task-button').preventDefault();
    // $('#new-task-button').click(
    //     function () {
            
    //         var project_id = $('#project-id').text();
    //         var descr = $('#new-task-description').val();
    //         if (descr === '') {
    //             $('#add-task-alert').show();
    //             return;
    //         }
    //         else {
    //             $('#add-task-alert').hide();
    //         }
    //         $('#new-task-description').val('');
    //         $.post('/projects/' + project_id + '/tasks', {
    //             description: descr
    //         },
    //             function (data, status) {
    //                 let task = JSON.parse(data);
    //                 $('#task-list-body').append(`
    //                 <form class='new-task-form' action="/tasks/${task.id}" method='post' style="display:none;"> 
    //                 </form>
    //                 `);

    //                 $('.new-task-form').hide().html(`
    //                 <input type="hidden" name="_token" value="${ $('meta[name=csrf-token]').attr('content')}">
    //                 <input type="hidden" name="_method" value="PATCH">
    //                     <div class='delete-task-button button is-danger is-pulled-right'  data-id='${task.id}'>Delete</div>
    //                     <label class="panel-block" >
    //                         <input id='task-${task.id}'  data-id='${task.id}' class='task-status' type="checkbox" name='completed' >
    //                         <p class='task-description'>${task.description}</p>
    //                     </label>  

    //                     `).slideToggle(300);

    //                 $('.new-task-form').removeClass('new-task-form');
    //             });
    //     });

    // $(document).on('click', '.delete-task-button', function () {
    //     var id = $(this).data('id');
    //     $.post("/tasks/" + id, {
    //         _method: 'DELETE'
    //     },
    //         (data, status) => {
    //             $(this).parent().slideToggle(300, () => {
    //                 $(this).parent().remove();
    //             });
    //         });
    // });


    // $(document).on('click', '.delete-all-tasks-button', function () {
    //     var project_id = $('#project-id').text();
    //     $.post("/project/" + project_id + '/clear', {
    //         _method: 'PATCH'
    //     },
    //         (data, status) => {
    //             $('#task-list-body').slideToggle(300, () => {
    //                 $('#task-list-body').children().remove();
    //                 $('#task-list-body').show();
    //             });
    //         });
    // });


    // $(document).on('click', '#search-tabs li', function () {
    //     $('#search-tabs li').removeClass('is-active');
    //     $(this).addClass('is-active');
    // });



});

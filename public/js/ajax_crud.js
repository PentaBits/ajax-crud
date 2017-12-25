/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    //http://localhost/ajax-crud/public
    
    var basepath = $("#basepath").val();
    $('#btn-add').click(function(){
        $('#btn-save').val('add');
        $('#frmTasks').trigger('reset');
        $('#myModal').modal('show');
    });
    //display modal form for task editing
    
    $(document).on('click','.open-modal',function(){
        var task_id = $(this).val();

        $.get(basepath + '/task/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#task_id').val(data.id);
            $('#task').val(data.task);
            $('#description').val(data.description);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });
    
    
  //  $('.open-modal').click(function(){
//        var task_id = $(this).val();
//
//        $.get(basepath + '/task/' + task_id, function (data) {
//            //success data
//            console.log(data);
//            $('#task_id').val(data.id);
//            $('#task').val(data.task);
//            $('#description').val(data.description);
//            $('#btn-save').val("update");
//
//            $('#myModal').modal('show');
//        }) 
    //});
    
    $("#btn-save").click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            task: $('#task').val(),
            description: $('#description').val()
        };
        
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        
        var type = "POST"; //for creating new resource
        var task_id = $('#task_id').val();;
        var urlpath = basepath+'/task';
        
        
        if(state=="update")
        {
            type="PUT";
            urlpath = basepath+'/task/'+task_id; 
        }
        
        $.ajax({
             type: type,
            url: urlpath,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#tasks-list').append(task);
                }else{ //if user updated an existing record

                    $("#task" + task_id).replaceWith( task );
                }

                $('#frmTasks').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        
        
    });

$(document).on('click','.delete-task',function(){
    var task_id = $(this).val();
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
    
    $.ajax({
        type:"DELETE",
        url:basepath+'/task/'+task_id,
        success:function(data){
            $('#task'+task_id).remove();
        },
        error:function(er){
            console.log("Error : "+er);
        }
    });
});



//main brace
});



(function($){

    $(document).ready(function(){

        $(document).on('click','a.logout_btn',function(e){
            e.preventDefault();
            $('form#logoutform').submit();
        });

        //Category All Data

        function allCate(){

            $.ajax({

                url : '/category-all',
                success : function(data){

                    $('tbody#allcate').html(data);

                }

            });

        }

        allCate();
        //Category Add

        $(document).on('click','a.cate_add_btn',function(e){
            e.preventDefault();
            $('#category_add_modal').modal('show');
        });


        $('form#category_add_form').submit(function(e){
            e.preventDefault();

            $.ajax({

                url : '/category-create',
                data : new FormData(this),
                method : "POST",
                contentType: false,
                processData: false,
                success: function(data){
                    $('form#category_add_form')[0].reset();
                    $('#category_add_modal').modal('hide');
                    swal({
                        title: "Good job!",
                        text: "category Added Successfull!",
                        icon: "success",
                        button: "Done!",
                      });

                    allCate();
                }

            });

        });

        //Category Status Update

        $(document).on('click','a.cat_up_btn',function(e){
            e.preventDefault();

            let cate_update_id = $(this).attr('cate_up_id');

            $.ajax({

                url : '/category-update/'+cate_update_id,
                success : function(data){
                    swal({
                        title: "Good job!",
                        text: "Category Status Updated Successfull!",
                        icon: "success",
                        button: "Done!",
                      });

                    allCate();
                }
            });
        });

        //Category Edit

        $(document).on('click','a.cate_edit_btn',function(e){
            e.preventDefault();
           let cate_edit = $(this).attr('cate_edit_id');

           $.ajax({

                url : '/category-edit/'+cate_edit,
                success : function(data){
                    $('#category_edit_modal').modal('show');
                    $('form#category_edit_form input[name="name"]').val(data.name);
                }

           });

           //Category NewUpdate

           $('form#category_edit_form').submit(function(e){
                e.preventDefault();

                $.ajax({

                    url : '/category-edit/'+cate_edit,
                    method : "POST",
                    data : new FormData(this),
                    contentType: false,
                    processData: false,
                    success : function(data){
                        $('#category_edit_modal').modal('hide');
                        swal({
                            title: "Good job!",
                            text: "Category Edited Updated Successfull!",
                            icon: "success",
                            button: "Done!",
                          });

                        allCate();

                    }

                });

           });



        });








        //Category Delete
        $(document).on('click','a.cate_delete_btn',function(e){
            e.preventDefault();

            let cate_delete_id = $(this).attr('cate_delete_id');

            $.ajax({

                url : '/category-delete/'+cate_delete_id,
                success : function(data){

                    swal({
                        title: "Good job!",
                        text: "Category Deleted Successfull!",
                        icon: "success",
                        button: "Done!",
                      });

                    allCate();
                }


            });



        });






         CKEDITOR.replace( 'logcontent' );


    });





})(jQuery)

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


        //  Tag update

        $(document).on('click','a.tag_add_btn',function(e){
            e.preventDefault();
            $('#tag_add_modal').modal('show');
        });

        //Tag Show

        function alltags(){

            $.ajax({

                url : '/tag-all',
                success : function(data){

                    $('tbody#alltag').html(data);
                }

            });


        }

        alltags();

        //tag insert
        $('form#tag_add_form').submit(function(e){
            e.preventDefault();

            $.ajax({

                url : '/tag',
                data : new FormData(this),
                method: "POST",
                contentType: false,
                processData : false,
                success : function(data){
                    $('form#tag_add_form')[0].reset();
                    $('#tag_add_modal').modal('hide');
                    swal({
                        title: "Good job!",
                        text: "Tag Insert Successfull!",
                        icon: "success",
                        button: "Done!",
                    });

                    alltags();
                }

            });
        });

        //Tag Status Update

        $(document).on('click','a.tag_status_btn',function(e){
            e.preventDefault();

            let tag_status_id = $(this).attr('tag_status_id');

            $.ajax({

                url : '/tag-statusupdate/'+tag_status_id,
                success : function(data){

                    swal({
                        title: "Good job!",
                        text: "Tag Status Updated Successfull!",
                        icon: "success",
                        button: "Done!",
                    });

                    alltags();
                }


            });
        });

        //Tag edit id
        $(document).on('click','a.tag_edit_btn', function(e){
            e.preventDefault();
            let tag_edit_id = $(this).attr('tag_edit_id');
            $('#tag_edit_modal').modal('show');
            $.ajax({
                url : '/tag-editedata/'+tag_edit_id,
                success: function(data){

                    $('form#tag_edit_form input[name="name"]').val(data.name);
                }
            });

            //Tag Update
            $('form#tag_edit_form').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url : '/tag-editedata/'+tag_edit_id,
                    data : new FormData(this),
                    method : "POST",
                    contentType : false,
                    processData: false,
                    success:  function(data){
                        $('#tag_edit_modal').modal('hide');
                        swal({
                            title: "Good job!",
                            text: "Tag Edit Updated Successfull!",
                            icon: "success",
                            button: "Done!",
                        });

                        alltags();
                    }

                });

            });

        });

        //Tag Delete
         $(document).on('click','a.tag_trash_btn',function(e){

            e.preventDefault();

            let tag_delete_id =  $(this).attr('tag_trash_id');

            $.ajax({

                url : '/tag-delete/'+tag_delete_id,
                success: function(data){

                    swal({
                        title: "Good job!",
                        text: "Tag Edit Deleted Successfull!",
                        icon: "success",
                        button: "Done!",
                    });

                    alltags();
                }

            });



         });










         CKEDITOR.replace('logcontent');
         $('.selectdata').select2();



    });





})(jQuery)

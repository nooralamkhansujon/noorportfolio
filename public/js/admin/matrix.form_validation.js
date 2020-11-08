let token = document.head.querySelector('meta[name="csrf-token"]');
axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;


$(document).ready(function(){

	$("#current_pwd").keyup(function(){
        let current_pwd = $("#current_pwd").val();

        axios({
            method: 'post',
            url: '/admin/check-pwd',
            params:{
                current_pwd: current_pwd
            }
          }).then(res=>{

            if(res.data == false){
                $("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
            }
            else{
                $("#chkPwd").html("<font color='green'>Current Password is Correct</font>")
            }
        }).catch(error=>{
            console.log(error);
            alert(error);
        });
	});

	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});



    $('.deleteRecord').on('click',function(event){
        event.preventDefault();
        let recoredId = $(this).attr('rel');
        let recoredUrl = $(this).attr('rel1');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons:true
          }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(`/admin/${recoredUrl}/${recoredId}/delete`
                ).then(res=>{
                        Swal.fire(
                            'Deleted!',
                            res.data,
                            'success'
                        );
                        autometaTag();
                }).catch(err=>{
                        console.log(err);
                            Swal.fire(
                                'Error!',
                                'Some Error occured',
                                'error'
                        );
                });

            }else{
                Swal.fire(
                    'Cancelled',
                    'Your Recored is safe :)',
                    'success'
                );
            }
        })
    });

});




function autometaTag(){
    let headTag = document.querySelector('head');
    let metaTag = document.createElement('meta');
    metaTag.setAttribute('http-equiv','refresh');
    metaTag.setAttribute('content',3);
    headTag.appendChild(metaTag);

}

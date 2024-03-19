<html>  
      <head>  
           <title>Survey Form</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <h3 style="text-align:center;">Generate OTP</h3>  
                <div class="form-group">  
                     <form name="add_mobile" id="add_mobile">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="tel" id="mobile_number" name="mobile_number[]" placeholder="Enter Mobile Number" class="form-control name_list" /></td> 
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit"/>  
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="tel" name="mobile_number[]" placeholder="Enter Mobile Number" class="form-control name_list" /><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#submit').click(function(){            

     //    if($('#mob').val() ==''){
     //        alert("please enter mobile number");
     //        $('#mob').focus();
     //        return false;
     //    }

//         $("#add_mobile").validate();
//          $('.mob').each(function() {
//         $(this).rules("add", 
//             {
//                 required: true,
//                 messages: {
//                 required: "Mobile Number is required",
//                 }
//             });
//     });

           $.ajax({  
                url:"otp.php",  
                method:"POST",  
                data:$('#add_mobile').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_mobile')[0].reset();  
                }  
           });  
      });  
 });  
 </script>
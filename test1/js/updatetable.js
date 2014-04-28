$(function() {

				var fname = $("#first-name"), lname = $("#last-name"), email = $("#email"), password = $("#password");


				$("#dialog-form").dialog({
					autoOpen : false,
					height : 300,
					width : 350,
					modal : true,
					buttons : {
						"Create an account" : function() {
							$("#users tbody").append("<tr>" + "<td>" + (fname.find("option:selected").text()+' ').concat(lname.find("option:selected").text())+ "</td>" + "<td>" + email.val() + "</td>" + "<td>" + password.val() + "</td>" + "<td><a href='' class='edit'>Edit</a></td>" + "<td><span class='delete'><a href=''>Delete</a></span></td>" + "</tr>");
							$(this).dialog("close");
                             
						},
						Cancel : function() {
							$(this).dialog("close");
						}
					},
					close : function() {
						allFields.val("").removeClass("ui-state-error");
					}
				});
                /*$("#users tbody tr td.delete").live("click", function(){
                    console.log('hi');
                    $(this).remove()
                })*/
                $('span.delete').live('click', function() {  
                    $(this).closest('tr').find('td').fadeOut(1000, 
                        function(){ 
                            // alert($(this).text());
                            $(this).parents('tr:first').remove();                    
                        });    
                
                    return false;
                });
				$("#create-user").button().click(function() {
					$("#dialog-form").dialog("open");
				});
			});

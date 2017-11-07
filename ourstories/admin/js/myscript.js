/***
	file: admin/js/myscript.js/myscript
	desc: jQuery handling the upload of imagefile

***/
$(document).ready(function(){
	//when html document is loaded and ready in browser
	$("#insUsrBtn").click(function(){
		insertUser();
		return false;
	});
	$("#rmvUsrBtn").click(function(){
		removeUser();
		return false;
	});
	//saving image for logged in user, when savimgbtn is clicked
	$("#saveimgbtn").click(function(){
		var textmsg='';
		$("#showimg").html('Loading imagefile...');
		$("#imgdata").html('');
		var file_data=$("#imgfile").prop("files")[0];
		var form_data=new FormData();
		form_data.append("imgfile",file_data);
		form_data.append("userID",$("#userID").val());
		$.ajax({
			url: "saveimgfile.php",
			dataType: 'html',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post'
		})
		.done(function(data){
			if(data!='error'){
				textmsg='<p>Image uploaded successfully!</p>';
				$("#showimg").html(textmsg);
				$("#imgdata").html('<p><img src="./images/'+data+'" class="media-object" style="width:100px" /></p>');
			}
		});
		
	});
	//remove image button clicked
	$("#removeimgbtn").click(function(){
		$("#imgdata").html('');
		$("#showimg").html('');
		$.post("removeimg.php",{
			userID: $("#userID").val()
		},function(data){
			if(data=='OK'){
				$("#imgdata").html('<p>Imagefile removed</p>');
			}
		});
	});
});

function insertUser(){
	$.post("insertUser.php",{
		email: $("#email").val(),
		firstname:$("#firstname").val(),
		lastname:$("#lastname").val(),
		phone:$("#phone").val(),
		level:$("#level").val(),
		passwd:$("#password").val()
	},function(data){
		//parse the JSON-data to variable
		var status=JSON.parse(data,function(key,value){
			return value;
		});
		$("#info").html('');
		if(status.Status=='OK'){
			//User was inserted
			msg='<p class="alert alert-success">User Inserted</p>';
			$("#info").html(msg);
			var url="./index.php?page=users";
			setTimeout(function(){
				$(location).attr("href",url);
			},2000); //2000ms = 2 seconds
		}else{
			$("#info").html('<p class="alert alert-danger">Something went wrong! Check the fields! '+status.Status+'</p>');
		}
	});
}

function removeUser(){
	if($("#remove").is(':checked')){
		$.post("deleteUser.php",{
			userID:$("#userID").val()
		},function(data){
			//parse the JSON-data to variable
		var status=JSON.parse(data,function(key,value){
			return value;
		});
		$("#info").html('');
		if(status.Status=='OK'){
			//User was removed
			msg='<p class="alert alert-success">User removed from database</p>';
			$("#info").html(msg);
			var url="./index.php?page=users";
			setTimeout(function(){
				$(location).attr("href",url);
			},2000); //2000ms = 2 seconds
		}else{
			$("#info").html('<p class="alert alert-danger">Something went wrong! Check the fields! '+status.Status+'</p>');
		}
		});
	}else alert('You have to agree before removing!');
}













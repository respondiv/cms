// initialize tinymce
tinymce.init({ 
    selector:'textarea',
    plugins: "code",
    // menubar: false
    menubar: 'edit format tools'
});
   

// Select All Posts Checkbox

$(document).ready(function(){

	$('#selectAllBoxes').click(function(event){
		if (this.checked) {
			$('.checkBoxes').each(function(){
				this.checked = true;
			});
		}
		else{
			$('.checkBoxes').each(function(){
				this.checked = false;
			});
		}
	});

}); 



//  add loader to the background

/*var div_box = "<div id='load-screen'><div id='loading'></div></div>";
$("body").prepend(div_box);
$('#load-screen').delay(300).fadeOut(300,function(){
	$(this).remove();
});*/

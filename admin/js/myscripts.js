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
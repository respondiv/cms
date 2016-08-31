    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Give class Active to the current Nav -->
    <script type="text/javascript">
    	$('#menu > ul.nav li a').click(function(e) {
	    var $this = $(this);
	    $this.parent().siblings().removeClass('active').end().addClass('active');
	    e.preventDefault();

	    // Load the page content in to element
	    // with id #content using ajax (There are other ways)
	    $('#content').load($this.href());
	});
    </script>

</body>

</html>
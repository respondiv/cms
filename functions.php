<?php

	//  Check MySql Querry
	function querryCheck($myQuerry){
        global $connection;
        if (!$myQuerry) {
                die("Query FAILED " . mysqli_error($connection));
            }
    }

    // Query all the posts
    function queryAllPosts(){
        global $connection;
        $query = "SELECT * FROM posts WHERE post_status = 'published' ";
        $select_all_posts = mysqli_query($connection,$query);

        querryCheck($select_all_posts);

        while($row = mysqli_fetch_assoc($select_all_posts)){
            $post_id = $row['post_id']; 
            $post_category_id = $row['post_category_id']; 
            $post_title = $row['post_title']; 
            $post_author = $row['post_author']; 
            $post_date = $row['post_date']; 
            $post_image = $row['post_image']; 
            $post_content = $row['post_content']; 
            $post_content = mb_substr($post_content, 0, 200);
            $post_tags = $row['post_tags'];
            $post_status = $row['post_status'];
            $post_comment_count = $row['post_comment_count'];
            $post_category_name = categoryName($post_category_id);

            
            $rows[] = compact('post_id','post_status','post_title','post_content','post_category_id','post_author','post_tags','post_image','post_date','post_comment_count','post_category_name');
            
        }
            if (empty($rows)) {     // return empty array if no results found
                $rows = array ();
            }

            return $rows;       
     }


	// Sort Array
	function arraySort($array, $on, $order=SORT_ASC){
		$new_array = array();
		$sortable_array = array();

		if (count($array) > 0) {
		    foreach ($array as $k => $v) {
		        if (is_array($v)) {
		            foreach ($v as $k2 => $v2) {
		                if ($k2 == $on) {
		                    $sortable_array[$k] = $v2;
		                }
	           		}
	        	} else {
	            $sortable_array[$k] = $v;
	        	}
	    	}

		    switch ($order) {
		        case SORT_ASC:
		            asort($sortable_array);
		        break;
		        case SORT_DESC:
		            arsort($sortable_array);
		        break;
		    }

		    foreach ($sortable_array as $k => $v) {
		        $new_array[$k] = $array[$k];
		    }
		}

		return $new_array;
	}


    // Display All Posts
    function displayAllPosts(){

        $new_array = queryAllPosts();

        if (empty($new_array)) {
            echo "<div class='alert alert-danger'>";
            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "No Posts Found. Try adding some posts first !!";
            echo "</div>";
        }
        else{
            $new_array = arraySort($new_array, 'post_date', SORT_DESC);
            foreach ($new_array as $key => $value) {
                        echo("<!-- Blog Post --> ");
                        echo "<h2>";
                            echo "<a href='post.php?p_id={$value['post_id']}'>{$value['post_title']}</a>";
                        echo "</h2>";
                        echo "<p class='lead'>";
                            echo "by <a href='author.php?author={$value['post_author']}'>{$value['post_author']}</a>";
                        echo "</p>";
                        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$value['post_date']} | <span class='glyphicon glyphicon-briefcase'></span> Posted in {$value['post_category_name']} | <span class='glyphicon glyphicon-comment'></span> {$value['post_comment_count']} </p>";
                        echo "<hr>";
                        echo "<a href='post.php?p_id={$value['post_id']}'><img class='img-responsive' src='images/{$value['post_image']}'></a>";
                        echo "<hr>";
                        echo "<p>{$value['post_content']} .....</p>";
                        echo "<a class='btn btn-primary' href='post.php?p_id={$value['post_id']}''>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";

                        echo "<hr>";

            }
        }


    }


    // query search results
    function searchResultsQuery(){
    	global $connection;
    	if (isset($_POST['search_submit'])) {
    		$search = $_POST['search'];
            $search = mysqli_real_escape_string($connection, $search);


            // check whether the search keyword is empty
            if (empty($search)) {
                $rows = array ();
                return $rows;
            }

	    	$query = "SELECT * FROM posts WHERE (post_tags LIKE '%$search%' or post_title LIKE '%$search%' or post_content LIKE '%$search%') AND post_status = 'published' ";
	        $search_results = mysqli_query($connection,$query);

	        querryCheck($search_results);

	     	while($row = mysqli_fetch_assoc($search_results)){
	     		$post_id = $row['post_id']; 
	            $post_category_id = $row['post_category_id']; 
	            $post_title = $row['post_title']; 
	            $post_author = $row['post_author']; 
	            $post_date = $row['post_date']; 
	            $post_image = $row['post_image']; 
	            $post_content = $row['post_content'];
	            $post_content = mb_substr($post_content, 0, 200); 
	            $post_tags = $row['post_tags'];
	            $post_status = $row['post_status'];
	            $post_comment_count = $row['post_comment_count'];
	            $post_category_name = categoryName($post_category_id);

	     		$rows[] = compact('post_id','post_status','post_title','post_content','post_category_id','post_author','post_tags','post_image','post_date','post_comment_count','post_category_name');
	     	}

	     	if (empty($rows)) {		// return empty array if no results found
	     		$rows = array ();
	     	}

	     	return $rows;
     	}

    }


    // Display Search Results
    function displaySearchResults(){
    	$new_array = searchResultsQuery();

    	if (empty($new_array)) {
    		echo "<div class='alert alert-danger'>";
            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "No Results Found. Try Searching using different Keywords";
            echo "</div>";
            echo "<div class='row'>";
            displaySearchForm();
            echo "</div>";
    	}

    	else{

        	$new_array = arraySort($new_array, 'post_date', SORT_DESC);
	        foreach ($new_array as $key => $value) {
	                echo("<!-- Blog Post --> ");
	                    echo "<h2>";
	                        echo "<a href='post.php?p_id={$value['post_id']}'>{$value['post_title']}</a>";
	                    echo "</h2>";
	                    echo "<p class='lead'>";
                            echo "by <a href='author.php?author={$value['post_author']}'>{$value['post_author']}</a>";
	                    echo "</p>";
	                    echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$value['post_date']} | <span class='glyphicon glyphicon-briefcase'></span> Posted in {$value['post_category_name']} | <span class='glyphicon glyphicon-comment'></span> {$value['post_comment_count']} </p>";
	                    echo "<hr>";
	                    echo "<a href='post.php?p_id={$value['post_id']}'><img class='img-responsive' src='images/{$value['post_image']}'></a>";
	                    echo "<hr>";
	                    echo "<p>{$value['post_content']} .....</p>";
	                    echo "<a class='btn btn-primary' href='post.php?p_id={$value['post_id']}''>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";

	                    echo "<hr>";

	        }
	    }		   

    }


    // query All Category
    function queryAllCategory(){
        global $connection;
        $query = "SELECT * FROM categories";
        $select_all_categories = mysqli_query($connection,$query);

        // will limit the # of category returs from query
        // $query = "SELECT * FROM categories LIMIT 5";

        querryCheck($select_all_categories);

        while($row = mysqli_fetch_assoc($select_all_categories)){
            $cat_id    = $row['cat_id']; 
            $cat_title = $row['cat_title']; 

            $rows[] = compact('cat_id','cat_title');

        }

        if (empty($rows)) {     // return empty array if no results found
            $rows = array ();
        }

        return $rows;


    }




    // Return Category name when Category ID is provided
    function categoryName($cat_id){
        global $connection;
        $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
        $category_name = mysqli_query($connection,$query);

        // Check if the query is good
        querryCheck($category_name);

        while($row = mysqli_fetch_assoc($category_name)){
        $cat_title = $row['cat_title'];
        return $cat_title;
        }

    }


    // Display Search Bar
    function displaySearchForm(){
                    echo "<form action='search.php' method='post'>";
                    echo "<div class='input-group'>";
                        echo "<input type='text' class='form-control' name='search'>";
                        echo "<span class='input-group-btn'>";
                            echo "<button class='btn btn-default' type='submit' name='search_submit'>";
                                echo "<span class='glyphicon glyphicon-search'></span>";
                        echo "</button>";
                        echo "</span>";
                    echo "</div>";
                    echo "</form> ";
    }

    //  Display All Category Name in 2 Column on Sidebar
    function displayCategoryTwoColumn(){
        
        $new_array = queryAllCategory();

        if (empty($new_array)) {
            echo "<div class='alert alert-danger'>";
            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "No Category Found. Try adding a Category First";
            echo "</div>";
        }

        else{

            $new_array = arraySort($new_array, 'cat_title', SORT_ASC);

            // count total number of category, find if it's odd or even number and determine the column break point (number)
            $count_cat = count($new_array);
            if($count_cat % 2 == 0){
                $col_break = ($count_cat / 2) + 1;
            }
            else{
                $col_break = intdiv($count_cat, 2) + 2;
            }
           
           // countdown to  break the column
            $i = 1;   

            // print categories in two column, if odd # of category, the first column will have 1 more row, if even, both have same # or row.
            foreach ($new_array as $key => $value) {
                switch($i){
                    case 1:

                        echo "<div class='col-lg-6'>";
                            echo "<ul class='list-unstyled'>";

                        break;

                    case $col_break:

                            echo "</ul>";
                       echo " </div>";
                        echo "<div class='col-lg-6'>";
                            echo "<ul class='list-unstyled'>";
        
                        break;
                }                                    

                echo "<li><a href='category.php?category={$value['cat_id']}'>{$value['cat_title']}</a></li>";
                $i++;
            }
        }

    }


    // Display Category in Navigation
    function navCategoryDisplay(){
        $new_array = queryAllCategory();

        if (empty($new_array)) {
            echo "<div class='alert alert-danger'>";
            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
            echo "No Category Found. Try adding a Category First";
            echo "</div>";
        }

        else{

            $new_array = arraySort($new_array, 'cat_title', SORT_ASC);

            // print categories in two column, if odd # of category, the first column will have 1 more row, if even, both have same # or row.
            foreach ($new_array as $key => $value) {

                echo "<li><a href='category.php?category={$value['cat_id']}'>{$value['cat_title']}</a></li>";

                
            }
        }

    }


    // Display Individual posts
    function displayPost(){
        global $connection;
        if (isset($_GET['p_id'])) {
            $post_id = $_GET['p_id'];
       
            $query = "SELECT * FROM posts WHERE post_id = $post_id ";
            $display_post = mysqli_query($connection,$query);

            querryCheck($display_post);

            while($row = mysqli_fetch_assoc($display_post)){
                $post_category_id = $row['post_category_id']; 
                $post_title = $row['post_title']; 
                $post_author = $row['post_author']; 
                $post_date = $row['post_date']; 
                $post_image = $row['post_image']; 
                $post_content = $row['post_content']; 
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];
                $post_comment_count = $row['post_comment_count'];
                $post_category_name = categoryName($post_category_id);

                echo "<!-- Title -->";
                echo "<h1>{$post_title}</h1>";

                echo "<!-- Author -->";
                echo "<p class='lead'>";
                    echo "by <a href='author.php?author={$post_author}'>{$post_author}</a>";
                echo "</p>";

                echo "<hr>";

                echo "<!-- Date/Time -->";
                echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date} | Posted in {$post_category_name} | <span class='glyphicon glyphicon-comment'> {$post_comment_count} </p>";

                echo "<hr>";

                echo "<!-- Preview Image -->";
                echo "<img class='img-responsive' src='images/{$post_image}' alt=''>";

                echo "<hr>";

                echo "<!-- Post Content -->";
               echo $post_content;
                
                
            }
             
        }  
     }

    // query Posts in Category
    function queryPostsInCategory(){
        global $connection;
        if (isset($_GET['category'])) {
            $cat_id = $_GET['category'];
       
            $query = "SELECT * FROM posts WHERE post_category_id = $cat_id AND post_status = 'published' ";
            $query_post_in_category = mysqli_query($connection,$query);

            querryCheck($query_post_in_category);

            while($row = mysqli_fetch_assoc($query_post_in_category)){
                $post_id = $row['post_id']; 
                $post_category_id = $row['post_category_id']; 
                $post_title = $row['post_title']; 
                $post_author = $row['post_author']; 
                $post_date = $row['post_date']; 
                $post_image = $row['post_image']; 
                $post_content = $row['post_content']; 
                $post_content = mb_substr($post_content, 0, 200);
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];
                $post_comment_count = $row['post_comment_count'];
                $post_category_name = categoryName($post_category_id);

                
                $rows[] = compact('post_id','post_status','post_title','post_content','post_category_id','post_author','post_tags','post_image','post_date','post_comment_count','post_category_name');
            
            }

            if (empty($rows)) {     // return empty array if no results found
                $rows = array ();
            }

            return $rows;       
        }
    }



    // Display All Posts in Category
    function displayPostsInCategory(){
        if (isset($_GET['category'])) {
            $cat_id = $_GET['category'];
            $post_category_name = categoryName($cat_id);
        }

        $new_array = queryPostsInCategory();

        if (empty($new_array)) {
                echo "<h2 class='page-header'>";
                    echo "All Posts in Category: {$post_category_name}";
                echo "</h2>";
                echo "<div class='alert alert-danger'>";
                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "No Post Found in Category <strong>{$post_category_name}</strong>. Try Searching using different Keywords or viewing other category page or homepage.";
                    echo "</div>";
                echo "<div class='row'>";
                    displaySearchForm();
                echo "</div>";
        }
        else{
            $new_array = arraySort($new_array, 'post_date', SORT_DESC);
                        echo "<h2 class='page-header'>";
                            echo "All Posts in Category: {$post_category_name}";
                        echo "</h2>";
            foreach ($new_array as $key => $value) {
                        echo("<!-- Blog Post --> ");
                        echo "<h2>";
                            echo "<a href='post.php?p_id={$value['post_id']}'>{$value['post_title']}</a>";
                        echo "</h2>";
                        echo "<p class='lead'>";
                            echo "by <a href='author.php?author={$value['post_author']}'>{$value['post_author']}</a>";
                        echo "</p>";
                        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$value['post_date']} | <span class='glyphicon glyphicon-briefcase'></span> Posted in {$value['post_category_name']} | <span class='glyphicon glyphicon-comment'></span> {$value['post_comment_count']} </p>";
                        echo "<hr>";
                        echo "<a href='post.php?p_id={$value['post_id']}'><img class='img-responsive' src='images/{$value['post_image']}'></a>";
                        echo "<hr>";
                        echo "<p>{$value['post_content']} .....</p>";
                        echo "<a class='btn btn-primary' href='post.php?p_id={$value['post_id']}''>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";

                        echo "<hr>";

            }
        }

    }


    // Return Current Post ID
    function currentPostID(){
        if (isset($_GET['p_id'])) {
            $current_post_id = $_GET['p_id'];
            return $current_post_id;
        }
    }


    // Create Comments
    function createNewComment(){
        global $connection;
        if (isset($_POST['comment_submit'])) {
            $comment_author = $_POST['comment_author'];
            $comment_email = $_POST['comment_email'];
            $comment_content = $_POST['comment_content'];
            $comment_date = date('d-m-y');
            $comment_status = "pending";
            $comment_post_id = $_POST['comment_post_id'];

            // prevent mysql injection
            $comment_author = mysqli_real_escape_string($connection, $comment_author);
            $comment_email = mysqli_real_escape_string($connection, $comment_email);
            $comment_content = mysqli_real_escape_string($connection, $comment_content);

            $query = "INSERT INTO comments(comment_author, comment_email, comment_content, comment_date, comment_status, comment_post_id) ";
            $query .= "VALUES ('{$comment_author}', '{$comment_email}', '{$comment_content}', now(), '{$comment_status}', $comment_post_id) ";

            $add_new_comment = mysqli_query($connection,$query);

           // Check if the query is good
           querryCheck($add_new_comment);

           //$comment_id = mysqli_insert_id($connection);

           global $SuccessMessageForComments;
           $SuccessMessageForComments = "Success";         

        }
    }

    // Display Comments
    function displayComments(){
        global $connection;
        $comment_post_id = currentPostID();
        $query = "SELECT * FROM comments WHERE comment_post_id = {$comment_post_id} ";
        $query .= "AND comment_status = 'approved' ";
        $query .= "ORDER BY comment_id DESC ";

        $select_all_comments = mysqli_query($connection,$query);

        // Check if the query is good
        querryCheck($select_all_comments);

        while($row = mysqli_fetch_assoc($select_all_comments)){
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];
            $comment_author = $row['comment_author'];
                echo "<div class='media'>";
                    echo "<a class='pull-left' href='#'>";
                        echo "<img class='media-object' src='http://placehold.it/64x64' alt=''>";
                    echo "</a>";
                    echo "<div class='media-body'>";
                        echo "<h4 class='media-heading'>{$comment_author}";
                            echo "<small>{$comment_date}</small>";
                        echo "</h4>";
                        echo $comment_content;
                    echo "</div>";
                echo "</div>";


        }

    }

    // Display Login Form
    function displayLoginForm(){
                    echo "<form role='form' action='includes/login.php' method='post' data-toggle='validator' >";
                    // echo "<form role='form' action='' method='post' data-toggle='validator' >";
                            echo "<div class='form-group'>";
                                echo "<input type='text' class='form-control' name='username' required data-error='Username is Required' placeholder='Enter Username'>";
                                echo "<div class='help-block with-errors'></div>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<div class='input-group'>";
                                    echo "<input type='password' class='form-control' name='password' required data-error='Password is Required' placeholder='Enter Password'>";
                                    echo "<span class='input-group-btn'>";
                                        echo "<button class='btn btn-primary' type='submit' name='login_submit'>Login";
                                        echo "</button>";
                                    echo "</span>";
                                echo "</div>";
                                echo "<div class='help-block with-errors'></div>";
                            echo "</div>";
                            echo "<div class='form-group text-right'>";
                                echo "<a href='/registration.php'>Register</a>";
                            echo "</div>";                            
                    echo "</form> ";
    }


    // registration form
    function registerUser(){
        global $connection;
        if (isset($_POST['registration_submit'])) {
            $username = $_POST['username']; 
            $email = $_POST['email'];
            $password = $_POST['password'];

            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);

            // for password Encryption
            $user_randSalt  = getSaltFromDB();
            $password = crypt($password, $user_randSalt);


            $query = "INSERT INTO users (username, user_email, password, user_role, user_firstname, user_lastname, user_image,user_status) ";
            $query .= "VALUES ('{$username}', '{$email}', '{$password}', 'subscriber','','','','')";

            $register_user = mysqli_query($connection, $query);
            querryCheck($register_user);

        }

    }

    // get user salt
    function getSaltFromDB(){
        global $connection;
        $query = "SELECT * FROM salts where id = 1 ";
        $get_salts = mysqli_query($connection, $query);
        querryCheck($get_salts);
        while ($row = mysqli_fetch_assoc($get_salts)) {
            $randSalt = $row['rand_salts'];
            return $randSalt;
        }

    }


    // query all posts from Author
     function queryPostsFromAuthor(){
        global $connection;
        if (isset($_GET['author'])) {
            $author_name = $_GET['author'];
       
            $query = "SELECT * FROM posts WHERE post_author = '{$author_name}' AND post_status = 'published' ";
            $query_post_from_author = mysqli_query($connection,$query);

            querryCheck($query_post_from_author);

            while($row = mysqli_fetch_assoc($query_post_from_author)){
                $post_id = $row['post_id']; 
                $post_category_id = $row['post_category_id']; 
                $post_title = $row['post_title']; 
                $post_author = $row['post_author']; 
                $post_date = $row['post_date']; 
                $post_image = $row['post_image']; 
                $post_content = $row['post_content']; 
                $post_content = mb_substr($post_content, 0, 200);
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];
                $post_comment_count = $row['post_comment_count'];
                $post_category_name = categoryName($post_category_id);

                
                $rows[] = compact('post_id','post_status','post_title','post_content','post_category_id','post_author','post_tags','post_image','post_date','post_comment_count','post_category_name');
            
            }

            if (empty($rows)) {     // return empty array if no results found
                $rows = array ();
            }

            return $rows;       
        }
    }



    // Display all post from Author
    function displayPostsFromAuthor(){
        if (isset($_GET['author'])) {
            $post_author_name = $_GET['author'];
        }

        $new_array = queryPostsFromAuthor();

        if (empty($new_array)) {
                echo "<h2 class='page-header'>";
                    echo "All Posts From Author: {$post_author_name}";
                echo "</h2>";
                echo "<div class='alert alert-danger'>";
                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "No Post Found From Author <strong>{$post_author_name}</strong>. Try Searching using different Keywords or viewing other category page or homepage.";
                    echo "</div>";
                echo "<div class='row'>";
                    displaySearchForm();
                echo "</div>";
        }
        else{
            $new_array = arraySort($new_array, 'post_date', SORT_DESC);
                        echo "<h2 class='page-header'>";
                            echo "All Posts from Author: {$post_author_name}";
                        echo "</h2>";
            foreach ($new_array as $key => $value) {
                        echo("<!-- Blog Post --> ");
                        echo "<h2>";
                            echo "<a href='post.php?p_id={$value['post_id']}'>{$value['post_title']}</a>";
                        echo "</h2>";
                        echo "<p class='lead'>";
                            echo "by <a href='author.php?author={$value['post_author']}'>{$value['post_author']}</a>";
                        echo "</p>";
                        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$value['post_date']} | <span class='glyphicon glyphicon-briefcase'></span> Posted in {$value['post_category_name']} | <span class='glyphicon glyphicon-comment'></span> {$value['post_comment_count']} </p>";
                        echo "<hr>";
                        echo "<a href='post.php?p_id={$value['post_id']}'><img class='img-responsive' src='images/{$value['post_image']}'></a>";
                        echo "<hr>";
                        echo "<p>{$value['post_content']} .....</p>";
                        echo "<a class='btn btn-primary' href='post.php?p_id={$value['post_id']}''>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";

                        echo "<hr>";

            }
        }

    }












































?>